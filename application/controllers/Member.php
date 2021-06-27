<?php
class Member extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('Mcrud');
    $this->load->model('Mfrontend');
    $this->load->model('Mmember');
  }

  public function index(){
    $data['member']=$this->Mcrud->get_all_data('tbl_member')->result();
    $this->template->load('layout_admin','admin/member/member',$data);
  }

  public function add(){ 
    $this->template->load('layout_admin','admin/member/member_add');
  }

  public function save(){
    $namaKonsumen = $this->input->post('namaKonsumen');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $telepon = $this->input->post('telepon');
    $dataInsert = array(
                        'namaKonsumen' => $namaKonsumen,
                        'alamat' => $alamat,
                        'email' => $email,
                        'telepon' => $telepon
                      );
    $this->Mcrud->insert('tbl_member', $dataInsert);
    redirect('member'); 
  }

    public function aktif($id){
      $dataUpdate = array('statusAktif'=>'Y');
      $this->Mcrud->update('tbl_member', $dataUpdate, 'idKonsumen', $id);
      redirect('member');
    }

    public function non_aktif($id){
      $dataUpdate = array('statusAktif'=>'N');
      $this->Mcrud->update('tbl_member', $dataUpdate, 'idKonsumen', $id);
      redirect('member');
    }

    public function login(){
      $data['kota']=$this->Mfrontend->get_all_kota()->result();
      $data['kategori']=$this->Mfrontend->get_all_kategori()->result();
      $this->template->load('layout_frontend','frontend/form_login', $data);
    }

    public function act_login(){
      $u = $this->input->post('username');
      $p = $this->input->post('password');

      $cek = $this->Mmember->cek_login_user($u, $p)->num_rows();
      $result = $this->Mmember->cek_login_user($u, $p)->result();
      if ($cek==1) {
        $data_session = array(
                              'userName' => $u,
                              'id' => $result[0]->idKonsumen,
                              'status' => 'login' 
                              );

      $this->session->set_userdata($data_session);
      redirect('member/menu_member');
      } else {
          $this->session->set_flashdata('pesan','<div class="alert alert-danger">
                                          Username atau Password Anda Salah</div>');
          redirect('member/login');
      }
    }

      public function logout(){
        $this->session->sess_destroy();
        redirect('home');
      }

      public function user_member(){
        $data['kategori']=$this->Mfrontend->get_all_kategori('')->result();
        $this->template->load('layout_frontend', 'frontend/user_member',$data);
      }

      public function menu_member(){
        $data['kategori']=$this->Mfrontend->get_all_kategori('')->result();
        $this->template->load('layout_frontend', 'frontend/menu_member',$data);
      }

      public function member_toko(){
        $data['kategori']=$this->Mfrontend->get_all_kategori()->result();
        $data['toko']=$this->Mmember->get_toko_by_member()->result_array(); 
        $data['kota']=$this->Mfrontend->get_all_kota()->result(); 
        $this->template->load('layout_frontend','frontend/member_toko', $data);
      }

      public function form_toko_add(){
        $data['kategori']=$this->Mfrontend->get_all_kategori()->result();
        $this->template->load('layout_frontend','frontend/form_toko_add',$data);
      }

      public function insert_toko(){
        $idKonsumen = $this->session->userdata('idKonsumen');
        $namaToko = $this->input->post('namaToko');
        $deskripsi = $this->input->post('deskripsi');

        $config['upload_path'] = './upload_logo_toko/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->load->library('upload', $config);
        if($this->upload->do_upload('logo')){
          $data_file = $this->upload->data();
          $data_insert = array(
                              'idKonsumen' => $idKonsumen,
                              'namaToko' => $namaToko,
                              'logo' => $data_file['file_name'],
                              'deskripsi' => $deskripsi,
                              'StatusAktif' => 'Y'
                               );
          $this->Mmember->insert_toko($data_insert);
          redirect('member/member_toko');
        } else {
          redirect('member/form_toko_add');
        }
      }

      public function member_transaksi(){
        $data['kategori']=$this->Mfrontend->get_all_kategori('')->result();
        $this->template->load('layout_frontend','frontend/member_transaksi',$data);
      }
}