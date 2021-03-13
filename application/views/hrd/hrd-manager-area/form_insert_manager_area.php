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
                            <h3 class="title text-center">Form Insert Outlet Manager Area</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" id="form-insert">

                                <div class="form-group">
                                    <input type="hidden" name="id_outlet" id="id_outlet" class="form-control" readonly>
                                </div>

                                <div class="label">
                                    <label for="outlet"><strong>outlet area</strong></label>
                                </div>
                                <div class="form-group input-group">
                                    <input type="text" name="outlet" id="outlet" class="form-control input-group-append" readonly>
                                    <button type="button" class="btn btn-primary" data-target="#modal-outlet" data-toggle="modal" id="search-outlet">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </div>

                                <div class="form-group">
                                    <div class="label">
                                        <label for="lokasi_cabang"><strong>cabang outlet</strong></label>
                                    </div>
                                    <div class="row cabang">

                                    </div>
                                </div>

                                <div class="label">
                                    <label for="karyawan"><strong>karyawan</strong></label>
                                </div>
                                <div class="form-group input-group">
                                    <input type="text" name="karyawan" id="karyawan" class="form-control input-group-append" readonly>
                                    <button type="button" class="btn btn-primary" data-target="#modal-karyawan" data-toggle="modal" id="search-karyawan">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </div>

                                <div class="form-group">
                                    <div class="label">
                                        <label for="id_karyawan"><strong>id karyawan</strong></label>
                                    </div>
                                    <input type="text" name="id_karyawan" id="id_karyawan" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <div class="label">
                                        <label for="nik_karyawan"><strong>nik karyawan</strong></label>
                                    </div>
                                    <input type="text" name="nik_karyawan" id="nik_karyawan" class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <div class="label">
                                        <label for="jabatan"><strong>jabatan</strong></label>
                                    </div>
                                    <input type="text" name="jabatan" id="jabatan" class="form-control" readonly>
                                </div>

                                <a href="<?= base_url('hrd_menu_manager_area') ?>" class="btn btn-primary">kembali</a>
                                <button type="submit" class="btn btn-success float-right" id="btn-update">simpan</button>
                            </form>

                            <!-- modal  outlet-->
                            <div class="modal" id="modal-outlet">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="title">data outlet area</h3>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-sm" id="tableOutlet" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>no</th>
                                                        <th>outlet area</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($get_all_outlet as $outlet) : ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $outlet['area_outlet'] ?></td>
                                                            <td>
                                                                <button type="button" class="badge badge-primary" data-id="<?= $outlet['id_outlet'] ?>" data-area="<?= $outlet['area_outlet'] ?>" id="pilih-outlet">
                                                                    pilih <i class="fas fa-fw fa-check"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal outlet -->

                            <!-- modal  karyawan-->
                            <div class="modal" id="modal-karyawan">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="title">data manager area</h3>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-sm" id="tableKaryawan" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>no</th>
                                                        <th>nama karyawan</th>
                                                        <th>jabatan</th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center">
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($get_all_karyawan as $karyawan) : ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $karyawan['nama_karyawan'] ?></td>
                                                            <td><?= $karyawan['jabatan'] ?></td>
                                                            <td>
                                                                <button type="button" class="badge badge-primary" data-nik="<?= $karyawan['nik_karyawan'] ?>" id="pilih-karyawan">
                                                                    pilih <i class="fas fa-fw fa-check"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal  outlet-->

                        </div>
                        <div class="card-footer">
                            <p class="text-center text-muted">isi data dengan benar</p>
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

        $('#tableOutlet').dataTable();
        $('#tableKaryawan').dataTable();

        $(document).on('click', '#pilih-outlet', function() {
            $('#tableOutlet').DataTable();
            let id_outlet = $(this).data('id');
            let area = $(this).data('area');
            $.ajax({
                url: "<?= site_url('hrd_menu_manager_area/get_data_area') ?>",
                type: "post",
                data: {
                    id_outlet: id_outlet
                },
                dataType: "json",
                success: function(data) {
                    let html = '';
                    for (let i = 0; i < data.length; i++) {
                        html += '<div class="col-md-3">' +
                            '<input class="form-control p-2" name="cabang" id="cabang' + i + '" value="' + data[i].lokasi_cabang + '" readonly>' +
                            '</div>';
                    }
                    $('.cabang').show().html(html);
                }
            });
            $('#modal-outlet').modal('hide');
            $('#id_outlet').val(id_outlet);
            $('#outlet').val(area);
        });

        $(document).on('click', '#pilih-karyawan', function() {
            $('#tableKaryawan').DataTable();
            let nik_karyawan = $(this).data('nik');
            $.ajax({
                url: "<?= site_url('hrd_menu_manager_area/get_data_karyawan') ?>",
                type: "post",
                data: {
                    nik: nik_karyawan
                },
                dataType: "json",
                success: function(data) {
                    $('#karyawan').val(data.nama_karyawan);
                    $('#id_karyawan').val(data.id_karyawan);
                    $('#nik_karyawan').val(data.nik_karyawan);
                    $('#id_jabatan').val(data.id_jabatan);
                    $('#jabatan').val(data.jabatan);
                }
            });
            $('#modal-karyawan').modal('hide');
        });

        $('#btn-update').on('click', function(e) {
            e.preventDefault();
            let id_outlet = $('#id_outlet').val();
            let id_karyawan = $('#id_karyawan').val();
            $.ajax({
                type: "post",
                url: "<?= site_url('hrd_menu_manager_area/insert_manager_area') ?>",
                data: {
                    id_outlet: id_outlet,
                    id_karyawan: id_karyawan
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
                        setTimeout(function() {
                            location.href = '<?= base_url('hrd_menu_manager_area/form_insert_manager_area') ?>';
                        }, 1500);
                    }
                    if (data.invalid) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        });
    });
</script>