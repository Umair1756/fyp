<!-- Haeder Section -->
<header class="user_header_section fixed-top position-fixed">
    <nav class="navbar navbar-expand-lg nav_res">
        <ul class="navbar-nav text-center w-100 navbar_res">
            <li class="nav-item pl-1 pr-1 rounded-circle">
                <a class="nav-link text-white"><i class="fas fa-house-damage"></i></a>
            </li>
            <li class="nav-item rounded ml-2 border-0 mr-auto nav_input">
                <div class="input-group input_adj">
                    <input type="text" class="form-control rounded-pill input_search border-0" placeholder="Search" />
                    <i class="fas fa-search rounded-pill position-absolute text-white nav-link"></i>
                </div>
            </li>
            <li class="nav-item m-auto border-0 logo_adj">
                <a class="nav-link" href="#">
                    <span class="first_part_logo">PRO</span><span class="secong_part_logo text-white">MAG</span></a>
            </li>
            <li class="nav-item dropdown rounded-pill ml-auto pl-1 pr-1 mr-2">
                <a class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-bell"></i></a>
                <ul class="dropdown-menu slideIn animate dropdown-menu-right text-white drp_adj" role="menu" aria-labelledby="dropdownMenuLink">
                    <button type="button" class="close text-white position-absolute btnClose_adj" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <li class="text-center dropdown-header p-3 text-white drpHeader_adj">Notifications</li>
                    <div class="dropdown-divider"></div>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                </ul>
            </li>
            <li class="nav-item dropdown rounded-pill pl-1 pr-1">
                <a class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
                <ul class="dropdown-menu slideIn animate dropdown-menu-right text-white drp_adj1" role="menu" aria-labelledby="dropdownMenuLink">
                    <button type="button" class="close text-white position-absolute btnClose_adj1" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <li class="text-center dropdown-header p-3 text-white drpHeader_adj">
                        <?php echo $_SESSION['user']; ?>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#">Profile and Visiblity</a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#">Activity</a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#">Settings</a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#">Help</a></li>
                    <li><a class="dropdown-item rounded pt-3 pb-3" name="logout" href="<?php echo base_url('index.php/welcome/logout'); ?>">Log Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<!-- Header Section -->

<div class="container penal_area">
    <div class="hoverAdj">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="col-lg-12 text-center">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center">
                        <div class="success successBox text-white rounded pl-3 pr-3 pt-1 pb-1">
                            <i class="fa fa-check-circle"></i>
                            <?php echo $_SESSION['success'] ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 d-lg-block d-md-block d-none">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="nav-link p-0 pl-3 pt-1 pb-1 rounded-pill anchor_adj" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <a><i class="fab fa-flipboard"></i> Boards</a>
                </div>
                <a class="nav-link p-0 pl-3 pt-1 pb-1 mt-2 anchor_adj" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-poll"></i> Templates</a>
                <a class="nav-link p-0 pl-3 pt-1 pb-1 mt-2 anchor_adj" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fab fa-500px"></i> Home</a>
                <p class="mt-3 ml-3">TEAMS</p>
                <a class="nav-link p-0 pl-3 pt-1 pb-1 anchor_create_adj" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-plus-circle"></i> Create a Team</a>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 r_tab_content">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <p class="m-2"><i class="fas fa-history"></i> Recently Viewed</p>
                    <div class="container mb-5">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4">TAB 1</div>
                            <div class="col-lg-3 col-md-4 col-sm-4">TAB 2</div>
                            <div class="col-lg-3 col-md-4 col-sm-4">TAB 3</div>
                        </div>
                    </div>
                    <p class="m-2">
                        <i class="fas fa-project-diagram"></i> Personal Boards
                    </p>
                    <div class="container">
                        <div class="row">
                            <a class="nav-link text-center col-md-5 col-sm-6  p-4 m-1 rounded-0 p_anchor_adj" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <i class="fas fa-plus"></i> Create new board
                            </a>
                            <a class="nav-link text-center col-lg-3 col-md-5 col-sm-6 p-4 ml-4 m-1 rounded-0 p_anchor_adj">
                                Board 1 here
                            </a>
                            <a class="nav-link text-center col-lg-3 col-md-5 col-sm-6 p-4 ml-4 m-1 rounded-0 p_anchor_adj">
                                Board 2 here
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    Templates
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    Home
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg mt-5" style="width: 30%;">
                <div class="modal-content mt-5" style="background-color: transparent !important; border: none;">
                    <div class="container">
                        <div class="modal-body text-muted">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="" placeholder="Add a more detailed Description" style="background-color: rgba(9,30,66,.04)">
                                        <button type="submit" class="btn btn-secondary mt-2">Create Board</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>