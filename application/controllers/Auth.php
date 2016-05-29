<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct() {        
	    parent::__construct();
	}
	
	
    /**
     * Logout user
     * @access public
     */
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	
    /**
     * Login user
     * @access public
     */
	public function login(){
		if ($this->authl->loggedIn()){
			redirect('/', 'refresh');
		}else{
			
			$data = array();
			if($this->input->get('passwordchanged')){
				$data['pwchanged'] = 1;
			}
			
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
			$this->load->model('Auth_model');
			
			
			$this->form_validation->set_rules('email_address', 'Email', array(
											            			'required',
																	'valid_email',
														            	array('login', array($this->Auth_model, 'login'))
														    		),
																array('login' => 'Invalid Email/Password'));
		
			
            if (!$this->form_validation->run()){
            	$this->load->view('auth/login',$data);
            }else{
				$user = $this->input->post('email_address');
				$this->authl->login($user);
				redirect('/article/listall');
            }
			
			
		}
	}
	
    /**
     * Verify new user and change password
     * @access public
     * @param int code
     */
	public function verify($code = 0){
		if(!$code){
			redirect('/');
		}
		
		$this->load->model('Auth_model');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		$user = $this->Auth_model->verifyUser($code);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
		if($user){
			if(!$this->form_validation->run()){
				$this->load->view('auth/set_new_password');
			}else{
				$password = $this->input->post('password');
				$this->Auth_model->setPassword($user['id'],$password);
				redirect('/auth/login?passwordchanged=1');
			}
			
		}else{
			redirect('/');
		}
	}
	
    /**
     * register new user
     * @access public
     */
	public function register(){
		if ($this->authl->loggedIn()){
			redirect('/', 'refresh');
		}else{
			
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
			$this->load->model('Auth_model');
			
			$this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[3]');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[3]');
			$this->form_validation->set_rules('email_address', 'Email', array(
											            			'required',
																	'valid_email',
														            	array('email_exists', array($this->Auth_model, 'isEmailExists'))
														    		),
																array('email_exists' => 'Account with email already exists'));
            if (!$this->form_validation->run()){
            	$this->load->view('auth/register');
            }else{
				$firstname = $this->input->post('firstname');
				$lastname = $this->input->post('lastname');
				$email = $this->input->post('email_address');
				
				$act_code = $this->Auth_model->createUser($firstname,$lastname,$email);
				
				$this->load->view('auth/registersuccess');
            }
			
			
		}
	}
	
}
