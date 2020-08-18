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
                <a class="nav-link nav-link1 btnProfile" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">User Profile</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link nav-link2 btnActivity" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Activity</a>
            </li>
        </ul>
    </div>
</section>
<div class="m-section">
    <div class="m-container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                <img class="dogImg" src="http://localhost/promag/assets/img/dogimg.svg" alt="promag_collaboration">
                <div class="h1 m-heading">Manage your personal information</div>
                <p class="pgh">Control which information people see and Power-Ups may access.</p>
                <h3 class="m-about">About</h3>
                <hr class="m-hr">
                <form action="<?php echo base_url('index.php/userHome/updateUserProfile'); ?>" method="POST">
                    <div class="m-form">
                        <div class="f-headings">Full name</div>
                        <div class="t-box mt-2">
                            <input class="t-box t-field" id="fname" name="fname" type="text">
                        </div>
                        <div class="f-headings">Username</div>
                        <div class="t-box mt-2">
                            <input class="t-box t-field" id="uname" name="uname" type="text">
                        </div>
                        <button class="update-profile save-btn" name="update-user-profile">Save</button>
                </form>
                <form action="<?php echo base_url('index.php/userHome/changePassword'); ?>">
                    <h3 class="m-password">Manage your password</h3>
                    <hr class="m-hr">
                    <button class="change-pwd mt-2">Change Password !</button>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="col-lg-12">
                <h3 class="m-about">Boards Activties from Begining</h3>
                <hr class="m-hr">
                <ul style="list-style:none;">
                    <?php if (!empty($activity)) { ?>
                        <?php if (isset($activity)) : ?>
                            <?php foreach ($activity as $wrkUser) : ?>
                                <li>
                                    <div class="media">
                                        <div class="media-body" style="padding-left: 15px; padding-top: 1px;">
                                            <p style="margin-bottom: 1px;">
                                                <b>
                                                    <span style="text-transform: capitalize;">
                                                        <?php echo $wrkUser['uname'] ?>
                                                    </span>
                                                </b>
                                                <?php echo $wrkUser['description'] ?>
                                            </p>
                                            <p style="margin-bottom: 1px;">
                                                <span class="far fa-clock" aria-hidden="true"></span>
                                                <?php echo $wrkUser['updated_at'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                            <?php endforeach ?>
                        <?php endif ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

</div>
</div>
<!-- Login Section -->