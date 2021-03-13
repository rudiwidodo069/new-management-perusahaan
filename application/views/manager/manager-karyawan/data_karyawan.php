<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU MANAGER / <?= $title ?></li>
        </ol>

        <!-- Page Content -->
        <h1><?= $title ?></h1>
        <hr>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                table data karyawan cabang <?= $karyawan_cabang ?>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama karyawan</th>
                            <th>ID karyawan</th>
                            <th>Jabatan</th>
                            <th>Jenis kelamin</th>
                            <th>telp</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1; ?>
                        <?php foreach ($get_all_karyawan as $karyawan) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $karyawan['nama_karyawan'] ?></td>
                                <td><?= $karyawan['id_karyawan'] ?></td>
                                <td><?= $karyawan['jabatan'] ?></td>
                                <td><?= $karyawan['jenis_kelamin'] ?></td>
                                <td><?= $karyawan['no_hp'] ?></td>
                                <td>
                                    <a href="<?= site_url('manager_menu_karyawan/detail_absensi_karyawan' . '?karyawan=' . $karyawan['id_karyawan']) ?>" class="badge badge-primary">detail absensi</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>