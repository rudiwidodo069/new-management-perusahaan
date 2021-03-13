<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">MENU MANAGER / <?= $title ?></li>
        </ol>

        <!-- DataTables Example -->
        <div class="container">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="title text-center">Form Update Inventori</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="form-update">

                        <div class="form-group">
                            <input type="hidden" name="id_inventori" id="id_inventori" class="form-control" value="<?= $update['id_inventori'] ?>">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="nama_kategori">
                                    <strong>nama barang</strong>
                                </label>
                                <div class="form-group input-group">
                                    <input type="hidden" name="id_kategori" id="id_kategori" class="form-control" value="<?= $update['id_kategori'] ?>">
                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control input-group-append" value="<?= $update['nama_kategori'] ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-target="#modal-kategori" data-toggle="modal" id="search-kategori">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_barang">
                                        <strong>kode barang</strong>
                                    </label>
                                    <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="<?= $update['kode_barang'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="nama_pt">
                                    <strong>vendor</strong>
                                </label>
                                <div class="form-group input-group">
                                    <input type="hidden" name="id_supplier" id="id_supplier" class="form-control" value="<?= $update['id_supplier'] ?>">
                                    <input type="text" name="nama_pt" id="nama_pt" class="form-control input-group-append" value="<?= $update['nama_pt'] ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-target="#modal-supplier" data-toggle="modal" id="search-supplier">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_pt">
                                        <strong>alamat vendor</strong>
                                    </label>
                                    <input type="text" name="alamat_pt" id="alamat_pt" class="form-control" value="<?= $update['alamat_pt'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="nama_karyawan">
                                    <strong>karyawan</strong>
                                </label>
                                <div class="form-group input-group">
                                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control input-group-append" value="<?= $update['nama_karyawan'] ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-target="#modal-karyawan" data-toggle="modal" id="search-karyawan">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_karyawan">
                                        <strong>id karyawan</strong>
                                    </label>
                                    <input type="text" name="id_karyawan" id="id_karyawan" class="form-control" value="<?= $update['id_karyawan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cabang">
                                        <strong>cabang</strong>
                                    </label>
                                    <input type="hidden" name="id_cabang" id="id_cabang" class="form-control" value="<?= $update['id_cabang'] ?>">
                                    <input type="text" name="lokasi_cabang" id="lokasi_cabang" class="form-control" value="<?= $update['lokasi_cabang'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jumlah_masuk">
                                        <strong>jumlah masuk</strong>
                                    </label>
                                    <input type="text" name="jumlah_masuk" id="jumlah_masuk" class="form-control" value="<?= $update['jumlah_masuk'] ?>">
                                    <span class="text-danger" id="jumlah_masuk_err"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="harga_vendor">
                                        <strong>harga vendor</strong>
                                    </label>
                                    <input type="text" name="harga_vendor" id="harga_vendor" class="form-control" value="<?= $update['harga_vendor'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_harga">
                                        <strong>total harga</strong>
                                    </label>
                                    <input type="text" name="total_harga" id="total_harga" class="form-control" value="<?= $update['total_harga'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tanggal_masuk">
                                        <strong>tanggal masuk</strong>
                                    </label>
                                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="<?= $update['tanggal_masuk'] ?>">
                                    <span class="text-danger" id="tanggal_masuk_err"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="tanggal_exp">
                                    <strong>tanggal EXP</strong>
                                </label>
                                <input type="date" name="tanggal_exp" id="tanggal_exp" class="form-control" value="<?= $update['tanggal_exp'] ?>">
                                <span class="text-danger" id="tanggal_exp_err"></span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="keterangan">
                                        <strong>keterangan</strong>
                                    </label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="3"><?= $update['keterangan'] ?></textarea>
                                    <span class="text-danger" id="keterangan_err"></span>
                                </div>
                            </div>
                        </div>

                        <a href="<?= site_url('manager_menu_inventori_masuk') ?>" class="btn btn-primary">kembali</a>
                        <button type="submit" class="btn btn-success float-right" id="btn-update">simpan</button>
                    </form>

                    <!-- modal search kategori -->
                    <div class="modal" id="modal-kategori">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="title">data barang</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-sm" id="table-kategori" width="100%">
                                        <thead>
                                            <tr>
                                                <th>nama barang</th>
                                                <th>kode barang</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php foreach ($get_all_kategori as $kategori) : ?>
                                                <tr>
                                                    <td><?= $kategori['nama_kategori'] ?></td>
                                                    <td><?= $kategori['kode_barang'] ?></td>
                                                    <td>
                                                        <button type="button" class="badge badge-primary" data-id_kategori="<?= $kategori['id_kategori'] ?>" data-nama_kategori="<?= $kategori['nama_kategori'] ?>" data-kode_barang="<?= $kategori['kode_barang'] ?>" data-harga_vendor="<?= $kategori['harga_vendor'] ?>" id="pilih-kategori">
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
                    <!-- end modal kategori -->

                    <!-- modal search suppliier -->
                    <div class="modal" id="modal-supplier">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="title">data vendor</h3>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-sm" id="table-supplier" width="100%">
                                        <thead>
                                            <tr>
                                                <th>vendor</th>
                                                <th>alamat</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php foreach ($get_all_supplier as $supplier) : ?>
                                                <tr>
                                                    <td><?= $supplier['nama_pt'] ?></td>
                                                    <td><?= $supplier['alamat_pt'] ?></td>
                                                    <td>
                                                        <button type="button" class="badge badge-primary" data-id_supplier="<?= $supplier['id_supplier'] ?>" data-nama_pt="<?= $supplier['nama_pt'] ?>" data-alamat_pt="<?= $supplier['alamat_pt'] ?>" id="pilih-supplier">
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
                    <!-- end modal supplier -->

                    <!-- modal search karyawan -->
                    <div class="modal" id="modal-karyawan">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="title">data karyawan</h3>
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
                    <!-- end modal karyawan -->

                </div>
                <!-- end card-body -->
            </div>
        </div>

    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {
        $('#table-kategori').dataTable();

        $(document).on('click', '#pilih-kategori', function() {
            let id_kategori = $(this).data('id_kategori');
            let nama_kategori = $(this).data('nama_kategori');
            let kode_barang = $(this).data('kode_barang');
            let harga_vendor = $(this).data('harga_vendor');
            $('#id_kategori').val(id_kategori);
            $('#nama_kategori').val(nama_kategori);
            $('#kode_barang').val(kode_barang);
            $('#harga_vendor').val(harga_vendor);
            $('#modal-kategori').modal('hide');
        });

        $('#table-supplier').dataTable();
        $(document).on('click', '#pilih-supplier', function() {
            let id_supplier = $(this).data('id_supplier');
            let nama_pt = $(this).data('nama_pt');
            let alamat_pt = $(this).data('alamat_pt');
            $('#id_supplier').val(id_supplier);
            $('#nama_pt').val(nama_pt);
            $('#alamat_pt').val(alamat_pt);
            $('#modal-supplier').modal('hide');
        });

        $('#table-karyawan').dataTable();
        $(document).on('click', '#pilih-karyawan', function() {
            let id_karyawan = $(this).data('id_karyawan');
            let nama_karyawan = $(this).data('nama_karyawan');
            let id_cabang = $(this).data('id_cabang');
            let lokasi_cabang = $(this).data('cabang');
            $('#id_karyawan').val(id_karyawan);
            $('#nama_karyawan').val(nama_karyawan);
            $('#id_cabang').val(id_cabang);
            $('#lokasi_cabang').val(lokasi_cabang);
            $('#modal-karyawan').modal('hide');
            $('#jumlah_masuk').focus();
        });

        $('#jumlah_masuk').keyup(function() {
            let jumlah_masuk = $('#jumlah_masuk').val();
            let harga_vendor = $('#harga_vendor').val();
            let harga_total = jumlah_masuk * harga_vendor;
            $('#total_harga').val(harga_total);
        });

        $('#btn-update').on('click', function(e) {
            e.preventDefault();
            let id_inventori = $('#id_inventori').val();
            let id_cabang = $('#id_cabang').val();
            let id_kategori = $('#id_kategori').val();
            let kode_barang = $('#kode_barang').val();
            let id_supplier = $('#id_supplier').val();
            let id_karyawan = $('#id_karyawan').val();
            let jumlah_masuk = $('#jumlah_masuk').val();
            let harga_vendor = $('#harga_vendor').val();
            let total_harga = $('#total_harga').val();
            let tanggal_masuk = $('#tanggal_masuk').val();
            let tanggal_exp = $('#tanggal_exp').val();
            let keterangan = $('#keterangan').val();
            $.ajax({
                url: "<?= site_url('manager_menu_inventori_masuk/update_inventori_masuk') ?>",
                type: "post",
                data: {
                    id_inventori: id_inventori,
                    id_cabang: id_cabang,
                    id_kategori: id_kategori,
                    kode_barang: kode_barang,
                    id_supplier: id_supplier,
                    id_karyawan: id_karyawan,
                    jumlah_masuk: jumlah_masuk,
                    harga_vendor: harga_vendor,
                    total_harga: total_harga,
                    tanggal_masuk: tanggal_masuk,
                    tanggal_exp: tanggal_exp,
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
                        setTimeout(function() {
                            location.href = '<?= site_url('manager_menu_inventori_masuk/detail_inventori_masuk') . '?id=' . $update['id_inventori'] ?>';
                        }, 1300);
                    }
                    if (data.invalid) {
                        swal.fire({
                            text: "" + data.pesan + "",
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                    if (data.error) {
                        if (data.jumlah_masuk_err) {
                            $('#jumlah_masuk_err').html(data.jumlah_masuk_err);
                            $('#jumlah_masuk').addClass('border-danger');
                        } else {
                            $('#jumlah_masuk_err').html('');
                            $('#jumlah_masuk').removeClass('border-danger');
                        }
                        if (data.tanggal_masuk_err) {
                            $('#tanggal_masuk_err').html(data.tanggal_masuk_err);
                            $('#tanggal_masuk').addClass('border-danger');
                        } else {
                            $('#tanggal_masuk_err').html('');
                            $('#tanggal_masuk').removeClass('border-danger');
                        }
                        if (data.tanggal_exp_err) {
                            $('#tanggal_exp_err').html(data.tanggal_exp_err);
                            $('#tanggal_exp').addClass('border-danger');
                        } else {
                            $('#tanggal_exp_err').html('');
                            $('#tanggal_exp').removeClass('border-danger');
                        }
                        if (data.keterangan_err) {
                            $('#keterangan_err').html(data.keterangan_err);
                            $('#keterangan').addClass('border-danger');
                        } else {
                            $('#keterangan_err').html('');
                            $('#keterangan').removeClass('border-danger');
                        }
                    }
                }
            });
        });
    });
</script>