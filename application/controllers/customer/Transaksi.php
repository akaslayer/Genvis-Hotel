<?php

class Transaksi extends CI_Controller{

  public function __construct(){
    parent::__construct();
    


  }

  public function index(){
    $user = $this->session->userdata('id_user');
    // var_dump($customer);
    // die;
    $data['transaksi'] = $this->db->query("SELECT bk.id_booking, bk.nama_lengkap_tamu, bk.tanggal_checkin, bk.tanggal_checkout, bk.harga_total, ht.nama FROM booking bk, hotel ht, user us WHERE bk.id_hotel=ht.id_hotel AND bk.id_user=us.id_user AND us.id_user='$user' ORDER BY id_booking DESC")->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/transaksi', $data);
    $this->load->view('templates_customer/footer');
  }

  public function detail_booking($id_booking){
    $data['detail'] = $this->db->query("SELECT bk.nama_lengkap_tamu, bk.no_telepon_tamu, bk.email_tamu, bk.jumlah_kamar, bk.tanggal_checkin, bk.tanggal_checkout, bk.harga_total, ht.nama, ht.alamat FROM booking bk, hotel ht WHERE bk.id_hotel=ht.id_hotel AND bk.id_booking='$id_booking' ORDER BY id_booking DESC")->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/detail_booking', $data);
    $this->load->view('templates_customer/footer');
  }
}