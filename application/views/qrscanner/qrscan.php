<!DOCTYPE html>
<html>

<head>
    <title>scann your qr code</title>
    <!-- css sb-admin -->
    <link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet">
    <!-- coustum css sb-admin -->
    <link href="<?= base_url() ?>assets/css/sb-admin.css" rel="stylesheet">
    <!-- fontawsome -->
    <link href="<?= base_url() ?>assets/dist/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/sweetalert2/sweetalert2.min.css">
    <!-- jquery -->
    <script src="<?= base_url() ?>assets/dist/jquery/jquery.min.js"></script>
    <!-- scanner -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body id="qrcode">

    <div class="row">
        <div class="col-md-5 text-white-50">
            <div class="tanggal">
                <h1 id="tanggal" onload="getDate()"></h1>
            </div>
            <div class="jam">
                <h1 id="jam" onload="startTime()"></h1>
            </div>
            <div class="video">
                <video id="preview"></video>
            </div>
            <div class="text">
                <h3>selamat datang silahkan scan code anda !</h3>
            </div>
        </div>
        <div class="col-md-7 text-center">
            <div class="box">
                <div class="box-header">
                    <h3>ER WE COMPANY</h3>
                </div>
                <div class="id-card">
                    <div class="card-title">
                        <h5><strong>id card karyawan</strong></h5>
                    </div>
                    <div class="card-img">
                        <img src="<?= base_url() ?>assets/img/avatar.jpg" class="rounded-circle">
                    </div>
                    <div class="card-box">
                        <table>
                            <tr>
                                <th>Nama</th>
                                <td id="nama">: -------------------</td>
                            </tr>
                            <tr>
                                <th>ID karyawan</th>
                                <td id="id">: -------------------</td>
                            </tr>
                            <tr>
                                <th>NIK karyawan</th>
                                <td id="nik">: -------------------</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td id="jabatan">: -------------------</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div id="box-footer" class="box-footer mt-n5">

                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/dist/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function() {
            startTime();

            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                };
                return i;
            }

            getDate();

            function getDate() {
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];

                var date = new Date();
                var day = date.getDate();
                var month = date.getMonth();
                var thisDay = date.getDay(),
                    thisDay = myDays[thisDay];
                var yy = date.getYear();
                var year = (yy < 1000) ? yy + 1900 : yy;

                document.getElementById('tanggal').innerHTML = (thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
            }

            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            scanner.addListener('scan', function(content) {
                let nik = content;
                $.ajax({
                    url: "absensi/get_data_karyawan",
                    type: "post",
                    data: {
                        nik: nik
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            $('.card-img').html('<img src="<?= base_url() ?>assets/img/' + data.foto + '" class="rounded-circle">');
                            $('#nama').html('<td>: ' + data.nama + '</td>');
                            $('#id').html('<td>: ' + data.id + '</td>');
                            $('#nik').html('<td>: ' + data.nik + '</td>');
                            $('#jabatan').html('<td>: ' + data.jabatan + '</td>');
                            $('#box-footer').html('<p>' + data.status_kerja + '</p>');
                            setTimeout(function() {
                                $('.card-img').html('<img src="<?= base_url() ?>assets/img/avatar.jpg" class="rounded-circle">');
                                $('#nama').html(': -------------------');
                                $('#id').html(': -------------------');
                                $('#nik').html(': -------------------');
                                $('#jabatan').html(': -------------------');
                                $('#box-footer p').hide();
                            }, 10000);
                            swal.fire({
                                text: "selamat data " + data.nama + "",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        if (data.invalid) {
                            swal.fire({
                                text: "" + data.pesan + "",
                                icon: "warning",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                });
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
        });
    </script>

</body>

</html>