<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<h4 class="m-0 text-dark custom-title">PT MUMU CERDAS PERKASA</h4>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown dropdown-menu-right">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Settings
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Profile</a>
						<a class="dropdown-item" href="<?= base_url('gantipassword') ?>">Ubah Password</a>
						<a class="dropdown-item" href="<?= base_url('welcome/logout') ?>">Log Out</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link text-center">
				<span class="brand-text font-weight-bold">Penggajian App</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url('assets/photo/').$this->session->userdata('photo') ?>" class="img-circle elevation-2"
							alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= $this->session->userdata('username') ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-database"></i>
								<p>
									Master Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('admin/dataPegawai') ?>" class="nav-link">
										<i class="fas fa-users nav-icon"></i>
										<p>Data Pegawai</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('admin/dataJabatan') ?>" class="nav-link">
										<i class="fas fa-map-marked nav-icon"></i>
										<p>Data Jabatan</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Transaksi
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('admin/dataAbsensi') ?>" class="nav-link">
										<i class="fas fa-address-book nav-icon"></i>
										<p>Data Absensi</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?= base_url('admin/potonganGaji') ?>" class="nav-link">
										<i class="fas fa-address-book nav-icon"></i>
										<p>Setting Potongan Gaji</p>
									</a>
								</li>

								<li class="nav-item">
									<a href="<?= base_url('admin/dataPenggajian') ?>" class="nav-link">
										<i class="fas fa-dollar-sign nav-icon"></i>
										<p>Data Gaji</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-copy"></i>
								<p>
									Laporan
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url('admin/laporanGaji') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Laporan Gaji</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('admin/laporanAbsensi') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Laporan Absensi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('admin/SlipGaji') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Slip Gaji</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
