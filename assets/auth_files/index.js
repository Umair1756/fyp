var IndexJs = function () {
    var saveList = function (data, currentBtnClicked) {
        $.ajax({
            url: base_url + 'index.php/userhome/saveList',
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function (data) {
                console.log(data)
            },
            success: function (data) {
                console.log(data);
                $(currentBtnClicked).closest(".list-section").before(
                    '<div class="box-card bg-57c07e rounded pl-1 pr-1 w-adjust mr-2" data-list_id="' + data.id + '">' +
                    '<div class="row p-1 ml-0">' +
                    '<div class="col-lg-10 pl-0 pr-0">' +
                    '<div class="list-title-adjust" data-list_id="' + data.id + '">' + data.list_name + '</div>' +
                    '</div>' +
                    '<div class="col-lg-2 p-1" style="bottom: 2px !important;">' +
                    '<div class="btn-delete text-center pr-1" data-list_id="' + data.id + '"><i class="fa fa-trash-alt text-white" style="font-size:25px!important;cursor: pointer;"></i></div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="card-body-content">' +
                    '<div class="list-group sort-cards-list" data-list_id="' + data.id + '">' +
                    '</div>' +
                    '<div class="p-0 mb-1 card-box">' +
                    '<button class="btn btn-link text-white p-1" id="add-card" style="margin-top: 75px!important;"><i class="far fa-calendar-plus"></i> Add a card</button>' +
                    '<form action="" method="POST" class="card-form" style="display: none">' +
                    '<textarea class="form-control form-textarea" placeholder="Enter card title..." name="cardtitle" id="cardtitle" cols="3" rows="3"></textarea>' +
                    '<input type="hidden" name="listid" data-list_id="' + data.id + '">' +
                    '<input type="hidden" name="boardid" data-board_id="' + data.board_id + '">' +
                    '<div class="form-group mb-0 mt-2">' +
                    '<a class=" btn btn-sm btn-success text-white btn-add" id="save-add-card"><i class="fas fa-cloud-download-alt"></i> Add to list</a>' +
                    '<button type="button" class="close btn-close" id="card-cancel" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                    '</button>' +
                    '</div>' +
                    '</form>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
                $('.list-section').find('input#listname').val('');
            }
        });
    }
    var saveCard = function (data, currentBtnClicked) {
        $.ajax({
            url: base_url + 'index.php/userhome/saveCard',
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function (data) {
                console.log(data)
            },
            success: function (data) {
                console.log(data);
                console.log(data.card_name);
                $("#card-body-content").find(".sort-cards-list").append(
                    '<ul class="list-group">' +
                    '<li class="list-group-item text-white p-1 bg-67d77e" type="button" data-toggle="modal" data-target=".modal-list-description" id="list-detail">' +
                    '<div class="col-lg-12 d-inline-flex p-0">' +
                    '<p class="card-title mr-auto mt-auto mb-auto pl-2">' + data.card_name + '</p>' +
                    '<ul class="list-group text-center" style="display: contents!important;">' +
                    '</ul>' +
                    '</div>' +
                    '</li>' +
                    '</ul>'
                );
                $('.card-form').hide();
                $('.card-box').find('#cardtitle').val('');
                $('#add-card').show();
            }
        });
    }
    // validate list name when it is empty
    var validateSaveList = function () {
        var flag = false;
        var inputListName = $("#listname").val();
        if (inputListName === "") {
            $("#listname").addClass("border-danger");
            return flag = true;
        } else {
            $("#listname").removeClass("border-danger");
            return flag = false;
        }
        return flag;
    }
    // validate card name when it is empty
    var validateSaveCard = function () {
        var flag = false;
        var txtCard = $("#cardtitle").val();
        if (txtCard === "") {
            $("#cardtitle").addClass("border-danger");
            return flag = true;
        } else {
            $("#cardtitle").removeClass("border-danger");
            return flag = false;
        }
        return flag;
    }

    return {

        init: function () {
            this.bindUI();
        },

        bindUI: function () {
            var self = this;

            $('.btnLogIn').on('click', function (e) {
                e.preventDefault();
                window.location = base_url + 'index.php/welcome/login';
            });

            $('.btnSignUp').on('click', function (e) {
                e.preventDefault();
                window.location = base_url + 'index.php/welcome/signup';
            });

            $('.btnPersonalBoard').on('click', function (e) {
                e.preventDefault();
                var boardid = $(this).data("board_id");

                window.location = base_url + 'index.php/userHome/boardBegin/' + boardid;
            });

            $('.btnBoardRecent').on('click', function (e) {
                e.preventDefault();
                var boardid = $(this).data("board_id");

                window.location = base_url + 'index.php/userHome/boardBegin/' + boardid;
            });

            // Password eyeView in SignUp Page
            $('#eyeView').on('click', function (e) {
                var x = document.getElementById("pwd");
                if (x.type === "password") {
                    $(".fa-eye").addClass("fa-eye-slash");
                    x.type = "text";
                } else {
                    x.type = "password";
                    $(".fa-eye").removeClass("fa-eye-slash");
                }
            });

            $(".successBox").fadeOut(4000);

            //add-listdBtn 
            $(document).on('click', '#add-list', function (e) {
                e.preventDefault(e);

                $(this).hide();
                $(this).closest('.box-list').find('.list-form').show();
                $(this).closest('.box-list').find('#list-cancel').show();
                $(this).closest('.box-list').find('#listname').focus();
            });
            // cancelBtn X
            $(document).on('click', '#list-cancel', function (e) {
                e.preventDefault(e);

                $(this).hide();
                $(this).closest('.box-list').find('#add-list').show();
                $(this).closest('.box-list').find('.list-form').hide();
            });

            //add-cardBtn 
            $(document).on('click', '#add-card', function (e) {
                e.preventDefault(e);

                $(this).hide();
                $(this).closest('.box-card').find('.card-form').show();
                $(this).closest('.box-card').find('#card-cancel').show();
                $(this).closest('.box-card').find('#cardtitle').focus();
            });
            // cancelBtn X
            $(document).on('click', '#card-cancel', function (e) {
                e.preventDefault(e);

                $(this).hide();
                $(this).closest('.box-card').find('#add-card').show();
                $(this).closest('.box-card').find('.card-form').hide();
            });




            // save-add-list btn working
            $('#save-add-list').on('click', function (e) {
                e.preventDefault();
                self.initSaveList($(this).closest('.box-list').find('.list-form').serialize(), this);
            });
            // save-add-card btn working
            $('.save-add-card').on('click', function (e) {
                e.preventDefault();
                console.log("ÖK");
                self.initSaveCard($(this).closest('.card-box').find('.card-form').serialize(), this);
            });
        },

        initSaveList: function (data, currentBtnClicked) {
            // checks for the empty field
            var error = validateSaveList();

            if (!error) {
                saveList(data, currentBtnClicked);
            }
        },
        initSaveCard: function (data, currentBtnClicked) {
            // checks for the empty field
            var error = validateSaveCard();

            if (!error) {
                saveCard(data, currentBtnClicked);
            }
        },

    }

};
var indexJs = new IndexJs();
indexJs.init();