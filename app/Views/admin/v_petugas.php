<div class="content-header">
        <div class="container">
            <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $title ?></h1>
                    </div>
            </div>
        </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card bg-gray">
                      <div class="card-header">
                        <h3 class="card-title">Data <?= $title ?></h3>
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
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                     ?>

                    <table class="table table-bordered table-hover" id="example2">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No</th>
                                <th class="text-center">Nama Petugas</th>
                                <th class="text-center">Tugas</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;
                             foreach ($petugas as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['nama_petugas'] ?></td>
                                    <td><?= $value['tugas'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_petugas'] ?>"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_petugas'] ?>"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php  } ?>
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
          <h4 class="modal-title">Add petugas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('petugas/add');
             ?>
             <div class="form-group">
                 <label>Nama Petugas</label>
                 <input name="nama_petugas" class="form-control" placeholder="Nama Petugas" required>
             </div>

             <div class="form-group">
                 <label>Tugas</label>
                 <select class="form-control" name="tugas">
                   <option value="">--Pilih Tugas--</option>
                   <option value="Senin-Rabu">Senin-Rabu</option>
                   <option value="Kamis-Sabtu">Kamis-Sabtu</option>
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

<!-- /.modal edit -->
<?php foreach ($petugas as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_petugas'] ?>">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit petugas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('petugas/edit/'. $value['id_petugas']);
             ?>
             <div class="form-group">
                 <label>Nama Petugas</label>
                 <input name="nama_petugas" value="<?= $value['nama_petugas'] ?>" class="form-control" placeholder="Nama Petugas" required>
             </div>
             <div class="form-group">
                 <label>Tugas</label>
                 <select class="form-control" name="tugas">
                   <option value="<?= $value['tugas'] ?>"><?= $value['tugas'] ?></option>
                   <option value="Senin-Rabu">Senin-Rabu</option>
                   <option value="Kamis-Sabtu">Kamis-Sabtu</option>
                 </select>
             </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-flat">Update</button>
        </div>
            <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>

<?php foreach ($petugas as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_petugas'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete petugas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus petugas <b><?= $value['nama_petugas'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('petugas/delete/'.$value['id_petugas']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
