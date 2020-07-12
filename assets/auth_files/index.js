var IntroPage = function () {
    var fetch = function (uname, pass, mob_code, fn_dropdown, fn_name, fn_sdate, fn_edate) {
        // alert(uname);
        $.ajax({
            url: base_url + 'index.php/welcome/login',
            type: 'POST',
            data: { uname: uname, pass: pass, mob_code: mob_code, fn_dropdown: fn_dropdown, fn_name: fn_name, fn_sdate: fn_sdate, fn_edate: fn_edate },
            beforeSend: function () {
                // console.log(this.data);
            },
            dataType: 'JSON',
            success: function (data) {
                // alert(data)
                // console.log(data);
                if (data == 'Blocked') {
                    alert("User Has Been Blocked. Please Contact Administrator");
                    var span = "<span class='login-error'>User Has Been Blocked.</span>";
                    $(span).appendTo('.errors_section');
                } else {
                    // alert(fn_name);
                    window.location = base_url + 'index.php/user/dashboard';
                }
            }, error: function (xhr, status, error) {
                window.location = base_url + 'index.php/user/dashboard';
                console.log(xhr.responseText);
            }
        });
    }
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
            $(".successBox").fadeOut(4000);
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