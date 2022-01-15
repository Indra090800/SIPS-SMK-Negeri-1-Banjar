<br>
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="login-box sm-12">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="<?= base_url() ?>/index2.html" class="h1"><b>Login</b> SIAKADME</a>
        </div>
        <div class="card-body">
        <p class="login-box-msg">Silahkan Login</p>
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
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-warning" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }

            if (session()->getFlashdata('sukses')) {
                echo '<div class="alert alert-success" role="alert">';
                echo session()->getFlashdata('sukses');
                echo '</div>';
            }
         ?>

        <?php 
        echo form_open('auth/cek_login');
        ?>
            <div class="input-group mb-3">
            <input name="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <select name="level" class="form-control">
                <option value="">--level--</option>
                <option value="1">1. Admin</option>
                <option value="2">2. Siswa</option>
                <option value="3">3. Guru</option>
            </select>
            </div>
            <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
            </div>
        <?php echo form_close() ?>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <div class="col-sm-4"></div>
</div>
