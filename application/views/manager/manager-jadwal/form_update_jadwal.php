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
                            <h3 class="title text-center">Form update jadwal absensi karyawan</h3>
                        </div>
                        <form action="" method="POST" id="form-update">

                            <div class="row p-3 text-center">
                                <div class="col-md-3">
                                    <label for="nama_karyawan">
                                        <strong>nama karyawan</strong>
                                    </label>
                                    <div class="form-group">
                                        <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" value="<?= $karyawan['nama_karyawan'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id_karyawan">
                                            <strong>id karyawan</strong>
                                        </label>
                                        <input type="text" name="id_karyawan" id="id_karyawan" class="form-control" value="<?= $karyawan['id_karyawan'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id_cabang">
                                            <strong>cabang</strong>
                                        </label>
                                        <input type="hidden" name="id_cabang" id="id_cabang" class="form-control" value="<?= $karyawan['id_cabang'] ?>">
                                        <input type="text" name="lokasi_cabang" id="lokasi_cabang" class="form-control" value="<?= $karyawan_cabang ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="id_karyawan">
                                            <strong>kode schedule</strong>
                                        </label>
                                        <input type="text" name="kode_schedule" id="kode_schedule" class="form-control" value="<?= $_GET['schedule'] ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <?php $data = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"]; ?>
                            <?php $i = 0; ?>
                            <?php foreach ($jadwal_absensi as $absensi) : ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 offset-1">
                                            <label>
                                                <strong><?= $data[$i] ?></strong>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="hidden" name="id_jadwal<?= $i + 1 ?>" value="<?= $absensi['id_jadwal'] ?>" class="form-control">
                                            <input type="date" name="tanggal<?= $i + 1 ?>" id="<?= $data[$i] ?>_tanggal" class="form-control" value="<?= $absensi['tanggal_jadwal'] ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="time" name="masuk<?= $i + 1 ?>" id="masuk<?= $i + 1 ?>" class="form-control" value="<?= $absensi[$data[$i] . '_masuk'] ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="time" name="keluar<?= $i + 1 ?>" id="keluar<?= $i + 1 ?>" class="form-control" value="<?= $absensi[$data[$i] . '_keluar'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                            <a href="<?= site_url('manager_menu_jadwal_absensi') ?>" class="btn btn-primary ml-5">kembali</a>
                            <button type="button" class="btn btn-success float-right mr-5 mb-3" id="btn-update">update</button>
                        </form>
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

        function jadwal_absensi() {
            let hari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];
            return hari;
        }

        $('#btn-update').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('manager_menu_jadwal_absensi/update_jadwal_absensi') ?>",
                type: "post",
                data: $('#form-update').serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.success) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setInterval(function() {
                            location.href = "<?= site_url('manager_menu_jadwal_absensi') ?>";
                        }, 1200);
                    }
                    if (data.error) {
                        swal.fire({
                            text: "data tidak boleh kosong",
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500
                        });
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