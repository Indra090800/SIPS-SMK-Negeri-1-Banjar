<section class="content-header">
	<h1>
		<?= $title  ?>
	</h1>
</section>

<div class="container-fluid">
    <div class="row">
    	<div class="col-sm-3">
    	</div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card bg-gray">
                      <div class="card-header">
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
		                echo form_open('prodi/insert');
		             ?>
		             <div class="form-group">
		                 <label>Fakultas</label>
		                 <select name="id_jurusan" class="form-control">
		                 	<option value="">--Pilih Fakultas--</option>
		                 	<?php foreach ($jurusan as $key => $value) { ?>
		                 		<option value="<?= $value['id_jurusan'] ?>"><?= $value['jurusan'] ?></option>
		                 	<?php } ?>
		                 </select>
		             </div>

		             <div class="form-group">
		                 <label>Kode Program Study</label>
		                 <input name="kode_prodi" class="form-control" placeholder="Kode Program Study" >
		             </div>

		             <div class="form-group">
		                 <label>Program Study</label>
		                 <input name="prodi" class="form-control" placeholder="Program Study" >
		             </div>

					 <div class="form-group">
		                 <label>KA Prodi</label>
		                 <select name="ka_prodi" class="form-control">
		                 	<option value="">--Pilih KA Prodi--</option>
		                 	<?php foreach ($dosen as $key => $value) { ?>
		                 		<option value="<?= $value['nama_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
		                 	<?php } ?>
		                 </select>
		             </div>
		             
                </div>
                <div class="modal-footer justify-content-between">
		          <a href="<?= base_url('prodi') ?>" class="btn btn-danger btn-flat">Kembali</a>
		          <button type="submit" class="btn btn-success btn-flat">Simpan</button>
		        </div>

		        <?php echo form_close() ?>
                <!-- /.card -->
              </div>
        </div>
        <div class="col-sm-3">
    	</div>
    </div>
</div>