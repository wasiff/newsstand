<?php
class Article_model extends CI_Model {

	private $tbl = 'articles';

	public function __construct(){
		parent::__construct();
	}
	
	function getLatest10(){
		$this->db->select('users.first_name,users.last_name,users.email,articles.id,articles.title,articles.image,articles.newstext,articles.datetime,articles.reporterid,articles.publish');
		$this->db->order_by('datetime', 'DESC');
		$this->db->limit(10);
		$this->db->join('users', 'users.id = '.$this->tbl.'.reporterid');
		$this->db->where($this->tbl.'.publish', 1);
		return $this->db->get($this->tbl)->result_array();
	}
	
	function getArticleById($id){
		$this->db->select('users.first_name,users.last_name,users.email,articles.id,articles.title,articles.image,articles.newstext,articles.datetime,articles.reporterid,articles.publish');
		$this->db->join('users', 'users.id = '.$this->tbl.'.reporterid');
		$this->db->where($this->tbl.'.id', $id);
		
		return $this->db->get($this->tbl)->row_array();
	}
	
	function getUsersArticle($userid){
		$this->db->where('reporterid',$userid);
		return $this->db->get($this->tbl)->result_array();
	}
	
	function unpublish($id){
		$this->db->update($this->tbl, array('publish' => 0), "id = ".$id);
	}
	
	function publish($id){
		$this->db->update($this->tbl, array('publish' => 1), "id = ".$id);
	}
	
	function delete($id){
		
		
		//remove image also
		$article = $this->getArticleById($id);
		unlink('./uploads/'.$article['image']);
		
		$this->db->where('id', $id);
		$this->db->delete($this->tbl);
	}
	
	function insertNewArticle($title,$newstext,$image,$publish){
		$data = array(
			'title'			=>	$title,
			'image'			=>	$image,
			'newstext'		=>	$newstext,
			'datetime'		=>	date('Y-m-d H:i:s'),
			'reporterid'	=>	$this->authl->id(),
			'publish'		=>	$publish
		);
		
		$this->db->insert($this->tbl,$data);
	}
}
?>