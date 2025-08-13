<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>403 Unauthorized</title>
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/styles.css" />
</head>

<body>
    <div id="main-wrapper" class="auth-customizer-none">
        <div class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <!-- <img src="../assets/images/backgrounds/maintenance.svg" alt="" class="img-fluid" width="500"> -->
                            <h1>403 - Unauthorized</h1>
                            <p>You do not have permission to access this page.</p>
                            <a class="btn btn-primary" href="<?= base_url() ?>" role="button">Go Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/simplebar.min.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/app.init.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/theme.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>