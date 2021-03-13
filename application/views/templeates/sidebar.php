<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="index.html">Er-We-Company</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar -->
        <ul class="navbar-nav" id="logout">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <h5 class="text-white text-center mt-3">
                    <strong><?= $user['nama_karyawan'] ?></strong>
                </h5>
            </li>

            <!-- admin menu management -->
            <?php if ($this->session->userdata('id_jabatan') == 3 || $this->session->userdata('id_jabatan') == 1) : ?>
                <li class="nav-link text-white">ADMIN MENU MANAGEMENT</li>
                <li class="nav-item mt-n3">
                    <a class="nav-link" href="<?= site_url('admin_menu_dashboard') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Produk</span>
                    </a>
                    <div class="dropdown-menu ml-n1" aria-labelledby="pagesDropdown">
                        <h6 class="dropdown-header">Management Data kategori</h6>
                        <a class="dropdown-item" href="<?= base_url('admin_menu_kategori') ?>">Data Produk ketegori</a>
                        <h6 class="dropdown-header">Management Data Supplier</h6>
                        <a class="dropdown-item" href="<?= base_url('admin_menu_supplier') ?>">Data Supplier</a>
                    </div>
                </li>
            <?php endif; ?>
            <!-- end admin menu management -->

            <!-- hrd menu management -->
            <?php if ($this->session->userdata('id_jabatan') == 7 || $this->session->userdata('id_jabatan') == 1) : ?>
                <li class="nav-link text-white">MENU HRD</li>
                <li class="nav-item mt-n3">
                    <a class="nav-link" href="<?= site_url('hrd_menu_dashboard') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data Karyawan</span>
                    </a>
                    <div class="dropdown-menu ml-n1" aria-labelledby="pagesDropdown">
                        <h6 class="dropdown-header">Management Karyawan</h6>
                        <a class="dropdown-item" href="<?= base_url('hrd_menu_karyawan') ?>">Data Karyawan</a>
                        <h6 class="dropdown-header">Management Jabatan</h6>
                        <a class="dropdown-item" href="<?= base_url('hrd_menu_jabatan') ?>">Data Jabatan</a>
                        <h6 class="dropdown-header">Management Absensi</h6>
                        <a class="dropdown-item" href="<?= base_url('hrd_menu_absensi') ?>">Data Absensi</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Outlet and Cabang</span>
                    </a>
                    <div class="dropdown-menu ml-n1" aria-labelledby="pagesDropdown">
                        <h6 class="dropdown-header">Outlet / Cabang</h6>
                        <a class="dropdown-item" href="<?= base_url('hrd_menu_outlet') ?>">Data Outlet / Cabang</a>
                        <h6 class="dropdown-header">Manager Area</h6>
                        <a class="dropdown-item" href="<?= base_url('hrd_menu_manager_area') ?>">Data Manager Area</a>
                    </div>
                </li>
            <?php endif; ?>
            <!-- end hrd menu management -->

            <!-- manager menu management -->
            <?php if ($this->session->userdata('id_jabatan') == 5 || $this->session->userdata('id_jabatan') == 1) : ?>
                <li class="nav-link text-white">MENU MANAGER CABANG
                    <!-- cek session login -->
                    <?php if ($this->session->userdata('id_jabatan') == 5) : ?>
                        <!-- menu manager percabang -->
                        <p class="text-white text-center"><strong><?= $karyawan_cabang ?></strong></p>
                <li class="nav-item mt-n3">
                    <a class="nav-link" href="<?= site_url('manager_menu_dashboard') ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('manager_menu_stok_barang') ?>">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Stok Barang</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('manager_menu_inventori_masuk') ?>">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Inventori Masuk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('manager_menu_inventori_keluar') ?>">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Inventori Keluar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('manager_menu_jadwal_absensi') ?>">
                        <i class="fas fa-fw fa-calendar-alt"></i>
                        <span>Jadwal Absensi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('manager_menu_karyawan') ?>">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Karyawan</span>
                    </a>
                </li>
                <!-- end menu manager percabang -->
            <?php else : ?>
                <p class="text-white text-center"><strong>ALL CABANG</strong></p>
            <?php endif; ?>
            <!-- end cek session login -->
            </li>
        <?php endif; ?>
        <!-- end manager menu management -->
        </ul>