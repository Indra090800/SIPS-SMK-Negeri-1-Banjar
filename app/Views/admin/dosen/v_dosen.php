<section class="content-header">
    <h1>
        <?= $title  ?>
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
                              <a href="<?= base_url('dosen/add') ?>" class="btn btn-tool"><i class="fas fa-plus">Add</i>
                              </a>
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
                                <th>Kode Guru</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th class="text-center">Foto</th>
                                <th>Password</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;
                               foreach ($dosen as $key => $value) {  ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['kode_dosen'] ?></td>
                                    <td><?= $value['nidn'] ?></td>
                                    <td><?= $value['nama_dosen'] ?></td>
                                    <td class="text-center"><img src="<?= base_url('fotodosen/'. $value['foto_dosen']) ?>" class="img-circle" width="50px" height="50px"></td>
                                    <td><?= $value['password'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('dosen/edit/'. $value['id_dosen']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_dosen'] ?>"><i class="fas fa-trash"></i></button>
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

<?php foreach ($dosen as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_dosen'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus dosen <b><?= $value['nama_dosen'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('dosen/delete/'.$value['id_dosen']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
