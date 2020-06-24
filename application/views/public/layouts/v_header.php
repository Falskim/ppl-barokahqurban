<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title>Barokah - Qurban</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="<?= base_url('assets/user/images/favicon.ico'); ?>" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?= base_url('assets/user/images/apple-touch-icon.png'); ?>">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url('assets/user/css/bootstrap.min.css'); ?>">
<!-- Site CSS -->
<link rel="stylesheet" href="<?= base_url('assets/user/style.css'); ?>">
<!-- Colors CSS -->
<link rel="stylesheet" href="<?= base_url('assets/user/css/colors.css'); ?>">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="<?= base_url('assets/user/css/versions.css'); ?>">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?= base_url('assets/user/css/responsive.css'); ?>">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url('assets/user/css/custom.css'); ?>">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<!-- Modernizer for Portfolio -->
<script src="<?= base_url('assets/user/js/modernizer.js'); ?> "></script>


<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="realestate_version">

    <!-- LOADER -->
    <div id="preloader">
        <span class="loader"><span class="loader-inner"></span></span>
    </div><!-- end loader -->
    <!-- END LOADER -->

    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="<?= site_url('home') ?>">Beranda</a></li>
                        <li><a href="<?= site_url('orders') ?>">Pemesanan</a></li>
                        <li><a href="<?= site_url('donates') ?>">Donasi</a></li>
                        <li><a href="<?= site_url('home/contact') ?>">Contact</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($this->session->userdata('authenticated')) : ?>
                            <li class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="authDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= $this->session->userdata('name') ?>
                                    <!-- Display ID -->
                                    <!-- (<?= $this->session->userdata('id') ?>) -->
                                </a>

                                <?php if ($this->session->userdata('role') == 'user') : ?>
                                    <div class="dropdown-menu text-center" aria-labelledby="authDropdown">
                                        <ul>
                                            <li><a class="btn btn-block" href="<?= site_url('profile') ?>">Profile</a></li>
                                            <li><a class="btn btn-block" href="<?= site_url('history') ?>">Order</a></li>
                                            <li><a class="btn btn-block" href="<?= site_url('history2') ?>">Donation</a></li>
                                            <li><a class="btn btn-block" href="<?= site_url('logout') ?>">Logout</a></li>
                                        </ul>
                                    </div>
                                <?php else : ?>
                                    <div class="dropdown-menu text-center" aria-labelledby="authDropdown">
                                        <ul class="nav navbar-nav dropdown-item">
                                            <li><a class="btn btn-block" href="<?= site_url('admin') ?>">Admin Page</a></li>
                                        </ul>
                                    </div>
                                <?php endif ?>

                            </li>
                            <li>
                            <?php else : ?>
                            <li><a href="<?= site_url('login') ?>">login</a></li>
                            <li><a href="<?= site_url('register') ?>">register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>