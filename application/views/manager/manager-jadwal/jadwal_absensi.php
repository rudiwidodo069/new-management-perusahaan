<?php date_default_timezone_set('Asia/Jakarta'); ?>

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU MANAGER / <?= $title ?></li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                jadwal absensi karyawan
            </div>
            <div class="card-body">
                <h3 class="text-center">-- <?= $karyawan_cabang ?> --</h3>
                <button type="button" class="btn btn-success btn-sm mt-n4 mb-4 mr-3" data-toggle="modal" data-target="#aktivasi">aktivasi jadwal mingguan</button>
                <a href="<?= site_url('manager_menu_jadwal_absensi/form_insert_jadwal') ?>" class="btn btn-primary btn-sm  mt-n4 mb-4 float-right">insert jadwal</a>
                <table class="table table-bordered table-sm table-hover" width="100%">
                    <thead class="text-center">
                        <tr>
                            <th>nama karyawan</th>
                            <th colspan="2">senin</th>
                            <th colspan="2">selasa</th>
                            <th colspan="2">rabu</th>
                            <th colspan="2">kamis</th>
                            <th colspan="2">jum'at</th>
                            <th colspan="2">sabtu</th>
                            <th colspan="2">minggu</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($jadwal_absensi as $absensi) : ?>
                            <tr>
                                <!-- nama karyawan -->
                                <td><?= $absensi['nama_karyawan'] ?></td>

                                <!-- senin -->
                                <?php if ($absensi['senin_masuk'] != '00:00:00' && $absensi['senin_keluar'] != '00:00:00') : ?>
                                    <td><?= $absensi['senin_masuk'] ?></td>
                                    <td><?= $absensi['senin_keluar'] ?></td>
                                <?php else : ?>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                <?php endif; ?>

                                <!-- selasa -->
                                <?php if ($absensi['selasa_masuk'] != '00:00:00' && $absensi['selasa_keluar'] != '00:00:00') : ?>
                                    <td><?= $absensi['selasa_masuk'] ?></td>
                                    <td><?= $absensi['selasa_keluar'] ?></td>
                                <?php else : ?>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                <?php endif; ?>

                                <!-- rabu -->
                                <?php if ($absensi['rabu_masuk'] != '00:00:00' && $absensi['rabu_keluar'] != '00:00:00') : ?>
                                    <td><?= $absensi['rabu_masuk'] ?></td>
                                    <td><?= $absensi['rabu_keluar'] ?></td>
                                <?php else : ?>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                <?php endif; ?>

                                <!-- kamis -->
                                <?php if ($absensi['kamis_masuk'] != '00:00:00' && $absensi['kamis_keluar'] != '00:00:00') : ?>
                                    <td><?= $absensi['kamis_masuk'] ?></td>
                                    <td><?= $absensi['kamis_keluar'] ?></td>
                                <?php else : ?>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                <?php endif; ?>

                                <!-- jumat -->
                                <?php if ($absensi['jumat_masuk'] != '00:00:00' && $absensi['jumat_keluar'] != '00:00:00') : ?>
                                    <td><?= $absensi['jumat_masuk'] ?></td>
                                    <td><?= $absensi['jumat_keluar'] ?></td>
                                <?php else : ?>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                <?php endif; ?>

                                <!-- sabtu -->
                                <?php if ($absensi['sabtu_masuk'] != '00:00:00' && $absensi['sabtu_keluar'] != '00:00:00') : ?>
                                    <td><?= $absensi['sabtu_masuk'] ?></td>
                                    <td><?= $absensi['sabtu_keluar'] ?></td>
                                <?php else : ?>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                <?php endif; ?>

                                <!-- minggu -->
                                <?php if ($absensi['minggu_masuk'] != '00:00:00' && $absensi['minggu_keluar'] != '00:00:00') : ?>
                                    <td><?= $absensi['minggu_masuk'] ?></td>
                                    <td><?= $absensi['minggu_keluar'] ?></td>
                                <?php else : ?>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                    <td class="bg-danger text-white"><?= $absensi['jadwal_status'] ?></td>
                                <?php endif; ?>

                                <!-- action -->
                                <td>
                                    <a href="<?= site_url('manager_menu_jadwal_absensi/form_update_jadwal' . '?schedule=' . $absensi['kode_schedule'] . '&karyawan=' . $absensi['id_karyawan']) ?>" class="badge badge-warning">update</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="modal" id="aktivasi">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>data jadwal mingguan mingguan</h3>
                            </div>
                            <div class="modal-body">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>tanggal</th>
                                            <th>tanggal</th>
                                            <th>tanggal</th>
                                            <th>tanggal</th>
                                            <th>tanggal</th>
                                            <th>tanggal</th>
                                            <th>tanggal</th>
                                            <th>aktivasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($get_tanggal as $tgl) : ?>
                                            <tr>
                                                <td><?= $tgl['tgl_senin'] ?></td>
                                                <td><?= $tgl['tgl_selasa'] ?></td>
                                                <td><?= $tgl['tgl_rabu'] ?></td>
                                                <td><?= $tgl['tgl_kamis'] ?></td>
                                                <td><?= $tgl['tgl_jumat'] ?></td>
                                                <td><?= $tgl['tgl_sabtu'] ?></td>
                                                <td><?= $tgl['tgl_minggu'] ?></td>
                                                <td>
                                                    <button type="button" class="badge badge-primary" id="aktif" data-id_aktif="<?= $tgl['id_scedhule'] ?>">aktif</button>
                                                    <button type="button" class="badge badge-warning" id="non-aktif" data-id_non="<?= $tgl['id_scedhule'] ?>">non-aktif</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#aktif', function() {
            let id_tgl = $(this).data('id_aktif');
            let aktivasi = "ACTIVE";
            $.ajax({
                url: "<?= site_url('manager_menu_jadwal_absensi/aktivasi') ?>",
                type: "post",
                data: {
                    id_aktif: id_tgl,
                    aktivasi: aktivasi
                },
                dataType: "json",
                success: function(data) {
                    swal.fire({
                        text: "" + data.pesan + "",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.href = "<?= site_url('manager_menu_jadwal_absensi') ?>";
                }
            });
        });

        $(document).on('click', '#non-aktif', function() {
            let id_tgl = $(this).data('id_non');
            let aktivasi = "NON-ACTIVE";
            $.ajax({
                url: "<?= site_url('manager_menu_jadwal_absensi/aktivasi') ?>",
                type: "post",
                data: {
                    id_aktif: id_tgl,
                    aktivasi: aktivasi
                },
                dataType: "json",
                success: function(data) {
                    swal.fire({
                        text: "" + data.pesan + "",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    location.href = "<?= site_url('manager_menu_jadwal_absensi') ?>";
                }
            });
        });
    });
</script>