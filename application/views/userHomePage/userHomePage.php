
<div class="penal_area">
    <div class="container">
        <div class="col-lg-12">
            <div class="recents">
                <div class="h5">
                    <i class='far fa-clock'></i> Recently Viewed
                </div>
                <div class="col-lg-12 bg-info">
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

            <div class="recents">
                <div class="h5">
                    <i class='fa fa-user text-2b4949'></i> Personal Boards
                </div>
                <div class="col-lg-12 bg-info">
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

            <div class="recents">
                <div class="h5">
                    <i class='far fa-clock'></i> Team name
                </div>
                <div class="col-lg-12 bg-info">
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
                <div class="modal-dialog modal-lg mt-5" style="width: 30%;">
                    <div class="modal-content mt-5" style="background-color: transparent !important; border: none;">
                        <div class="container">
                            <div class="modal-body text-muted">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="titlename" placeholder="Title name" style="background-color: rgba(9,30,66,.04)">
                                            <button class="btn btn-secondary mt-2">Create Board</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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