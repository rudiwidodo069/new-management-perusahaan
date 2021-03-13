<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/dist/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom css -->

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/sweetalert2/sweetalert2.min.css">

    <!-- jquery -->
    <script src="<?= base_url() ?>assets/dist/jquery/jquery.min.js"></script>

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="pesan">
                <?= $this->session->flashdata('pesan') ?>
            </div>
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="" method="post" id="form-login">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="email">
                            <label for="email">Email</label>
                        </div>
                        <small id="email_err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="password" class="form-control" placeholder="Password" required="required" name="password">
                            <label for="password">Password</label>
                        </div>
                        <small id="password_err" class="form-text text-danger"></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="login">Login</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="<?= site_url('auth/regist') ?>">Register an Account</a>
                    <a class="d-block small" href="<?= base_url('qrcode') ?>">LOGIN FOR BARCODE</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/dist/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- sweetalert2 -->
    <script src="<?= base_url() ?>assets/dist/sweetalert2/sweetalert2.min.js"></script>

    <!-- myscript login realtime -->
    <script>
        $(document).ready(function() {
            $('#login').on('click', function(e) {
                $('#email').focus();
                e.preventDefault();
                let email = $('#email').val();
                let password = $('#password').val();
                $.ajax({
                    url: "<?= site_url('auth/karyawan_login') ?>",
                    type: "post",
                    data: {
                        email: email,
                        password: password
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.success) {
                            location.href = "<?= base_url()  ?>" + data.pesan + "";
                            $('#email_err').html('');
                            $('#password_err').html('');
                        }
                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                icon: "warning",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#form-login')[0].reset();
                            $('#email_err').html('');
                            $('#password_err').html('');
                        }
                        if (data.error) {
                            if (data.email_err) {
                                $('#email_err').html(data.email_err);
                            } else {
                                $('#email_err').html('');
                            }
                            if (data.password_err) {
                                $('#password_err').html(data.password_err);
                            } else {
                                $('#password_err').html('');
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>