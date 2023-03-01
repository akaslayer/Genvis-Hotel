<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
<div style="height: 150px;"></div>
<div class="container">
<h2>RECEIPT</h2>
<br>
  <div class="card mx-auto">
    <div class="card-header">
      Detail Customer
    </div>
    <div class="card-body">
      <table class="table">
        <?php
        foreach($detail as $dt): ?>
        <tr>
          <th>Nama</th>
          <td>: <?= $dt->nama_lengkap_tamu?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td>: <?= $dt->email_tamu?></td>
        </tr>
        <tr>
          <th>Nomor telepon</th>
          <td>: <?= $dt->no_telepon_tamu?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div> 
  <br>
  <div class="card mx-auto">
    <div class="card-header">
      Detail Booking
    </div>
    <div class="card-body">
    <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Nama Hotel</th>
          <th>Alamat</th>
          <th>Tanggal Check-In</th>
          <th>Tanggal Check-Out</th>
          <th>Jumlah Kamar</th>
          <th>Total Biaya</th>
        </tr>
        <?php
        $no = 1;
        foreach($detail as $dt): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $dt->nama ?></td>
          <td><?= $dt->alamat ?></td>
          <td><?= $dt->tanggal_checkin; ?></td>
          <td><?= $dt->tanggal_checkout; ?></td>
          <td><?= $dt->jumlah_kamar; ?></td>
          <td>Rp.<?= number_format($dt->harga_total, 0, ',', '.'); ?>,-</td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  <br>
  <a href="<?= base_url('customer/transaksi') ?>" class="btn btn-sm btn-secondary">Kembali</a>
</div>
</body>
<div style="height: 180px;"></div>