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
                table data inventori
                <a href="<?= site_url('manager_menu_inventori_masuk/form_insert_inventori') ?>" class="btn btn-primary btn-sm float-right">
                    insert inventori
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>penerima</th>
                            <th>nama barang</th>
                            <th>vondor</th>
                            <th>jumlah masuk</th>
                            <th>tanggal masuk</th>
                            <th>tanggal exp</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($inventori_masuk as $inventori) : ?>
                            <tr>
                                <td><?= $inventori['nama_karyawan'] ?></td>
                                <td><?= $inventori['nama_kategori'] ?></td>
                                <td><?= $inventori['nama_pt'] ?></td>
                                <td><?= $inventori['jumlah_masuk'] ?></td>
                                <td><?= $inventori['tanggal_masuk'] ?></td>
                                <td><?= $inventori['tanggal_exp'] ?></td>
                                <td>
                                    <a href="<?= site_url('manager_menu_inventori_masuk/detail_inventori_masuk') . '?id=' . $inventori['id_inventori'] ?>" class="badge badge-primary">detail</a>
                                    <a href="<?= site_url('manager_menu_inventori_masuk/form_update_inventori') . '?id=' . $inventori['id_inventori'] ?>" class="badge badge-warning">update</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>