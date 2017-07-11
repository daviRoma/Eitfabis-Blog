/* 24CinL Blog - JavaScript for Admin panel */

/* ******************************** LOGIN ********************************* */

//Check the login form fields
function check_login(){

    var check = false;

    if(document.login_form.username.value == "" || document.login_form.password.value == ""){
        check = true;
        $(".login-error-message").css({
            "display" : "block" //display setting
        });
        $("#error").text("*Warning!");
        $("#type-error").text("Empty fields.");
    }else{
        if(document.login_form.username.value.length < 4 || document.login_form.password.value.length < 4){
            check = true;
            $(".login-error-message").css({
                "display" : "block" //display setting
            });
            $("#error").text("*Warning!");
            $("#type-error").text("Invalid username or password, too short.");
        }

        if(document.login_form.username.value.length > 24 || document.login_form.password.value.length > 24){
            check = true;
            $(".login-error-message").css({
                "display" : "block" //display setting
            });
            $("#error").text("*Warning!");
            $("#type-error").text("Invalid username or password, too long.");
        }
    }

    if(check)
        return false;
    else
        return true;
}

//Check user field on blur
function check_user_field(){
    if (document.login_form.username.value == "" || document.login_form.username.value.length < 4)
        $("#username").css({
            "border-color" : "#cc0000", //color setting
            "display" : "block" //display setting
        });
    else
        $("#username").css({
            "border-color" : "#00b359", //color seting
            "display" : "block" //display setting
        });
}

//Check password field on blur
function check_password_field(){
    if (document.login_form.password.value == "" || document.login_form.password.value.length < 4)
        $("#password").css({
            "border-color" : "#cc0000", //color setting
            "display" : "block" //display setting
        });
    else
        $("#password").css({
            "border-color" : "#00b359", //color seting
            "display" : "block" //display setting
        });
}
