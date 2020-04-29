<section class="content-header">
    <h1>
        Users
        <small>Data User</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">

            <div class="pull-right">
                <a href="<?= site_url('User') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> </i> Back
                </a>
            </div>
            <h3>Edit Users</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php //echo validation_errors(); 
                    ?>
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nik')  ? 'has-error' : null ?>">
                            <label>Nik *</label>
                            <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                            <input type="text" name="nik" value="<?= $this->input->post('nik') ?? $row->nik ?>" class="form-control">
                            <?= form_error('nik') ?>
                        </div>
                        <div class="form-group <?= form_error('nama')  ? 'has-error' : null ?>">
                            <label>Nama *</label>
                            <input type="text" name="nama" value="<?= $this->input->post('nama') ?? $row->nama ?>" class="form-control">
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group">
                            <label>Alamat *</label>
                            <textarea name="alamat" class="form-control"><?= $this->input->post('alamat') ?? $row->alamat ?></textarea>
                            <?= form_error('alamat') ?>
                        </div>
                        <div class="form-group <?= form_error('tanggal_lahir')  ? 'has-error' : null ?>">
                            <label>Tanggal lahir *</label>
                            <input type="date" name="tanggal_lahir" value="<?= $this->input->post('tanggal_lahir') ?? $row->tanggal_lahir ?>" class="form-control">
                            <?= form_error('tanggal_lahir') ?>
                        </div>
                        <div class="form-group <?= form_error('no_tlp')  ? 'has-error' : null ?>">
                            <label>No. Telepon *</label>
                            <input type="number" name="no_tlp" value="<?= $this->input->post('no_tlp') ?? $row->no_tlp ?>" class="form-control">
                            <?= form_error('no_tlp') ?>
                        </div>
                        <div class="form-group <?= form_error('username')  ? 'has-error' : null ?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group <?= form_error('password')  ? 'has-error' : null ?>">
                            <label>Password</label><small> (Biarkan kosong jika tidak ingin diganti)</small>
                            <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group <?= form_error('passconf')  ? 'has-error' : null ?>">
                            <label>Confirm Password</label>
                            <input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>" class="form-control">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group <?= form_error('level')  ? 'has-error' : null ?>">
                            <label>Level *</label>
                            <select name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null ?>>Petugas</option>
                                <option value="3" <?= $level == 3 ? 'selected' : null ?>>User</option>
                            </select>
                            <?= form_error('level') ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>