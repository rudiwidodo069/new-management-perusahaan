<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU HRD / <?= $title ?></li>
        </ol>

        <hr>
        <!-- DataTables Example -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="title text-center">Form Insert Karyawan</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="form-insert">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="nama"><strong>nama karyawan</strong></label>
                                            </div>
                                            <input type="text" name="nama" id="nama" class="form-control">
                                            <span class="text-danger" id="nama_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="nik"><strong>nik karyawan</strong></label>
                                            </div>
                                            <input type="text" name="nik" id="nik" class="form-control">
                                            <span class="text-danger" id="nik_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="jenis_kelamin"><strong>jenis kelamin</strong></label>
                                            </div>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="alamat"><strong>alamat</strong></label>
                                            </div>
                                            <input type="text" name="alamat" id="alamat" class="form-control">
                                            <span class="text-danger" id="alamat_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="tempat_lahir"><strong>tempat lahir</strong></label>
                                            </div>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                                            <span class="text-danger" id="tempat_lahir_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="tgl_lahir"><strong>tanggal lahir</strong></label>
                                            </div>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                                            <span class="text-danger" id="tgl_lahir_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="label">
                                            <label for="status_karyawan"><strong>status pernikahan</strong></label>
                                        </div>
                                        <div class="form-group">
                                            <select name="status_karyawan" id="status_karyawan" class="form-control">
                                                <option value="SUDAH MENIKAH">SUDAH MENIKAH</option>
                                                <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="anak"><strong>jumlah anak</strong></label>
                                            </div>
                                            <input type="text" name="anak" id="anak" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="email"><strong>email</strong></label>
                                            </div>
                                            <input type="text" name="email" id="email" class="form-control">
                                            <span class="text-danger" id="email_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="no_hp"><strong>no. hp</strong></label>
                                            </div>
                                            <input type="text" name="no_hp" id="no_hp" class="form-control">
                                            <span class="text-danger" id="no_hp_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="join_date"><strong>tanggal masuk</strong></label>
                                            </div>
                                            <input type="date" name="join_date" id="join_date" class="form-control">
                                            <span class="text-danger" id="join_date_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="end_date"><strong>tanggal selesai</strong></label>
                                            </div>
                                            <input type="date" name="end_date" id="end_date" class="form-control">
                                            <span class="text-danger" id="end_date_err"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="label">
                                            <label for="jabatan"><strong>jabatan</strong></label>
                                        </div>
                                        <div class="form-group">
                                            <select name="jabatan" id="jabatan" class="form-control">
                                                <?php foreach ($data_jabatan as $jabatan) : ?>
                                                    <option value="<?= $jabatan['id_jabatan'] ?>"><?= $jabatan['jabatan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="label">
                                                <label for="status_kerja"><strong>status keja</strong></label>
                                            </div>
                                            <select name="status_kerja" id="status_kerja" class="form-control">
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

                                <div class="form-group">
                                    <div class="label">
                                        <label for="foto"><strong>foto karyawan</strong></label>
                                    </div>
                                    <input type="file" name="foto" id="foto" class="form-control-file">
                                    <span class="text-danger" id="foto_err"></span>
                                </div>

                                <a href="<?= base_url('hrd_menu_karyawan') ?>" class="btn btn-primary">kembali</a>
                                <button class="btn btn-success float-right" id="btn-insert">simpan</button>

                            </form>
                        </div>
                        <div class="card-footer d-block text-center text-muted">
                            <p>isi data dengan benar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {
        $('#form-insert').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('hrd_menu_karyawan/insert_karyawan') ?>",
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
                        $('#form-insert')[0].reset();
                        ReloadTable();
                        $('#nama').focus();
                        $('#nama').removeClass('border-danger');
                        $('#nama_err').html('');
                        $('#nik').removeClass('border-danger');
                        $('#nik_err').html('');
                        $('#tempat_lahir').removeClass('border-danger');
                        $('#tempat_lahir_err').html('');
                        $('#tgl_lahir').removeClass('border-danger');
                        $('#tgl_lahir_err').html('');
                        $('#alamat').removeClass('border-danger');
                        $('#alamat_err').html('');
                        $('#email').removeClass('border-danger');
                        $('#email_err').html('');
                        $('#no_hp').removeClass('border-danger');
                        $('#no_hp_err').html('');
                        $('#join_date').removeClass('border-danger');
                        $('#join_date_err').html('');
                        $('#end_date').removeClass('border-danger');
                        $('#end_date_err').html('');
                        $('#rekening').removeClass('border-danger');
                        $('#rekening_err').html('');
                    }
                    if (data.error) {
                        if (data.nik_err) {
                            $('#nama_err').html(data.nama_err);
                            $('#nama').addClass('border-danger');
                        } else {
                            $('#nama_err').html('');
                            $('#nama').removeClass('border-danger');
                        }
                        if (data.nik_err) {
                            $('#nik_err').html(data.nik_err);
                            $('#nik').addClass('border-danger');
                        } else {
                            $('#nik_err').html('');
                            $('#nik').removeClass('border-danger');
                        }
                        if (data.tempat_lahir_err) {
                            $('#tempat_lahir_err').html(data.tempat_lahir_err);
                            $('#tempat_lahir').addClass('border-danger');
                        } else {
                            $('#tempat_lahir_err').html('');
                            $('#tempat_lahir').removeClass('border-danger');
                        }
                        if (data.tgl_lahir_err) {
                            $('#tgl_lahir_err').html(data.tgl_lahir_err);
                            $('#tgl_lahir').addClass('border-danger');
                        } else {
                            $('#tgl_lahir_err').html('');
                            $('#tgl_lahir').removeClass('border-danger');
                        }
                        if (data.alamat_err) {
                            $('#alamat_err').html(data.alamat_err);
                            $('#alamat').addClass('border-danger');
                        } else {
                            $('#alamat_err').html('');
                            $('#alamat').removeClass('border-danger');
                        }
                        if (data.email_err) {
                            $('#email_err').html(data.email_err);
                            $('#email').addClass('border-danger');
                        } else {
                            $('#email_err').html('');
                            $('#email').removeClass('border-danger');
                        }
                        if (data.no_hp_err) {
                            $('#no_hp_err').html(data.no_hp_err);
                            $('#no_hp').addClass('border-danger');
                        } else {
                            $('#no_hp_err').html('');
                            $('#no_hp').removeClass('border-danger');
                        }
                        if (data.join_date_err) {
                            $('#join_date_err').html(data.join_date_err);
                            $('#join_date').addClass('border-danger');
                        } else {
                            $('#join_date_err').html('');
                            $('#join_date').removeClass('border-danger');
                        }
                        if (data.join_date_err) {
                            $('#end_date_err').html(data.end_date_err);
                            $('#end_date').addClass('border-danger');
                        } else {
                            $('#end_date_err').html('');
                            $('#end_date').removeClass('border-danger');
                        }
                        if (data.join_date_err) {
                            $('#rekening_err').html(data.rekening_err);
                            $('#rekening').addClass('border-danger');
                        } else {
                            $('#rekening_err').html('');
                            $('#rekening').removeClass('border-danger');
                        }
                    }
                    if (data.invalid) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#nama').removeClass('border-danger');
                        $('#nama_err').html('');
                        $('#nik').removeClass('border-danger');
                        $('#nik_err').html('');
                        $('#tempat_lahir').removeClass('border-danger');
                        $('#tempat_lahir_err').html('');
                        $('#tgl_lahir').removeClass('border-danger');
                        $('#tgl_lahir_err').html('');
                        $('#alamat').removeClass('border-danger');
                        $('#alamat_err').html('');
                        $('#no_hp').removeClass('border-danger');
                        $('#no_hp_err').html('');
                        $('#join_date').removeClass('border-danger');
                        $('#join_date_err').html('');
                        $('#end_date').removeClass('border-danger');
                        $('#end_date_err').html('');
                        $('#email').removeClass('border-danger');
                        $('#email_err').html('');
                        $('#rekening').removeClass('border-danger');
                        $('#rekening_err').html('');
                    }
                }
            });
        });
    });
</script>