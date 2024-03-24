<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home -
        <?php echo APP_NAME; ?>
    </title>





    <link href="<?php echo ROOT; ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?php echo ROOT; ?>/assetes/css/headers.css" rel="stylesheet">
</head>

<body>

    <!-- header section -->
    <!-- header section end -->
    <header class="p-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                    <img src="<?php echo ROOT; ?>/assets/images/download (1).jpeg" alt="" width="40" height="32"
                        style="object-fit:cover;">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?= ROOT ?>" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="<?= ROOT ?>/blog" class="nav-link px-2 link-body-emphasis">Blog</a></li>
                    <li><a href="<?= ROOT ?>/search" class="nav-link px-2 link-body-emphasis">search</a></li>
                    <li><a href="<?= ROOT ?>/contact" class="nav-link px-2 link-body-emphasis">Contact</a></li>
                </ul>

                <form action="<?= ROOT ?>/search" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <div class="input-group">
                        <input valu="<?= $_GET['find'] ?? '' ?>" name="find" type="search" class="form-control"
                            placeholder="Search..." aria-label="Search">
                        <button class="btn btn-primary">Find</button>
                    </div>
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="<?= ROOT ?>/admin">Admin</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= ROOT ?>/logout">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <!-- slider -->


    <?php
    if ($url[0] == 'home') {
        include '../app/pages/includes/slider.php';
    }
    ?>

    <!-- slider end-->


    <main class="p-2">