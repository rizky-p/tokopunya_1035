<?php 
class Toko extends CI_Controller{	
	function __construct(){
		parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Mfrontend');
        $this->load->model('Mtoko');
  	}

  	public function index(){
    $data['toko']=$this->Mcrud->get_all_data('tbl_toko')->result();
    $this->template->load('layout_admin','admin/toko/toko',$data);
	}

	public function add(){ 
	  $this->template->load('layout_admin','admin/toko/toko_add');
	}

	public function aktif($id){
	  $dataUpdate = array('StatusAktif'=>'Y');
	  $this->Mcrud->update('tbl_toko', $dataUpdate, 'idToko', $id);
	  redirect('toko');
	}

	public function non_aktif($id){
	  $dataUpdate = array('StatusAktif'=>'N');
	  $this->Mcrud->update('tbl_toko', $dataUpdate, 'idToko', $id);
	  redirect('toko');
	}

	public function user_toko_detail(){
	 $data['kategori']=$this->Mfrontend->get_all_kategori()->result();
	 $this->template->load('layout_frontend', 'frontend/user_toko_detail',$data);
	}

	public function main($idToko){
		$data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
		$data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
		$this->template->load('layout_frontend', 'frontend/user_toko_detail', $data);
	}

	public function dashboard_toko(){
        $data['kategori']=$this->Mfrontend->get_all_kategori('')->result();
        $this->template->load('layout_frontend', 'frontend/dashboard_toko',$data);
      }

    public function produk($idToko){
    	$data['kategori'] = $this->Mfrontend->get_all_kategori()->result();
    	$data['namaToko'] = $this->Mtoko->get_toko($idToko)->row_object();
    	$data['produk'] = $this->Mtoko->get_produk_by_toko($idToko)->result();
    	$this->template->load('layout_frontend', 'frontend/toko_produk', $data);
    }
}