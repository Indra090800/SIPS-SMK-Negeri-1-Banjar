<section class="content-header">
    <h1>
        <a href="<?= base_url('matkul') ?>"><?= $title  ?></a>
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
                                <th class="text-center">Kode</th>
                                <th>Mata Pelajaran</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Semester</th>
                                <th width="50px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;
                             foreach ($matkul as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['kode_matkul'] ?></td>
                                    <td><?= $value['matkul'] ?></td>
                                    <td class="text-center"><?= $value['kategori'] ?></td>
                                    <td class="text-center"><?= $value['smt'] ?>(<?= $value['semester'] ?>)</td>
                                    <td class="text-center">
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_matkul'] ?>"><i class="fas fa-trash"></i></button>
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
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Mata Kuliah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('matkul/add/'. $prodi['id_prodi']);
             ?>
             <div class="form-group">
                 <label>Kode</label>
                 <input name="kode_matkul" class="form-control" placeholder="Kode Mata Kuliah" >
             </div>
             <div class="form-group">
                 <label>Mata Kuliah</label>
                 <input name="matkul" class="form-control" placeholder="Mata Kuliah" >
             </div>
             <div class="form-group">
                 <label>Semester</label>
                 <select name="smt" class="form-control">
                     <option value="">--Pilih Semester--</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                 </select>
             </div>
             <div class="form-group">
                 <label>Kategori</label>
                 <select name="kategori" class="form-control">
                     <option value="">--Pilih Kategori--</option>
                     <option value="Wajib">Wajib</option>
                     <option value="Pilihan">Pilihan</option>
                 </select>
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

<?php foreach ($matkul as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_matkul'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus Mata Kuliah <b><?= $value['matkul'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('matkul/delete/'. $prodi['id_prodi']. '/' .$value['id_matkul']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
