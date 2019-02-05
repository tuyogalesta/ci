<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Absensi extends CI_Controller {
		
		
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
				'title' => 'Absensi',
				'icon' => 'fa fa-file',
				'menu' => 'absensi',
				'controller' => 'admin/absensi',
				'sub_menu' => '-'
			];
		}

		public function form(){
			
			
        	$user_role = $_SESSION['role'];
        	$klien_id = null;
        	if($user_role == 'ss'){
        		$klien_id = $_SESSION['klien_id'];
        	}
        	$klien = $this->Klien_model->getDataOption($klien_id)->result_array();
        	// echo print_r($jabatan);
        	// exit();
			return [
				['label' => 'Tanggal','name' => 'tgl_absensi','type' => 'text','attr' => 'readonly'],
				['label' => 'klien_id','name' => 'klien_id','type' => 'hidden','value' => $_SESSION['klien_id']],
				['label' => 'user_id','name' => 'user_id','type' => 'hidden','value' => $_SESSION['id']],
				
	            
			];
		}
	 	
		public function index(){
			$data = array(
				'template' => (object) $this->template(),
				'list' => $this->Absensi_model->getData()->result()
			);
			// print_r($this->Absensi_model->getData()->result());
			$this->load->view('absensi/index',$data);
		}

		public function add(){
			$user_role = $_SESSION['role'];
        	$klien_id = null;
        	if($user_role == 'ss'){
        		$klien_id = $_SESSION['klien_id'];
        	}
			$data = array(
				'template' => (object) $this->template(),
				'personil' => $this->Personil_model->getDataPersonil($klien_id)->result(),
				'form' => $this->form()
			);
			$this->load->view('absensi/add',$data);
		}

		public function save(){
			$data['tgl_absensi'] = $this->input->post('tgl_absensi');
			$data['klien_id'] = $this->input->post('klien_id');	
			$data['user_id'] = $this->input->post('user_id');		
			$absensi = $this->Absensi_model->insert($data);
			$detail = $this->input->post('detail');
			foreach ($detail as $key => $value) {
				$arr['absensi_id'] = $absensi;
				$arr['personil_id'] = $key;
				$arr['status'] = $value;				
				$this->Absensi_model->insertDetail($arr);
			}
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function edit($id){
			$user_role = $_SESSION['role'];
        	$klien_id = null;
        	if($user_role == 'ss'){
        		$klien_id = $_SESSION['klien_id'];
        	}
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form(),
				'personil' => $this->Personil_model->getDataPersonil($klien_id,$id)->result(),
				'data' => $this->Absensi_model->getData($id)->row()
			);			
			// print_r($this->Absensi_model->getData($id)->row());
			$this->load->view('absensi/edit',$data);
		}

		public function update($id){
			$data['tgl_absensi'] = $this->input->post('tgl_absensi');
			$data['klien_id'] = $this->input->post('klien_id');	
			$data['user_id'] = $this->input->post('user_id');			
			$this->Absensi_model->update($data,$id);

			$this->Absensi_model->deleteDetail($id);
			$detail = $this->input->post('detail');
			foreach ($detail as $key => $value) {
				$arr['absensi_id'] = $id;
				$arr['personil_id'] = $key;
				$arr['status'] = $value;
				$this->Absensi_model->insertDetail($arr,$id);
			}

			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function delete($id){
			$this->Absensi_model->delete($id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function show($id){
			$user_role = $_SESSION['role'];
        	$klien_id = null;
        	if($user_role == 'ss'){
        		$klien_id = $_SESSION['klien_id'];
        	}
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form(),
				'personil' => $this->Personil_model->getDataPersonil($klien_id,$id)->result(),
				'data' => $this->Absensi_model->getData($id)->row()
			);			
			// print_r($this->Absensi_model->getData($id)->row());
			$this->load->view('absensi/show',$data);
		}

	}
 ?>