<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU MANAGER / <?= $title ?></li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-heard">
                <h3 class="title text-center">DETAIL INVENTORI MASUK</h3>
            </div>
            <div class="card-body">
                <div class="container img-thumbnail">
                    <h3 class="text-center mb-3 mt-3">--- <?= $detail['lokasi_cabang'] ?> ---</h3>
                    <table class="table table-sm">
                        <tr>
                            <th colspan="2">nama barang</th>
                            <td>: <?= $detail['nama_kategori'] ?></td>
                            <th colspan="2">kode barang</th>
                            <td>: <?= $detail['kode_barang'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">vendor</th>
                            <td>: <?= $detail['nama_pt'] ?></td>
                            <th colspan="2">alamat vendor</th>
                            <td>: <?= $detail['alamat_pt'] ?></td>
                        </tr>
                        <tr>
                            <th>nama karyawan</th>
                            <td>: <?= $detail['nama_karyawan'] ?></td>
                            <th>id karyawan</th>
                            <td>: <?= $detail['id_karyawan'] ?></td>
                            <th>cabang</th>
                            <td>: <?= $detail['lokasi_cabang'] ?></td>
                        </tr>
                        <tr>
                            <th>barang masuk</th>
                            <td>: <?= $detail['jumlah_masuk'] ?></td>
                            <th>harga vendor</th>
                            <td>: Rp. <?= number_format($detail['harga_vendor']) ?></td>
                            <th>harga total</th>
                            <td>: Rp. <?= number_format($detail['total_harga']) ?></td>
                        </tr>
                        <tr>
                            <th>tanggal masuk</th>
                            <td>: <?= $detail['tanggal_masuk'] ?></td>
                            <th>tanggal exp</th>
                            <td>: <?= $detail['tanggal_exp'] ?></td>
                            <th>keterangan</th>
                            <td>: <?= $detail['keterangan'] ?></td>
                        </tr>
                    </table>
                    <a href="<?= site_url('manager_menu_inventori_masuk') ?>" class="btn btn-primary mb-3 mt-3 float-right">kembail</a>
                    <a href="<?= site_url('laporan_management/laporan_inventori_masuk_pdf') . '?masuk=' . $detail['id_inventori'] ?>" class="btn btn-danger mb-3 mt-3 mr-3 float-right">print pdf</a>
                </div>
            </div>
        </div>
    </div>
</div>