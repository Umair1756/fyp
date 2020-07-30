<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ProMag</title>
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
    <!-- bootstrap framework -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/fontawesome/css/all.min.css'); ?>" rel="stylesheet" media="screen">
    <!-- custom css -->
    <link href="<?php echo base_url('assets/customCss/welcomePage.css'); ?>" rel="stylesheet" media="screen">
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <style>
        /* Scrollbar Design */
        /* width */
        ::-webkit-scrollbar {
            width: 7px !important;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #57c07e;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            border-radius: 10px !important;
            background: #d0f0c0;
        }

        /* Scrollbar Design */

        /* Using Jquery affects Navbar */
        /* Navbar onScroll */
        .changeScrollBoxOnTop {
            max-width: 100% !important;
            top: 0px !important;
            background: none;
            box-shadow: 0px 0px 20px 2px #1b1b1d !important;
            border: none !important;
            opacity: 0.5;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0.5s, opacity 0.5s linear;
            transition: 1s ease-in-out !important;
        }

        .fLogoOnScroll {
            color: #ffc107 !important;
            transition: 1s ease-in-out !important;
        }

        .sLogoOnScroll {
            color: #1b1b1d !important;
            transition: 1s ease-in-out !important;
        }

        .loginAdjOnScroll {
            color: #ffc107 !important;
            font-weight: bold;
            background: none !important;
            box-shadow: none !important;
            border: none !important;
            transition: 1s ease-in-out !important;
        }

        /* Navbar onScroll */

        /* pageLoader Start */
        .pageLoader {
            background: url(http://localhost/promag/assets/img/loading-9.gif);
            background-repeat: no-repeat;
            background-position: center;
            background-color: #ffff;
            opacity: 0.9;
            width: 100%;
            transition: 10s ease-in-out;
            position: fixed;
            height: 100vh;
            z-index: 9999;
        }

        /* pageLoader End */

        /* arrowUp*/
        #arrow-up {
            display: none;
            position: fixed;
            bottom: 50px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #00997b;
            color: white;
            cursor: pointer;
            padding: 7px 16px;
            border-radius: 4px;
            font-size: 25px;
        }

        #arrow-up:hover {
            background: #fea203;
            color: #fff;
            transition: 0.5s ease-in-out;
        }

        /* arrowUp*/
        /* Using Jquery affects Navbar */
    </style>
</head>
<!-- <body onload="preLoaderFunction()"> -->

<body>
    <!-- PageLoager div -->
    <!-- <div class="pageLoader">
        </div> -->
    <!-- PageLoager div -->

    <!-- Haeder Section -->
    <header class="header-section fixed-top">
        <div class="container">
            <nav id="navigation" class="navbar navbar-expand-lg">
                <a href="<?php echo base_url('index.php/welcome') ?>" id="logo-section" class="navbar-item" href="#">
                    <img class="img-fluid" src="<?php echo base_url('assets/img/logo.png') ?>" alt="promag_collaboration" />
                </a>
                <div class="ml-auto" id="navbarSupportedContent">
                    <ul id="navigation-1" class="navbar-nav">
                        <li class="login-item">
                            <button class="btn btn-link text-white login_adj btnLogIn">Log In</button>
                        </li>
                        <li class="pl-3 pr-3 rounded">
                            <button class="btn btn_login_adj text-white btnSignUp">Sign Up</button>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header Section -->