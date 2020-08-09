<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Board | ProMag</title>
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
    <!-- bootstrap framework -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/fontawesome/css/all.min.css'); ?>" rel="stylesheet" media="screen">
    <!-- custom css -->
    <link href="<?php echo base_url('assets/customCss/welcomePage.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/customCss/user_homepage.css'); ?>" rel="stylesheet" media="screen">
    <!-- selectize -->
    <link href="<?php echo base_url('assets/selectize/selectize.default.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/selectize/normalize.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/selectize/stylesheet.css'); ?>" rel="stylesheet" media="screen">
    <!-- selectize -->
    <!-- datetimepicker -->
    <link href="<?php echo base_url('assets/datetimepicker/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet" media="screen">
    <!-- datetimepicker -->
    <link href="<?php echo base_url('assets/sweetalerts/sweetalert.css'); ?>" rel="stylesheet" media="screen">
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <style>
        /* Scrollbar Design */
        /* width */
        ::-webkit-scrollbar {
            width: 5px !important;
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
    </style>
</head>

<body style="background: #67D77E;margin: 0px !important;">
    <!-- Haeder Section 
        -->
    <header class="user_header_section fixed-top position-fixed">
        <nav class="navbar navbar-expand-lg nav_res">
            <ul class="navbar-nav text-center w-100 navbar_res">
                <nav id="navigation" class="navbar navbar-expand-lg">
                    <a href="<?php echo base_url('index.php/userHome/'); ?>" id="logo-section" class="navbar-item">
                        <img class="img-fluid board-logo" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="promag_collaboration">
                    </a>
                </nav>
                <li class="nav-item dropdown ml-auto pl-1 pr-1 mr-2">
                    <a class="nav-link text-white mt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i></a>
                    <ul class="dropdown-menu slideIn animate dropdown-menu-right text-white drp_adj" role="menu" aria-labelledby="dropdownMenuLink">
                        <li class="text-center dropdown-header p-3 text-white drpHeader_adj">Notifications</li>
                        <div class="dropdown-divider"></div>
                        <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown pl-1 pr-1">
                    <a class="nav-link text-white mt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog"></i></a>
                    <ul class="dropdown-menu slideIn animate dropdown-menu-right text-white drp_adj1" role="menu" aria-labelledby="dropdownMenuLink">
                        <li class="text-center dropdown-header p-3 text-white drpHeader_adj">
                            <?php echo $_SESSION['user']; ?>
                        </li>
                        <li class="text-center d-none">
                            <?php echo $_SESSION['uid']; ?>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item rounded pt-3 pb-3" href="<?php echo base_url('index.php/userHome/userProfile'); ?>">Manage Profile And Password</a></li>
                        <li><a class="dropdown-item rounded pt-3 pb-3" href="<?php echo base_url('index.php/userHome/userActivities'); ?>">View Activities</a></li>
                        <li><a class="dropdown-item rounded pt-3 pb-3" name="logout" href="<?php echo base_url('index.php/welcome/logout'); ?>">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Header Section -->