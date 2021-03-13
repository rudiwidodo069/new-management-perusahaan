<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>qr-code</title>

    <style>
        #send-qrcode {
            background: rgb(49, 45, 45);
        }

        .container {
            margin: 150px 110px;
        }

        .container .send-qrcode-id-card {
            border: 1px solid #fff;
            background: dimgrey;
            height: 650px;
            width: 500px;
            border-radius: 10px;
        }

        .send-qrcode-card-title h5 {
            text-align: center;
            margin-top: 20px;
            font-family: monospace;
            font-size: 25px;
            color: lightgreen;
        }

        .send-qrcode-card-img img {
            margin-left: 170px;
            margin-top: 10px;
            margin-bottom: 30px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid rgba(40, 190, 120, 0.867);
        }

        .send-qrcode-code {
            margin-top: 20px;
            margin-left: 100px;
        }

        .send-qrcode-card-box {
            margin-top: 50px;
        }

        .send-qrcode-card-box table {
            padding: 0;
            margin-top: -25px;
            text-align: left;
            margin-left: 40px;
            font-family: monospace;
            color: lightgreen;
            font-size: 18px;
        }
    </style>

</head>

<body id="send-qrcode">

    <div class="container">
        <div class="send-qrcode-id-card">
            <div class="send-qrcode-card-title">
                <h5><strong>id card karyawan</strong></h5>
            </div>
            <div class="send-qrcode-card-img">
                <img src="assets/img/<?= $karyawan['foto'] ?>">
            </div>
            <div class="send-qrcode-card-img">
                <img src="assets/qr-code/karyawanID<?= $karyawan['id_karyawan'] ?> .png">
            </div>
            <div class="send-qrcode-card-box">
                <table>
                    <tr>
                        <th>Nama</th>
                        <td>: <?= $karyawan['nama_karyawan'] ?></td>
                    </tr>
                    <tr>
                        <th>ID karyawan</th>
                        <td>: <?= $karyawan['id_karyawan'] ?></td>
                    </tr>
                    <tr>
                        <th>NIK karyawan</th>
                        <td>: <?= $karyawan['nik_karyawan'] ?></td>
                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>: <?= $karyawan['jabatan'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>