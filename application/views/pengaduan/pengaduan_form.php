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

            <div class="pull-right">
                <a href="<?= site_url('pengaduan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> </i> Back
                </a>
            </div>
            <h3><?= ucfirst($page) ?> Items</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?= form_open_multipart('pengaduan/process') ?>
                    <div class="form-group">
                        <label>Kategori *</label>
                        <input type="hidden" name="id" value="<?= $row->id_pengaduan ?>">
                        <input type="hidden" name="nama" value="<?= $this->fungsi->user_login()->user_id ?>">
                        <select name="kategori" class="form-control">
                            <option value=""> -- Pilih -- </option>
                            <?php foreach ($kategori->result() as $key => $data) { ?>
                                <option value="<?= $data->kategori_id ?>" <?= $data->kategori_id == $row->kategori_id ? "selected" : null ?>><?= $data->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Instansi Terkait *</label>
                        <select name="instansi" class="form-control">
                            <option value=""> -- Pilih -- </option>
                            <?php foreach ($instansi->result() as $key => $data) { ?>
                                <option value="<?= $data->instansi_id ?>" <?= $data->instansi_id == $row->instansi_id ? "selected" : null ?>><?= $data->nama_instansi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Isi Pengaduan *</label>
                        <textarea class="form-control" name="isi_pengaduan" required><?= $row->isi_pengaduan ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal *</label>
                        <input type="date" name="tanggal" value="<?= $row->tanggal ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gambar *</label>
                        <?php if ($page == 'edit') {
                            if ($row->gambar != null) { ?>
                                <div style="margin-bottom: 10px;">
                                    <img src="<?= base_url('uploads/product/' . $row->gambar) ?>" style="width: 80px">
                                </div>
                        <?php
                            }
                        } ?>
                        <input type="file" name="gambar" class="form-control">
                        <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                    </div>
                    <?php if ($this->session->userdata('level') == 1 | $this->session->userdata('level') == 2) { ?>
                        <label>Status *</label>
                        <select name="status" class="form-control">
                            <?php $status = $this->input->post('status') ? $this->input->post('status') : $row->status ?>
                            <option value="1">Sedang diproses</option>
                            <option value="2" <?= $status == 2 ? 'selected' : null ?>>Sedang ditangani</option>
                            <option value="3" <?= $status == 3 ? 'selected' : null ?>>Selesai</option>
                        </select><br><br>
                    <?php } ?>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Save
                        </button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

</section>