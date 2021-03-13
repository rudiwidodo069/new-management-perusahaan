<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/dist/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/sweetalert2/sweetalert2.min.css">

    <!-- jquery -->
    <script src="<?= base_url() ?>assets/dist/jquery/jquery.min.js"></script>

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Register an Account</div>
            <div class="card-body">
                <form action="" method="post" id="form-regist">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="username" class="form-control" placeholder="User name" autofocus="autofocus" name="username">
                            <label for="username">User name</label>
                        </div>
                        <small id="username_err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="id_karyawan" class="form-control" placeholder="ID karyawan" autofocus="autofocus" name="id_karyawan">
                            <label for="id_karyawan">ID karyawan</label>
                        </div>
                        <small id="id_karyawan_err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="email" class="form-control" placeholder="Email address" name="email">
                            <label for="email">Email address</label>
                        </div>
                        <small id="email_err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="password1" class="form-control" placeholder="Password" name="password1">
                                    <label for="password1">Password</label>
                                </div>
                                <small id="password1_err" class="form-text text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="password2" class="form-control" placeholder="Confirm password" name="password2">
                                    <label for="password2">Confirm password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="status" class="form-control" name="status" value="NON-ACTIVE">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="btn-regist">Register</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="<?= base_url('auth') ?>">Login Page</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/dist/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- sweetalert2 -->
    <script src="<?= base_url() ?>assets/dist/sweetalert2/sweetalert2.min.js"></script>

    <!-- set time out  alert -->
    <script>
        $(document).ready(function() {
            $('#btn-regist').on('click', function(e) {
                e.preventDefault();
                $('#username').focus();
                let user = $('#username').val();
                let id_karyawan = $('#id_karyawan').val();
                let email = $('#email').val();
                let password1 = $('#password1').val();
                let password2 = $('#password2').val();
                let status = $('#status').val();
                $.ajax({
                    url: "<?= site_url('auth/karyawan_regist') ?>",
                    type: "post",
                    data: {
                        user: user,
                        id_karyawan: id_karyawan,
                        email: email,
                        password1: password1,
                        password2: password2,
                        status: status
                    },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        if (data.success) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                icon: "success"
                            });
                            $('#username_err').html(' ');
                            $('#id_karyawan_err').html(' ');
                            $('#email_err').html(' ');
                            $('#password1_err').html(' ');
                            location.href = "<?= base_url('auth') ?>";
                        }
                        if (data.error) {
                            if (data.username_err) {
                                $('#username_err').html(data.username_err);
                            } else {
                                $('#username_err').html(' ');
                            }
                            if (data.id_karyawan_err) {
                                $('#id_karyawan_err').html(data.id_karyawan_err);
                            } else {
                                $('#id_karyawan_err').html(' ');
                            }
                            if (data.email_err) {
                                $('#email_err').html(data.email_err);
                            } else {
                                $('#email_err').html(' ');
                            }
                            if (data.password_err) {
                                $('#password1_err').html(data.password_err);
                            } else {
                                $('#password1_err').html(' ');
                            }
                        }
                        if (data.invalid) {
                            swal.fire({
                                title: "" + data.pesan + "",
                                icon: "warning"
                            });
                            $('#form-regist')[0].reset();
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>