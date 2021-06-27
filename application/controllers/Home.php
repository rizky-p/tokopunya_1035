<?php
class Home extends CI_Controller {
	function __construct(){
	  parent::__construct();
	  $this->load->model('Mfrontend');
	}

	public function index(){
		$data['kategori']=$this->Mfrontend->get_all_kategori()->result();
		$this->template->load('layout_frontend','frontend/home', $data);
	}

	public function register(){
		$data['kota']=$this->Mfrontend->get_all_kota()->result();
		$data['kategori']=$this->Mfrontend->get_all_kategori()->result();
		$this->template->load('layout_frontend','frontend/form_register', $data);
	}

	public function act_reg(){
		$namaKonsumen = $this->input->post('namaKonsumen');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$tlpn = $this->input->post('tlpn');

		$dataInsert = array(
							'namaKonsumen' => $namaKonsumen,
							'email' => $email,
							'username' => $username,
							'password' => $password,
							'alamat' => $alamat,
							'idKota' => $kota,
							'tlpn' => $tlpn,
							'statusAktif' => 'Y'
							);
		$this->Mfrontend->insert_reg('tbl_member', $dataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">
		                              Registrasi akun telah berhasil</div>');
		redirect('home'); 
	}
}