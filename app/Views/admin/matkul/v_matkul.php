<section class="content-header">
    <h1>
        <?= $title  ?>
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
                    <table class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th width="30px" class="text-center">No</th>
                                <th>Fakultas</th>
                                <th>Kode Prodi</th>
                                <th>Program Study</th>
                                <th>Mata Pelajaran</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $db  = \Config\Database::connect(); 

                            $no =1;
                             foreach ($prodi as $key => $value) { 
                                $jml = $db->table('tbl_matkul')
                               ->where('id_prodi', $value['id_prodi'])
                               ->countAllResults();
                              ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['jurusan'] ?></td>
                                    <td><?= $value['kode_prodi'] ?></td>
                                    <td><?= $value['prodi'] ?></td>
                                    <td class="text-center">
                                      <p class="label text-center bg-green"><?= $jml ?></p>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('matkul/detail/'. $value['id_prodi']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-th-list"> Mapel</i></a>
                                        
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
