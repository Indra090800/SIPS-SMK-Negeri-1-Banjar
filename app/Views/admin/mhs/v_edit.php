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
		                echo form_open_multipart('mahasiswa/update/'.$mhs['id_mhs']);
		             ?>

		             <div class="form-group">
		                 <label>NIS</label>
		                 <input name="nim" value="<?= $mhs['nim'] ?>" class="form-control" placeholder="NIS">
		             </div>
             
		             <div class="form-group">
		                 <label>Nama Siswa</label>
		                 <input name="nama_mhs" class="form-control" value="<?= $mhs['nama_mhs'] ?>" placeholder="Nama Siswa">
		             </div>

		             <div class="form-group">
		                 <label>Program Study</label>
		                 <select name="id_prodi" class="form-control">
		                 	<option value="<?= $mhs['id_prodi'] ?>"><?= $mhs['prodi'] ?></option>
		                 	<?php foreach ($prodi as $key => $value) { ?>
		                 	<option value="<?= $value['id_prodi']  ?>"><?= $value['prodi'] ?></option>
		                 	<?php } ?>
		                 </select>
		             </div>

		             <div class="form-group">
		                 <label>Password</label>
		                 <input name="password" value="<?= $mhs['password'] ?>" class="form-control" placeholder="Password">
		             </div>
					
					 <div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<img src="<?= base_url('fotomhs/'.$mhs['foto_mhs']) ?>" id="gambar_load" class="img-circle" width="100px" height="100px" alt="">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Photo Dosen</label>
								<input type="file" name="foto_mhs" id="preview_gambar" class="form-control">
							</div>
						</div>
					</div>

		            <div class="modal-footer justify-content-between">
			          <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger btn-flat" data-dismiss="modal">Close</a>
			          <button type="submit" class="btn btn-success btn-flat">Simpan</button>
			        </div>

		        </div>
		        <?php echo form_close() ?>
                <!-- /.card -->
              </div>
        </div>
        <div class="col-sm-3">
    	</div>
    </div>
