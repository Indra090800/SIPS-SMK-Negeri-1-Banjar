<section class="content-header">
    <h1>
        <?= $title  ?> <small>Tahun Akademik : <?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?></small>
    </h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <table class="table-striped table-responsive">
                <tr>
                    <td rowspan="7"><img src="<?= base_url('fotomhs/'. $mhs['foto_mhs']) ?>" height="170px" width="120px"></td>
                    <td width="150px">Tahun Akademik</td>
                    <td width="20px">:</td>
                    <td><?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?></td>
                    <td rowspan="7"></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><?= $mhs['nim'] ?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
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
                    <td>Wali Kelas</td>
                    <td>:</td>
                    <td><?= $mhs['nama_dosen'] ?></td>
                </tr>
        </table>
    </div>

    <div class="col-sm-12">
        <a href="<?= base_url('mhs/print_khs') ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Print KHS</a>
    </div>
    <div class="col-sm-12">

        <?php 
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
        ?>
        <table class="table table-striped table-bordered table-responsive-md ">
            <tr class="bg-gray">
                <th>#</th>
                <th class="text-center">Kode Mapel</th>
                <th class="text-center">Mata Pelajaran</th>
                <th class="text-center">SMT</th>
                <th class="text-center">Nilai Akhir</th>
            </tr>

            <?php 
            $no=1;
            $sks = 0;
            $grand_bobot = 0;
            foreach ($data_matkul as $key => $value) { 
                $sks = $sks + $value['sks'];
                $tot_bobot = $value['nilai_akhir'] + $value['nilai_akhir'];;
                $grand_bobot = $grand_bobot + $tot_bobot;
                ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $value['kode_matkul'] ?></td>
                    <td>
                    <?= $value['matkul'] ?>
                    (<?= $value['kode_prodi'] ?>)
                    </td>
                    <td class="text-center"><?= $value['smt'] ?></td>
                    <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                </tr>
            <?php } ?>
        </table>
        <h4><b>Jumlah Nilai :</b></h4>
        <h4><b>Ranking : </b></h4>
    </div>
</div>


<!-- /.modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Daftar Mata Kuliah Ditawarkan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  

          <table class="table table-bordered table-striped text-sm" id="example2">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Mata Kuliah</th>
                    <th class="text-center">SKS</th>
                    <th class="text-center">SMT</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Dosen</th>
                    <th class="text-center">Waktu</th>
                    <th class="text-center">Quota</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
                
            <tbody>
                <?php 
                $no=1;
                $db = \Config\Database::connect();
                foreach ($matkul_ditawar as $key => $value) { 
                    $jml = $db->table('tbl_krs')
                               ->where('id_jadwal', $value['id_jadwal'])
                               ->countAllResults();
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['kode_matkul'] ?></td>
                        <td>
                        <?= $value['matkul'] ?><br>
                        (<?= $value['kode_prodi'] ?>)
                        </td>
                        <td class="text-center"><?= $value['sks'] ?></td>
                        <td class="text-center"><?= $value['smt'] ?></td>
                        <td><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></td>
                        <td class="text-center"><?= $value['ruangan'] ?></td>
                        <td><?= $value['nama_dosen'] ?></td>
                        <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                        <td class="text-center">
                            <span class="label label-success"><?= $jml ?>/<?= $value['quota'] ?></span>
                        </td>
                        <td class="text-center">
                            <?php if ($jml == $value['quota']) { ?>
                                <button class="btn btn-xs btn-danger">Full</button>
                            <?php }else{ ?>
                                <a href="<?= base_url('krs/tambah_matkul/'. $value['id_jadwal']) ?>" class="btn btn-flat btn-success btn-xs"><i class="fa fa-plus"></i> </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
