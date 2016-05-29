<?php
class Auth_model extends CI_Model {

	private $tbl = 'users';

	public function __construct(){
		parent::__construct();
	}
	
	function isEmailExists($value){
		$this->db->where('email',$value);
		if($this->db->count_all_results($this->tbl, FALSE)){
			return false;
		}else{
			return $value;
		}
	}
	
	function login($email){
		$password = $this->input->post('password');
		$this->db->select('id,first_name,last_name,email');
		$this->db->where('email',$email);
		$this->db->where('password',($password ? MD5($password) : ''));
		if($this->db->count_all_results($this->tbl, FALSE)){
			return $this->db->get()->row_array();
		}else{
			return false;
		}
		
	}
	
	function setPassword($userid,$password){
		$data = array(
			'password'			=> MD5($password),
			'activation_code'	=>	''
		);
		$this->db->update($this->tbl, $data, "id = ".$userid);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	
	function verifyUser($code){
		$this->db->where('activation_code',$code);
		$this->db->where('password','');
		 
		if($result = $this->db->get($this->tbl)){
			return $result->row_array();
		}else{
			return false;
		}
	}
	
	function createUser($fname,$lname,$email){
		$act_code = uniqid();
		$date = date('Y-m-d H:i:s');
		
		$data = array(
		        'first_name'		=> $fname,
		        'last_name'			=> $lname,
		        'email'				=> $email,
				'ip_address'		=>	$this->input->ip_address(),
				'activation_code'	=>	$act_code,
				'created_on'		=>	$date,
		);
		
		$this->db->insert('users', $data);
		
		$config['useragent']        = 'PHPMailer';              // Mail engine switcher: 'CodeIgniter' or 'PHPMailer'
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset']  = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';

		$this->load->library('email',$config);
		$this->email->initialize($config);
		
		$subject = 'Welcome to Newsstand';
		$emaildata = array(
			'subject'	=>	$subject,
			'act_code'	=>	$act_code
		);
		$message = $this->load->view('article/email_template',$emaildata,TRUE);
		
		
		$result = $this->email
		                ->from('no-reply@newsstand.com')   // Optional, an account where a human being reads.
		                ->to($email)
		                ->subject($subject)
		                ->message($message)
		                ->send();
		
		return $act_code;
	}
}
?>