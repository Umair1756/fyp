<div class="penal_area">
    <div class="container">
        <div class="row">
            <!-- alert for board header name is same or empty  -->
            <div class="col-lg-4 offset-4">
                <?php if (isset($_SESSION['error'])) : ?>
                    <div class="danger dangerBox text-white rounded text-center pl-3 pr-3 pt-1 pb-1 ml-auto mr-auto">
                        <i class="fa fa-times-circle"></i>
                        <?php echo $_SESSION['error'] ?>
                    </div>
                <?php endif; ?>
                <!-- alert for board header name is same or empty  -->
            </div>
            <div class="col-lg-12">
                <div class="recents mb-5 mt-5">
                    <div class="h5 p-2 mb-3">
                        <i class='far fa-clock pr-2'></i> Recently Created
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <?php if (!empty($recentBoards)) { ?>
                                <?php if (isset($recentBoards)) : ?>
                                    <?php foreach ($recentBoards as $recentBoard) : ?>
                                        <a href="#" class="btnBoardRecent col-lg-3 rounded boardBox text-white mr-3 pr-4 pt-2" data-board_id="<?php echo $recentBoard['id']; ?>" data-board_name="<?php echo $recentBoard['name']; ?>">
                                            <i class="far fa-clipboard pl-1 pt-2"></i> <?php echo $recentBoard['name'] ?>
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
                            <?php if (!empty($boards)) { ?>
                                <?php if (isset($boards)) : ?>
                                    <?php foreach ($boards as $board) : ?>
                                        <a href="#" class="btnPersonalBoard col-lg-3 rounded boardBox text-white mr-3 pr-4 pt-2" data-board_id="<?php echo $board['id']; ?>" data-boardtitle="<?php echo $board['name']; ?>">
                                            <input type="hidden" class="board_id" value="<?php echo $board['id']; ?>">
                                            <i class="far fa-clipboard pl-1 pt-2"></i> <?php echo $board['name'] ?>
                                        </a>
                                    <?php endforeach ?>
                                <?php endif ?>
                            <?php } else { ?>
                                <h1 class="col-lg-8 offset-2">
                                    You haven't created any board yet.
                                </h1>
                            <?php } ?>
                            <a style="display: flex;flex-direction: row;align-items: flex-end;" class=" col-lg-2 text-center rounded boardBox text-white text-white" type="button" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <span>Create new board</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <form action="<?php echo base_url('index.php/userHome/saveBoard'); ?>" method="POST">
                <div class="modal-dialog modal-lg bg-white rounded" style="width: 30%;margin-top: 83px!important;box-shadow: 0px 0px 5px 1px #000216;">
                    <div class="modal-content mt-5" style="background-color: transparent !important; border: none;">
                        <div class="container">
                            <div class="modal-body text-muted rounded">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="txtBoardName" name="boardname" placeholder="Board name" style="background-color: #7B8788; color: white !important">
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
        <!-- alert when specific user login -->
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
        <!-- alert when specific user login -->