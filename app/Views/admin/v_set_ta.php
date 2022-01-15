<section class="content-header">
    <h1>
        Setting <?= $title  ?>
    </h1>
    <br>
</section>

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
                                <th class="text-center">Tahun Akademik</th>
                                <th class="text-center">Semester</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;
                             foreach ($ta as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $value['ta'] ?></td>
                                    <td class="text-center"><?= $value['semester'] ?></td>
                                    <td class="text-center">
                                      <?php if ($value['status'] == 0) {
                                        echo '<p class="label text-center bg-red">Non-Aktif</p>';
                                      }else{
                                        echo '<p class="label text-center bg-green">Aktif</p>';
                                      } ?>
                                    </td>
                                    <td class="text-center">
                                    <?php if ($value['status'] == 0) { ?>
                                      <a href="<?= base_url('ta/set_status_ta/'.$value['id_ta']) ?>" class="btn btn-success btn-sm btn-flat"><i class="fas fa-check">Aktifkan</i></a>
                                    <?php } ?>  
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
          <h4 class="modal-title">Add Gedung</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('ta/add');
             ?>
             <div class="form-group">
                 <label>Tahun Akademik</label>
                 <input name="ta" class="form-control" placeholder="Ex: 2021/2022" required>
             </div>

             <div class="form-group">
                 <label>Semester</label>
                 <select name="semester" class="form-control">
                 	<option value="">--Pilih Semester--</option>
                 	<option value="Ganjil">Ganjil</option>
                 	<option value="Genap">Genap</option>
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
<?php foreach ($ta as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_ta'] ?>">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Gedung</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('ta/edit/'. $value['id_ta']);
             ?>
             <div class="form-group">
                 <label>Tahun Akademik</label>
                 <input name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Ex: 2021/2022" required>
             </div>

             <div class="form-group">
                 <label>Semester</label>
                 <select name="semester" class="form-control">
                 	<option value="">--Pilih Semester--</option>
                 	<option value="Ganjil" <?php if($value['semester']=='Ganjil'){
                 		echo 'Selected';
                 	} ?>>Ganjil</option>
                 	<option value="Genap" <?php if($value['semester']=='Genap'){
                 		echo 'Selected';
                 	} ?>>Genap</option>
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

<?php foreach ($ta as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_ta'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Tahun Akademik</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus Tahun Akademik <b><?= $value['ta'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('ta/delete/'.$value['id_ta']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
