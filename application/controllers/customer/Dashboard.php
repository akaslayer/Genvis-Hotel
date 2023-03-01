<?php

class Dashboard extends CI_Controller{

  public function index(){
    $data['hotel'] = $this->rental_model->get_data('hotel')->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/dashboard', $data);
    $this->load->view('templates_customer/footer');
  }

  public function detail_hotel($id){
    $data['detail'] = $this->rental_model->ambil_id_hotel($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/detail_hotel', $data);
    $this->load->view('templates_customer/footer');
  }
}