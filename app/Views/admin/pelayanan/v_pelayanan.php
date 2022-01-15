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
                                <th width="10px" class="text-center">No</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Isi Pesan</th>
                                <th width="95px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;
                             foreach ($pelayanan as $key => $value) { ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['nama_mhs'] ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td><?= $value['subject'] ?></td>
                                    <td><?= $value['isi'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-xs btn-flat" data-toggle="modal" data-target="#balas<?= $value['id_pelayanan'] ?>"><i class="fas fa-edit"></i>Balas Pesan</button>
                                        <button class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_pelayanan'] ?>"><i class="fas fa-trash"></i></button>
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
          <h4 class="modal-title">Add pelayanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('pelayanan/add');
             ?>
             <div class="form-group">
                 <label>pelayanan</label>
                 <input name="pelayanan" class="form-control" placeholder="pelayanan" required>
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

<?php foreach ($pelayanan as $key => $value) { ?>
<div class="modal fade" id="balas<?= $value['id_pelayanan'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Balas Pesan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <?php 
                echo form_open('pelayanan/add');
             ?>
             <div class="form-group">
                 <label>Nama Siswa</label>
                 <input name="nama_mhs" value="<?= $value['nama_mhs'] ?>" class="form-control" readonly>
             </div>
             <div class="form-group">
                 <label>Email</label>
                 <input name="email" value="<?= $value['email'] ?>" class="form-control" readonly>
             </div>
             <div class="form-group">
                 <label>Subject</label>
                 <input name="subject" class="form-control">
             </div>
             <div class="form-group">
                 <label>Isi Balasan</label>
                 <textarea class="form-control"></textarea>
             </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-success btn-flat">Balas Pesan</button>
        </div>
          <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>

<?php foreach ($pelayanan as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_pelayanan'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete pelayanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus pesan : <b><?= $value['subject'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('pelayanan/delete/'.$value['id_pelayanan']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
