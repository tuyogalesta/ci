<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Home extends CI_Controller {
		
		
		function __construct(){
			parent::__construct();		
			$this->load->helper('Render');
			$this->load->model('Absensi_model');
			$this->load->model('Personil_model');	
			$this->load->model('User_model');
            $this->load->model('Klien_model');
            if(empty($_SESSION['id'])){
				$this->session->set_flashdata('status', 'error');
				$this->session->set_flashdata('text', 'Anda harus login');
				redirect(base_url().'admin/login');
			}
		}

		private function template(){
			return [
				'title' => 'Home',
				'icon' => 'fa fa-file',
				'menu' => 'home',
				'controller' => 'admin/home',
				'sub_menu' => '-'
			];
        }
        	
		public function index(){
			$data = array(
				'template' => (object) $this->template(),
				// 'list' => $this->Absensi_model->getDataLaporan()->result()
			);
			// print_r($this->Absensi_model->getData()->result());
			$this->load->view('home/index',$data);
		}
	}
 ?>