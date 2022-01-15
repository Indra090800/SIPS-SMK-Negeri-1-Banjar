<section class="content-header">
    <h1>
        <?= $title  ?> TA : <?= $ta['ta'] ?>/<?= $ta['semester'] ?>
    </h1>
    <br>
</section>

<div class="row">
    <table class="table table-striped table-bordered table-responsive-md">
        <tr class="bg-gray">
            <th>#</th>
            <th class="text-center">Kode</th>
            <th>Mata Pelajaran</th>
            <th class="text-center">Kelas</th>
            <th class="text-center">Absensi</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($absen as $key => $value) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td class="text-center"><?= $value['kode_matkul'] ?></td>
            <td><?= $value['matkul'] ?></td>
            <td class="text-center"><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></td>
            <td class="text-center">
                <a href="<?= base_url('ldosen/absensi/'. $value['id_jadwal']) ?>" class="btn btn-success btn-sm btn-flat">
                    <i class="fas fa-calendar"></i>  Absensi
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>