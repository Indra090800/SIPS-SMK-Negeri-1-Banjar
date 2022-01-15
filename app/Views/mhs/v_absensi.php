<section class="content-header">
    <h1>
        <?= $title  ?> <small>Tahun Akademik : <?= $ta_aktif['ta'] ?>/<?= $ta_aktif['semester'] ?></small>
    </h1>
    <br>
</section>

<div class="row">
        <table class="table table-striped table-bordered table-responsive-md">

            <tr class="bg-gray">
                <th rowspan="2" class="text-center">#</th>
                <th rowspan="2" class="text-center">Kode</th>
                <th rowspan="2" class="text-center">Mata Kuliah</th>
                <th colspan="16" class="text-center">Pertemuan</th>
                <th rowspan="2" class="text-center">%</th>
            </tr>
            <tr class="bg-gray">
                <th class="text-center">1</th>
                <th class="text-center">2</th>
                <th class="text-center">3</th>
                <th class="text-center">4</th>
                <th class="text-center">5</th>
                <th class="text-center">6</th>
                <th class="text-center">7</th>
                <th class="text-center">UTS</th>
                <th class="text-center">8</th>
                <th class="text-center">9</th>
                <th class="text-center">10</th>
                <th class="text-center">11</th>
                <th class="text-center">12</th>
                <th class="text-center">13</th>
                <th class="text-center">14</th>
                <th class="text-center">UAS</th>
            </tr>

                <?php 
                $no=1;
                $sks = 0;
                foreach ($data_matkul as $key => $value) { 
                    $sks = $sks + $value['sks'];
                ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['kode_matkul'] ?></td>
                        <td><?= $value['matkul'] ?></td>
                        <td class="text-center"><?php if ($value['p1'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p1'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p1'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p2'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p2'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p2'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p3'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p3'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p3'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p4'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p4'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p4'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p5'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p5'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p5'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p6'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p6'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p6'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p7'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p7'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p7'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['puts'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['puts'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['puts'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p8'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p8'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p8'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p9'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p9'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p9'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p10'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p10'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p10'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p11'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p11'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p11'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p12'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p12'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p12'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p13'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p13'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p13'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['p14'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['p14'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['p14'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center"><?php if ($value['puas'] == 0) {
                            echo '<i class="fas fa-times text-danger"></i>';
                        }elseif ($value['puas'] == 1) {
                            echo '<i class="fas fa-info text-warning"></i>';
                        }elseif ($value['puas'] == 2) {
                            echo '<i class="fas fa-check text-success"></i>';
                        } ?></td>
                        <td class="text-center">
                        <?php 
                        $absensi = (
                            $value['p1'] +
                            $value['p2'] +
                            $value['p3'] +
                            $value['p4'] +
                            $value['p5'] +
                            $value['p6'] +
                            $value['p7'] +
                            $value['puts'] +
                            $value['p8'] +
                            $value['p9'] +
                            $value['p10'] +
                            $value['p11'] +
                            $value['p12'] +
                            $value['p13'] +
                            $value['p14'] +
                            $value['puas']) / 32 * 100;  
                        echo number_format($absensi, 0) . ' %';
                        ?>
                        </td>
                    </tr>
                <?php } ?>
        </table>
</div>