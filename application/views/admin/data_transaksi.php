<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Transaksi</h1>
    </div>

    <table class="table table-responsive table-bordered table-striped">
      <tr>
        <th>No</th>
        <th>Nama user</th>
        <th>No. Telpon User</th>
        <th>Email User</th>
        <th>Jumlah Kamar</th>
        <th>Nama Hotel</th>
        <th>Tanggal Checkin</th>
        <th>Tanggal Checkout</th>
        <th>Harga Total</th>
      </tr>

      <?php 
      $no = 1;
      foreach($booking as $tr): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $tr->nama_lengkap_tamu; ?></td>
        <td><?= $tr->no_telepon_tamu; ?></td>
        <td><?= $tr->email_tamu; ?></td>
        <td><?= $tr->jumlah_kamar; ?></td>
        <td><?= $tr->nama; ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tanggal_checkin)); ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tanggal_checkout)); ?></td>
        <td>Rp. <?= number_format($tr->harga_total, 0,',','.'); ?>,-</td>
      </tr>
      <?php endforeach; ?>
    </table>
  </section>
</div>