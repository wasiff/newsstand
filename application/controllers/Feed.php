<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed extends CI_Controller {
    
	public function __construct(){  
        parent::__construct();
        $this->load->helper(array('xml'));
    }
	
    /**
     * Generate RSS Feed
     * @access public
     */
    public function index(){
		$data = array();
		$data['feed_name'] = 'Newsstand';
		$data['encoding'] = 'utf-8';
		$data['feed_url'] = base_url().'feed';
		$data['page_language'] = 'en-en';
		$data['page_description'] = 'News | Crossover';
		$data['creator_email'] = 'wk@wasiff.com';

		$this->load->model('Article_model');
		$data['data'] = $this->Article_model->getLatest10();

		header("Content-Type: application/rss+xml");
		$this->load->view('feed_view',$data);
    }
}