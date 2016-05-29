<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authl{
	
	public function __get($var){
		return get_instance()->$var;
	}
	
	function loggedIn(){
		return (boolean)$this->session->loggedin;
	}
	
	function id(){
		return (int)$this->session->id;
	}
	
	function login($user){
		$user['loggedin'] = true;
		$this->session->set_userdata($user);
	}
	
	function fname(){
		return (string)$this->session->first_name;
	}
	
}
