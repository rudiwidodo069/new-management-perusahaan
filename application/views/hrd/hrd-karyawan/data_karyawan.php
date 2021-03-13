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
                <a href="<?= base_url('hrd_menu_karyawan/form_insert_karyawan') ?>" class="btn btn-success btn-sm float-right">
                    <i class="fas fa-fw fa-user-plus"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>nama karyawan</th>
                                <th>id karyawan</th>
                                <th>nik karaywan</th>
                                <th>email</th>
                                <th>jabatan</th>
                                <th>status kerja</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- modal update karyawan -->
            <div class="modal" id="modal-update">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="title">Form Update Karyawan</h3>
                            <button class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="form-update">

                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="nama_update"><strong>nama karyawan</strong></label>
                                            </div>
                                            <input type="text" name="nama" id="nama_update" class="form-control">
                                            <span class="text-danger" id="nama_update_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="nik_update"><strong>nik karyawan</strong></label>
                                            </div>
                                            <input type="text" name="nik" id="nik_update" class="form-control">
                                            <span class="text-danger" id="nik_update_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="jenis_kelamin_update"><strong>jenis kelamin</strong></label>
                                            </div>
                                            <select name="jenis_kelamin" id="jenis_kelamin_update" class="form-control">
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="alamat_update"><strong>alamat</strong></label>
                                            </div>
                                            <input type="text" name="alamat" id="alamat_update" class="form-control">
                                            <span class="text-danger" id="alamat_update_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="tempat_lahir_update"><strong>tempat lahir</strong></label>
                                            </div>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir_update" class="form-control">
                                            <span class="text-danger" id="tempat_lahir_update_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="tgl_lahir_update"><strong>tanggal lahir</strong></label>
                                            </div>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir_update" class="form-control">
                                            <span class="text-danger" id="tgl_lahir_update_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="label">
                                            <label for="status_karyawan_update"><strong>status pernikahan</strong></label>
                                        </div>
                                        <div class="form-group">
                                            <select name="status_karyawan" id="status_karyawan_update" class="form-control">
                                                <option value="SUDAH MENIKAH">SUDAH MENIKAH</option>
                                                <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="anak_update"><strong>jumlah anak</strong></label>
                                            </div>
                                            <input type="text" name="anak" id="anak_update" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="email_update"><strong>email</strong></label>
                                            </div>
                                            <input type="text" name="email_update" id="email_update" class="form-control">
                                            <span class="text-danger" id="email_update_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="no_hp_update"><strong>no. hp</strong></label>
                                            </div>
                                            <input type="text" name="no_hp" id="no_hp_update" class="form-control">
                                            <span class="text-danger" id="no_hp_update_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="join_date_update"><strong>tanggal masuk</strong></label>
                                            </div>
                                            <input type="date" name="join_date" id="join_date_update" class="form-control">
                                            <span class="text-danger" id="join_date_update_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="end_date_update"><strong>tanggal selesai</strong></label>
                                            </div>
                                            <input type="date" name="end_date" id="end_date_update" class="form-control">
                                            <span class="text-danger" id="end_date_update_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="label">
                                            <label for="jabatan_update"><strong>jabatan</strong></label>
                                        </div>
                                        <div class="form-group">
                                            <select name="jabatan" id="jabatan_update" class="form-control">
                                                <?php foreach ($data_jabatan as $jabatan) : ?>
                                                    <option value="<?= $jabatan['id_jabatan'] ?>"><?= $jabatan['jabatan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="status_kerja_update"><strong>status keja</strong></label>
                                            </div>
                                            <select name="status_kerja" id="status_kerja_update" class="form-control">
                                                <option value="KONTRAK">KONTRAK</option>
                                                <option value="MAGANG">MAGANG</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="label">
                                            <label for="cabang"><strong>cabang</strong></label>
                                        </div>
                                        <div class="form-group">
                                            <select name="cabang" id="cabang" class="form-control">
                                                <?php foreach ($data_cabang as $cabang) : ?>
                                                    <option value="<?= $cabang['id_cabang'] ?>"><?= $cabang['lokasi_cabang'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="label">
                                            <label for="rekening"><strong>no rekening</strong></label>
                                            <input type="text" name="rekening" id="rekening" class="form-control">
                                            <span class="text-danger" id="rekening_err"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto_update" name="foto">
                                                <label class="custom-file-label" for="foto_update">Choose file</label>
                                                <input type="hidden" name="profile" id="profile" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="img">
                                            <img src="" alt="" class="img-thumbnail rounded" width="100px" height="100px">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-danger" data-dismiss="modal" id="reset">batal</button>
                                <button class="btn btn-success float-right" id="btn-update">update</button>

                            </form>
                        </div>
                        <div class="modal-footer text-center d-block text-muted">
                            <p>isi data dengan benar !</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal update karyawan -->


        </div>
    </div>
    <!-- /.container-fluid -->


    <!-- myscript -->
    <script>
        $(document).ready(function() {
            tampil_data_karyawan();
            let table = $('#dataTable').DataTable();

            function tampil_data_karyawan() {
                $('#dataTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],
                    "ajax": {
                        url: "<?= site_url('hrd_menu_karyawan/get_all_data_karyawan') ?>",
                        type: "post"
                    },
                    "columnDefs": [{
                        "targets": [1, 2, 3, 4, 5, 6, 7],
                        "orderable": false
                    }],
                });
            }

            function ReloadTable() {
                table.ajax.reload(null, false);
            }

            $(document).on('click', '#update', function() {
                let id = $(this).data('id');
                $('.custom-file-input').on('change', function() {
                    let newimg = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass('selected').html(newimg);
                });
                $.ajax({
                    url: "<?= site_url('hrd_menu_karyawan/get_data_karyawan') ?>",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#id').val(data.id_karyawan);
                        $('#nama_update').val(data.nama_karyawan);
                        $('#nik_update').val(data.nik_karyawan);
                        $('#jenis_kelamin_update').val(data.jenis_kelamin);
                        $('#alamat_update').val(data.alamat);
                        $('#tempat_lahir_update').val(data.tempat_lahir);
                        $('#tgl_lahir_update').val(data.tgl_lahir);
                        $('#status_karyawan_update').val(data.status_karyawan);
                        $('#anak_update').val(data.jml_anak);
                        $('#email_update').val(data.email);
                        $('#no_hp_update').val(data.no_hp);
                        $('#join_date_update').val(data.join_date);
                        $('#end_date_update').val(data.end_date);
                        $('#jabatan_update option').html(data.jabatan);
                        $('#jabatan_update').val(data.id_jabatan);
                        $('#status_kerja_update').val(data.status_kerja);
                        $('#cabang').val(data.id_cabang);
                        $('#cabang option').html(data.lokasi_cabang);
                        $('#rekening').val(data.rekening);
                        $('img').attr('src', './assets/img/' + data.foto);
                        $('.custom-file-label').html(data.foto);
                        $('#profile').val(data.foto);
                    }
                });
            });

            $('#form-update').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?= site_url('hrd_menu_karyawan/update_karyawan') ?>",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: "json",
                    success: function(data) {
                        if (data.success) {
                            swal.fire({
                                text: "" + data.pesan + "",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            ReloadTable();
                            $('#modal-update').modal('hide');
                            $('#nama_update').removeClass('border-danger');
                            $('#nama_update_err').html('');
                            $('#nik_update').removeClass('border-danger');
                            $('#nik_update_err').html('');
                            $('#tempat_update_lahir').removeClass('border-danger');
                            $('#tempat_lahir_update_err').html('');
                            $('#tgl_lahir_update').removeClass('border-danger');
                            $('#tgl_lahir_update_err').html('');
                            $('#alamat_update').removeClass('border-danger');
                            $('#alamat_update_err').html('');
                            $('#email_update').removeClass('border-danger');
                            $('#email_update_err').html('');
                            $('#no_hp_update').removeClass('border-danger');
                            $('#no_hp_update_err').html('');
                            $('#join_date_update').removeClass('border-danger');
                            $('#join_date_update_err').html('');
                            $('#end_date_update').removeClass('border-danger');
                            $('#end_date_update_err').html('');
                            $('#rekening').removeClass('border-danger');
                            $('#rekening_err').html('');
                        }
                        if (data.error) {
                            if (data.nik_err) {
                                $('#nama_update_err').html(data.nama_err);
                                $('#nama_update').addClass('border-danger');
                            } else {
                                $('#nama_update_err').html('');
                                $('#nama_update').removeClass('border-danger');
                            }
                            if (data.nik_err) {
                                $('#nik_update_err').html(data.nik_err);
                                $('#nik_update').addClass('border-danger');
                            } else {
                                $('#nik_update_err').html('');
                                $('#nik_update').removeClass('border-danger');
                            }
                            if (data.tempat_lahir_err) {
                                $('#tempat_lahir_update_err').html(data.tempat_lahir_err);
                                $('#tempat_lahir_update').addClass('border-danger');
                            } else {
                                $('#tempat_lahir_update_err').html('');
                                $('#tempat_lahir_update').removeClass('border-danger');
                            }
                            if (data.tgl_lahir_err) {
                                $('#tgl_lahir_update_err').html(data.tgl_lahir_err);
                                $('#tgl_lahir_update').addClass('border-danger');
                            } else {
                                $('#tgl_lahir_update_err').html('');
                                $('#tgl_lahir_update').removeClass('border-danger');
                            }
                            if (data.alamat_err) {
                                $('#alamat_update_err').html(data.alamat_err);
                                $('#alamat_update').addClass('border-danger');
                            } else {
                                $('#alamat_update_err').html('');
                                $('#alamat_update').removeClass('border-danger');
                            }
                            if (data.email_err) {
                                $('#email_update_err').html(data.email_err);
                                $('#email_update').addClass('border-danger');
                            } else {
                                $('#email_update_err').html('');
                                $('#email_update').removeClass('border-danger');
                            }
                            if (data.no_hp_err) {
                                $('#no_hp_update_err').html(data.no_hp_err);
                                $('#no_hp_update').addClass('border-danger');
                            } else {
                                $('#no_hp_update_err').html('');
                                $('#no_hp_update').removeClass('border-danger');
                            }
                            if (data.join_date_err) {
                                $('#join_date_update_err').html(data.join_date_err);
                                $('#join_date_update').addClass('border-danger');
                            } else {
                                $('#join_date_update_err').html('');
                                $('#join_date_update').removeClass('border-danger');
                            }
                            if (data.end_date_err) {
                                $('#end_date_update_err').html(data.end_date_err);
                                $('#end_date_update').addClass('border-danger');
                            } else {
                                $('#end_date_update_err').html('');
                                $('#end_date_update').removeClass('border-danger');
                            }
                            if (data.end_date_err) {
                                $('#rekening_err').html(data.end_date_err);
                                $('#rekening').addClass('border-danger');
                            } else {
                                $('#rekening_err').html('');
                                $('#rekening').removeClass('border-danger');
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
                            url: "<?= site_url('hrd_menu_karyawan/delete_karyawan') ?>",
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
                                ReloadTable();
                            }
                        });
                    }
                });
            });
        });
    </script>