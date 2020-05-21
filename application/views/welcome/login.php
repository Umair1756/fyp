 <!-- Login Section -->
 <section class="bg_pic">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 m-auto">
                 <form method="POST">
                     <div class="row">
                         <div class="col-lg-4 m-auto pt-5 pb-5 pl-4 pr-4 rounded login_adj">
                             <div class="h5 text-center font-weight-bold border-0">Login with ProMag</div>
                             <?php if (isset($errors)) : ?>
                                 <div class="form_error text-danger alert alert-danger alert-dismissible fade show" role="alert">
                                     <?php echo validation_errors(); ?>
                                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                             <?php endif; ?>
                             <div class=" input-group position-relative">
                                 <label class="d-none" for="Email">Email</label>
                                 <input type="email" name="email" class="form-control email_input rounded" value="<?php echo set_value('email'); ?>" placeholder="Enter Email" /><i class="fas fa-envelope position-absolute nav-link"></i>
                             </div>
                             <div class="input-group position-relative">
                                 <label class="d-none" for="Password">Password</label>
                                 <input type="password" name="password" class="form-control mt-3 password_input rounded" value="<?php echo set_value('password'); ?>" placeholder="Enter password" /><i class="fas fa-key position-absolute nav-link" style="top: 17px"></i>
                             </div>
                             <button class="form-control btn mt-3 mb-3 btn_login_adj">Log In <i class="fas fa-sign-in-alt"></i></button>
                             <p class="text-center mb-3 border-0">OR</p>
                             <button class="form-control btn mb-3 btn_google_adj">
                                 <i class="fab fa-google text-danger mr-1"></i> Log in with Google
                             </button>
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