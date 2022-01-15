<section class="content-header">
    <h1>
        <a href="<?= base_url('jadwalkuliah') ?>"><?= $title  ?></a>
        <small><?= $prodi['prodi'] ?></small>
    </h1>
    <br>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card bg-gray">
                      
                </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="150px">Program Studi</th>
                            <td width="30px">:</td>
                            <td><?= $prodi['prodi'] ?></td>
                        </tr>
                        <tr>
                            <th>Fakultas</th>
                            <td>:</td>
                            <td><?= $prodi['jurusan'] ?></td>
                        </tr>
                        <tr>
                            <th>Tahun Akademik</th>
                            <td>:</td>
                            <td>
                                <?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?>
                            </td>
                        </tr>
                    </table>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card bg-gray">
                      <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus">Add</i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                      </div>
                </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <?php
                    $errors = session()->getFlashdata('errors');
                    if (!empty($errors)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                <?php foreach ($errors as $key => $value) { ?>
                                    <li><?= esc($value) ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <?php 
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                     ?>
                    <table class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No</th>
                                <th class="text-center">SMT</th>
                                <th class="text-center">Kode Mapel</th>
                                <th class="text-center">Mata Pelajaran</th>
                                <th class="text-center">Guru</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Ruangan</th>
                                <th class="text-center">Quota</th>
                                <th width="50px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $no=1;
                           foreach ($jadwal as $key => $value) { ?>
                               <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['smt'] ?></td>
                                    <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                    <td><?= $value['matkul'] ?></td>
                                    <td><?= $value['nama_dosen'] ?></td>
                                    <td class="text-center"><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></td>
                                    <td class="text-center"><?= $value['hari'] ?></td>
                                    <td class="text-center"><?= $value['waktu'] ?></td>
                                    <td class="text-center"><?= $value['ruangan'] ?></td>
                                    <td class="text-center"><?= $value['quota'] ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fas fa-trash"></i></button>
                                    </td>
                               </tr>
                           <?php } ?>
                        </tbody>
                    </table>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
        </div>
    </div>
</div>

<!-- /.modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Mata Kuliah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('jadwalkuliah/add/'. $prodi['id_prodi']);
             ?>
             <div class="form-group">
                 <label>Mata Kuliah</label>
                 <select name="id_matkul" class="form-control">
                            <option value="">--Pilih Mata Kuliah--</option>
                            <?php foreach ($matkul as $key => $value) { ?>
                            
                                <?php if ($value['semester'] == $ta_aktif['semester']) { ?>
                                    <option value="<?= $value['id_matkul'] ?>"><?= $value['smt'] ?> | <?= $value['kode_matkul'] ?> | <?= $value['matkul'] ?> | <?= $value['sks'] ?> SKS</option>
                                <?php } ?>
                                
                            <?php } ?>
                 </select>
             </div>
             <div class="form-group">
                 <label>Dosen</label>
                 <select name="id_dosen" class="form-control">
                            <option value="">--Pilih Dosen--</option>
                            <?php foreach ($dosen as $key => $value) { ?>
                                <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                            <?php } ?>
                 </select>
             </div>
             <div class="form-group">
                 <label>Kelas</label>
                 <select name="id_kelas" class="form-control">
                     <option value="">--Pilih Kelas--</option>
                     <?php foreach ($kelas as $key => $value) { ?>
                           <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></option>
                     <?php } ?>
                 </select>
             </div>
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="form-control">
                            <option value="">--Pilih Hari--</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Waktu</label>
                        <input name="waktu" class="form-control" placeholder="Ex: 08:00-10.30">
                    </div>
                </div>
             </div>
             
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Ruangan</label>
                        <select name="id_ruangan" class="form-control">
                            <option value="">--Pilih Ruangan--</option>
                            <?php foreach ($ruangan as $key => $value) { ?>
                                <option value="<?= $value['id_ruangan'] ?>"><?= $value['ruangan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Quota</label>
                        <input name="quota" class="form-control" placeholder="Quota">
                    </div>
                </div>
             </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-flat">Simpan</button>
        </div>
            <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>

<?php foreach ($jadwal as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus Jadwal <b><?= $value['kode_matkul'] ?> | <?= $value['nama_dosen'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('jadwalkuliah/delete/'.$value['id_jadwal'].'/'.$prodi['id_prodi']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>



