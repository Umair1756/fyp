 <!-- Login Section -->
 <div class="form_error">
     <?php echo validation_errors(); ?>
 </div>
 <section class="bg_pic">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 m-auto">
                 <form>
                     <div class="row">
                         <div class="col-lg-4 m-auto pt-5 pb-5 pl-4 pr-4 rounded login_adj">
                             <div class="h5 text-center font-weight-bold mb-5 border-0">Login with ProMag</div>
                             <div class="input-group position-relative">
                                 <input type="email" name="txtEmail" class="form-control mb-3 email_input rounded" value="<?php echo set_value('text_field'); ?>" placeholder="Enter Email" /><i class="fas fa-envelope position-absolute nav-link"></i>
                             </div>
                             <div class="input-group position-relative">
                                 <input type="password" class="form-control mb-3 password_input rounded" placeholder="Enter password" /><i class="fas fa-key position-absolute nav-link"></i>
                             </div>
                             <button class="form-control btn mb-3 btn_login_adj">Log In <i class="fas fa-sign-in-alt"></i></button>
                             <p class="text-center mb-3 border-0">OR</p>
                             <button class="form-control btn mb-3 btn_google_adj">
                                 <i class="fab fa-google text-danger mr-1"></i> Log in with Google
                             </button>
                             <button class="form-control btn btn_signup_adj">
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