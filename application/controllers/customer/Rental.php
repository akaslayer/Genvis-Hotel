<?php

class Rental extends CI_Controller{

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
    elseif($this->session->userdata('role_id') != '2'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('customer/dashboard');
    }

  }

  public function tambah_rental($id){
    $data['detail'] = $this->rental_model->ambil_id_hotel($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/tambah_rental', $data);
    $this->load->view('templates_customer/footer');
  }

  public function tambah_rental_aksi(){
    $id_user              = $this->session->userdata('id_user');
    $id_hotel             = $this->input->post('id_hotel');
    $nama_lengkap_tamu    = $this->input->post('nama_lengkap_tamu');
    $no_telepon_tamu      = $this->input->post('no_telepon_tamu');
    $email_tamu           = $this->input->post('email_tamu');
    $jumlah_kamar         = $this->input->post('jumlah_kamar');
    $tanggal_checkin      = $this->input->post('tanggal_checkin');
    $tanggal_checkout     = $this->input->post('tanggal_checkout');
    $harga                = $this->input->post('harga');
    $interval = (strtotime($tanggal_checkout)-strtotime($tanggal_checkin));
    $years   = floor($interval / (365*60*60*24)); 
    $months  = floor(($interval - $years * 365*60*60*24) / (30*60*60*24)); 
    $days    = floor(($interval - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    if($tanggal_checkout<=$tanggal_checkin){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Tolong masukkan tanggal check-in dan check-out dengan benar!
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      $data['detail'] = $this->rental_model->ambil_id_hotel($id_hotel);
      $this->load->view('templates_customer/header');
      $this->load->view('customer/tambah_rental', $data);
      $this->load->view('templates_customer/footer');
    }
    else{

    $total = $harga*$jumlah_kamar*$days;

    $data = array(
      'id_user'               => $id_user,
      'id_hotel'              => $id_hotel,
      'nama_lengkap_tamu'     => $nama_lengkap_tamu,
      'no_telepon_tamu'       => $no_telepon_tamu,
      'email_tamu'            => $email_tamu,
      'jumlah_kamar'          => $jumlah_kamar,
      'tanggal_checkin'       => $tanggal_checkin,
      'tanggal_checkout'      => $tanggal_checkout,
      'harga_total'                 => $total,
    );

    $this->rental_model->insert_data($data, 'booking');
    
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Booking berhasil! Silakan cek transaksi Anda
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('customer/dashboard');
  }
  }


}