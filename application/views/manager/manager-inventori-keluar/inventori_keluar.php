<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU MANAGER / <?= $title ?></li>
        </ol>

        <!-- Page Content -->
        <h1><?= $title ?></h1>
        <hr>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                table data inventori
                <button type="button" class="btn btn-primary btn-sm float-right" data-target="#modal-insert" data-toggle="modal">
                    insert inventori
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama barang</th>
                            <th>kode barang</th>
                            <th>jumlah keluar</th>
                            <th>tanggal keluar</th>
                            <th>keterangan</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>

                <!-- modal insert inventori -->
                <div class="modal" id="modal-insert">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="title">Form Insert Inventori Keluar</h3>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="form-insert">
                                    <label for="id_kategori">
                                        <strong>nama barang</strong>
                                    </label>
                                    <div class="form-group">
                                        <select class="form-control" name="id_kategori" id="id_kategori">
                                            <?php foreach ($get_all_kategori as $kategori) : ?>
                                                <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_keluar">
                                            <strong>jumlah keluar</strong>
                                        </label>
                                        <input type="text" name="jumlah_keluar" id="jumlah_keluar" class="form-control">
                                        <span class="text-danger" id="jumlah_keluar_err"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal_keluar">
                                            <strong>tanggal keluar</strong>
                                        </label>
                                        <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control">
                                        <span class="text-danger" id="tanggal_keluar_err"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">
                                            <strong>keterangan</strong>
                                        </label>
                                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                                        <span class="text-danger" id="keterangan_err"></span>
                                    </div>

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-insert">simpan</button>
                                </form>
                            </div>
                            <!-- end modal insert inventori -->
                            <div class="modal-footer d-block text-muted text-center">
                                <p>isi data dengan benar</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal update inventori -->
                <div class="modal" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="title">Form Update Inventori Keluar</h3>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="form-update">
                                    <div class="form-group">
                                        <input type="hidden" name="id_inventori" id="id_inventori" class="form-control">
                                    </div>
                                    <label for="id_kategori_update">
                                        <strong>nama barang</strong>
                                    </label>
                                    <div class="form-group">
                                        <select class="form-control" name="id_kategori" id="id_kategori_update">
                                            <?php foreach ($get_all_kategori as $kategori) : ?>
                                                <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jumlah_keluar_update">
                                            <strong>jumlah keluar</strong>
                                        </label>
                                        <input type="text" name="jumlah_keluar" id="jumlah_keluar_update" class="form-control">
                                        <span class="text-danger" id="jumlah_keluar_update_err"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggal_keluar_update">
                                            <strong>tanggal keluar</strong>
                                        </label>
                                        <input type="date" name="tanggal_keluar" id="tanggal_keluar_update" class="form-control">
                                        <span class="text-danger" id="tanggal_keluar_update_err"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan_update">
                                            <strong>keterangan</strong>
                                        </label>
                                        <textarea class="form-control" name="keterangan" id="keterangan_update" rows="3"></textarea>
                                        <span class="text-danger" id="keterangan_update_err"></span>
                                    </div>

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">batal</button>
                                    <button type="submit" class="btn btn-success float-right" id="btn-update">update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal update inventori -->
            </div>
            <!-- end card-body -->
        </div>
    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {
        show_inventori();
        let table = $('#dataTable').DataTable();

        function show_inventori() {
            $('#dataTable').DataTable({
                "ajax": {
                    url: "<?= site_url('manager_menu_inventori_keluar/get_all_data_inventori') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [1, 2, 3, 4, 5, 6],
                    "orderable": false
                }]
            });
        }

        function reload_table() {
            table.ajax.reload(null, false);
        }

        $('#btn-insert').on('click', function(e) {
            e.preventDefault();
            let id_kategori = $('#id_kategori').val();
            let jumlah_keluar = $('#jumlah_keluar').val();
            let tanggal_keluar = $('#tanggal_keluar').val();
            let keterangan = $('#keterangan').val();
            $.ajax({
                url: "<?= site_url('manager_menu_inventori_keluar/insert_inventori') ?>",
                type: "post",
                data: {
                    id_kategori: id_kategori,
                    jumlah_keluar: jumlah_keluar,
                    tanggal_keluar: tanggal_keluar,
                    keterangan: keterangan
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
                        $('#jumlah_keluar').removeClass('border-danger');
                        $('#jumlah_keluar_err').html('');
                        $('#tanggal_keluar').removeClass('border-danger');
                        $('#tanggal_keluar_err').html('');
                        $('#keterangan').removeClass('border-danger');
                        $('#keterangan_err').html('');
                        reload_table();
                    }
                    if (data.error) {
                        if (data.jumlah_keluar_err) {
                            $('#jumlah_keluar').addClass('border-danger');
                            $('#jumlah_keluar_err').html(data.jumlah_keluar_err);
                        } else {
                            $('#jumlah_keluar').removeClass('border-danger');
                            $('#jumlah_keluar_err').html('');
                        }
                        if (data.tanggal_keluar_err) {
                            $('#tanggal_keluar').addClass('border-danger');
                            $('#tanggal_keluar_err').html(data.tanggal_keluar_err);
                        } else {
                            $('#tanggal_keluar').removeClass('border-danger');
                            $('#tanggal_keluar_err').html('');
                        }
                        if (data.keterangan_err) {
                            $('#keterangan').addClass('border-danger');
                            $('#keterangan_err').html(data.keterangan_err);
                        } else {
                            $('#keterangan').removeClass('border-danger');
                            $('#keterangan_err').html('');
                        }
                    }
                }
            });
        });

        $(document).on('click', '#update', function() {
            let id_inventori = $(this).data('id');
            $.ajax({
                url: "<?= site_url('manager_menu_inventori_keluar/get_data_inventori') ?>",
                type: "get",
                data: {
                    id_inventori: id_inventori
                },
                dataType: "json",
                success: function(data) {
                    $('#id_inventori').val(id_inventori);
                    $('#id_kategori_update').val(data.id_kategori);
                    $('#jumlah_keluar_update').val(data.jumlah_keluar);
                    $('#tanggal_keluar_update').val(data.tanggal_keluar);
                    $('#keterangan_update').val(data.keterangan);
                }
            });
        });

        $('#btn-update').on('click', function(e) {
            e.preventDefault();
            let id_inventori = $('#id_inventori').val();
            let id_kategori = $('#id_kategori_update').val();
            let jumlah_keluar = $('#jumlah_keluar_update').val();
            let tanggal_keluar = $('#tanggal_keluar_update').val();
            let keterangan = $('#keterangan_update').val();
            $.ajax({
                url: "<?= site_url('manager_menu_inventori_keluar/update_inventori') ?>",
                type: "post",
                data: {
                    id_inventori: id_inventori,
                    id_kategori: id_kategori,
                    jumlah_keluar: jumlah_keluar,
                    tanggal_keluar: tanggal_keluar,
                    keterangan: keterangan
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
                        $('#jumlah_keluar_update').removeClass('border-danger');
                        $('#jumlah_keluar_update_err').html('');
                        $('#tanggal_keluar_update').removeClass('border-danger');
                        $('#tanggal_keluar_update_err').html('');
                        $('#keterangan_update').removeClass('border-danger');
                        $('#keterangan_update_err').html('');
                        $('#modal-update').modal('hide');
                        reload_table();
                    }
                    if (data.error) {
                        if (data.jumlah_keluar_err) {
                            $('#jumlah_keluar_update').addClass('border-danger');
                            $('#jumlah_keluar_update_err').html(data.jumlah_keluar_err);
                        } else {
                            $('#jumlah_keluar_update').removeClass('border-danger');
                            $('#jumlah_keluar_update_err').html('');
                        }
                        if (data.tanggal_keluar_err) {
                            $('#tanggal_keluar_update').addClass('border-danger');
                            $('#tanggal_keluar_update_err').html(data.tanggal_keluar_err);
                        } else {
                            $('#tanggal_keluar_update').removeClass('border-danger');
                            $('#tanggal_keluar_update_err').html('');
                        }
                        if (data.keterangan_err) {
                            $('#keterangan_update').addClass('border-danger');
                            $('#keterangan_update_err').html(data.keterangan_err);
                        } else {
                            $('#keterangan_update').removeClass('border-danger');
                            $('#keterangan_update_err').html('');
                        }
                    }
                }
            });
        });

    });
</script>