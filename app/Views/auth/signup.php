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
    <link href="<?= base_url(DASHBOARD_ASSETS) ?>admin_assets/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/styles.css" />
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/custom.css" />
    <link rel="stylesheet"
        href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/sweetalert2/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title><?= BUSINESS_NAME ?></title>
</head>

<body>
    <div id="main-wrapper" class="auth-customizer-none">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-12 col-lg-12 col-xxl-12 auth-card">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?= base_url('dashboard') ?>" class="align-items-center d-flex justify-content-center logo-img mb-5 text-center text-nowrap w-100">
                                    <h2><?= BUSINESS_NAME ?></h2>
                                </a>
                                <div class="position-relative text-center my-4">
                                    <h4 class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">Sign Up</h4>
                                </div>
                                <form id="signup-form" action="<?= base_url('auth-signup') ?>" method="post">
                                    <div class="mb-3 form-group">
                                        <div class="icon-input">
                                            <span class="icon">
                                                <i class="fas fa-envelope" style="color:black"></i>
                                            </span>
                                            <input class="form-control" placeholder="Email" type="email" name="email" id="email">
                                            <!-- <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"> -->
                                        </div>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <div class="icon-input">
                                            <span class="icon">
                                                <i class="fas fa-user" style="color:black"></i>
                                            </span>
                                            <input class="form-control" placeholder="Username" type="text" name="username" id="username">
                                        </div>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <div class="icon-input">
                                            <span class="icon">
                                                <i class="fas fa-lock" style="color:black"></i>
                                            </span>
                                            <div class="input-group">
                                                <input type="password" class="form-control" placeholder="Password" id="password" name="password" aria-label="password" aria-describedby="basic-addon1">
                                                <span class="input-group-text" id="toggle-password"><i class="fas fa-eye-slash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <div class="icon-input">
                                            <span class="icon">
                                                <i class="fas fa-lock" style="color:black"></i>
                                            </span>
                                            <div class="input-group">
                                                <input type="password" class="form-control" placeholder="Repeat Password" id="repeat-password" name="repeat_password" aria-label="password" aria-describedby="basic-addon1">
                                                <span class="input-group-text" id="toggle-repeat-password"><i class="fas fa-eye-slash"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-group">
                                        <div class="icon-input disabled">
                                            <span class="icon">
                                                <i class="fas fa-user" style="color:black"></i>
                                            </span>
                                            <input readonly class="form-control" placeholder="Referral Code" value="<?= $code ?? "" ?>" type="text" name="referral_code" id="referral_code">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 mb-4 rounded-1">Sign Up</button>
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
            $('#toggle-repeat-password').click(function() {
                // Toggle the type attribute of the password field
                let passwordField = $('#repeat-password');
                let passwordFieldType = passwordField.attr('type');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).html('<i class="fas fa-eye"></i>');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).html('<i class="fas fa-eye-slash"></i>');
                }
            });
            $('#signup-form').bootstrapValidator({
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required'
                            },
                            remote: {
                                message: 'Email is already taken',
                                url: '<?= base_url('email-exists') ?>',
                                type: 'POST',
                                data: function(validator) {
                                    return {
                                        email: validator.getFieldElements('email').val()
                                    };
                                }
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'Username is required'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9_]+$/,
                                message: 'Only letters, numbers and underscores are allowed.'
                            },
                            remote: {
                                message: 'Username is already taken',
                                url: '<?= base_url('username-exists') ?>',
                                type: 'POST',
                                data: function(validator) {
                                    return {
                                        username: validator.getFieldElements('username').val()
                                    };
                                }
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Password  is required'
                            },
                        }
                    },
                    repeat_password: {
                        validators: {
                            notEmpty: {
                                message: 'Repeat password is required'
                            },
                            identical: {
                                field: 'password',
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    referral_code: {
                        validators: {
                            notEmpty: {
                                message: 'Referral code is required'
                            },
                        }
                    }
                }
            })
        }).on('success.form.bv', function(e) {
            e.preventDefault();
            e.target.submit();
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

    <script src="<?= base_url(DASHBOARD_ASSETS) ?>admin_assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url(DASHBOARD_ASSETS) ?>admin_assets/js/bootstrapValidator.min.js"></script>

</body>

</html>