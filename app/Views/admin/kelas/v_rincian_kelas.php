<section class="content-header">
	<h1>
		<?= $title  ?> : <label class="text-warning"><a href="<?= base_url('kelas') ?>"><?= $kelas['nama_kelas'] ?> / <?= $kelas['tahun_angkatan'] ?></a></label>
	</h1>
</section>

<div class="container-fluid">    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card bg-gray">
                      <div class="card-header">
                        <h3 class="card-title"><?= $title ?> : <label class="text-warning"><?= $kelas['nama_kelas'] ?></label></h3>
                            <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus">Add</i>
                              </button>
                            </div>
                            <!-- /.card-tools -->
                      </div>
                </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    
                    <table class="table table-bordered">
                        <tr>
                            <th width="150px">Nama Kelas</th>
                            <th width="30px">:</th>
                            <td width="250px"><?= $kelas['nama_kelas'] ?> / <?= $kelas['tahun_angkatan'] ?></td>
                            <th width="150px">Angkatan</th>
                            <th width="30px">:</th>
                            <td><?= $kelas['tahun_angkatan'] ?></td>
                        </tr>
                        <tr>
                            <th>Program Study</th>
                            <th>:</th>
                            <td><?= $kelas['prodi'] ?></td>
                            <th width="150px">Jumlah</th>
                            <th width="30px">:</th>
                            <td><?= $jml ?></td>
                        </tr>
                    
                    </table>

                    <?php 
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                     ?>
                     
                     <table class="table table-bordered">
                        <tr>
                            <th width="50px" class="text-center bg-gray">No</th>
                            <th width="150px" class="text-center bg-gray">NIS</th>
                            <th class="bg-gray">Nama Siswa</th>
                            <th width="50px" class="text-center bg-gray">Action</th>
                        </tr>
                        <?php $no=1;
                         foreach ($mhs as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $value['nim'] ?></td>
                                <td><?= $value['nama_mhs'] ?></td>
                                <td class="text-center">
                                    
                                        <a href="<?= base_url('kelas/remove_mhs/'. $value['id_mhs'].'/'. $kelas['id_kelas']) ?>" class="btn btn-flat btn-xs btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    
                                </td>
                            </tr>
                        <?php } ?>
                        
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Mahasiswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-hover" id="example2">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Program Study</th>
                                <th width="30px"></th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php $no=1;
                    foreach ($mhs_tpk as $key => $value) { ?>
                    <?php if ($kelas['id_prodi'] == $value['id_prodi']) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nim'] ?></td>
                        <td><?= $value['nama_mhs'] ?></td>
                        <td><?= $value['prodi'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('kelas/add_mhs/'. $value['id_mhs'].'/'. $kelas['id_kelas']) ?>" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    </tbody>
            </table>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
