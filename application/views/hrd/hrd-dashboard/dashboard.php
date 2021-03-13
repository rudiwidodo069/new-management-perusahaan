<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU HRD / <?= $title ?></li>
        </ol>

        <!-- Page Content -->
        <h1><?= $title ?></h1>
        <hr>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <!-- Icon Cards-->
                <div class="card-body">
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
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-warning o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-list"></i>
                                    </div>
                                    <div class="mr-5">
                                        <p><strong>jumlah outlet area</strong></p>
                                        <h3 class="text-center"><?= $outlet ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-shopping-cart"></i>
                                    </div>
                                    <div class="mr-5">
                                        <p><strong>jumlah outlet cabang</strong></p>
                                        <h3 class="text-center"><?= $cabang ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fas fa-fw fa-life-ring"></i>
                                    </div>
                                    <div class="mr-5">
                                        <p><strong>jumlah manager area</strong></p>
                                        <h3 class="text-center"><?= $area ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card-info -->
                </div>
            </div>
        </div>
    </div>
</div>