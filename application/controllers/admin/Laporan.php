<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
	class Laporan extends CI_Controller {
		
		
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
				'title' => 'Laporan',
				'icon' => 'fa fa-file',
				'menu' => 'Laporan',
				'controller' => 'admin/Laporan',
				'sub_menu' => '-'
			];
        }
        	
		public function index(){
			$data = array(
				'template' => (object) $this->template(),
				'list' => $this->Klien_model->getData()->result()
			);
			// print_r($this->Absensi_model->getData()->result());
			$this->load->view('Laporan/index',$data);
        }
        
        public function show($id){
            $tahun = !empty($_GET['tahun']) ? $_GET['tahun'] : date('Y');
            $data = array(
				'template' => (object) $this->template(),
                'list' => $this->Absensi_model->getDataLaporan($id,$tahun),
                'tidak_hadir' => $this->Absensi_model->getDataLaporan($id,$tahun,true),
                'tahun' => $tahun,
                'klien' => $this->Klien_model->getData($id)->row(),
                'anggotaMalas' => $this->Absensi_model->getAnggotaMalas($id,$tahun)->result_array()
            );
			// print_r($this->Absensi_model->getData()->result());
			$this->load->view('Laporan/show',$data);
        }
	}
 ?>