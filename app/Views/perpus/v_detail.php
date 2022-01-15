<section class="content-header">
    <h1>
        <?= $title  ?>
    </h1>
</section>


<div class="card mx-auto col-md-8 mt-4">
  <div class="alert alert-info">
   <small>
    * Waktu peminjaman buku hanya 30 hari<br/>
    * Set waktu > 30 hari sebelum tanggal sekarang<br/>
    * Denda keterlambatan 500/hari<br/>
   </small>
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
                              <a href="<?= base_url('perpus/pinjam') ?>" class="btn btn-tool"><i class="fas fa-plus">Add</i>
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


                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead>
                            <tr>
                                <th class="text-center">ID Peminjaman</th>
                                <th class="text-center">Nama Mahasiswa</th>
                                <th class="text-center">Judul Buku</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Tanggal Kembali</th>
                                <th class="text-center">Terlambat (Hari)</th>
                                <th class="text-center">Denda</th>
                                <th class="text-center">Nama Petugas</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1;
                               foreach ($perpus as $key => $value) {
                                     $t = date_create($value['kembali']);
                                     $n = date_create(date('Y-m-d'));
                                     $terlambat = date_diff($t, $n);
                                     $hari = $terlambat->format("%R%a");

                                     $denda = $hari * 500;
                                 ?>
                                <tr>
                                    <td class="text-center"><?= $value['id_perpus'] ?></td>
                                    <td class="text-center"><?= $value['nama_mhs'] ?></td>
                                    <td><?= $value['judul_buku'] ?></td>
                                    <td class="text-center"><?= $value['waktu'] ?></td>
                                    <td class="text-center"><?= $value['kembali'] ?></td>
                                    <td class="text-center"><?= $hari ?></td>
                                    <td><?php if ($hari == "-") { ?>
                                        0
                                    <?php }else{ ?><?= $denda ?> <?php } ?></td>
                                    <td class="text-center"><?= $value['nama_petugas'] ?></td>
                                    <td class="text-center"><?= $value['status'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('perpus/tambah_waktu/'. $value['id_perpus']) ?>" class="btn btn-flat btn-success btn-xs"><i class="fa fa-plus"></i> </a>
                                        <a href="<?= base_url('perpus/kembalikan/'. $value['id_perpus']) ?>" class="btn btn-flat btn-success btn-xs"><i class="fa fa-edit"></i> </a>
                                        <a href="<?= base_url('krs/print_krs') ?>" target="_blank" class="btn btn-xs btn-flat btn-success"><i class="fa fa-print"></i> Print </a>
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


