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
                table stok barang
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama barang</th>
                            <th>kode barang</th>
                            <th>stok awal</th>
                            <th>stok keluar</th>
                            <th>stok akhir</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1; ?>
                        <?php foreach ($stok_barang as $stok) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $stok['nama_kategori'] ?></td>
                                <td><?= $stok['kode_barang'] ?></td>
                                <td><?= $stok['stok_awal'] ?></td>
                                <td><?= $stok['stok_keluar'] ?></td>
                                <td><?= $stok['stok_akhir'] ?></td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>