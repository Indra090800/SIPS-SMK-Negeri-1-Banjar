<div class="content-header">
        <div class="container">
            <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Perpustakaan <?= $title ?></h1>
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
                              <?php if (session()->get('level')== 1) { ?>
                              <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add"><i class="fas fa-plus">Add</i>
                              </button>
                            <?php } ?>
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

                    <table class="table table-striped table-bordered table-responsive-md" id="example2">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Edisi</th>
                                <th>ISBN</th>
                                <th>Kolasi</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Tempat Terbit</th>
                                <th>Stok</th>
                                <th>Sumber</th>
                                <?php if (session()->get('level')== 1) { ?>
                                <th class="text-center">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                             $no =1;
                             $db = \Config\Database::connect();
                             foreach ($buku as $key => $value) {
                                $jml = $db->table('tbl_perpus')
                               ->where('id_buku', $value['id_buku'])
                               ->countAllResults();
                              ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['judul_buku'] ?></td>
                                    <td><?= $value['pengarang'] ?></td>
                                    <td><?= $value['edisi'] ?></td>
                                    <td><?= $value['isbn'] ?></td>
                                    <td><?= $value['kolasi'] ?></td>
                                    <td><?= $value['penerbit'] ?></td>
                                    <td><?= $value['tahun_terbit'] ?></td>
                                    <td><?= $value['tempat_terbit'] ?></td>
                                    <td><?php if ($jml == $value['stok']) { ?>
                                        <p class="text-danger">Buku tidak tersedia</p>
                                    <?php }else{ ?>
                                        <?= $jml ?>/<?= $value['stok'] ?>
                                        <?php } ?></td>
                                        <td><?= $value['sumber'] ?></td>
                                    <?php if (session()->get('level')== 1) { ?>
                                        
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_buku'] ?>"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_buku'] ?>"><i class="fas fa-trash"></i></button>
                                    </td>
                                    <?php } ?>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Buku</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('buku/add');
             ?>
             <div class="form-group">
                 <label>Judul Buku</label>
                 <input name="judul_buku" class="form-control" placeholder="Judul Buku" required>
             </div>
             <div class="form-group">
                 <label>Pengarang</label>
                 <input name="pengarang" class="form-control" placeholder="Pengarang" required>
             </div>
             <div class="form-group">
                 <label>Edisi</label>
                 <input name="edisi" class="form-control" placeholder="Edisi" required>
             </div>
             <div class="form-group">
                 <label>ISBN</label>
                 <input name="isbn" class="form-control" placeholder="ISBN" required>
             </div>
             <div class="form-group">
                 <label>Kolasi</label>
                 <input name="kolasi" class="form-control" placeholder="Kolasi" required>
             </div>
             <div class="form-group">
                 <label>Penerbit</label>
                 <input name="penerbit" class="form-control" placeholder="Penerbit" required>
             </div>
             <div class="form-group">
                 <label>Tahun Terbit</label>
                 <input name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" required>
             </div>
             <div class="form-group">
                 <label>Tempat Terbit</label>
                 <input name="tempat_terbit" class="form-control" placeholder="Tempat Terbit" required>
             </div>

             <div class="form-group">
                 <label>Stok Buku</label>
                 <input name="stok" class="form-control" placeholder="Stok Buku" required>
             </div>

             <div class="form-group">
                 <label>Sumber Buku</label>
                 <input name="sumber" class="form-control" placeholder="Stok Buku" required>
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

<!-- /.modal edit -->
<?php foreach ($buku as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_buku'] ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit buku</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <?php 
                echo form_open('buku/edit/'. $value['id_buku']);
             ?>
             <div class="form-group">
                 <label>Judul Buku</label>
                 <input name="judul_buku" class="form-control" value="<?= $value['judul_buku'] ?>" placeholder="Judul Buku" required>
             </div>
             <div class="form-group">
                 <label>Pengarang</label>
                 <input name="pengarang" class="form-control" value="<?= $value['pengarang'] ?>" placeholder="Pengarang" required>
             </div>
             <div class="form-group">
                 <label>Edisi</label>
                 <input name="edisi" class="form-control" value="<?= $value['edisi'] ?>" placeholder="Edisi" required>
             </div>
             <div class="form-group">
                 <label>ISBN</label>
                 <input name="isbn" class="form-control" value="<?= $value['isbn'] ?>" placeholder="ISBN" required>
             </div>
             <div class="form-group">
                 <label>Kolasi</label>
                 <input name="kolasi" class="form-control" value="<?= $value['kolasi'] ?>" placeholder="Kolasi" required>
             </div>
             <div class="form-group">
                 <label>Penerbit</label>
                 <input name="penerbit" class="form-control" value="<?= $value['penerbit'] ?>" placeholder="Penerbit" required>
             </div>
             <div class="form-group">
                 <label>Tahun Terbit</label>
                 <input name="tahun_terbit" class="form-control" value="<?= $value['tahun_terbit'] ?>" placeholder="Tahun Terbit" required>
             </div>
             <div class="form-group">
                 <label>Tempat Terbit</label>
                 <input name="tempat_terbit" class="form-control" value="<?= $value['tempat_terbit'] ?>" placeholder="Tempat Terbit" required>
             </div>
             <div class="form-group">
                 <label>Stok Buku</label>
                 <input name="stok" class="form-control" value="<?= $value['stok'] ?>" placeholder="Stok Buku" required>
             </div>
             <div class="form-group">
                 <label>Sumber Buku</label>
                 <input name="sumber" class="form-control" value="<?= $value['sumber'] ?>" placeholder="Stok Buku" required>
             </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-flat">Update</button>
        </div>
            <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>

<?php foreach ($buku as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_buku'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete buku</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Ingin Menghapus buku <b><?= $value['judul_buku'] ?>...?</b>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Close</button>
          <a href="<?= base_url('buku/delete/'.$value['id_buku']) ?>" class="btn btn-success btn-flat">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<?php } ?>
