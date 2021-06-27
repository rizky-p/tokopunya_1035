<?php
class Produk extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('Mcrud');
  }

  public function index(){
    $data['produk']=$this->Mcrud->get_all_data('tbl_produk')->result();
    $this->template->load('layout_admin','admin/produk/index',$data);
  }

  public function add(){
    $this->template->load('layout_admin','admin/produk/form_add');
  }

  public function save(){
    $namaKategori = $this->input->post('namaKategori');
    $dataInsert = array('namakat' => $namaKategori);
    $this->Mcrud->insert('tbl_kategori', $dataInsert);
    redirect('kategori'); 
  }

  public function getid($id){
    $dataWhere = array('idProduk' => $id);
    $data['produk'] = $this->Mcrud->get_by_id('tbl_produk', $dataWhere)->row_object();
    $this->template->load('layout_admin','admin/produk/form_edit', $data);
  }

  public function edit(){
    $id =$this->input->post('id');
    $namaKategori = $this->input->post('namaKategori');
    $dataUpdate = array('namakat' => $namaKategori);
    $this->Mcrud->update('tbl_produk',$dataUpdate, 'idkat', $id);
    redirect('produk');
  }
}