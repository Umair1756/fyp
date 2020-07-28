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
                <div class="recents mb-5 mt-5">
                    <div class="h5 p-2 mb-3">
                        <i class='far fa-clock pr-2'></i> Recently Viewed
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <?php if (!empty($recentBoards)) { ?>
                                <?php if (isset($recentBoards)) : ?>
                                    <?php foreach ($recentBoards as $recentBoard) : ?>
                                        <a href="#" class="btnBoardTitleRecents col-lg-3 rounded boardBox text-white mr-3 pr-4 pt-2" data-boardtitleid="<?php echo $recentBoard['ptid']; ?>" data-boardtitle="<?php echo $recentBoard['ptname']; ?>">
                                            <i class="far fa-clipboard pl-1 pt-2"></i> <?php echo $recentBoard['ptname'] ?>
                                        </a>
                                    <?php endforeach ?>
                                <?php endif ?>
                            <?php } else { ?>
                                <h1 class="col-lg-8 offset-2">
                                    You haven't visited any board yet.
                                </h1>
                            <?php } ?>

                        </div>
                    </div>
                </div>

                <div class="recents mb-5 mt-5">
                    <div class="h5 p-2 mb-3">
                        <i class='fa fa-user text-white pr-2'></i> Personal Boards
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <?php if (!empty($ptitles)) { ?>
                                <?php if (isset($ptitles)) : ?>
                                    <?php foreach ($ptitles as $ptitle) : ?>
                                        <a href="#" class="btnBoardTitle col-lg-3 rounded boardBox text-white mr-3 pr-4 pt-2" data-boardtitleid="<?php echo $ptitle['ptid']; ?>" data-boardtitle="<?php echo $ptitle['ptname']; ?>">
                                            <input type="hidden" class="boardTitleId" value="<?php echo $ptitle['ptid']; ?>">
                                            <i class="far fa-clipboard pl-1 pt-2"></i> <?php echo $ptitle['ptname'] ?>
                                        </a>
                                    <?php endforeach ?>
                                <?php endif ?>
                            <?php } else { ?>
                                <h1 class="col-lg-8 offset-2">
                                    You haven't created any board yet.
                                </h1>
                            <?php } ?>
                            <a class="col-lg-2 text-center rounded boardBox text-white text-white" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                                Create new board
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <form action="<?php echo base_url('index.php/userHome/saveTitle'); ?>" method="POST">
                <div class="modal-dialog modal-lg bg-white rounded" style="width: 30%;margin-top: 83px!important;box-shadow: 0px 0px 5px 1px #000216;">
                    <div class="modal-content mt-5" style="background-color: transparent !important; border: none;">
                        <div class="container">
                            <div class="modal-body text-muted rounded">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="txtTitleName" name="titlename" placeholder="Title name" style="background-color: #7B8788; color: white !important">
                                            <button type="submit" class="btn sb-btn mt-2" id="createBtn" name="btnBoard"><i class="far fa-credit-card"></i> Create Board</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="width: 20% !important;">
                                        <button type="button" style="text-shadow: none !important; opacity: 1 !important;" class="close " data-dismiss="modal" aria-label="Close">
                                            <span class="cross-btn text-dark" aria-hidden="true">&times;</span>
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