
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SiakadMe | Print KRS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fa fa-file"></i> <b>Kartu Rencana Study</b>
          <small class="float-right">Tanggal: <?= date('d M Y') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
    
        <table class="table-striped table-responsive">
                <tr>
                    <td rowspan="7"><img src="<?= base_url('fotomhs/'. $mhs['foto_mhs']) ?>" height="170px" width="120px"></td>
                    <td width="150px">Tahun Akademik</td>
                    <td width="20px">:</td>
                    <td><?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?></td>
                    <td rowspan="7"></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?= $mhs['nim'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $mhs['nama_mhs'] ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>:</td>
                    <td><?= $mhs['jurusan'] ?></td>
                </tr>
                <tr>
                    <td>Program Study</td>
                    <td>:</td>
                    <td><?= $mhs['prodi'] ?></td>
                </tr>
                <tr>
                    <td>Rombongan Kelas</td>
                    <td>:</td>
                    <td><?= $mhs['nama_kelas'] ?> / <?= $mhs['tahun_angkatan'] ?></td>
                </tr>
                <tr>
                    <td>Dosen PA</td>
                    <td>:</td>
                    <td><?= $mhs['nama_dosen'] ?></td>
                </tr>
        </table>
      
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered table responsive">
            <tr class="label-success">
                <th>#</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Mata Kuliah</th>
                <th class="text-center">SKS</th>
                <th class="text-center">SMT</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Ruangan</th>
                <th class="text-center">Kode Dosen</th>
                <th class="text-center">Waktu</th>
            </tr>

            <?php 
            $no=1;
            $sks = 0;
            foreach ($data_matkul as $key => $value) { 
                $sks = $sks + $value['sks'];
                ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $value['kode_matkul'] ?></td>
                    <td><?= $value['matkul'] ?></td>
                    <td class="text-center"><?= $value['sks'] ?></td>
                    <td class="text-center"><?= $value['smt'] ?></td>
                    <td class="text-center"><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></td>
                    <td><?= $value['ruangan'] ?></td>
                    <td class="text-center"><?= $value['kode_dosen'] ?></td>
                    <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                </tr>
            <?php } ?>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-4">
        <p class="lead">Jumlah SKS: <?= $sks ?></p>
      </div>

      <div class="col-4">
      </div>
      <!-- /.col -->
      <div class="col-4">
          Padang, <?= date('d M Y') ?><br>
          Pembimbing Akademik <br>
          <br>
          <br>
          dto.
          <br>
          <br>
          <?= $mhs['nama_dosen'] ?>
      
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
