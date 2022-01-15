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
                              <a href="<?= base_url('mahasiswa/add') ?>" class="btn btn-tool"><i class="fas fa-plus">Add</i>
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
                                <th class="text-center">NIS</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">Program Studi</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;
                               foreach ($mhs as $key => $value) {  ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td class="text-center"><?= $value['nim'] ?></td>
                                    <td><?= $value['nama_mhs'] ?></td>
                                    <td class="text-center"><?= $value['prodi'] ?></td>
                                    <td class="text-center"><img src="<?= base_url('fotomhs/'. $value['foto_mhs']) ?>" class="img-circle" width="50px" height="50px"></td>
                                    <td><?= $value['password'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('mahasiswa/edit/'. $value['id_mhs']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_mhs'] ?>"><i class="fas fa-trash"></i></button>
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

<?php foreach ($mhs as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_mhs'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus mhs <b><?= $value['nama_mhs'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('mahasiswa/delete/'.$value['id_mhs']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>

