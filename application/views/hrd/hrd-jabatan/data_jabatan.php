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
                <i class="fas fa-table"></i>
                table data karyawan
                <button class="btn btn-success btn-sm float-right" data-target="#modal-insert" data-toggle="modal">
                    <i class="fas fa-fw fa-user-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Kode Jabatan</th>
                                <th>Jabatan</th>
                                <th>Gaji Pokok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- modal-insert-jabatan -->
                <div class="modal" id="modal-insert">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="title">Form Insert Jabatan</h3>
                                <button class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="form-insert">
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="jabatan"><strong>jabatan</strong></label>
                                        </div>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control">
                                        <span class="text-danger" id="jabatan_err"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="gaji"><strong>gaji pokok</strong></label>
                                        </div>
                                        <input type="text" name="gaji" id="gaji" class="form-control">
                                        <span class="text-danger" id="gaji_err"></span>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-insert">simpan</button>
                                </form>
                            </div>
                            <div class="modal-footer text-center d-block">
                                <p>isi data dengan benar !</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end-modal-insert -->

                <!-- modal-update -->
                <div class="modal" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="title">Form Update Jabatan</h3>
                                <button class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="form-update">
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="jabatan_update"><strong>jabatan</strong></label>
                                        </div>
                                        <input type="text" name="jabatan" id="jabatan_update" class="form-control">
                                        <span class="text-danger" id="jabatan_update_err"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="label">
                                            <label for="gaji_update"><strong>gaji pokok</strong></label>
                                        </div>
                                        <input type="text" name="gaji" id="gaji_update" class="form-control">
                                        <span class="text-danger" id="gaji_update_err"></span>
                                    </div>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-update">Update</button>
                                </form>
                            </div>
                            <div class="modal-footer text-center d-block">
                                <p>isi data dengan benar !</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end-modal-update -->

            </div>
        </div>
    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {
        tampil_data();
        var table = $('#dataTable').DataTable();

        function tampil_data() {
            $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?= site_url('hrd_menu_jabatan/get_all_data_jabatan') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [1, 2, 3, 4],
                    "orderable": false
                }]
            });
        }

        function realoadTable() {
            table.ajax.reload(null, false);
        }

        $('#btn-insert').on('click', function(e) {
            e.preventDefault();
            let jabatan = $('#jabatan').val();
            let gaji = $('#gaji').val();
            $.ajax({
                url: "<?= site_url('hrd_menu_jabatan/insert_jabatan') ?>",
                type: "post",
                data: {
                    jabatan: jabatan,
                    gaji: gaji
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
                        $('#form-insert')[0].reset();
                        $('#jabatan_err').html('');
                        $('#gaji_err').html('');
                        $('#jabatan').removeClass('border-danger');
                        $('#jabatan').removeClass('border-success');
                        $('#gaji').removeClass('border-danger');
                        $('#gaji').removeClass('border-success');
                        realoadTable();
                    }
                    if (data.error) {
                        if (data.jabatan_err) {
                            $('#jabatan_err').html(data.jabatan_err);
                            $('#jabatan').addClass('border-danger');
                        } else {
                            $('#jabatan_err').html('');
                            $('#jabatan').removeClass('border-danger');
                            $('#jabatan').addClass('border-success');
                        }
                        if (data.gaji_err) {
                            $('#gaji_err').html(data.gaji_err);
                            $('#gaji').addClass('border-danger');
                        } else {
                            $('#gaji_err').html('');
                            $('#gaji').removeClass('border-danger');
                            $('#gaji').addClass('border-success');
                        }
                    }
                }
            });
        });

        $(document).on('click', '#update', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "<?= site_url('hrd_menu_jabatan/get_data_jabatan') ?>",
                type: "post",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id_jabatan);
                    $('#jabatan_update').val(data.jabatan);
                    $('#gaji_update').val(data.gaji_pokok);
                }
            });
        });

        $('#btn-update').on('click', function(e) {
            e.preventDefault();
            let id = $('#id').val();
            let jabatan = $('#jabatan_update').val();
            let gaji = $('#gaji_update').val();
            $.ajax({
                url: "<?= site_url('hrd_menu_jabatan/update_jabatan') ?>",
                type: "post",
                data: {
                    id: id,
                    jabatan: jabatan,
                    gaji: gaji
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
                        $('#form-update')[0].reset();
                        $('#modal-update').modal('hide');
                        $('#jabatan_update_err').html('');
                        $('#gaji_update_err').html('');
                        $('#jabatan_update').removeClass('border-danger');
                        $('#jabatan_update').removeClass('border-success');
                        $('#gaji_update').removeClass('border-danger');
                        $('#gaji_update').removeClass('border-success');
                        realoadTable();
                    }
                    if (data.error) {
                        if (data.jabatan_err) {
                            $('#jabatan_update_err').html(data.jabatan_err);
                            $('#jabatan_update').addClass('border-danger');
                        } else {
                            $('#jabatan_update_err').html('');
                            $('#jabatan_update').removeClass('border-danger');
                            $('#jabatan_update').addClass('border-success');
                        }
                        if (data.gaji_err) {
                            $('#gaji_update_err').html(data.gaji_err);
                            $('#gaji_update').addClass('border-danger');
                        } else {
                            $('#gaji_update_err').html('');
                            $('#gaji_update').removeClass('border-danger');
                            $('#gaji_update').addClass('border-success');
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
                        url: "<?= site_url('hrd_menu_jabatan/delete_jabatan') ?>",
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
                            realoadTable();
                        }
                    });
                }
            });
        });
    });
</script>