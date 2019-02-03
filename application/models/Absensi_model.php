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
}

	

?>