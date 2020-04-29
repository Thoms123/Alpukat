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
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3>Data Users</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"> </i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 10%;">Nik</th>
                        <th>Nama</th>
                        <th style="width: 15%;">Alamat</th>
                        <th style="width: 15%;">Tanggal Lahir</th>
                        <th style="width: 15%;">No. Telepon</th>
                        <th style="width: 15%;">Username</th>
                        <th style="width: 15%;">Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= $data->nik ?></td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->alamat ?></td>
                            <td><?= $data->tanggal_lahir ?></td>
                            <td><?= $data->no_tlp ?></td>
                            <td><?= $data->username ?></td>
                            <td><?php if ($data->level == 1) {
                                    echo "Admin";
                                } elseif ($data->level == 2) {
                                    echo "Petugas";
                                } else {
                                    echo "User";
                                } ?></td>
                            <td class="text-center" width="160px">
                                <form action="<?= site_url('user/del') ?>" method="post">
                                    <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"> </i>
                                    </a>
                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                    <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> </i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>