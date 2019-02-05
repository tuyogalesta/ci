<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Personil extends CI_Controller {
		
		
		function __construct(){
			parent::__construct();		
			$this->load->helper('Render');
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
				'title' => 'Personil',
				'icon' => 'fa fa-file',
				'menu' => 'personil',
				'controller' => 'admin/personil',
				'sub_menu' => '-'
			];
		}

		public function form(){
			
			$jabatan = [
	            ['value' => 'Chief','name' => 'Chief'],
	            ['value' => 'Asst.Chief','name' => 'Asst.Chief'],
	            ['value' => 'Danru','name' => 'Danru'],
	            ['value' => 'Korlap','name' => 'Korlap'],
	            ['value' => 'Anggota','name' => 'Anggota'],
        	];

        	$user_role = $_SESSION['role'];
        	$klien_id = null;
        	if($user_role == 'ss'){
        		$klien_id = $_SESSION['klien_id'];
        	}
        	$klien = $this->Klien_model->getDataOption($klien_id)->result_array();
        	// echo print_r($jabatan);
        	// exit();
			return [
				['label' => 'Nama Personil','name' => 'nama_personil'],
				['label' => 'Alamat','name' => 'alamat_tinggal'],
				['label' => 'Tanggal lahir','name' => 'tgl_lahir','type' => 'datepicker'],
				['label' => 'Jabatan','name' => 'jabatan', 'type' => 'select','option' => $jabatan],
				['label' => 'Klien','name' => 'klien_id', 'type' => 'select','option' => $klien],
	            
			];
		}
	 	
		public function index(){
			$data = array(
				'template' => (object) $this->template(),
				'list' => $this->Personil_model->getData()->result()
			);
			// print_r($this->Personil_model->getData()->result());
			$this->load->view('personil/index',$data);
		}

		public function add(){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form()
			);			
			$this->load->view('personil/add',$data);
		}

		public function save(){
			$data = $this->input->post();			
			$this->Personil_model->insert($data);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function edit($id){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form(),
				'data' => $this->Personil_model->getData($id)->row()
			);			
			// print_r($this->Personil_model->getData($id)->row());
			$this->load->view('personil/edit',$data);
		}

		public function update($id){
			$data = $this->input->post();			
			$this->Personil_model->update($data,$id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function delete($id){
			$this->Personil_model->delete($id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

	}
 ?>