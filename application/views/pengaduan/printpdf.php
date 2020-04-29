<!DOCTYPE html>
<html>

<head>
    <title>Report Table</title>
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 100%;
            border-radius: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 120px;
        }

        h2 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5
        }
    </style>
</head>

<body>
    <h2>Data Pengaduan Masyarakat</h2>
    <div id="outtable">
        <table>
            <thead>
                <tr>
                    <th class="short">#</th>
                    <th class="normal">Nama</th>
                    <th class="normal">Kategori</th>
                    <th class="normal">Instansi Terkait</th>
                    <th class="normal">Pengaduan</th>
                    <th class="normal">Tanggal</th>
                    <th class="normal">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->nama_kategori ?></td>
                        <td><?= $data->nama_instansi ?></td>
                        <td><?= $data->isi_pengaduan ?></td>
                        <td><?= $data->tanggal ?></td>
                        <td><?php if ($data->status == 1) {
                                echo "Sedang diproses";
                            } elseif ($data->status == 2) {
                                echo "Sedang ditangani";
                            } else {
                                echo "Selesai";
                            } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>