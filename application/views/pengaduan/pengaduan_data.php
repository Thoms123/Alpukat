<section class="content-header">
    <h1>
        Pengaduan
        <small>Data Pengaduan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Pengaduan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">

            <h3>Data Pengaduan</h3>
            <div class="pull-right">
                <a href="<?= site_url('pengaduan/printpdf') ?>" class="btn btn-default btn-flat">
                    <i class="fa fa-print"> </i> Print
                </a>
                <a href="<?= site_url('pengaduan/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"> </i> Tambah
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 12%;">Nama</th>
                        <th style="width: 15%;">Kategori</th>
                        <th style="width: 15%;">Instansi Terkait</th>
                        <th style="width: 15%;">Pengaduan</th>
                        <th style="width: 10%;">Gambar</th>
                        <th style="width: 12%;">Tanggal</th>
                        <th style="width: 12%;">Status</th>
                        <th style="width: 15%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= $data->nama ?><br><br>
                                <a href="<?= site_url('pengaduan/barcode_qrcode/' . $data->id_pengaduan) ?>" class="btn btn-default btn-xs">
                                    Generate <i class="fa fa-barcode"> </i>
                                </a>
                            </td>
                            <td><?= $data->nama_kategori ?></td>
                            <td><?= $data->nama_instansi ?></td>
                            <td><?= $data->isi_pengaduan ?></td>
                            <td>
                                <?php if ($data->gambar != null) { ?>
                                    <img src="<?= base_url('uploads/product/' . $data->gambar) ?>" style="width: 50px">
                                <?php } ?>
                            </td>
                            <td><?= $data->tanggal ?></td>
                            <td><?php if ($data->status == 1) {
                                    $label = "label label-danger";
                                    $text = " Sedang diproses";
                                    $color = "btn-success";
                                    $icon = "gi gi-ok";
                                } elseif ($data->status == 2) {
                                    $label = "label label-warning";
                                    $text = "Sedang ditangani";
                                    $color = "btn-danger";
                                    $icon = "gi gi-remove";
                                } else {
                                    $label = "label label-success";
                                    $text = "Selesai";
                                    $color = "btn-danger";
                                    $icon = "gi gi-remove";
                                } ?>
                                <span class="<?php echo $label; ?>">
                                    <?php echo $text; ?>
                                </span></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('pengaduan/edit/' . $data->id_pengaduan) ?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"> </i>
                                </a>
                                <a href="<?= site_url('pengaduan/del/' . $data->id_pengaduan) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs">
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