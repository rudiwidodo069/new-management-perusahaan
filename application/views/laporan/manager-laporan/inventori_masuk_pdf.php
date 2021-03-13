<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventori masuk</title>

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

        .footer hr {
            height: 3px;
            background: #aaaa;
        }

        .vendor {
            margin-top: 80px;
        }

        .vendor h3 {
            font-size: 16px;
            margin-bottom: 80px;
            margin-left: 20px;
        }

        .vendor h5 {
            font-size: 14px;
            margin-left: 20px;
        }

        .penerima {
            float: right;
            margin-top: -148px;
        }

        .penerima h3 {
            font-size: 16px;
            margin-bottom: 80px;
            margin-right: 20px;
        }

        .penerima h5 {
            font-size: 14px;
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box-title">
            <h1>laporan inventori masuk</h1>
            <h3>-- <?= $detail['lokasi_cabang'] ?> --</h3>
            <hr>
        </div>
        <div class="content">
            <table cellpadding="10" cellspacing="0" width="100%">
                <tr>
                    <th>Nama Barang</th>
                    <td>: <?= $detail['nama_kategori'] ?></td>
                </tr>
                <tr>
                    <th>Kode Barang</th>
                    <td>: <?= $detail['kode_barang'] ?></td>
                </tr>
                <tr>
                    <th>Vendor</th>
                    <td>: <?= $detail['nama_pt'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>: <?= $detail['alamat_pt'] ?></td>
                </tr>
                <tr>
                    <th>Penerima</th>
                    <td>: <?= $detail['nama_karyawan'] ?></td>
                </tr>
                <tr>
                    <th>ID Karyawan</th>
                    <td>: <?= $detail['id_karyawan'] ?></td>
                </tr>
                <tr>
                    <th>Cabang</th>
                    <td>: <?= $detail['lokasi_cabang'] ?></td>
                </tr>
                <tr>
                    <th>Barang Masuk</th>
                    <td>: <?= $detail['jumlah_masuk'] ?></td>
                </tr>
                <tr>
                    <th>Harga Venndor</th>
                    <td>: Rp. <?= number_format($detail['harga_vendor']) ?></td>
                </tr>
                <tr>
                    <th>Harga Total</th>
                    <td>: Rp. <?= number_format($detail['total_harga']) ?></td>
                </tr>
                <tr>
                    <th>Tanggal Masuk</th>
                    <td>: <?= $detail['tanggal_masuk'] ?></td>
                </tr>
                <tr>
                    <th>Tangal EXP</th>
                    <td>: <?= $detail['tanggal_exp'] ?></td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>: <?= $detail['keterangan'] ?></td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <hr>
            <div class="vendor">
                <h3>nama pengirim</h3>
                <h5><?= $detail['nama_pt'] ?></h5>
            </div>
            <div class="penerima">
                <h3>nama penerima</h3>
                <h5>Er-We Company Cabang <?= $detail['lokasi_cabang'] ?></h5>
            </div>
        </div>
    </div>
</body>

</html>