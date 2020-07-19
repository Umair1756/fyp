var IntroPage = function () {

    return {

        init: function () {
            this.bindUI();
        },

        bindUI: function () {
            var self = this;

            $('.btnLogIn').on('click', function (e) {
                e.preventDefault();
                window.location = base_url + 'index.php/welcome/login'
            });

            $('.btnSignUp').on('click', function (e) {
                e.preventDefault();
                window.location = base_url + 'index.php/welcome/signup'
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
            // $(".successBox").fadeOut(4000);
            $("#click-add-list-btn").on("click", function (e) {
                e.preventDefault(e);
                $("#add-list").fadeIn();
                $("#input-listname").fadeIn();
                $("#add-list-cancel").fadeIn();
                // alert("Clciked.....");
                $("#add-list").removeClass("d-none");
                $("#input-listname").removeClass("d-none");
                $("#add-list-cancel").removeClass("d-none");
                $("#click-add-list-btn").addClass("d-none");
                $("#click-add-list-btn").fadeOut();
                $("#input-listname").focus();
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

        initSignIn: function () {

            // var errors = validateSignIn();

            // if (errors.length == 0) {

            var uname = $.trim($('#txtUsername').val());
            var pass = $.trim($('#txtPassowrd').val());
            var mob_code = $.trim($('#txtMobCode').val());
            var fn_dropdown = $.trim($('#fn_dropdown').val());
            var fn_name = $.trim($('#fn_dropdown').find('option:selected').text());
            var fn_sdate = $.trim($('#fn_dropdown').find('option:selected').data('sdate'));
            var fn_edate = $.trim($('#fn_dropdown').find('option:selected').data('edate'));
            // var fn_name = $.trim($('#fn_dropdown').find('option:selected').text());
            fetch(uname, pass, mob_code, fn_dropdown, fn_name, fn_sdate, fn_edate);
            // } else {
            //     alert('Enter valid Username or Password or Financial Year');
            //     var spans = "";
            //     $.each(errors, function (index, elem) {
            //         spans += "<span class='login-error'>" + elem + "</span>";
            //     });
            //     // show the errors on the screen
            //     $(spans).appendTo('.errors_section');
            // }
        },

    }

};
var introPage = new IntroPage();
introPage.init();
// function myFunction() {
//     alert("Called")
//     var x = document.getElementById("eyeView");
//     if (x.type === "password") {
//         x.type = "text";
//     } else {
//         x.type = "password";
//     }
// }
// myFunction();