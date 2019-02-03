<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class User extends CI_Controller {
		
		
		function __construct(){
			parent::__construct();		
			$this->load->helper('Render');
			$this->load->model('User_model');	
			$this->load->model('Klien_model');
		}

		private function template(){
			return [
				'title' => 'Manajemen User',
				'icon' => 'fa fa-user',
				'menu' => 'user',
				'controller' => 'admin/user',
				'sub_menu' => '-'
			];
		}

		public function form(){
			$jenis_kelamin = [
	            ['value' => 'Laki-laki','name' => 'Laki-Laki'],
	            ['value' => 'Perempuan','name' => 'Perempuan']
	        ]; 
	        
	        $status = [
	            ['value' => 1,'name' => 'Aktif'],
	            ['value' => 0,'name' => 'Tidak Aktif']
        	];

        	$role = [
	            ['value' => 'Admin','name' => 'Admin'],
	            ['value' => 'Eksekutif','name' => 'Eksekutif'],
	            ['value' => 'ss','name' => 'ss']
        	];
        	$klien1 = [['value' => '','name' => 'HO']];
        	$klien2 = $this->Klien_model->getDataOption()->result_array();
        	$klien = array_merge($klien1,$klien2);

			return [
				['label' => 'Nama User','name' => 'nama_user'],
				['label' => 'Alamat User','name' => 'alamat_user', 'type' => 'textarea'],
	            ['label' => 'Telepon','name' => 'telepon'],
	            ['label' => 'Jenis Kelamin','name' => 'jenis_kelamin','type' => 'select','option' => $jenis_kelamin],
	            ['label' => 'Role','name' => 'role','type' => 'select','option' => $role],
	             ['label' => 'Penempatan','name' => 'klien_id','type' => 'select','option' => $klien,'required' => false],
	            ['label' => 'Status','name' => 'status','type' => 'select','option' => $status],
	            ['label' => 'Email','name' => 'email','type' => 'email'],
	            ['label' => 'Password','name' => 'password','type' => 'password'],
			];
		}
	 	
		public function index(){
			$data = array(
				'template' => (object) $this->template(),
				'list' => $this->User_model->getData()->result()
			);
			// print_r($this->User_model->getData());
			$this->load->view('user/index',$data);
		}

		public function add(){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form()
			);			
			$this->load->view('user/add',$data);
		}

		public function save(){
			$data = $this->input->post();
			$data['password'] = md5($this->input->post('password'));
			unset($data['password_confirmation']);
			// print_r($data);
			$this->User_model->insert($data);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function edit($id){
			$data = array(
				'template' => (object) $this->template(),
				'form' => $this->form(),
				'data' => $this->User_model->getData($id)->row()
			);			
			// print_r($this->User_model->getData($id)->row());
			$this->load->view('user/edit',$data);
		}

		public function update($id){
			$data = $this->input->post();
			$data['password'] = md5($this->input->post('password'));
			unset($data['password_confirmation']);
			// print_r($data);
			$this->User_model->update($data,$id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

		public function delete($id){
			$this->User_model->delete($id);
			$template = (object) $this->template();
			redirect(base_url().$template->controller);
		}

	}
 ?>