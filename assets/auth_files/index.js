var IndexJs = function () {
    var saveTitle = function () {
        $.ajax({
            url: base_url + 'index.php/Userhome/saveTitle',
            type: 'POST',
            data: { 'txtTitle': $("#txtTitleName").val() },
            dataType: 'JSON',
        });
    }
    var validateTitle = function () {
        var flag = false;
        var txtTitleName = $("#txtTitleName").val();
        if (txtTitleName == "") {
            $("#txtTitleName").addClass("border-danger");
            return flag = true;
        }
        else {
            $("#txtTitleName").removeClass("border-danger");
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

            // $('#createBtn').on('click', function (e) {
            //     e.preventDefault();
            //     self.initSave();
            // });

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
            $("#click-add-list-btn").on("click", function (e) {
                e.preventDefault(e);

                $("#add-list").fadeIn(500);
                $("#input-listname").fadeIn(500);
                $("#add-list-cancel").fadeIn(500);
                // alert("Clciked.....");

                $("#add-list").removeClass("d-none");
                $("#input-listname").removeClass("d-none");
                $("#add-list-cancel").removeClass("d-none");
                $("#click-add-list-btn").addClass("d-none");
                $("#click-add-list-btn").fadeOut();
                $("#input-listname").focus();
            });
            $("#add-list-cancel").on("click", function (e) {
                e.preventDefault(e);

                $("#add-list").addClass("d-none");
                $("#input-listname").addClass("d-none");
                $("#add-list-cancel").addClass("d-none");
                $("#click-add-list-btn").removeClass("d-none");
                $("#click-add-list-btn").fadeIn();
            });

            $("#add-list").on("click",function () {
                var divBox = document.createElement("Div");
                divBox.id = "divBox";
            });
            // $(".btnSignUp").on("click", function (e) {
            //     e.preventDefault()
            //     var signUpInput = $("#signUpInput").val();
            //     window.location.href = base_url + "index.php/welcome/signup/" + signUpInput;
            //     // $(".email_input").val(signUpInput);
            //     console.log(signUpInput);
            // });
            // $("#no-trans").stop().fadeOut();
            // $("#no-trans").fadeIn();
            // $(".hoverAdj").hover(
            //     function() {
            //         $(this).find(".successBox").stop().fadeOut();
            //         $(this).find(".successBox").fadeIn();
            //     },
            //     function() {
            //         $(this).find(".successBox").fadeIn();
            //         $(this).find(".successBox").stop().fadeOut();
            //     }
            // )
            // $(".hoverAdj").hover(
            //     function() {
            //         $(this).find(".dangerBox").stop().fadeOut();
            //         $(this).find(".dangerBox").fadeIn();
            //     },
            //     function() {
            //         $(this).find(".dangerBox").fadeIn();
            //         $(this).find(".dangerBox").stop().fadeOut();
            //     }
            // )
        },

        initSave: function () {

            var error = validateTitle();        // checks for the empty field

            if (!error) {
                saveTitle();
            }
        },

    }

};
var indexJs = new IndexJs();
indexJs.init();