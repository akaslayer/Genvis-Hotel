<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data hotel</h1>
    </div>
    
    <a href="<?= base_url('admin/data_hotel/tambah_hotel'); ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar Hotel</th>
          <th>Nama Hotel</th>
          <th>Harga</th>
          <th>Jumlah Kamar</th>
          <th>Bintang</th>
          <th>Lokasi</th>
          <th>Alamat</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($hotel as $mb): ?>
        <tr>
          <td><?= $no++; ?>.</td>
          <td>
            <img width="70px;" src="<?= base_url('assets/upload/'). $mb->img_path; ?>" alt="">
          </td>
          <td><?= $mb->nama; ?></td>
          <td><?= $mb->harga; ?></td>
          <td><?= $mb->qty; ?></td>
          <td><?= $mb->bintang; ?></td>
          <td><?= $mb->lokasi; ?></td>
          <td><?= $mb->alamat; ?></td>
          <td><?= $mb->description; ?></td>
          <td>
            <a onclick="return confirm('Yakin hapus?')" href="<?= base_url('admin/data_hotel/delete_hotel/'). $mb->id_hotel; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            <a href="<?= base_url('admin/data_hotel/update_hotel/'). $mb->id_hotel; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>



  </section>
</div>