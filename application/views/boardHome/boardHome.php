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
<div class="board_area pt-2 pb-2">
    <div class="col-lg-12">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="danger dangerBox text-white rounded text-center pl-3 pr-3 pt-1 pb-1 ml-auto mr-auto">
                <i class="fa fa-times-circle"></i>
                <?php echo $_SESSION['error'] ?>
            </div>
        <?php endif; ?>
        <div class="row ml-1">
            <div class="col-lg-3 box-card bg-57c07e rounded pl-2 pr-1">
                <div class="row" style="padding-top: 10px !important; padding-bottom: 10px !important;">
                    <div class="col-lg-10">
                        <div id="demotooltip" data-toggle="popover" title="Some Title" content="Some Content" class="list-title-adjust"><u style="font-weight: 600; font-size: 18px; color: #2b4949 !important; text-decoration: none;">Raided Box</u></div>
                    </div>
                    <div class="col-lg-2">
                        <div class="btn-delete text-center "><i class="fa fa-trash-alt text-white" style="font-size:25px!important; cursor: pointer; margin-right: 25px !important; margin-top: 4px;"></i></div>
                    </div>
                </div>
                <div class="list-group sort-lists">
                    <ul class="list-group" style="margin-right: 5px;">
                        <li class="list-group-item text-white p-1 bg-67d77e" style="font-weight: 500; padding-left: 11px !important; font-size: 20px; " type="button" data-toggle="modal" data-target=".modal-list-description" id="list-detail">Listed Text</li>
                    </ul>
                </div>
                <div class="col-lg-12 p-0 mb-1">
                    <button class="btn btn-link text-white p-1" id="add-card" style="margin-top: 75px!important;"><i class="far fa-calendar-plus"></i> Add a card</button>
                    <form action="" method="POST" class="card-form" style="display: none">
                        <textarea class="form-control form-tarea mr-2" placeholder="Enter card title..." name="card-title" id="card-title" cols="3" rows="3"></textarea>

                        <div class="form-group text-left">
                            <a class="btn btn-sm btn-success text-white btn-add" id="save-add-card"><i class="fas fa-cloud-download-alt"></i> Add to list</a>
                            <button type="button" class="close btn-close" id="card-cancel" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box-list bg-57c07e p-1 rounded">
                    <button class="btn btn-link text-white p-1" id="add-list"><i class="fas fa-plus-circle text-white"></i> Add a list</button>
                    <form action="" method="POST" class="list-form" style="display: none">
                        <input type="text" name="input_list_name" id="input-listname" placeholder="Enter list title..." class="form-control rounded">
                        <input type="hidden" value="<?php echo $boards['ptid']; ?>" name="board_id" id="boardid">
                        <a class="btn btn-sm btn-success text-white btn-add" type="submit" id="save-add-list"><i class="fas fa-cloud-download-alt"></i> Add to list</a>
                        <button type="button" class="close btn-close" id="list-cancel" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </form>
                </div>
            </div>
            <!-- list add section -->
        </div>
    </div>
</div>
<!-- modal for list edit description -->
<div class="modal fade modal-list-description" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                            <label for="List Name" class="text-dark">List Name</label>
                                            <input type="text" class="form-control form-control-adjust" style="border: 1px solid #ced4da !important;outline: none!important;" id="txtListName" placeholder="Enter email">
                                            <small id="listNameMsg" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="Description" class="text-dark">Description</label>
                                            <input type="text" class="form-control form-control-adjust" style="border: 1px solid #ced4da !important;outline: none!important;" id="listDescription" placeholder="Enter Description">
                                            <small id="descriptionMsg" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="Labels" class="text-dark">Labels</label>
                                            <input type="text" placeholder="Enter Labels for the list" id="input-sortable" class="form-control-adjust input-sortable demo-default">
                                            <small id="labelsMsg" class="form-text text-muted"></small>
                                        </div>
                                        <div class="form-group">
                                            <div class="control-group">
                                                <label for="Labels" class="text-dark select-beast-empty">Color</label>
                                                <select id="select-beast-empty" class="demo-default" data-placeholder="Select a color...">
                                                    <option value="##FF3031">Red</option>
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
                                            <label class="control-label text-dark" for="Start from">Start from</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type='text' class="form-control" id='txtDateStart' style="border: 1px solid #ced4da !important;outline: none!important;" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label text-dark" for="End at">End at</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type='text' class="form-control" id='txtDateEnd' style="border: 1px solid #ced4da !important;outline: none!important;" />
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
                                        <input type="text" class="form-control form-control-adjust w-100" style="border: 1px solid #ced4da !important;outline: none!important;" id="txtListName" placeholder="Enter email">
                                        <small id="listNameMsg" class="form-text text-muted"></small>
                                    </div>
                                    <button class="btn btn-info ml-2">List Name</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
                                <div>
                                    <div class="h5 text-dark font-weight-bold pt-3 pb-3 pl-1 m-0">Share your Reviews</div>
                                </div>
                                <form method="POST" class="form-list-description">
                                    <div>
                                        <div class="form-group">
                                            <textarea class="form-control form-control-adjust" name="comments-section" id="comments-section" cols="7" rows="5" style="border: 1px solid #ced4da !important;outline: none!important;"></textarea>
                                            <small id="listSubTasksMsg" class="form-text text-muted"></small>
                                            <div class="form-group text-right">
                                                <button class="btn btn-success"><i class="fas fa-vote-yea text-white"></i> Post here...</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </ul>
                    </div>
                    <div class="modal-footer border-0">
                        <form method="POST" class="w-100">
                            <button type="button" class="btn btn-primary"><i class="far fa-calendar-check text-white"></i> Save changes</button>
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