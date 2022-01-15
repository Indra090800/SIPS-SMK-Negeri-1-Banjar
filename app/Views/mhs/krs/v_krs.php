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
        <button class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Add Mapel</button>
        <a href="<?= base_url('krs/print_krs') ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Print </a>
    </div>
    <div class="col-sm-12">

        <?php 
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
        ?>
        <table class="table table-striped table-bordered table-responsive-md">
            <tr class="bg-gray">
                <th>#</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Mata Kuliah</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Ruangan</th>
                <th class="text-center">Kode Dosen</th>
                <th class="text-center">Waktu</th>
                <th></th>
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
                    <td>
                    <?= $value['matkul'] ?><br>
                    (<?= $value['kode_prodi'] ?>)
                    </td>
                    <td class="text-center"><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></td>
                    <td><?= $value['ruangan'] ?></td>
                    <td class="text-center"><?= $value['kode_dosen'] ?></td>
                    <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                    <td class="text-center">
                        <button data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>" class="btn btn-danger btn-flat btn-xs"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>


<!-- /.modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Daftar Mata Pelajaran Ditawarkan</h4>
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
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Kelas</th>
                    <th class="text-center">Tingkat</th>
                    <th class="text-center">Ruangan</th>
                    <th class="text-center">Guru</th>
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
                        <td><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></td>
                        <td><?= $value['smt'] ?></td>
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


<?php foreach ($data_matkul as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_krs'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Mata Kuliah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus <b><?= $value['kode_matkul'] ?> | <?= $value['matkul'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('krs/delete/'.$value['id_krs']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>