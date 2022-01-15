<section class="content-header">
	<h1>
		<?= $title  ?>
	</h1>
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

                    <table class="table table-bordered table-hover" id="example2">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No</th>
                                <th class="text-center">Nama Kelas</th>
                                <th>Program Study</th>
                                <th>Wali Kelas</th>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Jumlah/Kelas</th>
                                <th class="text-center" width="50px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;
                               $db  = \Config\Database::connect(); 
                               foreach ($kelas as $key => $value) { 
                                $jml = $db->table('tbl_mhs')
                                ->where('id_kelas', $value['id_kelas'])
                                ->countAllResults();
                                   ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td> 
                                    <td class="text-center"><b><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></b></td>
                                    <td><?= $value['prodi'] ?></td>
                                    <td><?= $value['nama_dosen'] ?></td>
                                    <td class="text-center"><?= $value['tahun_angkatan'] ?></td>
                                    <td class="text-center">
                                        <p class="label text-center bg-green"><?= $jml ?></p>
                                        <a href="<?= base_url('kelas/rincian_kelas/'. $value['id_kelas']) ?>">Mahasiswa</a>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>"><i class="fas fa-trash"></i></button>
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
          <h4 class="modal-title">Add <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('kelas/add');
             ?>
             <div class="form-group">
                 <label>Nama Kelas</label>
                 <input name="nama_kelas" class="form-control" placeholder="Nama Kelas">
             </div>

             <div class="form-group">
                 <label>Program Study</label>
                 <select name="id_prodi" class="form-control">
                     <option value="">--Pilih Program Study--</option>
                     <?php foreach ($prodi as $key => $value) { ?>
                         <option value="<?= $value['id_prodi'] ?>"><?= $value['prodi'] ?></option>
                     <?php } ?>
                 </select>
             </div>

             <div class="form-group">
                 <label>Wali Kelas</label>
                 <select name="id_dosen" class="form-control">
                     <option value="">--Pilih Wali Kelas--</option>
                     <?php foreach ($dosen as $key => $value) { ?>
                         <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                     <?php } ?>
                 </select>
             </div>

             <div class="form-group">
                 <label>Tahun Angkatan</label>
                 <select name="tahun_angkatan" class="form-control">
                     <option value="">--Pilih Tahun--</option>
                     <?php for ($i=date('Y'); $i >= date('Y')-5 ; $i--) { ?>
                         <option value="<?= $i ?>"><?= $i ?></option>
                     <?php } ?>
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

<?php foreach ($kelas as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete <?= $title ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus <?= $title ?> <b><?= $value['nama_kelas'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('kelas/delete/'.$value['id_kelas']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
