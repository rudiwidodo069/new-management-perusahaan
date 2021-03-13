<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU MANAGER / <?= $title ?></li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-heard">
                <h3 class="title text-center">DETAIL INVENTORI KELUAR</h3>
            </div>
            <div class="card-body">
                <div class="container img-thumbnail">
                    <h3 class="text-center mb-3 mt-3">--- <?= $detail['lokasi_cabang'] ?> ---</h3>
                    <table class="table table-sm">
                        <tr>
                            <th>nama barang</th>
                            <td>: <?= $detail['nama_kategori'] ?></td>
                        </tr>
                        <tr>
                            <th>kode barang</th>
                            <td>: <?= $detail['kode_barang'] ?></td>
                        </tr>
                        <tr>
                            <th>jumlah keluar</th>
                            <td>: <?= $detail['jumlah_keluar'] ?></td>
                        </tr>
                        <tr>
                            <th>tanggal keluar</th>
                            <td>: <?= $detail['tanggal_keluar'] ?></td>
                        </tr>
                        <tr>
                            <th>keteranganr</th>
                            <td>: <?= $detail['keterangan'] ?></td>
                        </tr>
                    </table>
                    <a href="<?= site_url('manager_menu_inventori_keluar') ?>" class="btn btn-primary mb-3 mt-3 float-right">kembail</a>
                    <a href="<?= site_url('laporan_management/laporan_inventori_keluar_pdf') . '?keluar=' . $detail['id_inventori_keluar'] ?>" class="btn btn-danger mb-3 mt-3 mr-3 float-right">print pdf</a>
                </div>
            </div>
        </div>
    </div>
</div>