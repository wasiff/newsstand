<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
	
	public function __construct() {        
	    parent::__construct();
	}
	
    /**
     * Generate PDF Document
     * @access public
     * @param int $articleid
     * @return object
     */
	public function generatepdf($articleid=0){
		$this->load->library("M_pdf");
		$mpdf = $this->m_pdf->load();
		
		$this->load->model('Article_model');
		$data['article'] = $this->Article_model->getArticleById($articleid);
		if(!$data['article']){
			redirect('/');
		}		
		
		$strHTML	=	$this->load->view('article/articlepdf',$data, true);
		
		//initialization of the libraray
		$mpdf = new mPDF('c', 'A4-L', '', '', 10, 10, 5, 5, 0, 0);

        $mpdf->SetDisplayMode('fullpage');

        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
  
		$stylesheet = file_get_contents('./assets/bootstrap/css/bootstrap.css');
		$mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text

        $mpdf->WriteHTML($strHTML, 2);
		
        $filename = "article-".date('dmYhis').".pdf";
        $mpdf->Output($filename, 'D');
	}
	
    /**
     * Display Complete News Article
     * @access public
     * @param int $articleid
     */
	public function view($articleid = 0){
		if(!(int)$articleid){
			redirect('/');
		}
		$this->load->model('Article_model');
		$article = $this->Article_model->getArticleById($articleid);
		
		if(!$article){
			redirect('/');
		}
		
		$data['article'] = $article;
		
		$this->load->view('article/article',$data);
		
	}
	
    /**
     * Display List of user's news article
     * @access public
     */
	public function listall(){
		if (!$this->authl->loggedIn()){
			redirect('/auth/login', 'refresh');
		}
		
		$this->load->model('Article_model');
		$data['articles'] = $this->Article_model->getUsersArticle($this->authl->id());
		$this->load->view('article/listall',$data);
	}
	
    /**
     * Unpublish an article
     * @access public
     * @param int articleid
     */
	public function unpublish($id){
		if (!$this->authl->loggedIn()){
			redirect('/auth/login', 'refresh');
		}
		
		$this->load->model('Article_model');
		$this->Article_model->unpublish($id);
		redirect('/article/listall');
	}
	
    /**
     * Publish an article
     * @access public
     * @param int articleid
     */
	public function publish($id){
		if (!$this->authl->loggedIn()){
			redirect('/auth/login', 'refresh');
		}
		
		$this->load->model('Article_model');
		$this->Article_model->publish($id);
		redirect('/article/listall');
	}
	
    /**
     * Delete an article
     * @access public
     * @param int articleid
     */
	public function delete($id){
		if (!$this->authl->loggedIn()){
			redirect('/auth/login', 'refresh');
		}
		
		$this->load->model('Article_model');
		$this->Article_model->delete($id);
		redirect('/article/listall');
	}
	
    /**
     * Write new article
     * @access public
     */
	public function newarticle(){
		if (!$this->authl->loggedIn()){
			redirect('/auth/login', 'refresh');
		}else{
			
			$data = array();
			if($this->input->get('passwordchanged')){
				$data['pwchanged'] = 1;
			}
			
			$this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
			$this->load->model('Auth_model');
			
			$this->form_validation->set_rules('title', 'Tile', 'required|min_length[3]');
			$this->form_validation->set_rules('article', 'Article', 'required|min_length[3]');
			
            if (!$this->form_validation->run()){
            	$this->load->view('article/newarticle');
            }else if(empty($_FILES['userfile']['name'])){
				
				$data['error'] = 'Please select an image to update';
				$this->load->view('article/newarticle',$data);
				
			}else{
				
				
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024*5;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
				$filename = time().$_FILES["userfile"]['name'];
				$config['file_name'] = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('userfile')){
                   
					$data['error'] = $this->upload->display_errors();
					$this->load->view('article/newarticle',$data);
					
                }else{
					
                    $upload_data = $this->upload->data();
					
					
					$this->load->model('Article_model');
					$title = $this->input->post('title');
					$newstext = $this->input->post('article');
					$publish = $this->input->post('publish') ? 1 : 0;
					$image = $filename;
					$this->Article_model->insertNewArticle($title,$newstext,$image,$publish);
					redirect('/article/listall');
					
                }
				
				
				
            }
			
			
		}
	}
	
}
