<body
  style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
<div class="container">
  <div style="height: 150px;"></div>
  <?= $this->session->flashdata('pesan'); ?>
  <div class="card">
    <card class="card-header">
      Form Booking Hotel
    </card> 
    <div class="card-body">
      <?php foreach($detail as $dt): ?>
      <form action="<?= base_url('customer/rental/tambah_rental_aksi') ?>" method="post">
        <div class="form-group">
          <label for="">Nama Lengkap</label>
          <input type="text" name="nama_lengkap_tamu" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Nomor Telepon</label>
          <input type="text" name="no_telepon_tamu" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email_tamu" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Harga Sewa/hari</label>
          <input type="hidden" name="id_hotel" value="<?= $dt->id_hotel; ?>">
          <input type="text" name="harga" class="form-control" value="<?= $dt->harga; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="">Jumlah Kamar</label>
          <input type="number" name="jumlah_kamar" value="1" min="1" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Tanggal Checkin</label>
          <input type="date" name="tanggal_checkin" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Tanggal Checkout</label>
          <input type="date" name="tanggal_checkout" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Rental</button>
      </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>
  </body>
<div style="height: 180px;"></div>