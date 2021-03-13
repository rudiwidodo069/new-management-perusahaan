<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU ADMIN / <?= $title ?></li>
        </ol>

        <!-- Page Content -->
        <h1><?= $title ?></h1>
        <hr>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                table data supplier
                <button type="button" class="btn btn-success btn-sm float-right" data-target="#modal-insert" data-toggle="modal">
                    insert supplier
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>kode supplier</th>
                            <th>nama perusahaan</th>
                            <th>alamat perusahaan</th>
                            <th>telp</th>
                            <th>deskripsi barang</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>

                <!-- modal insert supplier -->
                <div class="modal" id="modal-insert">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="title">Form Insert Supplier</h3>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form-insert">
                                    <div class="form-group">
                                        <label for="nama_pt">nama perusahaan</label>
                                        <input type="text" name="nama_pt" id="nama_pt" class="form-control">
                                        <small id="pt_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_pt">alamat perusahaan</label>
                                        <input type="text" name="alamat_pt" id="alamat_pt" class="form-control">
                                        <small id="alamat_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="telp">telp perusahaan</label>
                                        <input type="text" name="telp" id="telp" class="form-control">
                                        <small id="telp_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="deksripsi">deskripsi barang</label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-insert">simpan</button>
                                </form>
                            </div>
                            <div class="modal-footer d-block text-cenetr text-muted">
                                <p>isi data dengan beanar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal insert supplier -->

                <!-- modal update supplier -->
                <div class="modal" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="title">Form Update Supplier</h3>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form-update">
                                    <div class="form-group">
                                        <input type="hidden" name="id_supplier" id="id_supplier" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_update_pt">nama perusahaan</label>
                                        <input type="text" name="nama_pt" id="nama_update_pt" class="form-control">
                                        <small id="pt_update_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_update_pt">alamat perusahaan</label>
                                        <input type="text" name="alamat_pt" id="alamat_update_pt" class="form-control">
                                        <small id="alamat_update_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="telp_update">telp perusahaan</label>
                                        <input type="text" name="telp" id="telp_update" class="form-control">
                                        <small id="telp_update_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="deksripsi_update">deskripsi barang</label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi_update" rows="3"></textarea>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-update">simpan</button>
                                </form>
                            </div>
                            <div class="modal-footer d-block text-cenetr text-muted">
                                <p>isi data dengan beanar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal insert supplier -->

            </div>
        </div>
    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {
        show_supplier();
        let table = $('#dataTable').DataTable();

        function show_supplier() {
            $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?= site_url('admin_menu_supplier/get_all_data_supplier') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [2, 3, 4, 5, 6],
                    "orderable": false
                }]
            });
        }

        function reload_table() {
            table.ajax.reload(null, false);
        }

        $('#btn-insert').on('click', function(e) {
            e.preventDefault();
            let nama_pt = $('#nama_pt').val();
            let alamat_pt = $('#alamat_pt').val();
            let telp = $('#telp').val();
            let deskripsi = $('#deskripsi').val();
            $.ajax({
                url: "<?= site_url('admin_menu_supplier/insert_supplier') ?>",
                type: "post",
                data: {
                    nama_pt: nama_pt,
                    alamat_pt: alamat_pt,
                    telp: telp,
                    deskripsi: deskripsi
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
                        reload_table();
                        $('#form-insert')[0].reset();
                        $('#nama_pt').focus();
                        $('#nama_pt').removeClass('border-danger');
                        $('#pt_err').html('');
                        $('#alamat_pt').removeClass('border-danger');
                        $('#alamat_err').html('');
                        $('#telp').removeClass('border-danger');
                        $('#telp_err').html('');
                        $('#deskripsi').removeClass('border-danger');
                        $('#deskripsi_err').html('');
                    }
                    if (data.error) {
                        if (data.pt_err) {
                            $('#nama_pt').addClass('border-danger');
                            $('#pt_err').html(data.pt_err);
                        } else {
                            $('#nama_pt').removeClass('border-danger');
                            $('#pt_err').html('');
                        }
                        if (data.alamat_err) {
                            $('#alamat_pt').addClass('border-danger');
                            $('#alamat_err').html(data.alamat_err);
                        } else {
                            $('#alamat_pt').removeClass('border-danger');
                            $('#alamat_err').html(data.alamat_err);
                        }
                        if (data.telp_err) {
                            $('#telp').addClass('border-danger');
                            $('#telp_err').html(data.telp_err);
                        } else {
                            $('#telp').removeClass('border-danger');
                            $('#telp_err').html(data.telp_err);
                        }
                        if (data.deskripsi_err) {
                            $('#deskripsi').addClass('border-danger');
                            $('#deskripsi_err').html(data.deskripsi_err);
                        } else {
                            $('#deskrpsi').removeClass('border-danger');
                            $('#deskripsi_err').html(data.deskripsi_err);
                        }
                    }
                }
            });
        });

        $(document).on('click', '#update', function() {
            let id_supplier = $(this).data('id');
            $.ajax({
                url: "<?= site_url('admin_menu_supplier/get_data_supplier') ?>",
                type: "post",
                data: {
                    id_supplier: id_supplier
                },
                dataType: "json",
                success: function(data) {
                    $('#id_supplier').val(data.id_supplier);
                    $('#nama_update_pt').val(data.nama_pt);
                    $('#alamat_update_pt').val(data.alamat_pt);
                    $('#telp_update').val(data.telp);
                    $('#deskripsi_update').val(data.deskripsi);
                }
            });
        });

        $('#btn-update').on('click', function(e) {
            e.preventDefault();
            let id_supplier = $('#id_supplier').val();
            let nama_pt = $('#nama_update_pt').val();
            let alamat_pt = $('#alamat_update_pt').val();
            let telp = $('#telp_update').val();
            let deskripsi = $('#deskripsi_update').val();
            $.ajax({
                url: "<?= site_url('admin_menu_supplier/update_supplier') ?>",
                type: "post",
                data: {
                    id_supplier: id_supplier,
                    nama_pt: nama_pt,
                    alamat_pt: alamat_pt,
                    telp: telp,
                    deskripsi: deskripsi
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
                        reload_table();
                        $('#form-update')[0].reset();
                        $('#modal-update').modal('hide');
                        $('#nama_update_pt').focus();
                        $('#nama_update_pt').removeClass('border-danger');
                        $('#pt_update_err').html('');
                        $('#alamat_update_pt').removeClass('border-danger');
                        $('#alamat_update_err').html('');
                        $('#telp_update').removeClass('border-danger');
                        $('#telp_update_err').html('');
                        $('#deskripsi_update').removeClass('border-danger');
                        $('#deskripsi_update_err').html('');
                    }
                    if (data.error) {
                        if (data.pt_err) {
                            $('#nama_update_pt').addClass('border-danger');
                            $('#pt_update_err').html(data.pt_err);
                        } else {
                            $('#nama_update_pt').removeClass('border-danger');
                            $('#pt_update_err').html('');
                        }
                        if (data.alamat_err) {
                            $('#alamat_update_pt').addClass('border-danger');
                            $('#alamat_update_err').html(data.alamat_err);
                        } else {
                            $('#alamat_update_pt').removeClass('border-danger');
                            $('#alamat_update_err').html(data.alamat_err);
                        }
                        if (data.telp_err) {
                            $('#telp_update').addClass('border-danger');
                            $('#telp_update_err').html(data.telp_err);
                        } else {
                            $('#telp_update').removeClass('border-danger');
                            $('#telp_update_err').html(data.telp_err);
                        }
                        if (data.deskripsi_err) {
                            $('#deskripsi_update').addClass('border-danger');
                            $('#deskripsi_update_err').html(data.deskripsi_err);
                        } else {
                            $('#deskrpsi_update').removeClass('border-danger');
                            $('#deskripsi_update_err').html(data.deskripsi_err);
                        }
                    }
                }
            });
        });

        $(document).on('click', '#delete', function(e) {
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
                        url: "<?= site_url('admin_menu_supplier/delete_supplier') ?>",
                        type: "post",
                        data: {
                            id_supplier: id
                        },
                        dataType: "json",
                        success: function(data) {
                            Swal.fire({
                                text: "" + data.pesan + "",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            reload_table();
                        }
                    });
                }
            });
        });
    });
</script>