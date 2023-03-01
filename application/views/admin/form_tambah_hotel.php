<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Input Data hotel</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= base_url('admin/data_hotel/tambah_hotel_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Hotel</label>
                <input type="text" name="nama" class="form-control">
                <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Harga Hotel</label>
                <input type="number" name="harga" class="form-control">
                <?= form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Jumlah Kamar</label>
                <input type="number" name="qty" class="form-control">
                <?= form_error('qty', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Bintang</label>
                <input type="number" name="bintang" class="form-control">
                <?= form_error('bintang', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="">Lokasi</label>
                <input type="text" name="lokasi" class="form-control">
                <?= form_error('lokasi', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" name="alamat" class="form-control">
                <?= form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="description" class="form-control">
                <?= form_error('description', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Gambar Hotel</label>
                <input type="file" name="img_path" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-success mt-4">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>