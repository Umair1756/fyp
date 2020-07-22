<div class="bg-info" style="margin-top: 79px !important">
    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav text-center w-100 navbar_res">
            <li class="nav-item pl-1 pr-1">
                <a class="nav-link text-white"> <?php echo $ptitles[0]['ptname'] ?></a>
            </li>
            <li class="nav-item pl-1 pr-1">
                <a class="nav-link text-white"> Invite</a>
            </li>
            <li class="nav-item pl-1 pr-1">
                <a class="nav-link text-white"> TeamShow</a>
            </li>
            <li class="nav-item pl-1 pr-1">
                <a href="<?php echo base_url('index.php/userHome/') ?>" class="nav-link text-white"> Boards</a>
            </li>
            <li class="nav-item dropdown ml-auto pl-1 pr-1 mr-2">
                <a class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Show Menu</i></a>
                <ul class="dropdown-menu slideIn animate dropdown-menu-right text-white drp_adj" role="menu" aria-labelledby="dropdownMenuLink">
                    <button type="button" class="close text-white position-absolute btnClose_adj" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                    <li><a href="#" class="dropdown-item rounded pt-3 pb-3" href="#"></a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
<div class="board_area bg-danger">
    <div class="col-lg-12 elementsAppendHere">
        <div class="row">
            <div class="col-lg-3 p-1 bg-dark">
                <div class="link-add-list text-center">
                    <input type="text" id="input-listname" placeholder="Enter list title..." class="form-control rounded-0 d-none">
                    <a class="btn btn-sm btn-success text-white d-none" id="add-list"> Add to list</a>
                    <a class="btn btn-default btn-light btn-block" id="click-add-list-btn"><i class="fa fa-plus"></i> Add a list</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['success'])) : ?>
    <div class="col-lg-12 text-left alert-content">
        <div class="row">
            <div class="col-lg-3 ml-auto text-center">
                <div class="success successBox text-white rounded board-alert">
                    <i class="fa fa-check-circle"></i>
                    <?php echo $_SESSION['success'] ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>