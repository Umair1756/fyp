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
                    `<div class="box-card bg-57c07e rounded pl-1 pr-1 w-adjust mr-2" style="height: fit-content;" data-list_id="${data.id}">
                    <div class="row pt-1 pb-1">
                    <div class="col-lg-10">
                    <div class="list-title-adjust" style="width:215px" data-list_id="${data.id}">${data.list_name}</div>
                    </div>
                    <div class="col-lg-2 pr-2 pl-1">
                    <div class="btn-delete text-center pr-1" data-list_id="${data.id}"><i class="fa fa-trash-alt text-white" style="font-size:26px!important;cursor: pointer;"></i></div>
                    </div>
                    </div>
                    <div id="card-body-content">
                    <div class="list-group sort-cards-list" data-list_id="${data.id}">
                    <ul class="list-group card-list">
                    </ul>
                    </div>
                    <div class="p-0 mb-1 card-contain">
                    <button class="btn btn-link text-white p-1 add-card" id="add-card" style="margin-top: 75px!important;"><i class="far fa-calendar-plus"></i> Add a card</button>
                    <form action="" method="POST" class="card-form" style="display: none">
                    <textarea class="form-control form-textarea" placeholder="Enter card title..." name="cardtitle" id="cardtitle" cols="3" rows="3"></textarea>
                    <input type="hidden" name="list_id" value="${data.id}" data-list_id="${data.id}">
                    <input type="hidden" name="board_id" value="${data.board_id}" data-board_id="${data.board_id}">
                    <div class="form-group mb-0 mt-1">
                    <a class=" btn btn-sm btn-success text-white btn-add" id="save-add-card"><i class="fas fa-cloud-download-alt"></i> Add to list</a>
                    <button type="button" class="close btn-close" id="card-cancel" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    </form>
                    </div>
                    </div> 
                    </div>`
                );
                $('.list-section').find('input#listname').val('');
                $('.list-section').find('.list-form').hide();
                $('.list-section').find('#add-list').show();
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
                let path = $(currentBtnClicked).closest("#card-body-content");
                path.find(".sort-cards-list").append(
                    `<li class="list-group-item text-white p-1 bg-67d77e mb-1 rounded" data-card_id="${data.id}" card_id="${data.id}" type="button" data-toggle="modal" data-target=".modal-list-description" id="list-detail">
                    <div class="col-lg-12 d-inline-flex p-0">
                    <p class="card-title mr-auto mt-auto mb-auto pl-2" style="width: max-content;width: max-content;overflow: auto;max-height: 66px !important;">${data.card_name}</p>                                                 
                    <ul class="list-group text-center" style="display: contents!important;">
                    <li data-toggle="tooltip" data-placement="bottom" title="Description" style="background: transparent !important" class="list-group-item m-0 p-1 border-0 rounded-0 mr-2"><i class="fas fa-prescription-bottle"></i></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Sub Tasks" style="background: transparent !important" class="list-group-item m-0 p-1 border-0 rounded-0  mr-2"><i class="fas fa-tasks"></i></li>
                    <li data-toggle="tooltip" data-placement="bottom" title="Comments" class="list-group-item m-0 p-1 border-0 rounded-0" style="background: transparent !important"><i class="far fa-comment-dots"></i></li>
                    </ul>
                    </div>
                    </li>`
                );
                path.find('.card-form').hide();
                path.find('.card-contain').find('#cardtitle').val('');
                path.find('.add-card').show();
                jqueryPlugins();
            }
        });
    }
    var saveComment = function (txtComment, card_id) {
        $.ajax({
            url: base_url + 'index.php/userhome/saveComment',
            type: 'POST',
            dataType: 'json',
            data: { txtComment, card_id },
            beforeSend: function (data) {
                console.log(data)
            },
            success: function (data) {
                console.log(data);
                var commentedBox = "";
                commentedBox +=
                    `<div class="row m-0 bg-e9ecef p-2 rounded mb-2">
                    <div class="col-lg-4 text-center p-0">
                    <img class="user-comment-img" src="${'http://localhost/promag/assets/img/avatar7.png'}" alt="user-comment">
                    </div>
                    <div class=" col-lg-8 p-0 ">
                    <p class="m-0 f-22 text-dark">${data.uname}</p>
                    <p class="m-0 text-dark">${data.comment_description}</p>
                    <span class="m-0 text-dark">0 sec ago</span>
                    </div>
                    </div>`
                $(".commented-box").prepend(commentedBox);
                $("#comments-input").val('');
                $("#comments-input").focus();
            }
        });
    }
    var saveSubTask = function (txtSubtask, card_id) {
        $.ajax({
            url: base_url + 'index.php/userhome/saveSubTask',
            type: 'POST',
            dataType: 'json',
            data: {
                txtSubtask, card_id
            },
            beforeSend: function (data) {
                console.log(data)
            },
            success: function (data) {
                console.log(data);
                var subTaskTbody;
                subTaskTbody +=
                    `<tr>
                    <td><input type="checkbox" value="${data.is_completed === 1 ? data.is_completed : 0}" name="is_complete" id="is_complete"></td>
                    <td>${data.task_title}</td>
                    <td class="text-center"><a href="#" class="btnRowRemove" data-task_id=${data.id}><i class="fas fa-calendar-times" style="font-size: 18px;"></i></a></td>
                    </tr>`
                $(".subtask-body").prepend(subTaskTbody);
                $("#txtSubtask").val("");
                $("#txtSubtask").focus();
            }
        });
    }
    var getCardDetail = function (card_id) {
        $.ajax({
            url: base_url + 'index.php/userhome/getCardDetail',
            type: 'POST',
            dataType: 'json',
            data: {
                card_id: card_id
            },
            beforeSend: function (data) {
                console.log(data)
            },
            success: function (data) {
                console.log(data);
                // getting data from response and takeit into variables
                var cardColor = data.getCard.color;
                var created_at = data.getCard.created_at;
                var due_date = data.getCard.due_date;
                // getting data from response and takeit into fields
                $(document).find("#card-detail").attr("data-card_id", data.getCard.card_id);
                $("#card-detail").find(".card-name").val(data.getCard.card_name);
                $("#card-detail").find(".card-desc").val(data.getCard.description);
                $("#card-detail").find(".card-color")[0].selectize.setValue(data.getCard.color, true);
                // creat_date get into fields
                created_at = formatDate(created_at);
                var txtDateStart = $('#txtDateStart').datetimepicker();
                txtDateStart.val(created_at).change();
                // due_date get into fields
                due_date = formatDate(due_date);
                var txtDueDate = $('#txtDueDate').datetimepicker();
                txtDueDate.val(due_date).change();
                // labels get into fields using foreach
                var labels = "";
                // $(".card-tags").val("");
                $.each(data.labels, function (index, elem) {
                    labels += elem.tag_title + ",";
                });
                // Labels data retrieved
                labels = labels.substr(0, labels.length - 1);
                $(".card-tags").attr("value", labels);
                if ($(".card-tags").hasClass('selectized') === false) {
                    if ($('#card-detail').hasClass('selectized') === false) {
                        $("#card-detail").find(".card-tags").selectize({
                            persist: false,
                            createOnBlur: true,
                            create: true
                        });
                    }
                } else {
                    var opt = labels.split(',');
                    var selectize = $(".card-tags")[0].selectize;
                    selectize.clearOptions()
                    console.log(selectize.options)

                    //$(opt).each(function (index, lalbe) {
                       // label = $.trim(lalbe);
                     //   selectize.addOption({ value: label, text: label });
                     //   selectize.addItem(label);
                   // });
                }
                // comments panel data retrieved
                var commentBox = "";
                $(".commented-box").empty();
                $.each(data.comments, function (index, elem) {
                    commentBox += `<div class='row mt-0 ml-0 mr-0 bg-e9ecef p-2 rounded mb-2'>
                    <div class='col-lg-4 p-0'>
                    <img class="user-comment-img" src="${'http://localhost/promag/assets/img/avatar7.png'}" alt="user-comment">
                    </div>
                    <div class=' col-lg-8 p-0 user-commented'>
                    <p class='m-0 f-22 text-dark'> ${elem.uname} </p>
                    <p class='m-0 text-dark'>${elem.comment_description} </p>
                    <span class='m-0 text-dark'> 0 sec ago </span>
                    </div>
                    </div>`
                    $(".commented-box").append(commentBox);
                });
                // subtasks panel data retrieved
                countCompletedTasks = 0,
                    countTotalTasks = 0;
                $(".subtask-body").empty();
                $.each(data.tasks, function (index, elem) {
                    // countTotalTasks++;
                    // if (elem.is_completed) {
                    //     countCompletedTasks++;
                    // }
                    var subTaskTbody;
                    subTaskTbody +=
                        `<tr>
                            <td><input type="checkbox" value="${elem.is_completed === 1 ? elem.is_completed : 0}" name="is_complete" id="is_complete"></td>
                            <td>${elem.task_title}</td>
                            <td class="text-center"><a href="#" class="btnRowRemove" data-task_id=${elem.id}><i class="fas fa-calendar-times" style="font-size: 18px;"></i></a></td>
                        </tr>`
                    $(".subtask-body").append(subTaskTbody);
                })
            }
        });
    }
    // saveChnagesBtn update whole modal data
    var updateCardData = function (card_id) {
        var data = [
            cardId = $(document).find('.modal-list-description').data("card_id"),
            cardTitle = $(document).find('.card-name').val(),
            cardDesc = $(document).find('.card-desc').val(),
            cardColor = $(document).find('.card-color').val(),
            cardDueDate = $(document).find('#txtDueDate').val(),
            cardTag = $(document).find('.card-tags').val(),
        ];
        $.ajax({
            url: base_url + 'index.php/userhome/updateCardData',
            type: 'POST',
            dataType: 'json',
            data: {
                data: data
            },
            beforeSend: function (data) {
                console.log(data)
            },
            success: function (data) {
                console.log(data);
                $(".list-group-item").filter("[data-card_id=" + card_id + "]").find("p").text(data.cardTitle);
                if (cardColor.length > 0) {
                    $(document).find(".list-group-item").filter("[data-card_id=" + card_id + "]")
                        .css({ 'border-top': '5px solid ' + cardColor, 'border-radius': '4px 4px 0px 0px' });
                } else {
                    $(document).find(".list-group-item").filter("[data-card_id=" + card_id + "]").removeAttr("style");
                }
                $('.modal#card-detail').modal("hide");
            }
        });
    }
    // dateFromat for userInterFace
    var formatDate = function (date) {
        var d = new Date(date),
            dformat = [d.getMonth() + 1,
            d.getDate(),
            d.getFullYear()].join('/') + ' ' +
                [d.getHours(),
                d.getMinutes(),
                d.getSeconds()].join(':');

        return dformat;
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
    var validateSaveCard = function (currentBtnClicked) {
        var flag = false;
        var txtCard = $(currentBtnClicked).closest('form').find("#cardtitle").val();
        console.log(txtCard)
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
            // jqueryPlugins();
        },

        bindUI: function () {
            var self = this;

            $('#card-detail').on('hidden.bs.modal', function () {
                // Reset form
               // console.log($("#card-detail").find(".form-list-description"));
                //$("#card-detail").find(".form-list-description").get(0).reset();
                // Clear all previous card details
            });

            // loginBtn landing page
            $('.btnLogIn').on('click', function (e) {
                e.preventDefault();
                window.location = base_url + 'index.php/welcome/login';
            });

            // signupBtn landing page
            $('.btnSignUp').on('click', function (e) {
                e.preventDefault();
                window.location = base_url + 'index.php/welcome/signup';
            });

            // getting board_id into url
            $('.btnPersonalBoard').on('click', function (e) {
                e.preventDefault();
                var boardid = $(this).data("board_id");

                window.location = base_url + 'index.php/userHome/boardBegin/' + boardid;
            });

            // getting board_id into url
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

            // alert-success-box 
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

            // deleteSubTaskRow 
            $(document).on('click', '.btnRowRemove', function (e) {
                e.preventDefault(e);
                console.log('Remove Btn clicked');
                $(this).closest('tr').remove();
            });


            // save-add-list btn working
            $('#save-add-list').on('click', function (e) {
                e.preventDefault();
                self.initSaveList($(this).closest('.box-list').find('.list-form').serialize(), this);
            });
            // save-add-card btn working
            $(document).on('click', '#save-add-card', function (e) {
                e.preventDefault();
                self.initSaveCard($(this).closest('.card-contain').find('.card-form').serialize(), this);
            });
            // add-sub-task btn working
            $(document).on('click', '.add-sub-task', function (e) {
                e.preventDefault();
                var txtSubtask = $(document).find('#txtSubtask').val();
                var card_id = $(document).find('.modal-list-description').data('card_id');
                console.log("Clicked working...");
                console.log("This is Subtask " + txtSubtask + "This is card_id from modal " + card_id);
                if (txtSubtask.length > 0) {
                    self.initSaveSubTask(txtSubtask, card_id);
                }
            });
            // save-comment-for-individual-card btn working
            $(document).on('click', '#post-comment', function (e) {
                e.preventDefault();
                var txtComment = $(document).find('textarea#comments-input').val();
                var card_id = $(document).find('.modal-list-description').data('card_id');
                if (txtComment.length > 0) {
                    self.initSaveComment(txtComment, card_id);
                }
            });
            // get-card-detail-for-individual-card working
            $(document).on('click', '.card-list-des', function (e) {
                e.preventDefault();
                var card_id = $(this).attr('card_id');

                $('.modal-list-description').attr('data-card_id', card_id);
                $('.modal-list-description').modal('show');

                self.initGetCardDetail(card_id);
            });
            // save-changes-modal-btn click working
            $(document).on('click', '.save-click-modal', function (e) {
                e.preventDefault();
                var card_id = $(document).find('.modal-list-description').data('card_id');
                console.log("save-changes btn working properly");
                console.log(card_id);
                $('.modal-list-description').attr('data-card_id', card_id);
                $('.modal-list-description').modal('show');

                self.initUpdateCardData(card_id);
            });
        },


        initSaveList: function (data, currentBtnClicked) {
            // checks for the empty field
            var error = validateSaveList();

            if (!error) {
                saveList(data, currentBtnClicked);
            }
        },
        // cardSave
        initSaveCard: function (data, currentBtnClicked) {
            // checks for the empty field
            var error = validateSaveCard(currentBtnClicked);

            if (!error) {
                saveCard(data, currentBtnClicked);
            }
        },
        // commentsSave
        initSaveComment: function (txtComment, card_id) {
            saveComment(txtComment, card_id);
        },
        // saveSubTasks
        initSaveSubTask: function (txtSubtask, card_id) {
            saveSubTask(txtSubtask, card_id);
        },
        // cardDetails into modal
        initGetCardDetail: function (card_id) {
            getCardDetail(card_id);
        },
        // saveChanges updating cardDetailData
        initUpdateCardData: function (card_id) {
            updateCardData(card_id);
        },

    }

};
var indexJs = new IndexJs();
indexJs.init();