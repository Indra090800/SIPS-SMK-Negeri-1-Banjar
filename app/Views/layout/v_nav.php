
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <?php if (session()->get('level')== 1) { ?>
            <li class="nav-item">
              <a href="<?= base_url('admin') ?>" class="nav-link text-white">Dashboard</a>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">Master</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?= base_url('jurusan') ?>" class="dropdown-item">Fakultas</a></li>
                  <li><a href="<?= base_url('gedung') ?>" class="dropdown-item">Gedung</a></li>
                  <li><a href="<?= base_url('ruangan') ?>" class="dropdown-item">Ruangan</a></li>
                  <li><a href="<?= base_url('prodi') ?>" class="dropdown-item">Program Study</a></li>
                  <li><a href="<?= base_url('ta') ?>" class="dropdown-item">Tahun Ajaran</a></li>
                  <li><a href="<?= base_url('matkul') ?>" class="dropdown-item">Mata Pelajaran</a></li>
                  <li><a href="<?= base_url('dosen') ?>" class="dropdown-item">Guru</a></li>
                  <li><a href="<?= base_url('mahasiswa') ?>" class="dropdown-item">Siswa</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">Akademik</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?= base_url('ka') ?>" class="dropdown-item">Kalender Akademik</a></li>
                  <li><a href="<?= base_url('kelas') ?>" class="dropdown-item">Kelas</a></li>
                  <li><a href="<?= base_url('jadwalkuliah') ?>" class="dropdown-item">Jadwal Kuliah</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">Perpustakaan</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?= base_url('petugas') ?>" class="dropdown-item">Kelola Petugas</a></li>
                  <li><a href="<?= base_url('buku') ?>" class="dropdown-item">Kelola Buku</a></li>
                  <li><a href="<?= base_url('perpus') ?>" class="dropdown-item">Kelola Perpus</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">Setting</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?= base_url('user') ?>" class="dropdown-item">User</a></li>
                  <li><a href="<?= base_url('pelayanan') ?>" class="dropdown-item">Pelayanan</a></li>
                  <li><a href="<?= base_url('ta/setting') ?>" class="dropdown-item">Tahun Akademik</a></li>
                </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link text-white">About</a>
            </li>
         <?php }elseif (session()->get('level') == 2) { ?>
            <li class="nav-item">
              <a href="<?= base_url('mhs') ?>" class="nav-link text-white">Dashboard</a>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">Akademik</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?= base_url('ka') ?>" class="dropdown-item">Kalender Akademik</a></li>
                  <li><a href="<?= base_url('krs') ?>" class="dropdown-item">Input Mapel</a></li>
                  <li><a href="<?= base_url('jadwalpelajaran') ?>" class="dropdown-item">Jadwal Pelajaran</a></li>
                  <li><a href="<?= base_url('mhs/khs') ?>" class="dropdown-item">Daftar Nilai</a></li>
                  <li><a href="<?= base_url('mhs/absen') ?>" class="dropdown-item">Absensi</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">Perpustakaan</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?= base_url('perpus') ?>" class="dropdown-item">Peminjaman Buku</a></li>
                  <li><a href="<?= base_url('buku') ?>" class="dropdown-item">Daftar Buku</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">CBT</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="" class="dropdown-item">Daftar Ujian</a></li>
                  <li><a href="" class="dropdown-item">Hasil Ujian</a></li>
                </ul>
            </li>
         <?php }elseif (session()->get('level') == 3) { ?>
            <li class="nav-item">
              <a href="<?= base_url('ldosen') ?>" class="nav-link text-white forward">Dashboard</a>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">Akademik</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                  <li><a href="<?= base_url('ka') ?>" class="dropdown-item">Kalender Akademik</a></li>
                  <li><a href="<?= base_url('ldosen/jadwal') ?>" class="dropdown-item">Jadwal Mengajar</a></li>
                  <li><a href="<?= base_url('ldosen/AbsenKelas') ?>" class="dropdown-item">Absen Kelas</a></li>
                  <li><a href="<?= base_url('ldosen/NilaiMahasiswa') ?>" class="dropdown-item">Nilai Mahasiswa</a></li>
                </ul>
            </li>
         <?php } ?>
        </ul>
        
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <?php if (session()->get('username')=="") { ?>
        <li><b><a href="<?= base_url('auth') ?>"><i class="fa fa-sign-in-alt"></i> Login</a></b></li>
      <?php }else{ ?>
            
              <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-white">Hi, <?= session()->get('nama') ?></a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li class="user-header text-center">
                    <?php if (session()->get('level') == 1) { ?>
                      <img src="<?= base_url('foto/'. session()->get('photo')) ?>" class="img-circle" width="90px" height="90px"> 
                    <?php }elseif (session()->get('level') == 2) { ?>
                      <img src="<?= base_url('fotomhs/'. session()->get('photo')) ?>" class="img-circle" width="70px" height="70px">
                    <?php }elseif (session()->get('level') == 3) { ?>
                      <img src="<?= base_url('fotodosen/'. session()->get('photo')) ?>" class="img-circle" width="70px" height="70px">
                    <?php } ?>
                    
                    <p><?= session()->get('nama') ?> <br><b> <?php if (session()->get('level') == 1) {
                                                          echo "Admin";
                                                        } elseif (session()->get('level') == 2) {
                                                          echo session()->get('username');
                                                        } elseif (session()->get('level') == 3) {
                                                          echo session()->get('username');
                                                        } ?></b></p>
                    <small><?= date('d M Y') ?></small>
                    <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">Logout</a></li>
                </ul>
              </li>
        <?php } ?>       
      </ul>
    </div>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header">
        <div class="container">
                <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                                <li class="breadcrumb-item active">Top Navigation</li>
                            </ol>
                        </div>
                </div>
        </div>
    </div> -->
    <!-- /.content-header -->

    <div class="content">
        <div class="container">

    