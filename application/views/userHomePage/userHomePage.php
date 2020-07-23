<div class="penal_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-4">
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="danger dangerBox text-white rounded text-center pl-3 pr-3 pt-1 pb-1 ml-auto mr-auto">
                        <i class="fa fa-times-circle"></i>
                        <?php echo $_SESSION['error'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12">
                <div class="recents">
                    <div class="h5 p-2">
                        <i class='far fa-clock'></i> Recently Viewed
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <?php if (!empty($ptitles)) : ?>
                                <?php if (isset($ptitles)) : ?>
                                    <?php foreach ($ptitles as $ptitle) : ?>
                                        <div class="col-lg-4">
                                            <a href="<?php echo base_url('index.php/userHome/boardBegin') ?>" class="nav-link text-center p-4 m-1 rounded-0 p_anchor_adj">
                                                <i class="fas fa-star pr-2"></i> <?php echo $ptitle['ptname'] ?>
                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

                <div class="recents">
                    <div class="h5 p-2">
                        <i class='fa fa-user text-2b4949'></i> Personal Boards
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <?php if (!empty($uid)) : ?>
                                <?php if ($uid === $users['uid']) :  ?>
                                    <?php if (!empty($ptitles)) : ?>
                                        <?php if (isset($ptitles)) : ?>
                                            <?php foreach ($ptitles as $ptitle) : ?>
                                                <div class="col-lg-4">
                                                    <a href="<?php echo base_url('index.php/userHome/boardBegin') ?>" class="nav-link text-center p-4 m-1 rounded-0 p_anchor_adj">
                                                        <i class="fas fa-star pr-2"></i> <?php echo $ptitle['ptname'] ?>
                                                    </a>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endif ?>
                            <div class="col-lg-4">
                                <a class="nav-link text-center p-4 m-1 rounded-0 p_anchor_adj" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                                    <i class="fas fa-plus pr-2"></i> Create new board
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="recents">
                    <div class="h5 p-2">
                        <i class='far fa-clock'></i> Team name
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4">
                                Board 1
                            </div>
                            <div class="col-lg-4">
                                Board 1
                            </div>
                            <div class="col-lg-4">
                                Board 1
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <form action="<?php echo base_url('index.php/userHome/saveTitle'); ?>" method="POST">
                <div class="modal-dialog modal-lg" style="width: 30%;margin-top: 79px!important;">
                    <div class="modal-content mt-5" style="background-color: transparent !important; border: none;">
                        <div class="container">
                            <div class="modal-body text-muted">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="txtTitleName" name="titlename" placeholder="Title name" style="background-color: #7B8788">
                                            <button type="submit" class="btn btn-secondary mt-2" id="createBtn" name="btnBoard">Create Board</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" style="text-shadow: none !important;" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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