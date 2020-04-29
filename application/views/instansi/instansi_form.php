<section class="content-header">
    <h1>
        Instansi
        <small>instansi terkait</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Instansi</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">

            <div class="pull-right">
                <a href="<?= site_url('instansi') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> </i> Back
                </a>
            </div>
            <h3><?= ucfirst($page) ?> Instansi</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php //echo validation_errors(); 
                    ?>
                    <form action="<?= site_url('instansi/process') ?>" method="post">
                        <div class="form-group">
                            <label>Nama Instansi *</label>
                            <input type="hidden" name="id" value="<?= $row->instansi_id ?>">
                            <input type="text" name="nama_instansi" value="<?= $row->nama_instansi ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>