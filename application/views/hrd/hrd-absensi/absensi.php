<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU HRD / <?= $title ?></li>
        </ol>

        <!-- Page Content -->
        <h1><?= $title ?></h1>
        <hr>

        <div class="card">
            <div class="card-header text-center">
                <strong>## -- cari data absen karyawan berdasarkan area outlet cabang -- ##</strong>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="label">
                                <label for="outlet"><strong>cari area outlet</strong></label>
                            </div>
                            <div class="form-group input-group">
                                <input type="text" name="outlet" id="outlet" class="form-control input-group-append" readonly>
                                <button type="button" class="btn btn-primary" id="search-outlet">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="label">
                                <label for="cabang"><strong>cari outlet cabang</strong></label>
                            </div>
                            <div class="form-group input-group">
                                <input type="text" name="cabang" id="cabang" class="form-control input-group-append" readonly>
                                <button type="button" class="btn btn-primary" id="search-cabang">
                                    <i class="fas fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body border">
                    <h3 class="text-center">Data Karyawan</h3>
                    <hr>
                    <table class="teble table-bordered table-sm" id="dataTable" width="100%">
                        <thead>
                            <tr>
                                <th>cabang</th>
                                <th>nama karyawan</th>
                                <th>id karyawan</th>
                                <th>action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>