<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= BUSINESS_NAME ?></title>
    <meta name="description" content=<?= BUSINESS_NAME ?> />
    <meta name="keywords" content=<?= BUSINESS_NAME ?> />
    <meta property="og:title" content=<?= BUSINESS_NAME ?> />
    <meta property="og:description" content=<?= BUSINESS_NAME ?> />
    <meta property="og:image" content="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/logo/logo.png" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:type" content="website" />
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/logo/logo.png" />
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/styles.css" />
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/custom.css" />
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/hide.css" />
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/dataTables.bootstrap5.min.css" />
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/gallery.css">
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/css/jquery.minicolors.css">
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/pickr/monolith.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/datepicker/bootstrap-datepicker.min.css" />
    <!-- <link rel="stylesheet" href="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/pickr/pickr.min.css" /> -->
    <script src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/libs/pickr/pickr.min.js"></script>

    <!-- jQuery UI CSS & JS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <style>
        .dataTables_paginate {
            padding: 20px;
        }
    </style>
    <script>
        var base_url = "<?php echo base_url(); ?>";
        var site_url = "<?php echo site_url(); ?>";
    </script>
</head>

<body>

    <div id="main-wrapper">

        <aside class="left-sidebar with-vertical">
            <div>
                <div class="brand-logo d-flex align-items-center">
                    <a href="<?= base_url('dashboard') ?>" class="text-nowrap logo-img">
                        <img style="max-width: 100px;"
                            src="<?php echo base_url() . DASHBOARD_ASSETS ?>admin_assets/logo/logo.png" alt="Logo"
                            class="dark-logo" />
                        <?= BUSINESS_NAME ?>
                    </a>
                </div>
                <!-- ---------------------------------- -->
                <!-- Dashboard -->
                <!-- ---------------------------------- -->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul class="sidebar-menu" id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="mini-icon"></iconify-icon>
                            <span class="hide-menu">Main</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" aria-expanded="false"
                                data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="right" data-bs-content="Dashboard"
                                href="<?= base_url('dashboard') ?>">
                                <i class="ti ti-home fs-7"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" aria-expanded="false"
                                data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="right" data-bs-content="Quotations"
                                href="<?= base_url('quotations') ?>">
                                <i class="ti ti-receipt fs-7"></i>
                                <span class="hide-menu">Quotations</span>
                            </a>
                        </li>
                        <li class="sidebar-item" aria-expanded="false"
                            data-bs-container="body" data-bs-toggle="popover"
                            data-bs-placement="right" data-bs-content="Products">
                            <a class="sidebar-link " href="<?= base_url('products') ?>">
                                <i class="ti ti-package fs-7"></i>
                                <span class="hide-menu">Products</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link " href="<?= base_url('categories') ?>"
                                aria-expanded="false" data-tooltip="Categories"
                                data-bs-toggle="popover" data-bs-placement="right"
                                data-bs-content="Categories">
                                <i class="ti ti-layout-grid fs-7"></i>
                                <span class="hide-menu">Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link " href="<?= base_url('companies') ?>"
                                aria-expanded="false" data-tooltip="Companies" data-bs-toggle="popover"
                                data-bs-placement="right" data-bs-content="Companies">
                                <i class="ti ti-world fs-7"></i>
                                <span class="hide-menu">Companies</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <header class="topbar">
                <div class="with-vertical">
                    <nav class="navbar navbar-expand-lg p-0 ">
                        <ul class="navbar-nav">
                            <li class="nav-item nav-icon-hover-bg dark rounded-circle d-flex">
                                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                    <iconify-icon icon="solar:hamburger-menu-line-duotone" class="fs-6"></iconify-icon>
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav navbar-toggler p-0 border-0">
                            <li class="nav-item nav-icon-hover-bg dark rounded-circle d-flex">
                                <a class="nav-link rounded-circle" href="javascript:void(0)" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="fs-6"></iconify-icon>
                                </a>
                            </li>
                        </ul>

                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="javascript:void(0)" id="drop1" aria-expanded="false">
                                            <div class="d-flex align-items-center lh-base">
                                                <img src="<?php echo base_url(DASHBOARD_ASSETS) ?>admin_assets/images/profile/user-3.jpg"
                                                    class="rounded-circle" width="35" height="35" alt="monster-img" />
                                            </div>
                                        </a>

                                        <div class="dropdown-menu content-dd dropdown-menu-end animated flipInY" aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5">Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="<?= base_url(DASHBOARD_ASSETS) ?>admin_assets/images/profile/user-3.jpg" class="rounded-circle"
                                                        width="80" height="80" alt="" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-4"><?= session()->get('username') ?></h5>
                                                        <!-- <span class="mb-1 d-block">admin</span> -->
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i>
                                                            <?= session()->get(key: 'user_email') ?>
                                                        </p>
                                                    </div>

                                                </div>

                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-info">
                                                        Log Out
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <?php if (session()->getFlashdata('success')) { ?>
                <div id="flash-success" data-message="<?php echo session()->getFlashdata('success') ?>"
                    style="display: none;"></div>
            <?php } ?>
            <?php if (session()->getFlashdata('error')) { ?>
                <div id="flash-error" data-message="<?php echo session()->getFlashdata('error') ?>" style="display: none;">
                </div>
            <?php } ?>
            <?php if (session()->getFlashdata('successData')) { ?>
                <div id="flash-success-data" data-message="<?php echo session()->getFlashdata('successData') ?>"
                    style="display: none;"></div>
            <?php } ?>
            <?php if (session()->getFlashdata('siteSuccess')) { ?>
                <div id="flash-site-success-data" data-message="<?php echo session()->getFlashdata('siteSuccess') ?>"
                    style="display: none;"></div>
            <?php } ?>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var successDiv = document.getElementById('flash-success');
                    if (successDiv) {
                        var message = successDiv.getAttribute('data-message');
                        Swal.fire({
                            title: 'Welcome Back',
                            text: message,
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                    var successDivData = document.getElementById('flash-success-data');
                    if (successDivData) {
                        var message = successDivData.getAttribute('data-message');
                        Swal.fire({
                            title: 'Well Done',
                            text: message,
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                    var errorDiv = document.getElementById('flash-error');
                    if (errorDiv) {
                        var message = errorDiv.getAttribute('data-message');
                        Swal.fire({
                            title: 'Error!',
                            text: message,
                            icon: 'error',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                    var siteSuccessDiv = document.getElementById('flash-site-success-data');
                    if (siteSuccessDiv) {
                        var message = siteSuccessDiv.getAttribute('data-message');
                        Swal.fire({
                            title: "Site Finished",
                            type: "info",
                            html: message,
                            showCloseButton: true,
                            showCancelButton: false,
                            showConfirmButton: false
                        });
                    }
                });
            </script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var popovers = document.querySelectorAll('[data-bs-toggle="popover"]');
                    popovers.forEach(function(popoverTriggerEl) {
                        if (!popoverTriggerEl.classList.contains('active')) {
                            new bootstrap.Popover(popoverTriggerEl, {
                                trigger: 'hover',
                                container: 'body'
                            });
                        }
                    });

                });
            </script>