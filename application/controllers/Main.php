<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct() {        
	    parent::__construct();
	}

	public function index(){
		$this->load->model('Article_model');
		$data['highlights'] = $this->Article_model->getLatest10();
		$this->load->view('index',$data);
	}
	
}
