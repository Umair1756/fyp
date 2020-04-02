<?php

// $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
// $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
// $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
// $this->output->set_header('Pragma: no-cache');

?>

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
    <!-- <link href="<?php //echo base_url('assets/css/plugins/datepicker/datepicker.css'); 
                        ?>" rel="stylesheet" media="screen"> -->

    <link href="<?php echo base_url('assets/customCss/welcomePage.css'); ?>" rel="stylesheet" media="screen">
    <!-- <link href="<?php //echo base_url('assets/css/login.css') 
                        ?>" rel="stylesheet"> -->

    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <style>
        /* Using Jquery affects Navbar */
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
            color: #1b1b1d !important;
            transition: 1s ease-in-out !important;
        }

        .sLogoOnScroll {
            color: #ffc107 !important;
            transition: 1s ease-in-out !important;
        }

        .loginAdjOnScroll {
            color: #1b1b1d !important;
            font-weight: bold;
            background: none !important;
            box-shadow: none !important;
            border: none !important;
            transition: 1s ease-in-out !important;
        }
    </style>
</head>

<!-- <body style="background: #368EE0;"> -->

<body>