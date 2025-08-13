<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/logo/logo.png" />
    <!-- Core Css -->
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/styles.css" />
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/custom.css" />
    <link rel="stylesheet"
        href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/sweetalert2/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title><?= BUSINESS_NAME ?></title>
</head>

<?= view('utils/sweetalert') ?>

<body>
    <div id="main-wrapper" class="auth-customizer-none">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-12 col-lg-12 col-xxl-12 auth-card">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?= base_url('/') ?>" class="align-items-center d-flex justify-content-center logo-img mb-5 text-center text-nowrap w-100">
                                    <h2><?= BUSINESS_NAME?></h2>
                                </a>
                                <div class="position-relative text-center my-4">
                                    <h4 class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">Sign In</h4>
                                </div>
                                <form action="<?= base_url('auth/login') ?>" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" id="password" name="password" aria-label="password" aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="toggle-password"><i class="fas fa-eye-slash"></i></span>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 mb-4 rounded-1">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="icon ti ti-settings fs-7"></i>
            </button>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <?= view('utils/sweetalert') ?>
    <script>
        $(document).ready(function() {
            $('#toggle-password').click(function() {
                // Toggle the type attribute of the password field
                let passwordField = $('#password');
                let passwordFieldType = passwordField.attr('type');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).html('<i class="fas fa-eye"></i>');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).html('<i class="fas fa-eye-slash"></i>');
                }
            });
        });
    </script>

    <!-- Import Js Files -->
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/simplebar.min.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/app.init.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/theme.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/app.min.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/sidebarmenu.js"></script>

    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/sweetalert2/sweet-alert.init.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

</body>

</html>