<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU HRD / <?= $title ?></li>
        </ol>

        <!-- print data karyawan -->
        <div class="print float-right mr-3 mt-3">
            <a href="<?= base_url('hrd_menu_karyawan') ?>" class="btn btn-primary btn-sm mr-3">Kembali</a>
            <a href="" class="btn btn-success btn-sm mr-3">
                <i class="fas fa-fw fa-file-excel"></i>
            </a>
            <a href="" class="btn btn-danger btn-sm">
                <i class="fas fa-fw fa-file-pdf"></i>
            </a>
        </div>
        <!-- Page Content -->
        <h1><?= $title ?></h1>
        <hr>

        <!-- box card -->
        <div class="card">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box-karyawan border ml-4 mt-2 mb-2">
                        <div class="card-karyawan-img text-center">
                            <img src="<?= base_url() ?>assets/img/<?= $karyawan['foto'] ?>" alt="<?= $karyawan['nik_karyawan'] ?>" class="img-thumbnail rounded-circle">
                        </div>
                        <div class="card-karyawan-info ml-5 mt-3">
                            <table border="0" cellpadding="5" cellspacing="0">
                                <tr>
                                    <th>Nama</th>
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
                                    <th>Jenis Kelamin</th>
                                    <td>: <?= $karyawan['jenis_kelamin'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-box-karyawan-info">
                        <table class="table border-0 ">

                            <tr>
                                <th colspan="3">Jabatan</th>
                                <td>: <?= $karyawan['jabatan'] ?></td>
                            </tr>

                            <tr>
                                <th colspan="3">Email</th>
                                <td>: <?= $karyawan['email'] ?></td>
                            </tr>

                            <tr>
                                <th>Tempat Lahir</th>
                                <td>: <?= $karyawan['tempat_lahir'] ?></td>
                                <th>Tanggal Lahir</th>
                                <td>: <?= $karyawan['tgl_lahir'] ?></td>
                            </tr>

                            <tr>
                                <th>Status Pernikahan</th>
                                <td>: <?= $karyawan['status_karyawan'] ?></td>
                                <th>Jumlah Anak</th>
                                <td>: <?= $karyawan['jml_anak'] ?></td>
                            </tr>

                            <tr>
                                <th colspan="3">No Hp</th>
                                <td>: <?= $karyawan['no_hp'] ?></td>
                            </tr>

                            <tr>
                                <th colspan="3">Alamat</th>
                                <td>: <?= $karyawan['alamat'] ?></td>
                            </tr>

                            <tr>
                                <th>Tanggal Masuk</th>
                                <td>: <?= $karyawan['join_date'] ?></td>
                                <th>Tanggal Selesai</th>
                                <td>: <?= $karyawan['end_date'] ?></td>
                            </tr>

                            <tr>
                                <th colspan="3">Status Karyawan</th>
                                <td>: <?= $karyawan['status_kerja'] ?></td>
                            </tr>

                            <tr>
                                <th colspan="3">no rekening</th>
                                <td>: <?= $karyawan['rekening'] ?></td>
                            </tr>

                            <tr>
                                <th colspan="3">gaji pokok</th>
                                <?php if ($gaji['gaji_pokok'] != 0) : ?>
                                    <td>: Rp. <?= number_format($gaji['gaji_pokok']) ?></td>
                                <?php else : ?>
                                    <td>: Rp. <?= number_format($gaji) ?></td>
                                <?php endif; ?>
                            </tr>

                            <tr>
                                <th colspan="3"></th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>