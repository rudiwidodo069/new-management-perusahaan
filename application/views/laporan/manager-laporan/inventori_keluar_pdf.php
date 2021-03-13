<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventori keluar</title>

    <style>
        body {
            font-family: monospace;
        }

        .box-title {
            text-align: center;
        }

        .box-title h1 {
            font-size: 30px;
        }

        .box-title h3 {
            font-size: 25px;
        }

        .box-title hr {
            height: 3px;
            background: #aaaa;
        }

        .content table {
            text-align: left;
            border: 2px solid #aaa;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box-title">
            <h1>laporan inventori keluar</h1>
            <h3>-- <?= $detail['lokasi_cabang'] ?> --</h3>
            <hr>
        </div>
        <div class="content">
            <table cellpadding="20" cellspacing="0" width="100%">
                <tr>
                    <th>Nama Barang</th>
                    <td>: <?= $detail['nama_kategori'] ?></td>
                </tr>
                <tr>
                    <th>Kode Barang</th>
                    <td>: <?= $detail['kode_barang'] ?></td>
                </tr>
                <tr>
                    <th>Jumlah Keluar</th>
                    <td>: <?= $detail['jumlah_keluar'] ?></td>
                </tr>
                <tr>
                    <th>Tanggal Keluar</th>
                    <td>: <?= $detail['tanggal_keluar'] ?></td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>: <?= $detail['keterangan'] ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>