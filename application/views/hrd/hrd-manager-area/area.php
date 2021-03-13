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
                table data area manager outlet perusahaan
                <a href="<?= base_url('hrd_menu_manager_area/form_insert_manager_area') ?>" class="btn btn-success btn-sm float-right">
                    insert manager area
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>outlet area</th>
                            <th>managar area</th>
                            <th>id karyawan</th>
                            <th>jabatan</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- myscript -->
<script>
    $(document).ready(function() {
        shwo_data();
        let table = $('#dataTable').DataTable();

        function shwo_data() {
            $('#dataTable').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?= site_url('hrd_menu_manager_area/get_all_data_manager_area') ?>",
                    type: "post"
                },
                "columnDefs": [{
                    "targets": [4, 5],
                    "orderable": false
                }]
            });
        }

        function reload_table() {
            table.ajax.reload(null, false);
        }

        $(document).on('click', '#delete', function() {
            let id_outlet = $(this).data('id');
            $.ajax({
                url: "<?= site_url('hrd_menu_manager_area/delete_manager_area') ?>",
                type: "post",
                data: {
                    id_outlet: id_outlet
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
                    }
                }
            });
        });
    });
</script>