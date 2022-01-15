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
                        <?php if (session()->get('level')== 1) { ?>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus">Add</i>
                              </button>
                            </div>
                        <?php } ?>
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
                                <th>Waktu</th>
                                <th>Agenda</th>
                                <?php if (session()->get('level')== 1) { ?>
                                <th class="text-center">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;
                             foreach ($agenda as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['waktu'] ?></td>
                                    <td><?= $value['agenda'] ?></td>
                                    <?php if (session()->get('level')== 1) { ?>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_agenda'] ?>"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_agenda'] ?>"><i class="fas fa-trash"></i></button>
                                    </td>
                                    <?php } ?>
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
          <h4 class="modal-title">Add agenda</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('ka/add');
             ?>
             <div class="form-group">
                 <label>Waktu</label>
                 <input name="waktu" class="form-control" placeholder="Waktu" required>
             </div>
             <div class="form-group">
                 <label>Agenda</label>
                 <input name="agenda" class="form-control" placeholder="Masukkan Agenda" required>
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
<?php foreach ($agenda as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_agenda'] ?>">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit agenda</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('ka/edit/'. $value['id_agenda']);
             ?>
             <div class="form-group">
                 <label>Waktu</label>
                 <input name="waktu" value="<?= $value['waktu'] ?>" class="form-control" placeholder="Waktu" required>
             </div>
             <div class="form-group">
                 <label>agenda</label>
                 <input name="agenda" value="<?= $value['agenda'] ?>" class="form-control" placeholder="Masukkan Agenda" required>
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

<?php foreach ($agenda as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_agenda'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete agenda</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus agenda <b><?= $value['agenda'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('ka/delete/'.$value['id_agenda']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
