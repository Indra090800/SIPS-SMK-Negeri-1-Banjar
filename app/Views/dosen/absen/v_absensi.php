<section class="content-header">
    <h1>
        <?= $title  ?> Kelas : <?= $jadwal['nama_kelas'] ?> / <?= $jadwal['tahun_angkatan'] ?> TA : <?= $ta['ta'] ?>/<?= $ta['semester'] ?>
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
        <a href="<?= base_url('ldosen/print_absensi/'. $jadwal['id_jadwal']) ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Print</a>
    </div>
    <div class="col-sm-12">
      <?php 
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
      ?>
    <?php echo form_open('ldosen/SimpanAbsen/'. $jadwal['id_jadwal']) ?>
      <table class="table table-striped table-bordered table-responsive-md text-sm">
        <tr class="bg-gray">
            <th rowspan="2" class="text-center">#</th>
            <th rowspan="2" class="text-center">NIS</th>
            <th rowspan="2" class="text-center">Nama Siswa</th>
            <th colspan="16" class="text-center">Pertemuan</th>
        </tr>
        <tr class="bg-gray">
            <th class="text-center">1</th>
            <th class="text-center">2</th>
            <th class="text-center">3</th>
            <th class="text-center">4</th>
            <th class="text-center">5</th>
            <th class="text-center">6</th>
            <th class="text-center">7</th>
            <th class="text-center">UTS</th>
            <th class="text-center">8</th>
            <th class="text-center">9</th>
            <th class="text-center">10</th>
            <th class="text-center">11</th>
            <th class="text-center">12</th>
            <th class="text-center">13</th>
            <th class="text-center">14</th>
            <th class="text-center">UAS</th>
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
                            <select name="<?= $value['id_krs'] ?>p1">
                                <option value="0" <?php if ($value['p1'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p1'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p1'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p2">
                                <option value="0" <?php if ($value['p2'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p2'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p2'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p3">
                                <option value="0" <?php if ($value['p3'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p3'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p3'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p4">
                                <option value="0" <?php if ($value['p4'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p4'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p4'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p5">
                                <option value="0" <?php if ($value['p5'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p5'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p5'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p6">
                                <option value="0" <?php if ($value['p6'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p6'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p6'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p7">
                                <option value="0" <?php if ($value['p7'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p7'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p7'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>puts">
                                <option value="0" <?php if ($value['puts'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['puts'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['puts'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p8">
                                <option value="0" <?php if ($value['p8'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p8'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p8'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p9">
                                <option value="0" <?php if ($value['p9'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p9'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p9'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p10">
                                <option value="0" <?php if ($value['p10'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p10'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p10'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p11">
                                <option value="0" <?php if ($value['p11'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p11'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p11'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p12">
                                <option value="0" <?php if ($value['p12'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p12'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p12'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p13">
                                <option value="0" <?php if ($value['p13'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p13'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p13'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>p14">
                                <option value="0" <?php if ($value['p14'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['p14'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['p14'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <select name="<?= $value['id_krs'] ?>puas">
                                <option value="0" <?php if ($value['puas'] == 0) {
                                                    echo 'selected';
                                                  } ?>>A</option>
                                <option value="1" <?php if ($value['puas'] == 1) {
                                                    echo 'selected';
                                                  } ?>>I</option>
                                <option value="2" <?php if ($value['puas'] == 2) {
                                                    echo 'selected';
                                                  } ?>>H</option>
                            </select>
                        </td>
                </tr>
            <?php } ?>
        </table>
        <button class="btn btn-success btn-flat"><i class="fas fa-save"></i> Simpan Absen</button>
        <?php echo form_close() ?>
    </div>
</div>


