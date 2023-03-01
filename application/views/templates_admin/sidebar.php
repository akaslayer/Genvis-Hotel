<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('admin/data_hotel'); ?>">APP BOOKING HOTEL</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RM</a>
          </div>
          <ul class="sidebar-menu">

            <li><a class="nav-link" href="<?= base_url('admin/data_hotel'); ?>"><i class="fas fa-car"></i> <span>Data Hotel</span></a></li>

            <li><a class="nav-link" href="<?= base_url('admin/transaksi'); ?>"><i class="fas fa-random"></i> <span>Transaksi</span></a></li>

            <li><a class="nav-link" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>

          </ul>

        </aside>
      </div>