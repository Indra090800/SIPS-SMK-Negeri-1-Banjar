<section class="content-header">
	<h1>
		<?= $title  ?>
	</h1>
</section>

    <div class="row">
    	<div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="card card-success card-solid">
                <div class="card bg-gray">
                      <div class="card-header with-border">
                        <h3 class="card-title"><?= $title ?></h3>
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
		                echo form_open_multipart('perpus/insert');
		             ?>

		             <div class="form-group">
		                 <label>Nama Anda</label>
		                 	<select name="id_anggota" class="form-control">
		                 		<?php if ($mhs['id_anggota'] == "") { ?>
		                 			<option value="">--Nama Anda Belum Terdaftar--</option>
		                 		<?php }else{ ?>
		                            <option value="">--Nama Anda--</option>
		                                <option value="<?= $siswa['id_anggota'] ?>"><?= $siswa['id_anggota'] ?> - <?= $siswa['nama_mhs'] ?></option>
		                        <?php } ?>
		                 </select>
		                 
		             </div>

		             <div class="form-group">
		                 <label>Buku</label>
		                 <select name="id_buku" class="form-control">
		                            <option value="">--Pilih Buku--</option>
		                            <?php
		                            $db = \Config\Database::connect();
		                             foreach ($buku as $key => $value) { 
		                             		$jml = $db->table('tbl_perpus')
			                               ->where('id_buku', $value['id_buku'])
			                               ->countAllResults();
		                             	?>
		                                <option value="<?= $value['id_buku'] ?>"><?= $value['id_buku'] ?> - <?= $value['judul_buku'] ?> <?php if ($jml == $value['stok']) { ?>
		                                	(Buku tidak tersedia)
		                                <?php } ?></option>
		                            <?php } ?>
		                 </select>
		             </div>

		             <div class="form-group">
		                 <label>Tanggal Pinjam</label>
		                 <input type="date" name="waktu" class="form-control">
		             </div>

		             <div class="form-group">
		                 <label>Nama Petugas</label>
		                 <select name="id_petugas" class="form-control">
		                            <option value="">--Pilih Petugas--</option>
		                            <?php foreach ($petugas as $key => $value) { ?>
		                                <option value="<?= $value['id_petugas'] ?>"><?= $value['nama_petugas'] ?> ( <?= $value['tugas'] ?> )</option>
		                            <?php } ?>
		                 </select>
		             </div>

		            <div class="modal-footer justify-content-between">
			          <button type="submit" class="btn btn-success btn-flat">Pinjam</button>
			        </div>

		        </div>
		
		        <?php echo form_close() ?>
                <!-- /.card -->
              </div>
        </div>
        <div class="col-sm-3">
    	</div>
    </div>
