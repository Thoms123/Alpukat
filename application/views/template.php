<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ALPUKAT | Aplikasi Laporan Pengaduan Untuk Masyarakat</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets//dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets//dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <a href="<?= base_url() ?>assets//index2.html" class="logo">
                <span class="logo-lg"><b>ALPUKAT</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>assets//dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php if ($this->fungsi->user_login()->level == 1) {
                                                            echo "Admin";
                                                        } elseif ($this->fungsi->user_login()->level == 2) {
                                                            echo "Petugas";
                                                        } else {
                                                            echo "User";
                                                        } ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?= base_url() ?>assets//dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?= ucfirst($this->fungsi->user_login()->nama) ?>
                                        <small><?= ucfirst($this->fungsi->user_login()->alamat) ?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>assets//dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= ucfirst($this->fungsi->user_login()->username) ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('dashboard') ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'pengaduan' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('pengaduan') ?>">
                            <i class="fa fa-file-text-o"></i> <span>Pengaduan</span>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('level') == 1 | $this->session->userdata('level') == 2) { ?>
                        <li <?= $this->uri->segment(1) == 'kategori' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                            <a href="<?= site_url('kategori') ?>">
                                <i class="fa fa-bookmark"></i>
                                <span>Kategori</span>
                            </a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'instansi' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                            <a href="<?= site_url('instansi') ?>">
                                <i class="fa fa-university"></i>
                                <span>Instansi Terkait</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('level') == 1) { ?>
                        <li class="header">SETTINGS</li>
                        <li <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                            <a href="<?= base_url('user') ?>"><i class="fa fa-user"></i>
                                <span>Users</span></a>
                        </li>
                    <?php } ?>
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">

            <?= $contents ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2020 <a href="">ALPUKAT</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <script src="<?= base_url() ?>assets//bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets//bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets//bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>assets//bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?= base_url() ?>assets//dist/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>assets//dist/js/demo.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>
</body>

</html>