<div class="overlay"></div>
<div class="main-wrap pb-1 pt-1" style="margin-top: 79px !important">
    <nav class="navbar-adj navbar navbar-expand-lg">
        <ul class="navbar-nav text-center pr-0 board_nav m-auto">
            <li class="nav-item mr-2">
                <a class="nav-link text-white rounded p-1 pl-3 pr-3"><i class="fas fa-chalkboard-teacher mr-1"></i> <?php echo $boards['name']; ?>
                    <input type="hidden" value="<?php echo $boards['id']; ?>" id="boardid">
                </a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link text-white rounded p-1 pl-3 pr-3" data-board_id="<?php echo $boards['id']; ?>" id="invite-link"><i class="fas fa-share-alt mr-1"></i> Invite</a>
                <?php if (!empty($sqlId)) {
                    if (isset($sqlId)) {
                        foreach ($sqlId as $id) {
                            "<input type='hidden' value='" . $id['id'] . "'>";
                        }
                    }
                } ?>

            </li>
            <li class="nav-item mr-2">
                <a class="nav-link text-white rounded p-1 pl-3 pr-3"><i class="fas fa-users m r-1"></i> TeamShow</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('index.php/userHome/') ?>" class="nav-link text-white rounded p-1 pl-3 pr-3"><i class="fas fa-chalkboard mr-1"></i> Boards</a>
            </li>

        </ul>
    </nav>
</div>
<!-- alert for board title name -->
<div class="board_area">
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="danger dangerBox text-white rounded text-center pl-3 pr-3 pt-1 pb-1 ml-auto mr-auto">
            <i class="fa fa-times-circle"></i>
            <?php echo $_SESSION['error'] ?>
        </div>
    <?php endif; ?>
    <!-- alert for board title name -->
    <div class="d-inline-flex plr-adjust list-name-search">
        <?php if (!empty($lists)) { ?>
            <?php if (isset($lists)) : ?>
                <?php foreach ($lists as $list) : ?>
                    <!-- all lists and boards -->
                    <div class="box-card bg-57c07e rounded pl-1 pr-1 w-adjust mr-2" style="height: fit-content;" data-list_id="<?php echo $list['id'] ?>" data-board_id="<?php echo $boards['id']; ?>">
                        <div class="row pt-1 pb-1">
                            <div class="col-lg-10">
                                <div class="list-title-adjust" style="width:215px" data-board_id="<?php echo $boards['id']; ?>" data-list_id="<?php echo $list['id'] ?>">
                                    <?php echo $list['list_name'] ?>
                                </div>
                            </div>
                            <div class="col-lg-2 pr-2 pl-1">
                                <div class="btn-delete list-delete text-center pr-1" data-list_id="<?php echo $list['id'] ?>"><i class="fa fa-trash-alt text-white" style="font-size:26px!important;cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div id="card-body-content">
                            <ul class="list-group mb-2" id="card-list">
                                <div class="list-group sort-cards-list" style="min-height:20px" data-list_id="<?php echo $list['id'] ?>">
                                    <?php if (!empty($cards)) { ?>
                                        <?php if (isset($cards)) : ?>
                                            <?php foreach ($cards as $card) : ?>
                                                <?php if ($card['list_id'] === $list['id']) : ?>
                                                    <li class="list-group-item card-list-des text-white p-1 bg-67d77e mb-1 rounded" data-card_id="<?php echo $card['id'] ?>" card_id="<?php echo $card['id'] ?>" type="button" id="list-detail" style="
                                                    <?php echo $card['color'] ?  "border-top: 5px solid " . $card['color'] : ""; ?>">
                                                        <div class="col-lg-12 d-inline-flex p-0" data-card_id="<?php echo $card['id'] ?>">
                                                            <p class="card-title mr-auto mt-auto mb-auto pl-2">
                                                                <?php echo $card['card_name']; ?>
                                                            </p>
                                                            <ul class="list-group text-center card-description" style="display: contents!important;">
                                                                <?php if ($card['description'] != null) { ?>
                                                                    <?php if (isset($card['description'])) : ?>
                                                                        <li style="display: flex;flex-direction: row;align-items: center;background: transparent !important;" data-toggle="tooltip" data-placement="bottom" title="This card has Description" class="list-group-item list-desc m-0 p-1 border-0 rounded-0 mr-2"><i class="fas fa-align-center"></i></li>
                                                                    <?php endif; ?>
                                                                <?php }; ?>
                                                                <?php if (!empty($totalTasks)) { ?>
                                                                    <?php if (isset($totalTasks)) : ?>
                                                                        <?php foreach ($totalTasks as $totalTask) : ?>
                                                                            <?php if ($totalTask['id'] == $card['id']) : ?>
                                                                                <?php if ($totalTask['totalTasks'] > 0) : ?>
                                                                                    <li style="display: flex;flex-direction: row;align-items: center;background: transparent !important;" class=" list-group-item m-0 p-1 border-0 rounded-0  mr-2 list-task" data-totaltask="<?php echo $totalTask['totalTasks']; ?>" data-toggle="tooltip" data-placement="bottom" title="This card has <?php echo $totalTask['totalTasks'] ?> SubTask"><i class="fas fa-network-wired"></i>
                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php };  ?>
                                                                <?php if ($card['totalComments'] > 0) { ?>
                                                                    <?php if (isset($card['totalComments'])) : ?>
                                                                        <li data-toggle="tooltip" data-placement="bottom" title="This card has  <?php echo $card['totalComments']; ?> Comment" data-totalcomments="<?php echo $card['totalComments']; ?>" class="list-comment list-group-item m-0 p-1 border-0 rounded-0" style="display: flex;flex-direction: row;align-items: center;background: transparent !important">
                                                                            <i class="far fa-comment-dots"></i></li>
                                                                    <?php endif; ?>
                                                                <?php }; ?>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php };  ?>
                                </div>
                            </ul>
                            <div class="p-0 mb-1 card-contain">
                                <button class="btn btn-link text-white p-1 add-card" id="add-card"><i class="far fa-calendar-plus"></i> Add a card</button>
                                <form action="" method="POST" class="card-form" style="display: none">
                                    <textarea class="form-control form-textarea" placeholder="Enter card title..." name="cardtitle" id="cardtitle" cols="3" rows="3"></textarea>
                                    <input type="hidden" name="list_id" value="<?php echo $list['id']; ?>" data-list_id="<?php echo $list['id'] ?>">
                                    <input type="hidden" name="board_id" value="<?php echo $boards['id']; ?>" data-board_id="<?php echo $boards['id']; ?>">
                                    <div class="form-group mb-0 mt-1 card-box">
                                        <a class=" btn btn-sm btn-success text-white btn-add" id="save-add-card"><i class="fas fa-cloud-download-alt"></i> Add to list</a>
                                        <button type="button" class="close btn-close" id="card-cancel" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php } ?>
        <!-- all lists and boards -->
        <!-- list add section -->
        <div class="list-section p-0">
            <div class="box-list bg-57c07e p-1 rounded w-adjust">
                <button class="btn btn-link text-white p-0 pl-2" id="add-list"><i class="fas fa-plus-circle text-white"></i> Add a list</button>
                <form action="" method="POST" class="list-form" style="display: none">
                    <input type="text" name="list_name" id="listname" placeholder="Enter list title..." class="form-control rounded">
                    <input type="hidden" value="<?php echo $boards['id']; ?>" name="board_id" id="boardid">
                    <div class="form-group mb-0 mt-1">
                        <a class="btn btn-sm btn-success text-white btn-add" type="submit" id="save-add-list"><i class="fas fa-cloud-download-alt"></i> Add to list</a>
                        <button type="button" class="close btn-close" id="list-cancel" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- list add section -->
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
<!-- modal for invite members-->
<div id="invite-content-modal" aria-hidden="true" tabindex="-1" class="modal fade modal">
    <div class="modal-dialog modal-lg bg-white  rounded" style="width: 30%;margin-top: 250px!important;box-shadow: 0px 0px 5px 1px #000216;">
        <div class="modal-content mt-5" style="background-color: transparent !important; border: none;">
            <div class="modal-header p-0 pl-2 pt-2 pb-2 bg-dedede">
                <div class="h4 mb-0">Invite a member</div>
            </div>
            <div class="container mt-3">
                <form class="form" role="form">
                    <div class="form-group">
                        <input class="form-control mr-1 form-control-modal" id="invite link" name="invite-link" type="text" />
                    </div>
                    <div class="form-group text-center mb-3">
                        <button type="button" class="btn btn-success mr-1 btn-sm invite-link"><i class="fas fa-link"></i> Copy Link</button>
                        <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal"><i class="far fa-times-circle text-white"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal for invite members -->