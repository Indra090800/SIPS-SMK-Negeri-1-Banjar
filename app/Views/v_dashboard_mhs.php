<br>
<div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-gray card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                    <?php if ($mhs['foto_mhs'] == "") { ?>
                        <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('fotodosen/default.png') ?>"
                       alt="User profile picture" id="gambar_load">
                    <?php }elseif($mhs['foto_mhs'] != "") { ?>
                        <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('fotomhs/'. $mhs['foto_mhs']) ?>"
                       alt="User profile picture" id="gambar_load">
                    <?php } ?>
                  
                </div>

                <h3 class="profile-username text-center"><?= $mhs['nama_mhs'] ?></h3>
                <p class="text-muted text-center"><small><?= $mhs['nim'] ?></small><br><?= $mhs['prodi'] ?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-gray">
              <div class="card-header">
                <h3 class="card-title">Tentang Saya</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Tahun Akademik</strong>
                <p class="text-muted">
                 <?= $ta['ta'] ?>/<?= $ta['semester'] ?>
                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>ID Perpus</strong>
                <p class="text-muted">
                    <?= $mhs['id_anggota'] ?>
                </p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted"><?= $mhs['alamat_siswa'] ?></p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>Kelas</strong>
                <p class="text-muted">
                    <?= $mhs['nama_kelas'] ?>
                </p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Wali Kelas</strong>
                <p class="text-muted"><?= $mhs['nama_dosen'] ?></p>
                <hr>
                <strong><i class="fas fa-phone mr-1"></i> No Hp</strong>
                <p class="text-muted"><?= $mhs['no_hp_siswa'] ?></p>
              </div> 
                <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $mhs['id_mhs'] ?>"><i class="fas fa-edit"></i></button>      
            </div>
        </div>

        <div class="col-md-9">
    <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
                <h2><strong>SIPS</strong> SMK NEGERI 1 BANJAR</h2>
                <p class="lead mb-5">Silahkan bila ada keluhan bisa menghubungi kami, melalui email atau<br>
                <b>Phone: +62 896-6336-6710</b>
                </p>
            </div>
            </div>
            <div class="col-7">
                <?php 
                    echo form_open('mhs/kirim_pesan');
                 ?>
                <div class="form-group">
                    <label for="inputName">Nama</label>
                    <input type="text" name="nama" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputEmail">E-Mail</label>
                    <input type="email" name="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputSubject">Subjek</label>
                    <input type="text" name="subject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage">Isi Pesan</label>
                    <textarea name="isi" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Send message">
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="edit<?= $mhs['id_mhs'] ?>">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
            
            <div class="row">
                <div class="col-md-7">
                    <h4 class="card card-info bg-gray"> Update Profil <?= $mhs['nama_mhs'] ?></h4>
                    <?php 
                        echo form_open_multipart('mhs/edit/'.$mhs['id_mhs']);
                     ?>
                    <p class="text-center">
                        <?php if ($mhs['foto_mhs'] == null) { ?>
                        <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('fotodosen/default.png') ?>"
                       alt="User profile picture" id="gambar_load">
                        <?php }else { ?>
                            <img class="profile-user-img img-fluid img-circle"
                           src="<?= base_url('fotomhs/'. session()->get('photo')) ?> ?>"
                           alt="User profile picture" id="gambar_load">
                        <?php } ?>
                    </p>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label text-right">Alamat <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="alamat_siswa"  class="form-control" placeholder="Masukkan Alamat" value="<?= $mhs['alamat_siswa'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label text-right">No Hp <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="no_hp_siswa" class="form-control" placeholder="No Hp" value="<?= $mhs['no_hp_siswa'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label text-right">Wali Kelas <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?= $mhs['nama_dosen'] ?>"  readonly disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label text-right">ID Perpus <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="id_anggota"  class="form-control" placeholder="Isi Dengan NIS Anda..">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label text-right">Upload Foto/Logo</label>
                        <div class="col-sm-9">
                            <input type="file" name="foto_mhs" id="preview_gambar" class="form-control" placeholder="gambar" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label text-right"></label>
                        <div class="col-sm-9">
                            <div class="form-group btn-group text-right">
                                <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Simpan Data</button>
                                <button type="reset" class="btn btn-info btn-flat"><i class="fa fa-cut"></i> Reset</button>
                                <a href="<?php echo base_url('admin/dasbor') ?>" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fa fa-times"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <h4 class="card card-info bg-gray"> Ganti Password</h4>
                    

                    <div class="form-group row">
                        <label class="col-sm-4 control-label text-right">Password baru <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="password" name="password" value="<?= $mhs['password'] ?>" class="form-control" placeholder="Password baru"  minlength="5" maxlength="32">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 control-label text-right"></label>
                        <div class="col-sm-8">
                            <div class="form-group btn-group text-right">
                                <button type="submit" name="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Ganti Password</button>
                                <button type="reset" name="reset" class="btn btn-info btn-flat"><i class="fa fa-cut"></i> Reset</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
            
        </div>
            
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
</div>