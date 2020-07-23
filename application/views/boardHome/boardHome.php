<div class="main-wrap" style="margin-top: 79px !important">
    <nav class="navbar-adj navbar navbar-expand-lg">
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

        </ul>
    </nav>
</div>
<div class="board_area">
    <div class="b-card ml-2">
        <div class="elementsAppendHere bg-57c07e rounded">
            <div class="p-1">
                <div class="link-add-list">
                    <input type="text" id="input-listname" placeholder="Enter list title..." class="form-control rounded d-none ">
                    <a class="btn btn-sm btn-success text-white d-none btn-add" id="add-list"> Add to list</a>
                    <button type="button" class="close btn-close d-none" id="add-list-cancel" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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