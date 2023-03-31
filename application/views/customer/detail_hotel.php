<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
<div class="container">
  <div style="height: 150px;"></div>

  <div class="card">
    <div class="card-body">
      <?php foreach($detail as $dt): ?>
      <div class="row">
        <div class="col-md-6">
          <img width="500px;" src="<?= base_url('assets/upload/').$dt->img_path; ?>" alt="">
        </div>
        <div class="col-md-6">
          <table class="table">
            <tr>
              <th>Nama</th>
              <td><?= $dt->nama; ?></td>
            </tr>
            <tr>
              <th>Harga</th>
              <td><?= 'Rp'. number_format($dt->harga,0,',','.'); ?></td>
            </tr>
            <tr>
              <th>Kamar Tersedia</th>
              <td><?= $dt->qty; ?></td>
            </tr>
            <tr>
              <th>Bintang</th>
              <td><?= $dt->bintang?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td><?= $dt->alamat;?></td>
            </tr>
            <tr>
              <th>Description</th>
              <td><?= $dt->description;?></td>
            </tr>
          </table>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <br>
  <a href="<?= base_url('customer/dashboard') ?>" class="btn btn-sm btn-secondary">Kembali</a>
</div>
</body>

<div style="height: 180px;"></div>


    