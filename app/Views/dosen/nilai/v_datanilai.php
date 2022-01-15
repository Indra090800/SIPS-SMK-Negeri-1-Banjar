<section class="content-header">
    <h1>
        Data Nilai Siswa  TA : <?= $ta['ta'] ?>/<?= $ta['semester'] ?>
    </h1>
    <br>
    
</section>

<div class="row">
    <div class="col-sm-6">
        <table class="table-striped table-responsive-md">
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
    <div class="col-sm-6">
      <table class="table-striped table-responsive-md">
                <tr>
                    <td>Mata Pelajaran</td>
                    <td class="text-center">:</td>
                    <td><?= $jadwal['matkul'] ?></td>
            </tr>
                <tr>
                    <td>Waktu</td>
                    <td class="text-center">:</td>
                    <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
                </tr>
                <tr>
                    <td>Guru</td>
                    <td class="text-center">:</td>
                    <td><?= $jadwal['nama_dosen'] ?></td>
                </tr>
      </table>
    </div>
    <div class="col-sm-12">
        <a href="<?= base_url('ldosen/PrintNilai/'. $jadwal['id_jadwal']) ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Print</a>
    </div>

    <div class="col-sm-12">
      <?php 
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
      ?>
    <?php echo form_open('ldosen/SimpanNilai/'. $jadwal['id_jadwal']) ?>
      <table class="table table-striped table-bordered table-responsive-md text-sm">
        <tr class="bg-gray">
            <th rowspan="2" class="text-center">#</th>
            <th rowspan="2" class="text-center" width="180px">NIS</th>
            <th rowspan="2" class="text-center">Nama Siswa</th>
            <th colspan="4" class="text-center">Nilai</th>
            <th rowspan="2" class="text-center" width="200px">NA <br> (20% + 20% + 25% + 35%)</th>
            <th rowspan="2" class="text-center" width="80px">Huruf</th>
            <th rowspan="2" class="text-center" width="80px">Bobot</th>
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
            <td><input name="<?= $value['id_krs'] ?>nilai_tugas" value="<?= $value['nilai_tugas'] ?>" class="form-control"></td>
            <td><input name="<?= $value['id_krs'] ?>nilai_uts" value="<?= $value['nilai_uts'] ?>" class="form-control"></td>
            <td><input name="<?= $value['id_krs'] ?>nilai_uas" value="<?= $value['nilai_uas'] ?>" class="form-control"></td>
            <td class="text-center"><?= $value['nilai_akhir'] ?></td>
            <td class="text-center"><?= $value['huruf'] ?></td>
            <td class="text-center"><?= $value['bobot'] ?></td>
        </tr>
        <?php } ?>
      </table>
      <button class="btn btn-success btn-flat"><i class="fas fa-save"></i> Simpan dan Proses</button>
      <?php echo form_close() ?>
    </div>
</div>


