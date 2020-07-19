 <!-- Login Section -->
 <section class="bg_pic" style="margin-top: 120px!important;">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 m-auto">
                 <form method="POST" action="<?php echo base_url('index.php/welcome/resetLink'); ?>" enctype="multipart/form-data">
                     <div class="row">
                         <div class="col-lg-4 m-auto pt-5 pb-5 pl-4 pr-4 rounded login_adj">
                             <div class="h1 text-center font-weight-bold border-0 mb-5" style="color: #091a14">Find your ProMag account</div>
                             <div class=" input-group position-relative d-block mb-4">
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
                                 <label class="d-none" for="Email">Email </label>
                                 <input type="email" name="email" class="form-control email_input rounded" value="<?php ?>" placeholder="Enter Email" /><i class="fas fa-inbox position-absolute nav-link"></i>
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