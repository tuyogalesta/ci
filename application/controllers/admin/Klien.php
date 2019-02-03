<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Klien extends CI_Controller {
		
		
		function __construct(){
			parent::__construct();		
			$this->load->helper('Render');
			$this->load->model('Klien_model');	
			$this->load->model('User_model');
		}

		private function template(){
			return [
				'title' => 'Klien',
				'icon' => 'fa fa-file',
				'menu' => 'Klien',
				'controller' => 'admin/Klien',
				'sub_menu' => '-'
			];
		}

		public function form(){
			$status = [
				['name' => 'aktiv' , 'value' => '1'],
				['name' => 'tidak aktiv' , 'value' => '0'],
			];
			return [
				['label' => 'Nama Klien','name' => 'nama_klien'],
				['label' => 'Alamat Klien','name' => 'alamat', 'type' => 'textarea'],
	            ['label' => 'Status','name' => 'status', 'type' => 'select', 'option' => $status],
			];
		}
	 	
		public function index(){
			$data = array(
				'template' => (object) $this->template(),
				'list' => $this->Klien_model->getData()->result()
			);
			// print_r($this->Klien_model->getData());
			$this->load->view('Klien/index',$data);
		}

		public function add(){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form()
			);			
			$this->load->view('klien/add',$data);
		}

		public function save(){
			$data = $this->input->post();			
			$this->Klien_model->insert($data);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function edit($id){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form(),
				'data' => $this->Klien_model->getData($id)->row()
			);			
			// print_r($this->Klien_model->getData($id)->row());
			$this->load->view('klien/edit',$data);
		}

		public function update($id){
			$data = $this->input->post();			
			$this->Klien_model->update($data,$id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function delete($id){
			$this->Klien_model->delete($id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

	}
 ?>