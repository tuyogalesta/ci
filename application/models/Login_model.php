<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function process_login($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		return $this->db->get('user');		
		// select * from tb_user WHERE email = '$email' AND password = '$password';
	}

	public function test(){
		return "test";
	}
}
?>