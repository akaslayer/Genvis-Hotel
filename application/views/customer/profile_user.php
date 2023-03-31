<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
<div class="main-content" style="padding-left: 50px;">
  <section class="section">
  <div class="card card-primary">
    <div class="card-body">
    <?php foreach($user as $us): ?>
    <form action="<?= base_url('customer/profile_user/update_user_aksi') ?>" enctype="multipart/form-data" method="post">
      <div class="form-group"> 
        <h1 style="text-align: center;">Profile User</h1>
        <label for="">Nama</label>
        <input type="hidden" name="id_user" value="<?= $us->id_user; ?>">
        <input type="text" name="nama" class="form-control" value="<?= $us->nama; ?>">
        <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Email</label>
        <input type="text" name="email" class="form-control" value="<?= $us->email; ?>"  disabled>
        <?= form_error('email', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Tanggal_lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" value="<?= $us->tanggal_lahir; ?>">
        <?= form_error('tanggal_lahir', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">No Telepon</label>
        <input type="text" name="no_telepon" class="form-control" value="<?= $us->no_telepon; ?>">
        <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Gambar</label>
        <input type="file" name="foto" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Reset</button>
    </form>
    <?php endforeach; ?>
    </div>
    </div>
  </section>
</div>
</body>