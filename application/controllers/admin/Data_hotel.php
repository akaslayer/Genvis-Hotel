<?php

class Data_hotel extends CI_Controller{

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
    $data['hotel'] = $this->rental_model->get_data('hotel')->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_hotel', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_hotel(){
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_tambah_hotel');
    $this->load->view('templates_admin/footer');
  }

  public function tambah_hotel_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->tambah_hotel();
    }
    else{
      $nama    = $this->input->post('nama');
      $harga        = $this->input->post('harga');
      $qty      = $this->input->post('qty');
      $bintang        = $this->input->post('bintang');
      $alamat        = $this->input->post('alamat');
      $lokasi       = $this->input->post('lokasi');
      $description        = $this->input->post('description');
      $img_path    = $_FILES['img_path']['name'];

      if($img_path=''){}
      else{
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('img_path')){
          echo "gambar hotel gagal diupload";
        }
        else{
          $img_path = $this->upload->data('file_name');
        }
      }
      $data = array(
        'nama'         => $nama,
        'harga'        => $harga,
        'qty'          => $qty,
        'bintang'      => $bintang,
        'alamat'       => $alamat,
        'lokasi'       => $lokasi,
        'description'  => $description,
        'img_path'     => $img_path,
      );

      $this->rental_model->insert_data($data, 'hotel');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil ditambahkan
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_hotel');
    }
  }

  public function update_hotel($id_hotel){
    $where = array('id_hotel' => $id_hotel);
    $data['hotel'] = $this->db->query("SELECT * FROM hotel WHERE id_hotel = '$id_hotel'")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/form_update_hotel', $data);
    $this->load->view('templates_admin/footer');
  }

  public function update_hotel_aksi(){
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $id = $this->input->post('id_hotel');
      $this->update_hotel($id);
    }
    else{
      $id_hotel       = $this->input->post('id_hotel');
      $nama           = $this->input->post('nama');
      $harga          = $this->input->post('harga');
      $qty            = $this->input->post('qty');
      $bintang        = $this->input->post('bintang');
      $lokasi         = $this->input->post('lokasi');
      $alamat         = $this->input->post('alamat');
      $description    = $this->input->post('description');
      $img_path       = $_FILES['img_path']['name'];

      if($img_path){
        $config['upload_path'] = './assets/upload';
        $config['allowed_types'] = 'jpg|jpeg|png|tiff';

        $this->load->library('upload', $config);
        
        if($this->upload->do_upload('img_path')){
          $img_path = $this->upload->data('file_name');
          $this->db->set('img_path', $img_path);
        }
        else{
          echo $this->upload->display_error();
        }
      }
      $data = array(
        'nama'        => $nama,
        'harga'       => $harga,
        'qty'         => $qty,
        'bintang'     => $bintang,
        'lokasi'      => $lokasi,
        'alamat'      => $alamat,
        'description' => $description,
      );
      $where = array('id_hotel' => $id_hotel);

      $this->rental_model->update_data('hotel', $data, $where);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('admin/data_hotel');
    }
  }

  public function delete_hotel($id){
    $where = array('id_hotel' => $id);

    $this->rental_model->delete_data($where, 'hotel');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data berhasil dihapus
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/data_hotel');

  }

  public function _rules(){
    $this->form_validation->set_rules('nama', 'Nama Hotel', 'required');
    $this->form_validation->set_rules('harga', 'Harga', 'required');
    $this->form_validation->set_rules('qty', 'Qty', 'required');
    $this->form_validation->set_rules('bintang', 'Bintang', 'required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('description', 'Deskripsi', 'required');
  }


}