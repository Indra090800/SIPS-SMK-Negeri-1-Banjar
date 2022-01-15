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
            <th>Program Study</th>
            <th>Hari</th>
            <th>Kode Mapel</th>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Ruangan</th>
            <th>Guru</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($jadwal as $key => $value) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['prodi'] ?></td>
            <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
            <td><?= $value['kode_matkul'] ?></td>
            <td><?= $value['matkul'] ?></td>
            <td><?= $value['nama_kelas'] ?> / <?= $value['tahun_angkatan'] ?></td>
            <td><?= $value['ruangan'] ?></td>
            <td><?= $value['nama_dosen'] ?></td>
        </tr>
        <?php } ?>
    </table>
</div>