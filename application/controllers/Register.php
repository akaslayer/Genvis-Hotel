<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  public function index()
  {
      $this->load->view('templates_admin/header');
      $this->load->view('register_form');
  }
    
 public function tambah_user(){
    $data['user'] = $this->rental_model->get_data('user')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('register_form');
  }
    
  public function register_data(){
   $this->_rules();
    if($this->form_validation->run() == FALSE){
      $this->tambah_user();
    }
		else{
        $nama    = $this->input->post('nama');
        $email   = $this->input->post('email');
        $password1   = $this->input->post('password1');
        $password2     = $this->input->post('password2');
        $tanggal_lahir     = $this->input->post('tanggal_lahir');
        $no_telepon = $this->input->post('no_telepon');
        $foto    = $_FILES['foto']['name'];
        $role_id    = '2';
      
      if($foto=''){}
      else{
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')){
          echo "Foto user gagal diupload";
        }
        else{
          $foto = $this->upload->data('file_name');
        }
      }
      $data = array(
        'nama'          => $nama,
        'email'         => $email,
        'password'      => md5($password1),
        'tanggal_lahir' => $tanggal_lahir,
        'no_telepon'    => $no_telepon,   
        'role_id'       => $role_id,
        'foto'          => $foto,
      );	
      $this->rental_model->insert_data($data, 'user');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil register, Silahkan login!
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('auth/login');
		}
  }
	public function _rules(){
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password1', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Retype Password', 'required|matches[password1]');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|numeric');
    }

}