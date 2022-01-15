
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SiakadMe | Print Absensi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
  <style type="text/css" media="print">
    body{
        page-break-before: avoid;
        width: 100%;
        height: 100%;
        zoom: 100%
    }
  </style>
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fa fa-file"></i> <b>Rekap Nilai Kelas TA : <?= $ta['ta'] ?>/<?= $ta['semester'] ?></b>
          <small class="float-right">Tanggal: <?= date('d M Y') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-6">
            <table class="table-striped table-responsive">
                    <tr>
                        <td>Program Study</td>
                        <td width="30px" class="text-center">:</td>
                        <td><?= $jadwal['prodi'] ?></td>
                    </tr>
                    <tr>
                        <td>Fakultas</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['jurusan'] ?></td>
                    </tr>
                    <tr>
                        <td>Kode</td>
                        <td class="text-center">:</td>
                        <td><?= $jadwal['kode_matkul'] ?></td>
                    </tr>
            </table>
        </div>
        <div class="col-6">
            <table class="table-striped table-responsive">
                <tr>
                    <td>Mata Kuliah</td>
                    <td width="30px" class="text-center">:</td>
                    <td><?= $jadwal['matkul'] ?></td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td class="text-center">:</td>
                    <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
                </tr>
                <tr>
                    <td>Dosen</td>
                    <td class="text-center">:</td>
                    <td><?= $jadwal['nama_dosen'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
      <br>
      <table class="table table-striped table-bordered table-responsive-md text-sm">
        <tr class="bg-gray">
            <th rowspan="2" class="text-center">#</th>
            <th rowspan="2" class="text-center" width="180px">NIM</th>
            <th rowspan="2" class="text-center">Mahasiswa</th>
            <th colspan="4" class="text-center">Nilai</th>
            <th rowspan="2" class="text-center" width="200px">NA <br> (20% + 20% + 25% + 35%)</th>
            <th rowspan="2" class="text-center" width="80px">Huruf</th>
        </tr>
        <tr class="bg-gray">
            <th class="text-center" width="80px">Absensi </th>
            <th class="text-center" width="80px">Tugas</th>
            <th class="text-center" width="80px">UTS</th>
            <th class="text-center" width="80px">UAS</th>
        </tr>
        <?php 
            $no=1;
            foreach ($mhs as $key => $value) {
                echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']); 
        ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td class="text-center"><?= $value['nim'] ?></td>
            <td><?= $value['nama_mhs'] ?></td>
            <td class="text-center">
            <?php 
                        $absensi = (
                            $value['p1'] +
                            $value['p2'] +
                            $value['p3'] +
                            $value['p4'] +
                            $value['p5'] +
                            $value['p6'] +
                            $value['p7'] +
                            $value['puts'] +
                            $value['p8'] +
                            $value['p9'] +
                            $value['p10'] +
                            $value['p11'] +
                            $value['p12'] +
                            $value['p13'] +
                            $value['p14'] +
                            $value['puas']) / 32 * 100;  
                        echo number_format($absensi, 0);
                        echo form_hidden($value['id_krs'] . 'absen', number_format($absensi, 0));
                        ?>
            </td>
            <td class="text-center"><?= $value['nilai_tugas'] ?></td>
            <td class="text-center"><?= $value['nilai_uts'] ?></td>
            <td class="text-center"><?= $value['nilai_uas'] ?></td>
            <td class="text-center"><?= $value['nilai_akhir'] ?></td>
            <td class="text-center"><?= $value['huruf'] ?></td>
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
        <p class="lead"></p>
      </div>

      <div class="col-4">
      </div>
      <!-- /.col -->
      <div class="col-4">
          Banjar, <?= date('d M Y') ?><br>
          Dosen Pengampuh <br>
          <br>
          <br>
          dto.
          <br>
          <br>
          <?= $jadwal['nama_dosen'] ?>
      
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->

</body>
</html>
