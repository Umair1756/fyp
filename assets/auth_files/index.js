var IndexJs = function () {
    var saveList = function (data, currentBtnClicked) {
        $.ajax({
            url: base_url + 'index.php/userhome/saveList',
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function (data) {
                // console.log(data)
            },
            success: function (data) {
                // console.log(data);
                $(currentBtnClicked).closest(".list-section").before(
                    `<div class="box-card bg-57c07e rounded pl-1 pr-1 w-adjust mr-2" style="height: fit-content;" data-list_id="${data.id}">
                    <div class="row pt-1 pb-1">
                    <div class="col-lg-10">
                    <div class="list-title-adjust" data-toggle="popover" title="Edit List Name" data-container="body" style="width:215px" data-list_id="${data.id}">${data.list_name}</div>
                    </div>
                    <div class="col-lg-2 pr-2 pl-1">
                    <div class="btn-delete list-delete text-center pr-1" data-list_id="${data.id}"><i class="fa fa-trash-alt text-white" style="font-size:26px!important;cursor: pointer;"></i>
                    </div>
                    </div>
                    </div>
                    <div id="card-body-content">
                    <ul class="list-group mb-2" id="card-list">
                    <div class="list-group sort-cards-list"style="min-height:30px" data-list_id="${data.id}">
                    </div>
                    </ul>
                    <div class="p-0 mb-1 card-contain">
                    <button class="btn btn-link text-white p-1 add-card" id="add-card"><i class="far fa-calendar-plus"></i> Add a card</button>
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
                // debugger
                $('.list-section').find('input#listname').val('');
                $('.list-section').find('.list-form').hide();
                $('.list-section').find('#add-list').show();
                cardDragable();
                createActivity(data.id, "List", "created List");
                jqueryPlugins();
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
            }
        });
    }
    var updateListName = function (list_id, board_id, txtListName, currentBtnClicked) {
        $.ajax({
            url: base_url + 'index.php/userhome/updateListName',
            type: 'POST',
            dataType: 'json',
            data: {
                list_id, txtListName, board_id
            },
            beforeSend: function (data) {
                // console.log(data)
            },
            success: function (data) {
                // console.log(data);
                $(".list-title-adjust").filter("[data-list_id=" + data.list_id + "]").text(data.list_name);
                $('.popover').hide();
                createActivity(data.list_id, "List", "updated List name");
                jqueryPlugins();
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
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
                // console.log(data)
            },
            success: function (data) {
                // console.log(data);
                let path = $(currentBtnClicked).closest("#card-body-content");
                path.find(".sort-cards-list").append(
                    `<li class="list-group-item card-list-des text-white p-1 bg-67d77e mb-1 rounded" data-card_id="${data.id}" card_id="${data.id}" type="button" id="list-detail" style="${data.color ? "border-top: 5px solid ${data.color}" : ""}">
                        <div class="col-lg-12 d-inline-flex p-0" data-card_id="${data.id}">
                            <p class="card-title mr-auto mt-auto mb-auto pl-2" style="width: max-content;overflow: auto;max-height: 66px !important;">
                                ${data.card_name}
                            </p>
                            <ul class="list-group text-center card-description" style="display: contents!important;">
                            </ul>
                        </div>
                    </li>`
                );
                path.find('.card-form').hide();
                path.find('.card-contain').find('#cardtitle').val('');
                path.find('.add-card').show();
                createActivity(data.id, "Card", "created Card");
                jqueryPlugins();
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
            }
        });
    }
    var deleteCard = function (card_id, cardRmv) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to see this again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: base_url + 'index.php/userhome/deleteCard',
                type: 'POST',
                dataType: 'json',
                data: {
                    card_id: card_id
                },
                beforeSend: function (data) {
                    // console.log(data)
                },
                success: function (data) {
                    // console.log(data);
                    $(cardRmv).remove();
                    swal("Deleted!", "Card successfully deleted!", "success");
                    $("#card-detail").modal("hide");
                    createActivity(data.card_id, "Card", "deleted Card");
                },
                error: function (data) {
                    // console.log(data);
                    alert("Error, Server or Request Issue, Try again");
                }
            });
        });
    }
    var deleteTask = function (task_id, currentBtnClicked) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to see this again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: base_url + 'index.php/userhome/deleteTask',
                type: 'POST',
                dataType: 'json',
                data: {
                    task_id: task_id
                },
                beforeSend: function (data) {
                    // console.log(data)
                },
                success: function (data) {
                    $(currentBtnClicked).closest('tr').remove();
                    var card_id = $('#card-detail').data('card_id');
                    var totalTasks = $(".list-group-item").filter("[data-card_id=" + card_id + "]").find('.list-task').attr("data-totaltask");
                    totalTasks--;
                    $(".list-group-item").filter("[data-card_id=" + card_id + "]").find('.list-task').attr("data-original-title", "This card have " + totalTasks + " tasks.");
                    $(".list-group-item").filter("[data-card_id=" + card_id + "]").find('.list-task').attr("data-totaltask", totalTasks);
                    swal("Deleted!", "Task successfully deleted!", "success");
                    createActivity(data.task_id, "SubTasks", "deleted tasks");
                },
                error: function (data) {
                    // console.log(data);
                    alert("Error, Server or Request Issue, Try again");
                }
            });
        });
    }
    var deleteList = function (list_id, currentBtnClicked) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to see this again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: base_url + 'index.php/userhome/deleteList',
                type: 'POST',
                dataType: 'json',
                data: {
                    list_id: list_id
                },
                beforeSend: function (data) {
                    // console.log(data)
                },
                success: function (data) {
                    // console.log(data);
                    $(currentBtnClicked).closest('.box-card').remove();
                    swal("Deleted!", "List successfully deleted!", "success");
                    createActivity(data.list_id, "List", "deleted List");
                },
                error: function (data) {
                    // console.log(data);
                    alert("Error, Server or Request Issue, Try again");
                }
            });
        });
    }
    var saveComment = function (txtComment, card_id) {
        $.ajax({
            url: base_url + 'index.php/userhome/saveComment',
            type: 'POST',
            dataType: 'json',
            data: { txtComment, card_id },
            beforeSend: function (data) {
                // console.log(data)
            },
            success: function (data) {
                // console.log(data);
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
                if ($(".list-group-item").filter("[data-card_id=" + data.card_id + "]").find('ul.card-description .list-comment').length == 0) {
                    $(".list-group-item").filter("[data-card_id=" + card_id + "]").find('ul.card-description').append(
                        `<li data-toggle="tooltip" data-totalcomments=1 data-placement="bottom" title="This card has 1 Comment" style="background: transparent !important;display: flex;flex-direction: row;align-items: center;" class="list-comment list-group-item m-0 p-1 border-0 rounded-0"><i class="far fa-comment-dots"></i></li>`
                    );
                } else {
                    var totalComments = $(".list-group-item").filter("[data-card_id=" + data.card_id + "]").find('.list-comment').attr("data-totalcomments");
                    totalComments++;
                    $(".list-group-item").filter("[data-card_id=" + data.card_id + "]").find('.list-comment').attr("data-original-title", "This card have " + totalComments + " tasks.");
                    $(".list-group-item").filter("[data-card_id=" + data.card_id + "]").find('.list-comment').attr("data-totalcomments", totalComments);
                }
                createActivity(data.id, "Comments", "commented");
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
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
                // console.log(data)
            },
            success: function (data) {
                // console.log(data);
                var subTaskTbody;
                subTaskTbody +=
                    `<tr class="subtask-row">
                    <td><input type="checkbox" value="${data.subtasks.is_completed == 1 ? data.is_completed : 0}" name="is_complete" id="is_complete_check" data-task_id=${data.subtasks.id} ${data.is_completed == 1 ? 'checked data-checked="1"' : 'data-checked="0"'}></td>
                    <td>${data.subtasks.task_title}</td>
                    <td class="text-center"><a href="#" class="btnRowRemove" data-task_id=${data.subtasks.id}><i class="fas fa-calendar-times" style="font-size: 18px;"></i></a></td>
                    </tr>`

                $(".subtask-body").prepend(subTaskTbody);
                $("#txtSubtask").val("");
                $("#txtSubtask").focus();
                if ($(".list-group-item").filter("[data-card_id=" + card_id + "]").find('ul.card-description .list-task').length == 0) {
                    $(".list-group-item").filter("[data-card_id=" + card_id + "]").find('ul.card-description').append(
                        `<li data-toggle="tooltip" data-placement="bottom" data-totaltask=1 title="This card has 1 Task" style="background: transparent !important;display: flex;flex-direction: row;align-items: center;" class="list-task list-group-item m-0 p-1 border-0 rounded-0  mr-2"><i class="fas fa-network-wired"></i></li>`
                    );
                } else {
                    var totalTasks = $(".list-group-item").filter("[data-card_id=" + card_id + "]").find('.list-task').attr("data-totaltask");
                    totalTasks++;
                    $(".list-group-item").filter("[data-card_id=" + card_id + "]").find('.list-task').attr("data-original-title", "This card have " + totalTasks + " tasks.");
                    $(".list-group-item").filter("[data-card_id=" + card_id + "]").find('.list-task').attr("data-totaltask", totalTasks);
                }
                createActivity(data.subtasks.id, "SubTasks", "created a task");
                jqueryPlugins();
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
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
                // console.log(data)
            },
            success: function (data) {
                // console.log(data);
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
                // var labels = "";
                // $(".card-tags").val("");
                // $.each(data.labels, function (index, elem) {
                //     labels += elem.tag_title + ",";
                // });
                // // Labels data retrieved
                // labels = labels.substr(0, labels.length );
                // $(".card-tags").attr("value", labels);
                // if ($(".card-tags").hasClass('selectized') === false) {
                //     if ($('#card-detail').hasClass('selectized') === false) {
                //         $("#card-detail").find(".card-tags").selectize({
                //             persist: false,
                //             createOnBlur: true,
                //             create: true
                //         });
                //     }
                // } else {
                //     var opt = labels.split(',');
                //     var selectize = $(".card-tags")[0].selectize;
                //     selectize.clearOptions()
                //     console.log(selectize.options)

                //     $(opt).each(function (index, lalbe) {
                //     label = $.trim(lalbe);
                //       selectize.addOption({ value: label, text: label });
                //       selectize.addItem(label);
                //     });
                // }
                // labels get into fields using foreach

                // comments panel data retrieved
                var commentBox = "";
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
                });
                $(".commented-box").empty();
                $(".commented-box").append(commentBox);
                // subtasks panel data retrieved
                countCompletedTasks = 0,
                    countTotalTasks = 0;
                $(".subtask-body").empty();
                $.each(data.tasks, function (index, elem) {
                    countTotalTasks++;
                    if (elem.is_completed) {
                        countCompletedTasks++;
                    }
                    var subTaskTbody;
                    subTaskTbody +=
                        `<tr>
                            <td><input type="checkbox" value="${elem.is_completed == 1 ? elem.is_completed : 0}" name="is_complete_check" id="is_complete_check" data-task_id=${elem.id} ${elem.is_completed == 1 ? 'checked data-checked="1"' : 'data-checked="0"'}></td>
                            <td>${elem.task_title}</td>
                            <td class="text-center"><a href="#" class="btnRowRemove" data-task_id=${elem.id}><i class="fas fa-calendar-times" style="font-size: 18px;"></i></a></td>
                        </tr>`
                    $(".subtask-body").append(subTaskTbody);
                })
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
            }
        });
    }
    // saveChnagesBtn update whole modal data
    var updateCardData = function (card_id) {
        var data = [
            cardId = card_id,
            cardTitle = $(document).find('.card-name').val(),
            cardDesc = $(document).find('.card-desc').val(),
            cardColor = $(document).find('.card-color').val(),
            cardDueDate = $(document).find('#txtDueDate').val(),
            cardTag = 'Test',
        ];
        // console.log(data);
        $.ajax({
            url: base_url + 'index.php/userhome/updateCardData',
            type: 'POST',
            dataType: 'json',
            data: {
                data: data
            },
            beforeSend: function (data) {
                // console.log(data)
            },
            success: function (data) {
                // console.log(data);
                $(".card-list-des").filter("[data-card_id=" + data.card_id + "]").find("p").text(data.card_name);
                if (data.color.length > 0) {
                    $(document).find(".card-list-des").filter("[data-card_id=" + data.card_id + "]")
                        .css({ 'border-top': '5px solid ' + data.color, 'border-radius': '4px 4px 0px 0px' });
                } else {
                    $(document).find(".card-list-des").filter("[data-card_id=" + data.card_id + "]").removeAttr("style");
                }
                if (data.description != "") {
                    $(document).find(".card-list-des").filter("[data-card_id=" + data.card_id + "]").find(".card-description .list-desc").remove();
                    $(document).find(".card-list-des").filter("[data-card_id=" + data.card_id + "]").find(".card-description").prepend('<li data-toggle="tooltip" data-placement="bottom" title="This card has Description" style="background: transparent !important" class="list-group-item list-desc m-0 p-1 border-0 rounded-0 mr-2"><i class="fas fa-align-center"></i></li>');
                } else {
                    $(document).find(".card-list-des").filter("[data-card_id=" + data.card_id + "]").find(".card-description .list-desc").remove();
                }
                $('.modal#card-detail').modal("hide");
                jqueryPlugins();
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
            }
        });
    }
    // updateTask completed or not both in both conditions
    var updateTask = function (task_id, isCompleted) {
        card_id = $(document).find('#card-detail').data('card_id');
        // console.log(card_id);
        $.ajax({
            url: base_url + 'index.php/userhome/updateTask',
            type: 'POST',
            dataType: 'json',
            data: {
                task_id: task_id,
                card_id: card_id,
                isCompleted: isCompleted,
            },
            beforeSend: function (data) {
                // console.log(data)
            },
            success: function (data) {
                // console.log(data);
                createActivity(data.task_id, "SubTasks", "updated task status");
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
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
    }
    // validate card name when it is empty
    var validateSaveCard = function (currentBtnClicked) {
        var flag = false;
        var txtCard = $(currentBtnClicked).closest('.card-form').find("#cardtitle").val();
        // console.log(txtCard)
        if (txtCard === "") {
            $(currentBtnClicked).closest('.card-form').find("#cardtitle").addClass("border-danger");
            return flag = true;
        } else {
            $(currentBtnClicked).closest('.card-form').find("#cardtitle").removeClass("border-danger");
            return flag = false;
        }
    }
    // validate update list name when it is empty
    var validateUpdateSaveList = function (currentBtnClicked) {
        var flag = false;
        var inputListName = $(currentBtnClicked).closest('#popover-content').find("#list-name-popover").val();
        if (inputListName === "") {
            $(currentBtnClicked).closest('#popover-content').find("#list-name-popover").attr("style", "border:2px solid red !important");
            return flag = true;
        } else {
            $(currentBtnClicked).closest('#popover-content').find("#list-name-popover").removeAttr("style", "");
            return flag = false;
        }
    }
    //user activity 
    var createActivity = function (activity_in_id, changed_in, description) {
        $.ajax({
            url: base_url + 'index.php/userhome/createActivity',
            type: 'POST',
            dataType: 'json',
            data: {
                activity_in_id: activity_in_id,
                changed_in: changed_in,
                description: description
            },
            success: function (data) {
                // console.log("data")
            },
            error: function (data) {
                // console.log(data);
                alert("Error, Server or Request Issue, Try again");
            }
        });
    }

    return {

        init: function () {
            this.bindUI();
            // jqueryPlugins()
        },

        bindUI: function () {
            var self = this;
            // $('[data-toggle="popover"]').on('hidden.bs.popover', function () {
            //     $("").addClass('d-none')
            // });
            $('#card-detail').on('hidden.bs.modal', function () {
                // console.log("here")
                // $("#card-detail").modal("hide");
                $(this).find('form').each(function (index, item) {
                    item.reset();
                });
            });
            // $('[data-toggle="popover"]').on('hidden.bs.popover', function () {
            //     console.log("closed");
            //     return $('#popover-content').addClass('d-none');
            // });
            // $('[data-toggle="popover"]').on('shown.bs.popover', function () {
            //     console.log("shown");
            //     return $('#popover-content').removeClass('d-none');
            // });
            // closeBtn popover
            $(document).on('click', '.close-popover', function (e) {
                e.preventDefault();
                $('[data-toggle="popover"]').popover('hide');
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
            // $(".successBox").fadeOut(4000);

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
            // list-title into popover
            $(document).on('click', '.list-title-adjust', function (e) {
                e.preventDefault();
                // console.log('current list_name show in popover input')
                var list_id = $(this).data("list_id");
                var list_name = $.trim($(this).text());
                $(document).find('#list-name-popover').attr("data-list_id", list_id);
                $(document).find('#list-name-popover').val(list_name);
                $(document).find('#list-name-popover').focus();
            });
            // list-title-adjust working
            $(document).on('click', '.list-title-adjust', function (e) {
                e.preventDefault();
                var list_id = $(this).data("list_id");
                $(document).find('#list-name-popover').attr("data-list_id", list_id);
            });
            // update-list-name btn working
            $(document).on('click', '.update-list-name', function (e) {
                e.preventDefault();
                var list_id = $(document).find('#list-name-popover').data("list_id");
                var board_id = $(document).find('.list-title-adjust').data("board_id");
                var txtListName = $(document).find('#list-name-popover').val();
                self.initUpdateListName(list_id, board_id, txtListName, this)
            });
            // save-add-list btn working
            $('#save-add-list').on('click', function (e) {
                e.preventDefault();
                self.initSaveList($(this).closest('.box-list').find('.list-form').serialize(), this);
            });
            // card-list-delete btn working
            $(document).on('click', '.list-delete', function () {
                // console.log("Clicked")
                var list_id = $(this).data('list_id');
                self.initDeleteList(list_id, this);
            });
            // save-add-card btn working
            $(document).on('click', '#save-add-card', function (e) {
                e.preventDefault();
                self.initSaveCard($(this).closest('.card-contain').find('.card-form').serialize(), this);
            });
            // card-detail-delete btn working
            $(document).on('click', 'button.card-delete', function () {
                // console.log("Clicked")
                var card_id = $(document).find('#card-detail').attr('data-card_id');
                var cardRmv = $(".list-group-item").filter("[data-card_id=" + card_id + "]");
                // console.log(card_id)
                self.initDeleteCard(card_id, cardRmv);
            });
            // add-sub-task btn working
            $(document).on('click', '.add-sub-task', function (e) {
                e.preventDefault();
                var txtSubtask = $(document).find('#txtSubtask').val();
                var card_id = $(document).find('.modal-list-description').attr('data-card_id');
                // console.log("Clicked working...");
                // console.log("This is Subtask " + txtSubtask + "This is card_id from modal " + card_id);
                if (txtSubtask.length > 0) {
                    self.initSaveSubTask(txtSubtask, card_id);
                }
            });
            // update-task-btn working
            $(document).on("click", "#is_complete_check", function () {
                var isCompleted;
                var isChecked = $(this).is(':checked');
                var task_id = $(this).data("task_id");
                // console.log(isChecked);
                // console.log(task_id);
                if (isChecked == true) {
                    isCompleted = 1;
                    $('#is_complete_check').attr("data-checked", 1);
                    // console.log("Here for input:checked ");
                    self.initUpdateTask(task_id, isCompleted);
                } else {
                    isCompleted = 0;
                    $('#is_complete_check').attr('data-checked', 0);
                    self.initUpdateTask(task_id, isCompleted);
                    // console.log("Here if not input:check");
                }
            });
            // deleteSubTaskRow permanantly
            $(document).on('click', '.btnRowRemove', function (e) {
                e.preventDefault(e);
                // console.log('Delete clicked');
                var task_id = $(this).data('task_id');
                // console.log(task_id);
                // console.log(this);
                self.initDeleteTask(task_id, this);
            });
            // save-comment-for-individual-card btn working
            $(document).on('click', '#post-comment', function (e) {
                e.preventDefault();
                var txtComment = $(document).find('textarea#comments-input').val();
                var card_id = $(document).find('#card-detail').attr('data-card_id');
                // console.log(card_id);
                if (txtComment.length > 0) {
                    self.initSaveComment(txtComment, card_id);
                }
            });
            // get-card-detail-for-individual-card working          --->        Open Modal
            $(document).on('click', '.card-list-des', function (e) {
                e.preventDefault();
                var card_id = $(this).data('card_id');

                $('.modal-list-description').attr('data-card_id', card_id);
                $('.modal-list-description').find('.card-delete').attr('data-card_id', card_id);
                $('.modal-list-description').modal('show');

                self.initGetCardDetail(card_id);
            });
            // save-changes-modal-btn click working
            $(document).on('click', '.save-click-modal', function (e) {
                e.preventDefault();
                var card_id = $(document).find('#card-detail').attr('data-card_id');
                // console.log("save-changes btn working properly");
                // console.log(card_id);
                self.initUpdateCardData(card_id);
            });
        },

        // saveList
        initSaveList: function (data, currentBtnClicked) {
            // checks for the empty field
            var error = validateSaveList();

            if (!error) {
                saveList(data, currentBtnClicked);
            }
        },
        // updateListName
        initUpdateListName: function (list_id, board_id, txtListName, currentBtnClicked) {
            var error = validateUpdateSaveList(currentBtnClicked);
            if (!error) {
                updateListName(list_id, board_id, txtListName, currentBtnClicked);
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
        // updated task if it is completed or not
        initUpdateTask: function (task_id, isCompleted) {
            updateTask(task_id, isCompleted);
        },
        // selected-card-delete 
        initDeleteCard: function (card_id, cardRmv) {
            // console.log(card_id);
            deleteCard(card_id, cardRmv);
        },
        // selected-card-delete 
        initDeleteList: function (list_id, currentBtnClicked) {
            // console.log(list_id);
            deleteList(list_id, currentBtnClicked);
        },
        // selected-card-delete 
        initDeleteTask: function (task_id, currentBtnClicked) {
            // console.log(task_id);
            deleteTask(task_id, currentBtnClicked);
        },
        // user-create-activity 
        initCreateActivity: function (activity_in_id, changed_in, description) {
            createActivity(activity_in_id, changed_in, description);
        },

    }
};
var indexJs = new IndexJs();
indexJs.init();
// dragable cards working
function cardDragable() {
    $(".sort-cards-list").each(function (index, el) {
        $(el).sortable({
            scroll: true,
            connectWith: ".sort-cards-list",
            placeholder: "dashed-placeholder",
            revert: 400,
            receive: function (event, ui) {
                var targetList = event.target;
                var targetCard = ui.item[0];
                var list_id = $(targetList).data('list_id');
                var card_id = $(targetCard).data('card_id');
                // console.log("Dragable working....")
                // console.log(list_id, card_id)
                $.ajax({
                    url: base_url + 'index.php/userhome/cardDragable',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        list_id: list_id,
                        card_id: card_id
                    },
                    success: function (data) {
                        // console.log(data);
                    },
                    error: function (data) {
                        // console.log(data);
                        alert("Error, Server or Request Issue, Try again");
                    }
                });
            },
        }).disableSelection();
    });
}
$(document).ready(function () {
    cardDragable();
});
