<?php

class Transaksi extends CI_Controller{

  public function __construct(){
    parent::__construct();
    
    if(empty($this->session->userdata('email'))){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda belum login!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('auth/login');
    }
    elseif($this->session->userdata('role_id') != '1'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('customer/dashboard');
    }
  }

  public function index(){
    $data['booking'] = $this->db->query("SELECT * FROM booking tr, hotel mb, user cs WHERE tr.id_hotel=mb.id_hotel AND tr.id_user=cs.id_user")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_transaksi', $data);
    $this->load->view('templates_admin/footer');
  }
}