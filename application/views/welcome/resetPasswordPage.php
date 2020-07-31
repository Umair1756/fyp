<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
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
</head>
<!-- <body onload="preLoaderFunction()"> -->

<body>
    <!-- Login Section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <form method="POST" action="<?php echo base_url('index.php/welcome/updatePassword'); ?>">
                        <div class="row">
                            <div class="col-lg-4 m-auto pt-5 pb-5 pl-4 pr-4 rounded login_adj">
                                <div class="h1 text-center font-weight-bold border-0 mb-5" style="color: #091a14">Reset Password</div>
                                <div class=" input-group position-relative d-block">
                                    <?php echo validation_errors("<div class='danger dangerBox text-white rounded pl-3 pr-3 pt-1 pb-1 ml-auto mr-auto'><i class='fa fa-times-circle'></i> ", "</div>"); ?>
                                    <?php if (isset($_SESSION['error'])) : ?>
                                        <div class="danger dangerBox text-white rounded pl-3 pr-3 pt-1 pb-1 ml-auto mr-auto">
                                            <i class="fa fa-times-circle"></i>
                                            <?php echo $_SESSION['error'] ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (isset($_SESSION['success'])) : ?>
                                        <div class="success successBox text-white rounded pl-3 pr-3 pt-1 pb-1 ml-auto mr-auto">
                                            <i class="far fa-check-circle"></i>
                                            <?php echo $_SESSION['success'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class=" input-group position-relative mb-3">
                                    <label class="d-none" for="Password">New password</label>
                                    <input type="password" name="password" class="form-control password_input rounded" placeholder="Enter Password" /><i class="fas fa-key position-absolute nav-link"></i>
                                </div>
                                <div class=" input-group position-relative">
                                    <label class="d-none" for="Password">Re enter password</label>
                                    <input type="password" name="reTypePassword" class="form-control password_input rounded" placeholder="Re Enter Password" /><i class="fas fa-key position-absolute nav-link"></i>
                                </div>
                                <button class="form-control btn mt-3 btn_login_adj" name="resetPassword">Sumbit <i class="fas fa-paper-plane ml-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section -->

    <!-- jQuery -->
    <script src=" <?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src='<?php echo base_url('assets/auth_files/index.js'); ?>'></script>
</body>

</html>