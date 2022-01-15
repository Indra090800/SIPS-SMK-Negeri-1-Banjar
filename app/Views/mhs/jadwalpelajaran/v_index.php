<section class="content-header">
    <h1>
        <?= $title  ?> <small>Tahun Akademik : <?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?></small>
    </h1>
    <br>
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card bg-gray">
                      
                </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No</th>
                                <th class="text-center">Fakultas</th>
                                <th class="text-center">Kode Prodi</th>
                                <th class="text-center">Program Study</th>
                                <th class="text-center">Jadwal</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $no=1;
                            foreach ($prodi as $key => $value) { ?>
                               <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $value['jurusan'] ?></td>
                                    <td class="text-center"><?= $value['kode_prodi'] ?></td>
                                    <td class="text-center"><?= $value['prodi'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('jadwalpelajaran/detailJadwal/'. $value['id_prodi']) ?>" class="btn btn-success btn-flat btn-sm"><i class="fa fa-calendar"></i></a>
                                    </td>
                               </tr>
                           <?php } ?>
                        </tbody>
                    </table>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
        </div>
    </div>
</div>
