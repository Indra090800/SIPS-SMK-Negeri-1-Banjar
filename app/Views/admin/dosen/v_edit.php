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
		                echo form_open_multipart('dosen/update/'.$dosen['id_dosen']);
		             ?>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Kode Guru</label>
								<input name="kode_dosen" value="<?= $dosen['kode_dosen'] ?>" class="form-control" placeholder="Kode guru">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>NIP</label>
								<input name="nidn" value="<?= $dosen['nidn'] ?>" class="form-control" placeholder="NIDN">
							</div>
						</div>
					</div>

		             <div class="form-group">
		                 <label>Nama Guru</label>
		                 <input name="nama_dosen" value="<?= $dosen['nama_dosen'] ?>" class="form-control" placeholder="Nama Guru">
		             </div>

		             <div class="form-group">
		                 <label>Password</label>
		                 <input name="password" value="<?= $dosen['password'] ?>" class="form-control" placeholder="Password">
		             </div>
					
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<img src="<?= base_url('fotodosen/'. $dosen['foto_dosen']) ?>" id="gambar_load" class="img-circle" width="100px" height="100px" alt="">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Photo</label>
								<input type="file" name="foto_dosen" id="preview_gambar" class="form-control">
							</div>
						</div>
					</div>

		            <div class="modal-footer justify-content-between">
			          <a href="<?= base_url('dosen') ?>" class="btn btn-danger btn-flat" data-dismiss="modal">Close</a>
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
