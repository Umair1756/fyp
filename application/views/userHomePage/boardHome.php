<div class="container-fluid main-wrapper-board" style="margin-top: 46px;">
    <div class="row bg-info">
        <div class="col-lg-4 col-sm-12 mt-2">
            <button class="btn text-white">test</button>
            <button class="btn Add-button text-white">
                <i class="fa fa-star-o"></i>
            </button>
            <span style="color: hsla(0, 0%, 100%, 0.24);">|</span>
            <a class="btn Add-button text-white" href="<?php echo base_url('index.php/userHome'); ?>">Boards</a>
            <span style="color: hsla(0, 0%, 100%, 0.24);">|</span>
            <button class="btn Add-button text-white">
                <i class="fa fa-lock mr-1"></i> Personal
            </button>
            <span style="color: hsla(0, 0%, 100%, 0.24);">|</span>
            <button class="btn Add-button text-white">Invite</button>
        </div>
        <div class="col-sm-12 col-lg-8 text-right mt-2">
            <button class="btn Add-button">
                <i class="fa fa-ravelry mr-1" aria-hidden="true"></i> Butler
            </button>
            <button class="btn Add-button">
                <i class="fa fa-ellipsis-h mr-1" aria-hidden="true"></i> Show Menu
            </button>
        </div>
    </div>

    <div class="row mt-2 ml-1 mr-1">
        <!--First Card -->
        <div class="card border-0" style="background-color: #f4f5f7;">
            <div class="card-header border-0 text-white">
                <a href="#" class="text-dark">Things To Do</a>
                <span style="margin-left: 135px;">
                    <a href="#"><i class="fa fa-ellipsis-h text-dark"></i></a>
                </span>
            </div>
            <div class="card-body">
                <div>
                    <a href="model.html">
                        <input class="cardb shadow-sm p-2 rounded" type="text" name="" placeholder="Log Book" data-toggle="modal" data-target="#exampleModalCenter" />
                    </a>
                </div>
                <div class="mt-2">
                    <input class="cardb1 shadow-sm p-2 rounded" type="text" name="" placeholder="Hotel" />
                </div>
                <div class="mt-2">
                    <input class="cardb1 shadow-sm p-2 rounded" type="text" name="" placeholder="Call" />
                </div>
                <div class="mt-3">
                    <a href="#" class="text-muted">
                        <i class="fa fa-plus mr-1"></i>
                        Add another Card
                        <i class="fa fa-window-restore" style="margin-left: 75px;" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

        <!--Second Card -->
        <div class="card border-0 ml-2" style="background-color: #f4f5f7; height: 100px;">
            <div class="card-header border-0 text-white">
                <a href="#" class="text-dark">Done</a>
                <span style="margin-left: 200px;">
                    <a href="#"><i class="fa fa-ellipsis-h text-dark"></i></a></span>
            </div>
            <div class="card-body">
                <a href="#" class="text-muted">
                    <i class="fa fa-plus mr-1"></i>
                    Add another Card
                    <i class="fa fa-window-restore" style="margin-left: 90px;" aria-hidden="true"></i>
                </a>
            </div>
        </div>

        <div class="card border-0 ml-2" style="background-color: #f4f5f7; height: 100px;">
            <div class="card-header border-0 text-white">
                <a href="#" class="text-dark">Done</a>
                <span style="margin-left: 200px;">
                    <a href=""><i class="fa fa-ellipsis-h text-dark"></i></a>
                </span>
            </div>
            <div class="card-body">
                <a href="#" class="text-muted">
                    <i class="fa fa-plus mr-1"></i>
                    Add another Card
                    <i class="fa fa-window-restore" style="margin-left: 90px;" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="card Add-button ml-2" style="height: 45px;">
            <a href="#" class="">
                <div class="card-header border-0 text-white">
                    Add another list
                    <span style="margin-left: 150px;"></span>
                </div>
            </a>
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
</div>