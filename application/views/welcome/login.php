 <!-- Login Section -->
 <section class="bg_pic">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 m-auto">
                 <form method="POST">
                     <div class="row">
                         <div class="col-lg-4 m-auto pt-5 pb-5 pl-4 pr-4 rounded login_adj">
                             <div class="h1 text-center font-weight-bold border-0 mb-5" style="color: #091a14">Login with ProMag</div>
                             <div class=" input-group position-relative d-block mb-3">
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
                             <div class=" input-group position-relative">
                                 <label class="d-none" for="Email">Email</label>
                                 <input type="email" name="email" class="form-control email_input rounded" placeholder="Enter Email" /><i class="fas fa-inbox position-absolute nav-link"></i>
                             </div>
                             <div class="input-group position-relative">
                                 <label class="d-none" for="Password">Password</label>
                                 <input type="password" name="password" class="form-control mt-3 password_input rounded" placeholder="Enter password" /><i class="fas fa-key position-absolute nav-link" style="top: 17px"></i>
                             </div>
                             <button class="form-control btn mt-3 btn_login_adj" name="login">Log In <i class="fas fa-sign-in-alt"></i></button>
                             <a href="<?php echo base_url('index.php/welcome/resetEmail');; ?>" class="form-control border-0 btn_signin_adj btnResetPassword text-right">
                                 Forgot password?
                             </a>
                             <p class="text-center mb-3 border-0" style="color: #091a14 !important;">OR</p>
                             <button class="form-control btn btn_signup_adj btnSignUp">
                                 <i class="fas fa-user-plus text-primary mr-1"></i> Sign up for an account
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>
 <!-- Login Section -->