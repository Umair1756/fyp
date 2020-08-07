<div class="main-wrap pb-1 pt-1" style="margin-top: 79px !important">
    <nav class="navbar-adj navbar navbar-expand-lg">
        <ul class="navbar-nav text-center pr-0 w-100 board_nav">
            <li class="nav-item mr-1">
                <a class="nav-link text-white rounded"><?php echo $boards['name']; ?>
                    <input type="hidden" value="<?php echo $boards['id']; ?>" id="boardid">
                </a>
            </li>
            <li class="nav-item mr-1">
                <a class="nav-link text-white rounded"> Invite</a>
            </li>
            <li class="nav-item mr-1">
                <a class="nav-link text-white rounded"> TeamShow</a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('index.php/userHome/') ?>" class="nav-link text-white rounded"> Boards</a>
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
    <div class="d-inline-flex plr-adjust">
        <?php if (!empty($lists)) { ?>
            <?php if (isset($lists)) : ?>
                <?php foreach ($lists as $list) : ?>
                    <!-- all lists and boards -->
                    <div class="box-card bg-57c07e rounded pl-1 pr-1 w-adjust mr-2" style="height: fit-content;" data-list_id="<?php echo $list['id'] ?>">
                        <div class="row pt-1 pb-1">
                            <div class="col-lg-10">
                                <div class="list-title-adjust" style="width:215px" data-list_id="<?php echo $list['id'] ?>">
                                    <?php echo $list['list_name'] ?>
                                </div>
                            </div>
                            <div class="col-lg-2 pr-2 pl-1">
                                <div class="btn-delete text-center pr-1" data-list_id="<?php echo $list['id'] ?>"><i class="fa fa-trash-alt text-white" style="font-size:26px!important;cursor: pointer;"></i></div>
                            </div>
                        </div>
                        <div id="card-body-content">
                            <ul class="list-group" id="card-list">
                                <div class="list-group sort-cards-list" data-list_id="<?php echo $list['id'] ?>">
                                    <?php if (!empty($cards)) { ?>
                                        <?php if (isset($cards)) : ?>
                                            <?php foreach ($cards as $card) : ?>
                                                <?php if ($card['list_id'] === $list['id']) : ?>
                                                    <li class="list-group-item card-list-des text-white p-1 bg-67d77e mb-1 rounded" data-card_id="<?php echo $card['id'] ?>" card_id="<?php echo $card['id'] ?>" type="button" id=" list-detail" style="
                                                    <?php echo $card['color'] ?  "border-top: 5px solid " . $card['color'] : ""; ?> 
                                                        ">
                                                        <div class="col-lg-12 d-inline-flex p-0" data-card_id="<?php echo $card['id'] ?>">
                                                            <p class="card-title mr-auto mt-auto mb-auto pl-2" style="width: max-content;overflow: auto;max-height: 66px !important;">
                                                                <?php echo $card['card_name']; ?>
                                                            </p>
                                                            <ul class=" list-group text-center" style="display: contents!important;">
                                                                <li data-toggle="tooltip" data-placement="bottom" title="This card has Description" style="background: transparent !important" class="list-group-item m-0 p-1 border-0 rounded-0 mr-2"><i class="fas fa-prescription-bottle"></i></li>
                                                                <li data-toggle="tooltip" data-placement="bottom" title="This card has SubTasks" style="background: transparent !important" class="list-group-item m-0 p-1 border-0 rounded-0  mr-2"><i class="fas fa-tasks"></i></li>
                                                                <li data-toggle="tooltip" data-placement="bottom" title="This card has Comment" class="list-group-item m-0 p-1 border-0 rounded-0" style="background: transparent !important"><i class="far fa-comment-dots"></i></li>
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
                                <button class="btn btn-link text-white p-1 add-card" id="add-card" style="margin-top: 75px!important;"><i class="far fa-calendar-plus"></i> Add a card</button>
                                <form action="" method="POST" class="card-form" style="display: none">
                                    <textarea class="form-control form-textarea" placeholder="Enter card title..." name="cardtitle" id="cardtitle" cols="3" rows="3"></textarea>
                                    <input type="hidden" name="list_id" value="<?php echo $list['id']; ?>" data-list_id="<?php echo $list['id'] ?>">
                                    <input type="hidden" name="board_id" value="<?php echo $boards['id']; ?>" data-board_id="<?php echo $boards['id']; ?>">
                                    <div class="form-group mb-0 mt-1">
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
<!-- modal for list edit description -->
<div id="card-detail" class="modal fade modal-list-description" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <form action="" method="POST">
        <div class="modal-dialog modal-lg bg-white  rounded" style="width: 50%;margin-top: 48px!important;box-shadow: 0px 0px 5px 1px #000216;">
            <div class="modal-content mt-5" style="background-color: transparent !important; border: none;">
                <div class="container">
                    <div class="modal-header border-0">
                        <h5 class="modal-title font-weight-bold">List Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-muted rounded pl-4 pr-4 pt-0 pb-0">
                        <nav>
                            <div class="nav nav-tabs card-navtabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
                                <a class="nav-item nav-link" id="nav-date-tab" data-toggle="tab" href="#nav-date" role="tab" aria-controls="nav-date" aria-selected="false">Date</a>
                                <a class="nav-item nav-link" id="nav-subtasks-tab" data-toggle="tab" href="#nav-subtasks" role="tab" aria-controls="nav-subtasks" aria-selected="false">Subtasks</a>
                                <a class="nav-item nav-link" id="nav-comments-tab" data-toggle="tab" href="#nav-comments" role="tab" aria-controls="nav-comments" aria-selected="false">Comments</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                                <form method="POST" class="form-list-description">
                                    <div class="mt-4">
                                        <div class="form-group">
                                            <label for="List Name" class="text-dark">Card Name</label>
                                            <input type="text" class="form-control card-name form-control-adjust" style="border: 1px solid #ced4da !important;outline: none!important;" id="txtListName" placeholder="Enter email">
                                            <small id="listNameMsg" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description" class="text-dark">Description</label>
                                            <input type="text" class="form-control card-desc form-control-adjust" style="border: 1px solid #ced4da !important;outline: none!important;" id="listDescription" placeholder="Enter Description">
                                            <small id="descriptionMsg" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="Labels" class="text-dark">Labels</label>
                                            <input type="text" placeholder="Enter Labels for the list" class="form-control-adjust card-tags">
                                            <small id="labelsMsg" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <div class="control-group">
                                                <label for="Labels" class="text-dark select-beast-empty">Color</label>
                                                <select id="select-beast-empty" class="demo-default card-color" data-placeholder="Select a color...">
                                                    <option selected>Select Color</option>
                                                    <option value="#FF3031">Red</option>
                                                    <option value="#4834DF">Blue</option>
                                                    <option value="#019031">Green</option>
                                                    <option value="#FFF222">Yellow</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-date" role="tabpanel" aria-labelledby="nav-date-tab">
                                <div>
                                    <div class="h5 text-dark font-weight-bold pt-3 pb-3 pl-1">Manage Date and Time for seleted List</div>
                                </div>
                                <form method="POST" class="form-list-description">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label text-dark" for="Start from">Start From</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type='text' class="form-control" disabled="disabled" id='txtDateStart' data-format="dd-MM-yyyy hh:mm:ss" style="border: 1px solid #ced4da !important;outline: none!important;" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label text-dark" for="End at">Due Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type='text' class="form-control" id='txtDueDate' data-format="dd-MM-yyyy hh:mm:ss" style="border: 1px solid #ced4da !important;outline: none!important;" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-subtasks" role="tabpanel" aria-labelledby="nav-subtasks-tab">
                                <div>
                                    <div class="h5  text-dark font-weight-bold pt-3 pb-3 pl-1 m-0">Manage your Subtasks</div>
                                </div>
                                <form method="POST" class="form-list-description form-inline justify-content-center">
                                    <div class="form-group" style="width:75%!important">
                                        <input type="text" class="form-control form-control-adjust w-100" style="border: 1px solid #ced4da !important;outline: none!important;" id="txtSubtask" placeholder="Enter your subTasks">
                                        <small id="listNameMsg" class="form-text text-muted"></small>
                                    </div>
                                    <button class="btn btn-info ml-2 add-sub-task">Add</button>
                                </form>
                                <div>
                                    <div class="sub-task-container mt-5">
                                        <table class="table table-hover table-strip subtask-table">
                                            <thead>
                                                <th>Action</th>
                                                <th>Task Name</th>
                                                <th style="width: 140px;">Remove / Cancel</th>
                                            </thead>
                                            <tbody class="subtask-body">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
                                <div>
                                    <div class="h5 text-dark font-weight-bold pt-3 pb-3 pl-1 m-0">Share your Reviews</div>
                                </div>
                                <form method="POST" class="form-list-description">
                                    <div class="form-group comment-box">
                                        <textarea class="form-control form-control-adjust" name="comments-input" id="comments-input" cols="7" rows="5" required style="border: 1px solid #ced4da !important;outline: none!important;"></textarea>
                                        <div class="form-group text-right mt-1">
                                            <button class="btn btn-success" id="post-comment"><i class="fas fa-vote-yea text-white"></i> Post here...</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="commented-box col-lg-12 mb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <form method="POST" class="w-100">
                            <button type="button" class="btn btn-primary save-click-modal"><i class="far fa-calendar-check text-white"></i> Save changes</button>
                            <button type="button" class="btn btn-danger"><i class="far fa-calendar-times text-white"></i> Delete selected card</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle text-white"></i> Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- modal for list edit description -->
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