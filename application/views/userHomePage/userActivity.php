<section class="header-area" style="margin-top: 79px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <form method="POST" action="<?php echo base_url('index.php/welcome/updatePassword'); ?>">
                    <div class="row">
                        <!-- Work starts from here -->
                        <div class="header-area col-lg-12 m-auto mt-adjust text-center">
                            <img src="<?php echo base_url('assets/img/initials.png') ?>" alt="">
                            <div class="h4 pt-2 d-inline text-white">
                                Farhan Ahmed
                                <div class="smallHeading d-inline">
                                    @FarhanF7N
                                </div>
                            </div>
                        </div>
                        <div class="header-area col-lg-12  ">
                            <div class="row">
                                <div class="btnProfile text-center text-white m-auto ">
                                    Profile And Password Management
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="m-section">
    <div class="m-container">
        <img class="dogImg" src="http://localhost/promag/assets/img/dogimg.svg" alt="promag_collaboration">
        <div class="h1 m-heading">Manage your personal information</div>
        <p class="pgh">Control which information people see and Power-Ups may access.</p>
        <h3 class="m-about">About</h3>
        <hr class="m-hr">

        <form action="">
            <div class="m-form">
                <div class="f-headings">Full name</div>
                <div class="t-box mt-2">
                    <input class="t-box t-field" type="text">
                </div>

                <div class="f-headings">Initials</div>
                <div class="t-box mt-2">
                    <input class="t-box t-field" type="text">
                </div>

                <div class="f-headings">Username</div>
                <div class="t-box mt-2">
                    <input class="t-box t-field" type="text">
                </div>

                <button class="save-btn">Save</button>

                <h3 class="m-password">Manage your password</h3>
                <hr class="m-hr">
                <button class="change-pwd mt-2">Change Password!</button>
            </div>
        </form>
    </div>
</div>
<!-- Login Section -->