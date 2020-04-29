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
    <div class="box">
        <div class="box-header">

            <div class="pull-right">
                <a href="<?= site_url('pengaduan') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> </i> Back
                </a>
            </div>
            <h3>Barcode Generator <i class="fa fa-barcode"></i></h3>
        </div>
        <div class="box-body">
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->nama, $generator::TYPE_CODE_128)) . '" style="width:250px">';
            ?>
        </div>
        <div style="margin-left: 10px">
            <h3><?= $row->nama ?></h3><br>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3>QR-Code Generator <i class="fa fa-qrcode"></i></h3>
        </div>
        <div class="box-body">
            <?php
            $qrCode = new Endroid\QrCode\QrCode('123');
            $qrCode->writeFile('uploads/qr-code/item-' . $row->nama . '.png');
            ?>
            <img src="<?= base_url('uploads/qr-code/item-' . $row->nama . '.png') ?>" style="width: 150px">
        </div>
        <div style="margin-left: 10px">
            <h3><?= $row->nama ?></h3><br>
        </div>
    </div>

</section>