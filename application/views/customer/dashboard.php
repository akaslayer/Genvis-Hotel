<!-- Page Content -->
<!-- Banner Starts Here -->
<!-- <div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>Fleet</h4>
            <h2>Choose from our fleet!</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div> -->

<!-- Banner Ends Here -->

<div style="height: 40px;"></div>
<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
<section class="blog-posts grid-system">
  <div class="container">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="all-blog-posts">
      <div class="row">

        <?php foreach($hotel as $ht): ?>
        <div class="col-md-4 col-sm-6">
          <div class="blog-post">
            <div class="blog-thumb">
            <a href="<?= base_url('customer/dashboard/detail_hotel/'.$ht->id_hotel) ?>"><img src="<?= base_url('assets/upload/') . $ht->img_path ?>" alt="" width="150" height="250"></a>
            </div>
            <div class="down-content">
              <h4><?= $ht->nama; ?></h4>
              <span>Rp. <?= number_format($ht->harga,0,',','.'); ?>,-</span> <strong>per hari</strong>

              <div class="post-options">
                <div class="row">
                  <div class="col-lg-12">
                    <ul class="post-tags">
                      <li><i class="fa fa-bullseye"></i></li>
                        <a href="<?= base_url('customer/rental/tambah_rental/'.$ht->id_hotel) ?>"> Sewa</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>
        </body>
<div style="height: 180px;"></div>


