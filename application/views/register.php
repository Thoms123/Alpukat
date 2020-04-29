<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> ALPUKAT | Registration </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Alpukat</b> | Registration</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new account</p>

            <form action="<?= base_url('auth/register'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="number" name="nik" class="form-control" placeholder="N I K" value="<?= set_value('nik') ?>">
                    <span class="glyphicon glyphicon-link form-control-feedback"></span>
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="fullname" class="form-control" placeholder="F u l l n a m e" value="<?= set_value('fullname') ?>">
                    <span class="glyphicon glyphicon-pushpin form-control-feedback"></span>
                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <textarea name="alamat" class="form-control" placeholder="A d d r e s s"><?= set_value('alamat') ?></textarea>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="date" name="tgl_lahir" class="form-control" value="<?= set_value('tgl_lahir') ?>">
                    <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="number" name="no_tlp" class="form-control" placeholder="P h o n e" value="<?= set_value('no_tlp') ?>">
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="U s e r n a m e" value="<?= set_value('username') ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password1" class="form-control" placeholder="P a s s w o r d">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password2" class="form-control" placeholder="R e t y p e  p a s s w o r d">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            <a href="<?= base_url('auth/login') ?>" class="text-center">Already have an account? Sign In</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url() ?>/assets/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>