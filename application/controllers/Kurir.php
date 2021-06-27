<?php
class Kurir extends CI_Controller{	
	function __construct(){
		parent::__construct();
        $this->load->model('Mcrud');
  	}

  	public function index(){
    $data['kurir']=$this->Mcrud->get_all_data('tbl_kurir')->result();
    $this->template->load('layout_admin','admin/kurir/kurir',$data);
	}

	public function add(){
	  $this->template->load('layout_admin','admin/kurir/kurir_add');
	}

	public function save(){
	  $namaKurir = $this->input->post('namaKurir');
	  $dataInsert = array('namakurir' => $namaKurir);
	  $this->Mcrud->insert('tbl_kurir', $dataInsert);
	  $this->session->set_flashdata('pesan', '<div class="alert alert-success">
	                                Data Kurir Berhasil Ditambahkan</div>');
	  redirect('kurir'); 
	}

	public function getid($id){
	  $dataWhere = array('idKurir' => $id);
	  $data['kurir'] = $this->Mcrud->get_by_id('tbl_kurir', $dataWhere)->row_object();
	  $this->template->load('layout_admin','admin/kurir/kurir_edit', $data);
	}

	public function edit(){
	  $id =$this->input->post('idKurir');
	  $namaKurir = $this->input->post('namaKurir');
	  $dataUpdate = array('namaKurir' => $namaKurir);
	  $this->session->set_flashdata('pesan', '<div class="alert alert-warning">
	                                Data Kurir Berhasil Diedit</div>');
	  $this->Mcrud->update('tbl_kurir',$dataUpdate, 'idKurir', $id);
	  redirect('kurir');
	}

	public function delete($idKurir){
	  $data = array('idKurir' => $idKurir);
	  $this->Mcrud->delete_data($data, 'tbl_kurir');
	  $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
	                                Data Kurir Berhasil Dihapus</div>');
	  redirect('kurir');
	}
}