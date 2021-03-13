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
                table data produk kategori
                <button type="button" class="btn btn-success btn-sm float-right" data-target="#modal-insert" data-toggle="modal">
                    insert produk
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama produk</th>
                            <th>kode produk</th>
                            <th>harga vendor</th>
                            <th>harga jual</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>

                <!-- modal insert kategori -->
                <div class="modal" id="modal-insert">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="title">Form Insert Kategori Product</h3>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form-insert">
                                    <div class="form-group">
                                        <label for="nama_kategori">nama produk</label>
                                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
                                        <small id="kategori_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_vendor">harga vendor</label>
                                        <input type="text" name="harga_vendor" id="harga_vendor" class="form-control">
                                        <small id="harga_vendor_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_jual">harga jual</label>
                                        <input type="text" name="harga_jual" id="harga_jual" class="form-control">
                                        <small id="harga_jual_err" class="text-danger"></small>
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
                <!-- end modal insert kategori -->

                <!-- modal update kategori -->
                <div class="modal" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="title">Form Update Kategori Product</h3>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="form-update">
                                    <div class="form-group">
                                        <input type="hidden" name="id_kategori" id="id_kategori" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kategori">nama produk</label>
                                        <input type="text" name="nama_kategori" id="nama_kategori_update" class="form-control">
                                        <small id="kategori_update_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_vendor_update">harga vendor</label>
                                        <input type="text" name="harga_vendor" id="harga_vendor_update" class="form-control">
                                        <small id="harga_vendor_update_err" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_jual_update">harga jual</label>
                                        <input type="text" name="harga_jual" id="harga_jual_update" class="form-control">
                                        <small id="harga_jual_update_err" class="text-danger"></small>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-update">update</button>
                                </form>
                            </div>
                            <div class="modal-footer d-block text-cenetr text-muted">
                                <p>isi data dengan beanar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal update kategori -->

            </div>
            <!-- end card-body -->
        </div>
    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {
        show_kategori();
        let table = $('#dataTable').DataTable();

        function show_kategori() {
            $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?= site_url('admin_menu_kategori/get_all_data_kategori') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [1, 2, 3, 4, 5],
                    "orderable": false
                }]
            });
        }

        function reload_table() {
            table.ajax.reload(null, false);
        }

        $('#btn-insert').on('click', function(e) {
            e.preventDefault();
            let nama_kategori = $('#nama_kategori').val();
            let harga_vendor = $('#harga_vendor').val();
            let harga_jual = $('#harga_jual').val();
            $.ajax({
                url: "<?= site_url('admin_menu_kategori/insert_kategori') ?>",
                type: "post",
                data: {
                    nama_kategori: nama_kategori,
                    harga_vendor: harga_vendor,
                    harga_jual: harga_jual,
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
                        $('#nama_kategori').removeClass('border-danger');
                        $('#kategori_err').html('');
                        $('#harga_vendor').removeClass('border-danger');
                        $('#harga_vendor_err').html('');
                        $('#harga_jual').removeClass('border-danger');
                        $('#harga_jual_err').html('');
                        $('#form-insert')[0].reset();
                        reload_table();
                    }
                    if (data.invalid) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                    if (data.error) {
                        if (data.kategori_err) {
                            $('#nama_kategori').addClass('border-danger');
                            $('#kategori_err').html(data.kategori_err);
                        } else {
                            $('#nama_kategori').removeClass('border-danger');
                            $('#kategori_err').html('');
                        }
                        if (data.harga_vendor_err) {
                            $('#harga_vendor').addClass('border-danger');
                            $('#harga_vendor_err').html(data.harga_vendor_err);
                        } else {
                            $('#harga_vendor').removeClass('border-danger');
                            $('#harga_vendor_err').html('');
                        }
                        if (data.harga_jual_err) {
                            $('#harga_jual').addClass('border-danger');
                            $('#harga_jual_err').html(data.harga_jual_err);
                        } else {
                            $('#harga_jual').removeClass('border-danger');
                            $('#harga_jual_err').html('');
                        }
                    }
                }
            });
        });

        $(document).on('click', '#update', function() {
            let id_kategori = $(this).data('id');
            $.ajax({
                url: "<?= site_url('admin_menu_kategori/get_data_kategori') ?>",
                type: "post",
                data: {
                    id_kategori: id_kategori
                },
                dataType: "json",
                success: function(data) {
                    $('#id_kategori').val(data.id_kategori);
                    $('#nama_kategori_update').val(data.nama_kategori);
                    $('#harga_vendor_update').val(data.harga_vendor);
                    $('#harga_jual_update').val(data.harga_jual);
                }
            });
        });

        $('#btn-update').on('click', function(e) {
            e.preventDefault();
            let id_kategori = $('#id_kategori').val();
            let nama_kategori = $('#nama_kategori_update').val();
            let harga_vendor = $('#harga_vendor_update').val();
            let harga_jual = $('#harga_jual_update').val();
            $.ajax({
                url: "<?= site_url('admin_menu_kategori/update_kategori') ?>",
                type: "post",
                data: {
                    id_kategori: id_kategori,
                    nama_kategori: nama_kategori,
                    harga_vendor: harga_vendor,
                    harga_jual: harga_jual
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
                        $('#nama_kategori_update').removeClass('border-danger');
                        $('#kategori_update_err').html('');
                        $('#harga_vendor_update').removeClass('border-danger');
                        $('#harga_vendor_update_err').html('');
                        $('#harga_jual_update').removeClass('border-danger');
                        $('#harga_jual_update_err').html('');
                        $('#modal-update').modal('hide');
                    }
                    if (data.error) {
                        if (data.kategori_err) {
                            $('#nama_kategori_update').addClass('border-danger');
                            $('#kategori_update_err').html(data.kategori_err);
                        } else {
                            $('#nama_kategori_update').removeClass('border-danger');
                            $('#kategori_update_err').html('');
                        }
                        if (data.harga_vendor_err) {
                            $('#harga_vendor_update').addClass('border-danger');
                            $('#harga_vendor_update_err').html(data.harga_vendor_err);
                        } else {
                            $('#harga_vendor_update').removeClass('border-danger');
                            $('#harga_vendor_update_err').html('');
                        }
                        if (data.harga_jual_err) {
                            $('#harga_jual_update').addClass('border-danger');
                            $('#harga_jual_update_err').html(data.harga_jual_err);
                        } else {
                            $('#harga_jual_update').removeClass('border-danger');
                            $('#harga_jual_update_err').html('');
                        }
                    }
                }
            });
        });

        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let kode_barang = $(this).data('kode_barang');
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
                        url: "<?= site_url('admin_menu_kategori/delete_kategori') ?>",
                        type: "post",
                        data: {
                            id: id,
                            kode_barang: kode_barang
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