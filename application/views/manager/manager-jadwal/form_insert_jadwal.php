<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU MANAGER / <?= $title ?></li>
        </ol>

        <!-- DataTables Example -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="title text-center">Form Insert jadwal absensi karyawan</h3>
                        </div>
                        <form action="" method="POST" id="form-insert">

                            <div class="row p-3">
                                <div class="col-md-5">
                                    <label for="nama_karyawan">
                                        <strong>nama karyawan</strong>
                                    </label>
                                    <div class="form-group input-group">
                                        <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control input-group-append" readonly>
                                        <button type="button" class="btn btn-primary" data-target="#search-karyawan" data-toggle="modal">
                                            <i class="fas fa-fw fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id_karyawan">
                                            <strong>id karyawan</strong>
                                        </label>
                                        <input type="text" name="id_karyawan" id="id_karyawan" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="id_cabang">
                                            <strong>cabang</strong>
                                        </label>
                                        <input type="hidden" name="id_cabang" id="id_cabang" class="form-control">
                                        <input type="text" name="lokasi_cabang" id="lokasi_cabang" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="jadwal">

                            </div>

                            <!-- <div class="form-group">
                                <section id="minggu" class="form-control">
                                    <option value="1">minggu ke satu</option>
                                    <option value="2">mingg ke dua</option>
                                    <option value="3">minggu ke tiga</option>
                                    <option value="4">minggu ke empat</option>
                                </section>
                            </div> -->

                            <a href="<?= site_url('manager_menu_jadwal_absensi') ?>" class="btn btn-primary ml-5">kembali</a>
                            <button type="button" class="btn btn-success float-right mr-5 mb-3" id="btn-insert">simpan</button>
                        </form>
                    </div>

                    <!-- modal search karyawan -->
                    <div class="modal" id="search-karyawan">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="title">search karyawan</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-sm" id="table-karyawan" width="100%">
                                        <thead>
                                            <tr>
                                                <th>nama karyawan</th>
                                                <th>id karyawan</th>
                                                <th>jabatan</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php foreach ($get_all_karyawan as $karyawan) : ?>
                                                <tr>
                                                    <td><?= $karyawan['nama_karyawan'] ?></td>
                                                    <td><?= $karyawan['id_karyawan'] ?></td>
                                                    <td><?= $karyawan['jabatan'] ?></td>
                                                    <td>
                                                        <button type="button" class="badge badge-primary" data-id_karyawan="<?= $karyawan['id_karyawan'] ?>" data-nama_karyawan="<?= $karyawan['nama_karyawan'] ?>" data-id_cabang="<?= $karyawan['id_cabang'] ?>" data-cabang="<?= $karyawan['lokasi_cabang'] ?>" id="pilih-karyawan">
                                                            pilih <i class="fas fa-fw fa-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card body -->
            </div>
        </div>
    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {
        $('#table-karyawan').dataTable();

        function jadwal_absensi() {
            let hari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];
            return hari;
        }

        $(document).on('click', '#pilih-karyawan', function() {
            let id_karyawan = $(this).data('id_karyawan');
            let nama_karyawan = $(this).data('nama_karyawan');
            let id_cabang = $(this).data('id_cabang');
            let lokasi_cabang = $(this).data('cabang');
            $('#id_karyawan').val(id_karyawan);
            $('#nama_karyawan').val(nama_karyawan);
            $('#id_cabang').val(id_cabang);
            $('#lokasi_cabang').val(lokasi_cabang);
            let hari = jadwal_absensi();
            let i = 1;
            let html = '';
            hari.forEach(data => {
                html += '<div class="form-group">' +
                    '<div class="row">' +
                    '<div class="col-md-1 offset-1">' +
                    '<label for="senin">' +
                    '<strong>' + data + '</strong>' +
                    '</label>' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<input type="date" name="tanggal' + i + '" id="' + data + '_tanggal" class="form-control">' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<input type="time" name="masuk' + i + '" id="' + data + '_masuk" class="form-control">' +
                    '</div>' +
                    '<div class="col-md-3">' +
                    '<input type="time" name="keluar' + i + '" id="' + data + '_keluar" class="form-control">' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                i++;
            });
            $('.jadwal').html(html);
            $('.jadwal').show();
            $('#search-karyawan').modal('hide');
        });

        $('#btn-insert').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('manager_menu_jadwal_absensi/insert_jadwal_absensi') ?>",
                type: "post",
                data: $('#form-insert').serialize(),
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
                        let hari = jadwal_absensi();
                        hari.forEach(data => {
                            $('#' + data + '_tanggal').removeClass('border-danger');
                        });
                        $('.jadwal').hide();
                    }
                    if (data.error) {
                        swal.fire({
                            text: "data tidak boleh kosong",
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        let jadwal = jadwal_absensi();
                        if (data.senin_tanggal_err) {
                            $('#senin_tanggal').addClass('border-danger');
                        } else {
                            $('#senin_tanggal').removeClass('border-danger');
                        }
                        if (data.selasa_tanggal_err) {
                            $('#selasa_tanggal').addClass('border-danger');
                        } else {
                            $('#selasa_tanggal').removeClass('border-danger');
                        }
                        if (data.rabu_tanggal_err) {
                            $('#rabu_tanggal').addClass('border-danger');
                        } else {
                            $('#rabu_tanggal').removeClass('border-danger');
                        }
                        if (data.kamis_tanggal_err) {
                            $('#kamis_tanggal').addClass('border-danger');
                        } else {
                            $('#kamis_tanggal').removeClass('border-danger');
                        }
                        if (data.jumat_tanggal_err) {
                            $('#jumat_tanggal').addClass('border-danger');
                        } else {
                            $('#jumat_tanggal').removeClass('border-danger');
                        }
                        if (data.sabtu_tanggal_err) {
                            $('#sabtu_tanggal').addClass('border-danger');
                        } else {
                            $('#sabtu_tanggal').removeClass('border-danger');
                        }
                        if (data.minggu_tanggal_err) {
                            $('#minggu_tanggal').addClass('border-danger');
                        } else {
                            $('#minggu_tanggal').removeClass('border-danger');
                        }
                    }
                }
            });
        });
    });
</script>