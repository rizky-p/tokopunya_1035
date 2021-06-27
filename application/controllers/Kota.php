<?php
class Kota extends CI_Controller{	
	function __construct(){
		parent::__construct();
        $this->load->model('Mcrud');
  	}

  	public function index(){
    $data['kota']=$this->Mcrud->get_all_data('tbl_kota')->result();
    $this->template->load('layout_admin','admin/kurir/kota',$data);
	}

	public function add(){
	  $this->template->load('layout_admin','admin/kurir/kota_add');
	}

	public function save(){
	  $namaKota = $this->input->post('namaKota');
	  $dataInsert = array('namakota' => $namaKota);
	  $this->Mcrud->insert('tbl_kota', $dataInsert);
	  $this->session->set_flashdata('pesan', '<div class="alert alert-success">
	                                Data Kota Berhasil Ditambahkan</div>');
	  redirect('kota'); 
	}
 
	public function getid($id){
	  $dataWhere = array('idKota' => $id);
	  $data['kota'] = $this->Mcrud->get_by_id('tbl_kota', $dataWhere)->row_object();
	  $this->template->load('layout_admin','admin/kurir/kota_edit', $data);
	}

	public function edit(){
	  $id =$this->input->post('idKota');
	  $namaKota = $this->input->post('namaKota');
	  $dataUpdate = array('namaKota' => $namaKota);
	  $this->Mcrud->update('tbl_kota',$dataUpdate, 'idKota', $id);
	  $this->session->set_flashdata('pesan', '<div class="alert alert-warning">
	                                Data Kota Berhasil Diedit</div>');
	  redirect('kota');
	}

	public function delete($idKota){
    $data = array('idKota' => $idKota);
    $this->Mcrud->delete_data($data, 'tbl_kota');
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
                                  Data Kota Berhasil Dihapus</div>');
    redirect('kota');
  }
}