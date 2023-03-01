<?php

class Profile_user extends CI_Controller{

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

  public function index(){
    $user = $this->session->userdata('id_user');
    $data['user'] = $this->db->query("SELECT * FROM user us WHERE  us.id_user='$user' ORDER BY id_user DESC")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('customer/profile_user', $data);
    // $this->load->view('templates_customer/header');
  }

  public function update_user($id){
    $user = $this->session->userdata('id_user');
    $data['user'] = $this->db->query("SELECT * FROM user us WHERE  us.id_user='$user' ORDER BY id_user DESC")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('customer/profile_user', $data);
  }

  public function update_user_aksi(){
    $this->_rules();
    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id_user');
      $this->update_user($id);
    }
    else{
      $id               = $this->input->post('id_user');
      $nama             = $this->input->post('nama');
      $email            = $this->input->post('email');
      $tanggal_lahir    = $this->input->post('tanggal_lahir');
      $no_telepon       = $this->input->post('no_telepon');
      $password         = md5($this->input->post('password'));
      $foto             = $_FILES['foto']['name'];

      if($foto){
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto')){
          $foto = $this->upload->data('file_name');
          $this->db->set('foto', $foto);
        }
        else{
          echo $this->upload->display_error();
        }
      }
      $data = array(
        'nama'              => $nama,
        'tanggal_lahir'     => $tanggal_lahir,
        'no_telepon'        => $no_telepon,  
      );
      $where = array('id_user' => $id);
      $this->rental_model->update_data('user', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data user berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('customer/dashboard');
    }
  }

  public function _rules(){
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('no_telepon', 'No. telepon', 'required|numeric');
  }

}