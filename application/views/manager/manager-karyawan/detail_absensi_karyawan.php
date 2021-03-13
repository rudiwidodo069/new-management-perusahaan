<div id="content-wrapper">

    <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="text-center">Detail Absensi Karyawan Cabang <br> --<?= $karyawan_cabang ?>--</h3>
            </div>
            <div class="card-body">
                <div class="calender" id="calender">
                    <input type="hidden" name="id_karyawan" id="id_karyawan" value="<?= $karyawan['id_karyawan'] ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="karyawan-info text-center">
                                <img src="<?= base_url('assets/img/' . $karyawan['foto']) ?>" class="img-thumbnail rounded-circle">
                                <table cellpadding="8" class="table text-left">
                                    <tr>
                                        <th>Nama Karyawan</th>
                                        <td>: <?= $karyawan['nama_karyawan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>ID Karyawan</th>
                                        <td>: <?= $karyawan['id_karyawan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIK Karyawan</th>
                                        <td>: <?= $karyawan['nik_karyawan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td>: <?= $karyawan['jabatan'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Kerja</th>
                                        <td>: <?= $karyawan['status_kerja'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="schedule">
                                <div class="tahun">
                                    <div class="prev" id="prev">
                                        <span>&#10094;</span>
                                    </div>
                                    <div class="info">
                                        <h3 id="bulan">februari</h3>
                                        <!-- <p id="date_str">selasa febuari 2020</p> -->
                                    </div>
                                    <div class="next" id="next">
                                        <span>&#10095;</span>
                                    </div>
                                </div>
                                <div class="hari text-center">
                                    <div>minggu</div>
                                    <div>senin</div>
                                    <div>selasa</div>
                                    <div>rabu</div>
                                    <div>kamis</div>
                                    <div>jumat</div>
                                    <div>sabtu</div>
                                </div>
                                <div class="tanggal text-dark text-center" id="tanggal">
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="keterangan mt-3">
                    <h3>keterangan kerja karyawan</h3>
                    <div class="masuk mt-3">
                        <span class="box-masuk mr-2 bg-primary"></span>
                        <span class="tx">keterangan masuk</span>
                    </div>
                    <div class="masuk mt-3">
                        <span class="box-masuk mr-2 bg-warning"></span>
                        <span class="tx">keterangan libur</span>
                    </div>
                    <div class="masuk mt-3">
                        <span class="box-masuk mr-2 bg-danger"></span>
                        <span class="tx">keterangan alfa</span>
                    </div>
                    <div class="masuk mt-3">
                        <span class="box-masuk mr-2 bg-success"></span>
                        <span class="tx">keterangan bolos</span>
                    </div>
                </div>
                <!-- end card body -->
            </div>
        </div>
    </div>

    <!-- myscript -->
    <script>
        $(document).ready(function() {
            tanggal();
            let dt = new Date();

            function tanggal() {
                let id_karyawan = $('#id_karyawan').val();
                $.ajax({
                    url: "<?= site_url('manager_menu_karyawan/get_data_karyawan') ?>",
                    type: "get",
                    data: {
                        id_karyawan: id_karyawan
                    },
                    dataType: "json",
                    success: function(data) {
                        let dt = new Date();

                        // set tanggal awal
                        dt.setDate(1)

                        // set tanggal akhir
                        let endDate = new Date(
                            dt.getFullYear(),
                            dt.getMonth() + 1,
                            0
                        ).getDate();

                        // set tanggal kemarin
                        let prevDate = new Date(
                            dt.getFullYear(),
                            dt.getMonth(),
                            0
                        ).getDate();

                        let bulans = [
                            "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEBTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"
                        ]

                        let bulan = bulans[dt.getMonth()];

                        document.getElementById('bulan').innerHTML = bulan;

                        // tanggal mulai
                        let tanggal = '';
                        for (let j = dt.getDay(); j > 0; j--) {
                            tanggal += '<div class="prev_date">' + (prevDate - j + 1) + '</div>';
                        }

                        // tanggal selesai
                        let x = 1
                        for (let i = 1; i <= endDate; i++) {
                            for (let x = i - 1; x < data.length; x++) {
                                if (data[x].jadwal_status == 'LIBUR') {
                                    tanggal += '<div class="bg-warning">' + (x + 1) + '</div>';
                                }
                                if (data[x].jadwal_status == 'ALFA') {
                                    tanggal += '<div class="bg-danger">' + (x + 1) + '</div>';
                                }
                                if (data[x].jadwal_status == 'MASUK') {
                                    tanggal += '<div class="bg-primary">' + (x + 1) + '</div>';
                                }
                                if (data[x].jadwal_status == 'BOLOS') {
                                    tanggal += '<div class="bg-success">' + (x + 1) + '</div>'
                                }
                                if (data[x].jadwal_status == '') {
                                    tanggal += '<div>' + (x + 1) + '</div>';
                                }
                                // break;
                            }
                            // tanggal += '<div>' + i + '</div>';
                            break;
                        }
                        document.getElementsByClassName('tanggal')[0].innerHTML = tanggal;
                    }
                });
            }

            $('#prev').on('click', function() {
                dt.setMonth(dt.getMonth() - 1);
                tanggal();
            });

            $('#next').on('click', function() {
                dt.setMonth(dt.getMonth() + 1);
                tanggal();
            });

        });
    </script>