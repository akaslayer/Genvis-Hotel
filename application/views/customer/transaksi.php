<body
  style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
<div style="height: 150px;"></div>
<div class="container">
  <div class="card mx-auto">
    <div class="card-header">
      Data Transaksi Anda
    </div>
    <span class="mt-2 p-2"><?= $this->session->flashdata('pesan'); ?></span>
    <div class="card-body">
      <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Nama Tamu</th>
          <th>Nama Hotel</th>
          <th>Tanggal Check-In</th>
          <th>Tanggal Check-Out</th>
          <th>Total Biaya</th>
          <th>Invoice</th>
        </tr>
        <?php
        $no = 1;
        foreach($transaksi as $tr): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $tr->nama_lengkap_tamu; ?></td>
          <td><?= $tr->nama; ?></td>
          <td><?= $tr->tanggal_checkin; ?></td>
          <td><?= $tr->tanggal_checkout; ?></td>
          <td>Rp.<?= number_format($tr->harga_total, 0, ',', '.'); ?>,-</td>
          <td><a href="<?= base_url('customer/transaksi/detail_booking/'). $tr->id_booking; ?>" class="btn btn-sm btn-success">Lihat Invoice</td>
        </tr>

        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>        
</body>
<div style="height: 180px;"></div>