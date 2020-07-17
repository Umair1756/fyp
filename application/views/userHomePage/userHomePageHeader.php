<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ProMag</title>
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <!-- <link rel="shortcut icon" href="<?php // echo base_url('assets/img/favicon.png'); 
                                            ?>"> -->
    <!-- bootstrap framework -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/fontawesome/css/all.min.css'); ?>" rel="stylesheet" media="screen">
    <!-- custom css -->
    <link href="<?php echo base_url('assets/customCss/welcomePage.css'); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/customCss/user_homepage.css'); ?>" rel="stylesheet" media="screen">
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
</head>

<body>
    <!-- Haeder Section -->
    <header class="user_header_section fixed-top position-fixed">
        <nav class="navbar navbar-expand-lg nav_res">
            <ul class="navbar-nav text-center w-100 navbar_res">
            <nav id="navigation" class="navbar navbar-expand-lg">
                <a href="http://localhost/promag/index.php/welcome" id="logo-section" class="navbar-item">
                    <img class="img-fluid board-logo" src="http://localhost/promag/assets/img/logo.png" alt="promag_collaboration">
                </a>
            </nav>
                <!-- <li class="nav-item pl-1 pr-1 rounded-circle">
                    <a class="nav-link text-white"><i class="fas fa-house-damage"></i></a>
                </li> -->
                <!-- <li class="nav-item rounded ml-2 border-0 mr-auto nav_input">
                    <div class="input-group input_adj">
                        <input type="text" class="form-control rounded-pill input_search border-0" placeholder="Search" />
                        <i class="fas fa-search rounded-pill position-absolute text-white nav-link"></i>
                    </div>
                </li> -->
                <!-- <li class="nav-item m-auto border-0 logo_adj">
                    <a class="nav-link" href="#">
                        <span class="first_part_logo">PRO</span><span class="secong_part_logo text-white">MAG</span></a>
                </li> -->
                <li class="nav-item dropdown ml-auto pl-1 pr-1 mr-2">
                    <a class="nav-link text-white mt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i></a>
                    <ul class="dropdown-menu slideIn animate dropdown-menu-right text-white drp_adj" role="menu" aria-labelledby="dropdownMenuLink">
                        <button type="button" class="close text-white position-absolute btnClose_adj" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <li class="text-center dropdown-header p-3 text-white drpHeader_adj">Notifications</li>
                        <div class="dropdown-divider"></div>
                        <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                        <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                        <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                        <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                        <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown pl-1 pr-1">
                    <a class="nav-link text-white mt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
                    <ul class="dropdown-menu slideIn animate dropdown-menu-right text-white drp_adj1" role="menu" aria-labelledby="dropdownMenuLink">
                        <button type="button" class="close text-white position-absolute btnClose_adj1" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <li class="text-center dropdown-header p-3 text-white drpHeader_adj">
                            <?php echo $_SESSION['user']; ?>
                        </li>
                        <li class="text-center d-none">
                            <?php echo $_SESSION['uid']; ?>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#">Profile and Visiblity</a></li>
                        <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#">Settings</a></li>
                        <li><a class="dropdown-item rounded pt-3 pb-3" name="logout" href="<?php echo base_url('index.php/welcome/logout'); ?>">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Header Section -->