<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU HRD / <?= $title ?></li>
        </ol>

        <!-- DataTables Example -->
        <div class="row">
            <!-- outlet -->
            <div class="col-md-6">
                <!-- Page Content -->
                <h1>data outlet area perusahaan</h1>
                <hr>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        table data outlet area perusahaan
                        <button class="btn btn-success btn-sm float-right" data-target="#modal-insert-outlet" data-toggle="modal">
                            insert outlet
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="tableOutlet" width="100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>kode</th>
                                    <th>outlet area</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                    </div>

                    <!-- modal insert outlet -->
                    <div class="modal" id="modal-insert-outlet">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="title">Form Insert Outlet</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" id="form-insert-outlet">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="outlet"><strong>outlet area perusahaan</strong></label>
                                            </div>
                                            <input type="text" name="outlet" id="outlet" class="form-control">
                                            <span class="text-danger" id="outlet_err"></span>
                                        </div>

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                        <button type="submit" class="btn btn-success float-right" id="btn-insert-outlet" name="btn-insert">simpan</button>
                                    </form>
                                </div>
                                <div class="modal-footer text-center text-muted d-block">
                                    <p>isi data dengan benar !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal insert outlet -->

                    <!-- modal update outlet -->
                    <div class="modal" id="modal-update-outlet">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="title">Form update Outlet</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" id="form-update-outlet">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="outlet_update"><strong>outlet area perusahaan</strong></label>
                                            </div>
                                            <input type="text" name="outlet" id="outlet_update" class="form-control">
                                            <span class="text-danger" id="outlet_update_err"></span>
                                        </div>

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                        <button type="submit" class="btn btn-success float-right" id="btn-update-outlet" name="btn-update">update</button>
                                    </form>
                                </div>
                                <div class="modal-footer text-center text-muted d-block">
                                    <p>isi data dengan benar !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal update outlet -->
                </div>
                <!-- end card-outlet -->
            </div>
            <!-- end col outlet -->

            <!-- cabang -->
            <div class="col-md-6">
                <!-- Page Content -->
                <h1>data outlet cabang perusahaan</h1>
                <hr>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        table data outlet cabang perusahaan
                        <button class="btn btn-success btn-sm float-right" data-target="#modal-insert-cabang" data-toggle="modal" id="reload-data">
                            insert cabang
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm" id="tableCabang" width="100%">
                            <thead>
                                <tr>
                                    <th>no</th>
                                    <th>kode</th>
                                    <th>outlet area</th>
                                    <th>cabang</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            </tbody>
                        </table>

                        <!-- modal insert cabang -->
                        <div class="modal" id="modal-insert-cabang">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="title">Form Insert Cabang</h3>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" id="form-insert-cabang">
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="pilih_outlet"><strong>outlet area</strong></label>
                                                </div>
                                                <select name="pilih_outlet" id="pilih_outlet" class="form-control">

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="loksi_cabang"><strong>outlet cabang</strong></label>
                                                </div>
                                                <input type="text" name="lokasi_cabang" id="lokasi_cabang" class="form-control">
                                                <span class="text-danger" id="cabang_err"></span>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                            <button type="submit" class="btn btn-success float-right" id="btn-insert-cabang">simpan</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer d-block text-center text-muted">
                                        <p>isi data dengan benar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal insert cabang -->

                        <!-- modal update cabang -->
                        <div class="modal" id="modal-update-cabang">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="title">Form Update Cabang</h3>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" id="form-update-cabang">
                                            <div class="form-group">
                                                <input type="hidden" name="id_cabang" id="id_cabang" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="pilih_outlet_update"><strong>outlet area</strong></label>
                                                </div>
                                                <input type="hidden" name="id_outlet_update" id="id_outlet_update" class="form-control">
                                                <input type="text" name="pilih_outlet" id="pilih_outlet_update" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <div class="label">
                                                    <label for="lokasi_cabang_update"><strong>outlet cabang</strong></label>
                                                </div>
                                                <input type="text" name="lokasi_cabang" id="lokasi_cabang_update" class="form-control">
                                                <span class="text-danger" id="cabang_update_err"></span>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                            <button type="submit" class="btn btn-success float-right" id="btn-update-cabang">update</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer d-block text-center text-muted">
                                        <p>isi data dengan benar</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal update cabang -->

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card-cabang -->
            </div>
            <!-- end col cabang -->

        </div>
        <!-- end row -->
    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {

        // outlet
        show_outlet();
        let tableOutlet = $('#tableOutlet').DataTable();

        function show_outlet() {
            $('#tableOutlet').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?= site_url('hrd_menu_outlet/get_all_data_outlet') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [2, 3],
                    "orderable": false
                }]
            });
        }

        function ReloadTableOutlet() {
            tableOutlet.ajax.reload(null, false);
        }

        $('#btn-insert-outlet').on('click', function(e) {
            e.preventDefault();
            let outlet = $('#outlet').val();
            $.ajax({
                url: "<?= site_url('hrd_menu_outlet/insert_outlet') ?>",
                type: "post",
                data: {
                    outlet: outlet
                },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        ReloadTableOutlet();
                        $('#form-insert-outlet')[0].reset();
                        $('#outlet').removeClass('border-danger');
                        $('#outlet_err').html('');
                    }
                    if (data.invalid) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#outlet').removeClass('border-danger');
                        $('#outlet_err').html('');
                    }
                    if (data.error) {
                        $('#outlet_err').html(data.outlet_err);
                        $('#outlet').addClass('border-danger');
                    } else {
                        $('#outlet_err').html('');
                    }
                }
            });
        });

        $(document).on('click', '#update-outlet', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "<?= site_url('hrd_menu_outlet/get_data_outlet') ?>",
                type: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id_outlet);
                    $('#outlet_update').val(data.area_outlet);
                }
            })
        });

        $('#btn-update-outlet').on('click', function(e) {
            e.preventDefault();
            let id = $('#id').val();
            let outlet = $('#outlet_update').val();
            $.ajax({
                url: "<?= site_url('hrd_menu_outlet/update_outlet') ?>",
                type: "post",
                data: {
                    id: id,
                    outlet: outlet
                },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        ReloadTableOutlet();
                        $('#modal-update-outlet').modal('hide');
                        $('#outlet_update').removeClass('border-danger');
                        $('#outlet_update_err').html('');
                    }
                    if (data.error) {
                        $('#outlet_update').addClass('border-danger');
                        $('#outlet_update_err').html(data.outlet_err);
                    }
                }
            });
        });

        $(document).on('click', '#delete-outlet', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            Swal.fire({
                title: 'Anda yakin ?',
                text: "data akan dihapus secara permanen !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'delete!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= site_url('hrd_menu_outlet/delete_outlet') ?>",
                        type: "post",
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(data) {
                            Swal.fire({
                                text: "" + data.pesan + "",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            ReloadTableOutlet();
                        }
                    });
                }
            });
        });
        // end outlet

        // cabang
        show_cabang();
        let tableCabang = $('#tableCabang').DataTable();

        function show_cabang() {
            $('#tableCabang').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?= site_url('hrd_menu_cabang/get_all_data_cabang') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [2, 3, 4],
                    "orderable": false
                }]
            });
        }

        function ReloadTableCabang() {
            tableCabang.ajax.reload(null, false);
        }

        // reload data select option
        function reload_data_outlet() {
            $.ajax({
                url: "<?= site_url('hrd_menu_cabang/get_all_outlet') ?>",
                dataType: "json",
                success: function(data) {
                    let html = '';
                    for (let i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_outlet + '">' + data[i].area_outlet + '</option>';
                    }
                    $('#pilih_outlet').html(html);
                    $('#pilih_outlet_update').html(html);
                }
            });
        }

        $(document).on('click', '#reload-data', function() {
            reload_data_outlet();
        });

        $('#btn-insert-cabang').on('click', function(e) {
            e.preventDefault();
            let id_outlet = $('#pilih_outlet').val();
            let lokasi_cabang = $('#lokasi_cabang').val();
            $.ajax({
                url: "<?= site_url('hrd_menu_cabang/insert_cabang') ?>",
                type: "post",
                data: {
                    id_outlet: id_outlet,
                    lokasi_cabang: lokasi_cabang
                },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        ReloadTableCabang();
                        $('#form-insert-cabang')[0].reset();
                        $('#lokasi_cabang').removeClass('border-danger');
                        $('#cabang_err').html('');
                    }
                    if (data.invalid) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#lokasi_cabng').removeClass('border-danger');
                        $('#cabang_err').html('');
                    }
                    if (data.error) {
                        $('#cabang_err').html(data.cabang_err);
                        $('#lokasi_cabang').addClass('border-danger');
                    } else {
                        $('#cabang_err').html('');
                    }
                }
            });
        });

        $(document).on('click', '#update-cabang', function() {
            let id = $(this).data('id');;
            $.ajax({
                url: "<?= site_url('hrd_menu_cabang/get_data_cabang') ?>",
                type: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#id_cabang').val(data.id_cabang);
                    $('#id_outlet_update').val(data.id_outlet);
                    $('#pilih_outlet_update').val(data.area_outlet);
                    $('#lokasi_cabang_update').val(data.lokasi_cabang);
                }
            });
        });

        $('#btn-update-cabang').on('click', function(e) {
            e.preventDefault();
            let id = $('#id_cabang').val();
            let id_outlet = $('#id_outlet_update').val();
            let lokasi_cabang = $('#lokasi_cabang_update').val();
            $.ajax({
                url: "<?= site_url('hrd_menu_cabang/update_cabang') ?>",
                type: "post",
                data: {
                    id: id,
                    lokasi_cabang: lokasi_cabang,
                    id_outlet: id_outlet
                },
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        ReloadTableCabang();
                        $('#modal-update-cabang').modal('hide');
                        $('#lokasi_cabang_update').removeClass('border-danger');
                        $('#cabang_update_err').html('');
                    }
                    if (data.error) {
                        $('#lokasi_cabang_update').addClass('border-danger');
                        $('#cabang_update_err').html(data.cabang_err);
                    }
                }
            });
        });

        $(document).on('click', '#delete-cabang', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            Swal.fire({
                title: 'Anda yakin ?',
                text: "data akan dihapus secara permanen !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'delete!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= site_url('hrd_menu_cabang/delete_cabang') ?>",
                        type: "post",
                        data: {
                            id: id
                        },
                        dataType: "json",
                        success: function(data) {
                            Swal.fire({
                                text: "" + data.pesan + "",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            ReloadTableCabang();
                        }
                    });
                }
            });
        });
    });
</script>