<header 
    style= "background: hsla(167, 68%, 73%, 1);
            background: linear-gradient(90deg, hsla(167, 68%, 73%, 1) 0%, hsla(178, 59%, 48%, 1) 100%);
            background: -moz-linear-gradient(90deg, hsla(167, 68%, 73%, 1) 0%, hsla(178, 59%, 48%, 1) 100%);
            background: -webkit-linear-gradient(90deg, hsla(167, 68%, 73%, 1) 0%, hsla(178, 59%, 48%, 1) 100%);
            margin-bottom: 2%;
            padding-top: 5rem;
            padding-bottom: 3rem;">
    <div class="head col-md-6 col-10 mx-auto">
        <h5>Genvis Hotel</h5>
        <h1>REGISTRATION</h1>
    </div>
    <div class="login-brand">
      <img src="<?= base_url('assets/assets_stisla/'); ?>assets/img/design.png" alt="logo" width="300" 
      style= "position: absolute;
              right: 320px;
              top: 30px;
              text-decoration: none;
              color: white;
              letter-spacing: 5px;
              text-align: center;">
    </div>
</header>
<body style="background-image:url('<?php echo base_url('assets/assets_stisla/assets/img/Hydrant BG.png')?>')">
  <div id="app" >
    <!-- <section class="section"> -->
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            
            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('register/register_data'); ?>">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama">Nama</label>
                      <input id="nama" type="text" class="form-control" name="nama" autofocus>
                      <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email">
                      <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Password</label>
                      <input type="password" name="password1" class="form-control">
                      <?= form_error('password1', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="no_telepon" class="d-block">Retype Password</label>
                      <input id="password2" type="password" class="form-control" name="password2">
                      <?= form_error('password2', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control">
                      <?= form_error('tanggal_lahir', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-6">
                      <label>Nomor Telepon</label>
                      <input type="text" name="no_telepon" class="form-control">
                      <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file"  name="foto" class="form-control" >
                    <?= form_error('foto', '<div class="text-small text-danger">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- </section> -->
  </div>