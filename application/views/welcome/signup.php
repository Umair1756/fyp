<!-- Login Section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <form method="POST">
                    <div class="row ">
                        <div class="col-lg-4 m-auto pt-5 pb-5 pl-4 pr-4 rounded login_adj">
                            <div class="h5 text-center font-weight-bold mb-5 border-0">
                                Sign up for your Account
                            </div>
                            <div class="input-group">
                                <?php if (isset($_SESSION['success'])) : ?>
                                    <div class="success successBox text-white rounded-pill pl-3 pr-3 pt-1 pb-1">
                                        <i class="far fa-check-circle"></i>
                                        <?php echo $_SESSION['success'] ?>
                                    </div>
                                <?php endif; ?>
                                <?php echo validation_errors("<div class='danger dangerBox text-white rounded pl-3 pr-3 pt-1 pb-1'><i class='fa fa-times-circle'></i> ", "</div>"); ?>
                            </div>
                            <div class="input-group position-relative">
                                <input type="email" class="form-control mb-3 email_input" name="email" placeholder="Enter Email" /><i class="fas fa-envelope  position-absolute nav-link"></i>
                            </div>
                            <div class="input-group position-relative">
                                <input type="text" class="form-control mb-3 email_input" name="fname" placeholder="Enter full name" /><i class="fas fa-file-signature position-absolute nav-link" style="top: 2px"></i>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control pwd rounded" id="pwd" name="password" /><i class="fas fa-key position-absolute nav-link" style="top: 2px"></i>
                                <div class="input-group-append">
                                    <button class="btn reveal position-absolute eyeView" id="eyeView" type="button">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="form-control btn mb-3 btn_login_adj" name="signup">
                                Continue <i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i>
                            </button>
                            <p class="text-center mb-3 border-0">OR</p>
                            <button class="form-control btn mb-3 btn_google_adj">
                                <i class="fab fa-google text-danger mr-1"></i> Log in with
                                Google
                            </button>
                            <div class="p-4 border-top mt-2">
                                <button class="form-control border-0 btn_signin_adj btnLogIn">
                                    Already have an account? Log In
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Login Section -->