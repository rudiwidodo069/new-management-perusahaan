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
                <!-- Icon Cards-->
                <div class="card-body">
                    <div class="title mb-3">
                        <h3>data karyawan</h3>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-users"></i>
                                    </div>
                                    <div class="mr-5">
                                        <p><strong>jumlah karyawan</strong></p>
                                        <h3 class="text-center"><?= $karyawan ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- div row dashboard karyawan -->

                    <div class="title mb-3 mt-5">
                        <h3>data stok barang</h3>
                    </div>
                    <div class="row">
                        <?php foreach ($stok_barang as $stok) : ?>
                            <div class="col-xl-3 col-sm-6 mb-3">
                                <div class="card text-white bg-primary o-hidden h-100">
                                    <div class="card-body">
                                        <div class="card-body-icon">
                                            <i class="fas fa-fw fa-list"></i>
                                        </div>
                                        <div class="mr-5">
                                            <span><strong><?= $stok['nama_kategori'] ?></strong></span>
                                            <h3 class="text-center"><?= $stok['stok_akhir'] ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- end card-info -->
            </div>
        </div>
    </div>
</div>