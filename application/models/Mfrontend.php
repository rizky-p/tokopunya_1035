<?php 

class Mfrontend extends CI_Model{
	public function get_all_kategori(){
		return $this->db->get('tbl_kategori');
	}

	public function get_all_kota(){
		return $this->db->get('tbl_kota');
	}

	public function insert_reg($tabel, $data){
		$this->db->insert($tabel, $data);
	}
} 