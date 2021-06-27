<?php

class Ongkir extends CI_Controller{	
	function __construct(){
		parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Madmin');
  	}

  	public function index(){
  		$data['ongkir']=$this->Madmin->get_ongkir()->result();
  		$this->template->load('layout_admin','admin/kurir/ongkir',$data);
	}

	public function add(){
		$data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
		$data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
		$this->template->load('layout_admin','admin/kurir/ongkir_add', $data);
	}

	public function save(){
	  $kurir = $this->input->post('kurir');
	  $asal = $this->input->post('asal');
	  $tujuan = $this->input->post('tujuan');
	  $biaya = $this->input->post('biaya');
	  $dataInsert = array('idKurir' => $kurir,
	  					  'idKotaAsal' => $asal,
	  					  'idKotaTujuan' => $tujuan,
	  					  'biaya' => $biaya
						  );
	  $this->Mcrud->insert('tbl_biaya_kirim', $dataInsert);
	  $this->session->set_flashdata('pesan', '<div class="alert alert-success">
	                                Data Ongkos Kirim Berhasil Ditambahkan</div>');
	  redirect('ongkir'); 
	} 

	public function getid($id){
	  $dataWhere = array('idBiayaKirim' => $id);
	  $data['ongkir'] = $this->Mcrud->get_by_id('tbl_biaya_kirim', $dataWhere)->row_object();
	  $data['kota'] = $this->Mcrud->get_all_data('tbl_kota')->result();
	  $data['kurir'] = $this->Mcrud->get_all_data('tbl_kurir')->result();
	  $this->template->load('layout_admin','admin/kurir/ongkir_edit', $data);
	} 

	public function edit(){
        $id = $this->input->post('idBiayaKirim');
        $kurir = $this->input->post('kurir');
	  	$asal = $this->input->post('asal');
	  	$tujuan = $this->input->post('tujuan');
	  	$biaya = $this->input->post('biaya');
	  	$dataUpdate = array('idKurir' => $kurir,
	  					  'idKotaAsal' => $asal,
	  					  'idKotaTujuan' => $tujuan,
	  					  'biaya' => $biaya
						  );
        $this->Mcrud->update('tbl_biaya_kirim', $dataUpdate, 'idBiayaKirim', $id);
	    $this->session->set_flashdata('pesan', '<div class="alert alert-warning">
	                                Data Ongkos Kirim Berhasil Diedit</div>');
	  	redirect('ongkir');
	}

	public function delete($idBiayaKirim){
	  $data = array('idBiayaKirim' => $idBiayaKirim);
	  $this->Mcrud->delete_data($data, 'tbl_biaya_kirim');
	  $this->session->set_flashdata('pesan', '<div class="alert alert-danger">
	                                Data Ongkos Kirim Berhasil Dihapus</div>');
	  redirect('ongkir');
	}
}
