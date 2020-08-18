<!-- Login Section -->
<section class="header-area" style="margin-top: 79px;">
    <div class="container">
        <div class="col-lg-12 text-center pt-2 pb-2 mb-2">
            <div class="h3 text-white d-inline">
                <?php if (!empty($user)) : ?>
                    <?php if (isset($user)) : ?>
                        <?php echo $user['uname']; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="text-white d-inline">
                <?php if (!empty($user)) : ?>
                    <?php if (isset($user)) : ?>
                        ( <?php echo $user['uemail']; ?> )
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <ul class="nav nav-tabs d-flex justify-content-center border-0 navbarPanel" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link btnProfile" id="pwd-tab" data-toggle="tab" href="#pwd" role="tab" aria-controls="pwd" aria-selected="true">Change Password</a>
            </li>
        </ul>
    </div>
</section>
<div class="m-section">
    <div class="m-container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="pwd" role="tabpanel" aria-labelledby="pwd-tab">
                <!-- alert when user profile updated -->
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7 m-auto text-center">
                                <div class="success successBox text-white rounded board-alert">
                                    <i class="fa fa-check-circle"></i>
                                    <?php echo $_SESSION['success'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- alert when user profile updated -->
                <!-- alert when user profile updated -->
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-8 m-auto text-center">
                                <div class="danger dangerBox text-white rounded board-alert">
                                    <i class="fa fa-times-circle"></i>
                                    <?php echo $_SESSION['error'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- alert when user profile updated -->
                <img class="dogImg" src="http://localhost/promag/assets/img/dogimg.svg" alt="promag_collaboration">
                <div class="h1 m-heading">Manage your password to secure your Account</div>
                <h3 class="m-about">Password Management</h3>
                <hr class="m-hr">
                <form action="<?php echo base_url('index.php/userHome/updatePwd'); ?>" method="POST">
                    <div class="m-form">
                        <div class="f-headings">Old Password</div>
                        <div class="t-box mt-2">
                            <input class="t-box t-field" id="oldPwd" name="oldPwd" type="password">
                        </div>
                        <div class="f-headings">New Password</div>
                        <div class="t-box mt-2">
                            <input class="t-box t-field" id="newPwd" name="newPwd" type="password">
                        </div>
                        <div class="f-headings">Re Enter Password</div>
                        <div class="t-box mt-2">
                            <input class="t-box t-field" id="reTypePwd" name="reTypePwd" type="password">
                        </div>
                        <button class="update-pwd save-btn" name="update-pwd">Update</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<!-- Login Section -->