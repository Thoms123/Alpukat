<section class="content-header">
    <h1>
        kategori
        <small>kategori</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">kategori</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3>Data kategori</h3>
            <div class="pull-right">
                <a href="<?= site_url('kategori/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"> </i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 70%;">Nama kategori</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td style="width:10%;"><?= $no++; ?>.</td>
                            <td><?= $data->nama_kategori ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('kategori/edit/' . $data->kategori_id) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"> </i>
                                </a>
                                <a href="<?= site_url('kategori/del/' . $data->kategori_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> </i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>