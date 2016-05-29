<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends CI_Controller {
	
	public function __construct() {        
	    parent::__construct();
		$this->load->library('unit_test');
	}

	public function index(){
		$this->load->model('Auth_model');
		$this->unit->run($this->Auth_model->isEmailExists('wk@wasiff.com'), 'is_bool', 'Check if email exists');
		
		$this->unit->run($this->authl->loggedin(), 'is_bool', 'Check login status');
		
		$this->unit->run($this->authl->id(), 'is_int', 'Check return user id');
		
		$this->unit->run($this->authl->fname(), 'is_string', 'Check user name');
		
		$this->load->library('M_pdf');
		
		$this->unit->run($this->m_pdf->M_pdf(), 'is_boolean', 'M_pdf initialize');
		$this->unit->run($this->m_pdf->load(), 'is_object', 'Check pdf generator library');
		
		echo $this->unit->report();
	}
	
}
