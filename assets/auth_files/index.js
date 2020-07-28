var IndexJs = function () {
    var saveList = function (data, currentBtnClicked) {
        $.ajax({
            url: base_url + 'index.php/userhome/saveListName',
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function (data) {
                console.log(data)
            },
            success: function (data) {
                console.log(data);
                // alert("Success Here....");
                $(currentBtnClicked).closest(".listArea").before(
                    '<div class="col-lg-3 listArea" data-list_id="' + data.id + '">' +
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading" style="border-bottom: 0px; ">' +
                    '<div class="row">' +
                    '<div class="col-lg-10">' +
                    '<h3 class="panel-title board-panel-title editable editable-click" data-pk="' + data.id + '">' + data.list_name + '</h3>' +
                    '</div>' +
                    '<div class="col-lg-2">' +
                    '<span data-listid="' + data.id + '" class="glyphicon glyphicon-trash delete-list" aria-hidden="true" style="cursor: pointer;"></span>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="panel-body card-list-con frame">' +
                    '<ul class="list-group">' +
                    '<div class="card-con ui-sortable" data-listid="' + data.id + '">' +
                    '</div>' +
                    '</ul>' +
                    '<a href="#" class="show-input-field">Add a card...</a>' +
                    '<form action="" method="POST" role="form" style="display: none;">' +
                    '<div class="form-group" id="dynamic-board-input-con" style="margin-bottom: 8px;">' +
                    '<textarea name="card-title" class="form-control" rows="3"></textarea>' +
                    '<input type="hidden" name="list_id" value="' + data.id + '">' +
                    '<input type="hidden" name="board_id" value="' + data.boardtitle_id + '">' +
                    '</div>' +
                    '<div class="form-group" style="margin-bottom: 0px;">' +
                    '<button type="submit" class="btn btn-primary" id="saveCard">Save</button> <span class="glyphicon glyphicon-remove close-input-field" aria-hidden="true"></span>' +
                    '</div>' +
                    '</form>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                );
                $('#add-list').show();
                $('.add-list-form').hide();
                $('.add-list-form').find('input[type="text"]').val('');
            }
        });
    }
    var validateSaveList = function () {
        var flag = false;
        var inputListName = $("#input-listname").val();
        if (inputListName === "") {
            $("#input-listname").addClass("border-danger");
            return flag = true;
        } else {
            $("#input-listname").removeClass("border-danger");
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

            $('.btnBoardTitle').on('click', function (e) {
                e.preventDefault();
                var boardtitleid = $(this).data("boardtitleid");

                window.location = base_url + 'index.php/userHome/boardBegin/' + boardtitleid;
            });

            $('.btnBoardTitleRecents').on('click', function (e) {
                e.preventDefault();
                var boardtitleid = $(this).data("boardtitleid");

                window.location = base_url + 'index.php/userHome/boardBegin/' + boardtitleid;
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

            // $(".dangerBox").fadeOut(10000);
            $(".successBox").fadeOut(4000);

            //add-listdBtn 
            $(document).on('click', '#add-list', function (e) {
                e.preventDefault(e);

                $(this).hide();
                $(this).closest('.box-list').find('.list-form').show();
                $(this).closest('.box-list').find('#list-cancel').show();
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
            });
            // cancelBtn X
            $(document).on('click', '#card-cancel', function (e) {
                e.preventDefault(e);

                $(this).hide();
                $(this).closest('.box-card').find('#add-card').show();
                $(this).closest('.box-card').find('.card-form').hide();
            });

            $('#save-add-list').on('click', function (e) {
                e.preventDefault();
                self.initSaveList($(this).closest('.box-add-list').find('form').serialize(), this);
            });

        },

        initSaveList: function (data, currentBtnClicked) {

            // console.log(saveList());
            var error = validateSaveList();     // checks for the empty field

            if (!error) {
                saveList(data, currentBtnClicked);
            }
        },

    }

};
var indexJs = new IndexJs();
indexJs.init();