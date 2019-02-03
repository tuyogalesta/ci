<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		// load model
		$this->load->model('Login_model');
		$this->load->library('session');		
	}

	public function index()
	{
		//memunculkan form login
		$this->load->view('login/login');
	}

	public function process_login(){		
		$email = $_POST['email'];
		$password = $_POST['password'];	
		$password = md5($password);

		// check data email dan password ke login models
		$check = $this->Login_model->process_login($email,$password);

		$num = $check->num_rows();

		if($num > 0){ //user terdaftar			
			$result = $check->row();
			// jika status user aktif
			if($result->status == 1){
				$user = array(
							'id' => $result->id,
							'nama_user' => $result->nama_user,
							'role' => $result->role,
							'klien_id' => $result->klien_id
						);
				$this->session->set_userdata($user);
				redirect(base_url()."admin/user");				
			}else{
				// kirim pesan error
				$this->session->set_flashdata('status', 'error');
				$this->session->set_flashdata('text', 'User tidak aktif');

				// pindah halaman
				redirect(base_url()."admin/login");
			}

		}else{ //jika tidak ditemukan user
			
			// kirim pesan error
			$this->session->set_flashdata('status', 'error');
			$this->session->set_flashdata('text', 'Email atau password salah');

			// pindah halaman
			redirect(base_url()."admin/login");
		}

	}

	public function logout(){
		session_destroy();
		redirect(base_url()."admin/login");
	}
}
