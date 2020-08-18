<!-- modal for list edit description -->
<div id="card-detail" class="modal fade modal-list-description" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                    <!-- <div class="form-group">
                                        <label for="Labels" class="text-dark">Labels</label>
                                        <input type="text" placeholder="Enter Labels for the list" class="form-control-adjust card-tags input-sortable">
                                        <small id="labelsMsg" class="form-text text-muted"></small>
                                    </div> -->
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
                                            <th>is Completed ?</th>
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
                        <button type="button" class="btn btn-danger card-delete"><i class="far fa-calendar-times text-white"></i> Delete selected card</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle text-white"></i> Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal for list edit description -->

<!-- jQuery -->
<script src=" <?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
<!-- selectize.js -->
<script src=" <?php echo base_url('assets/selectize/jqueryui.js'); ?>"></script>
<script src=" <?php echo base_url('assets/selectize/selectize.js'); ?>"></script>
<script src=" <?php echo base_url('assets/selectize/index.js'); ?>"></script>
<!-- selectize.js -->
<!-- popovers and tooltips -->
<script src=" <?php echo base_url('assets/popover/popper.min.js'); ?>"></script>
<!-- popovers and tooltips -->
<script src=" <?php echo base_url('assets/popover/bootstrap.min.js'); ?>"></script>
<!-- datetimepicker -->
<script src=" <?php echo base_url('assets/datetimepicker/moment.min.js'); ?>"></script>
<script src=" <?php echo base_url('assets/datetimepicker/bootstrap-datetimepicker.min.js'); ?>"></script>
<!-- datetimepicker -->
<script src=" <?php echo base_url('assets/sweetalerts/sweetalert.min.js'); ?>"></script>
<!-- custom JS Files -->
<script src='<?php echo base_url('assets/auth_files/plugins.js'); ?>'></script>
<script src='<?php echo base_url('assets/auth_files/index.js'); ?>'></script>
<!-- custom JS Files -->


</body>

</html>