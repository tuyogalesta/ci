<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	private $table = 'absensi';
	private $primary_key = 'absensi.id';

	

	public function insert($data){
		$this->db->insert($this->table,$data); // insert data ke database
		return $this->db->insert_id(); // untuk mengambakilan nilai id yg di input
	}
	public function deleteDetail($id){
		$this->db->where('absensi_id',$id);
		$this->db->delete('absensi_detail');
	}
	public function insertDetail($data){		
		$this->db->insert('absensi_detail',$data); // insert data ke database
		return $this->db->insert_id(); // untuk mengambakilan nilai id yg di input
	}

	public function update($data,$id){
		$this->db->where($this->primary_key,$id);
		$this->db->update($this->table,$data);
	}

	public function delete($id){
		$this->db->where($this->primary_key,$id);
		$this->db->delete($this->table);
	}

	public function getData($id = false){
		if($id != false){

			$this->db->where($this->primary_key,$id);
		}
		$this->db->select('*,absensi.id as p_id');
		// $this->db->join('klien','klien.id = personil.klien_id');
		return $this->db->get($this->table);
	}

	public function filter($klien_id,$bulan,$tahun,$status){
		$this->db->where('klien.id',$klien_id);
		$this->db->where('MONTH(absensi.tgl_absensi)',$bulan);
		$this->db->where('YEAR(absensi.tgl_absensi)',$tahun);
		$this->db->where('absensi_detail.status',$status);
		$this->db->join('klien','klien.id = personil.klien_id');
		$this->db->join('absensi_detail','personil.id = absensi_detail.personil_id');
		$this->db->join('absensi','absensi.id = absensi_detail.absensi_id');
		return $this->db->get('personil')->num_rows();
	}

	public function filter_tidak_hadir($klien_id,$bulan,$tahun){
		$this->db->where('klien.id',$klien_id);
		$this->db->where('MONTH(absensi.tgl_absensi)',$bulan);
		$this->db->where('YEAR(absensi.tgl_absensi)',$tahun);
		$this->db->where('absensi_detail.status !=','Hadir');
		$this->db->where('absensi_detail.status !=','Off');
		$this->db->join('klien','klien.id = personil.klien_id');
		$this->db->join('absensi_detail','personil.id = absensi_detail.personil_id');
		$this->db->join('absensi','absensi.id = absensi_detail.absensi_id');
		return $this->db->get('personil')->num_rows();
	}

	public function getDataLaporan($klien_id,$tahun,$grafik = false){	
		$bulan = ['Januari','Februari','Maret','April','Mei',"Juni","Juli","Agustus","September","Oktober","Nopember","Desember"];
		$data = [];
		$tidak_hadir = [];
		foreach($bulan as $key => $value){
			$array['bulan'] = $value;
			$array['sakit'] = $this->filter($klien_id,$key,$tahun,"Sakit");
			$array['hadir'] = $this->filter($klien_id,$key,$tahun,"Hadir");
			$array['tanpa_keterangan'] = $this->filter($klien_id,$key,$tahun,"Tanpa Keterangan");
			$array['off'] = $this->filter($klien_id,$key,$tahun,"Off");		
			$array['izin'] = $this->filter($klien_id,$key,$tahun,"Izin");

			array_push($tidak_hadir,$this->filter_tidak_hadir($klien_id,$key,$tahun));

			$data[] = $array;
		}	
		if(!$grafik){
			return $data;
		}else{
			return json_encode($tidak_hadir);
		}
			
	}

	public function getAnggotaMalas($klien_id,$tahun){
		$this->db->select("personil.id,personil.nama_personil,count(personil.id) as tidak_hadir");
		$this->db->where('YEAR(absensi.tgl_absensi)',$tahun);
		$this->db->where('absensi_detail.status !=','Hadir');
		$this->db->where('absensi_detail.status !=','Off');
		$this->db->where('klien.id',$klien_id);
		$this->db->join('klien','klien.id = personil.klien_id');
		$this->db->join('absensi_detail','personil.id = absensi_detail.personil_id');
		$this->db->join('absensi','absensi.id = absensi_detail.absensi_id');
		$this->db->group_by('personil.id');		
		return $this->db->get('personil');
	}
}

	

?>