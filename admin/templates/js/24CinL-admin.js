/* 24CinL Blog - JavaScript for Admins */


var url = window.location.href.toString().split("?");
var url_temp = url[1];
var dropdown_temp = 0;

// Ready function
$(function(){
    //Blog-Setting - Background
    $("#background_container").hover(function() {
        $(this).css({"opacity" : "0.6", "cursor":"pointer"});
        $('<div class="overlay-img"><i class="overlay-img-elem fa fa-camera"></i></div>').appendTo('#background_container');
    }, function(){
        $(this).css({"opacity" : "1"});
        $(".overlay-img").remove();
    });

    // Set background preview
    $("#background_container").click(function(){
        $("#bg_file").click();
    });

    // Take an image file
    $("#background_category , #edit_background_category").click(function(){
        $("#bg_file").click();
    });

    // Add or remove empty tag fields
    $("#tags_number").change(function() {
        var number = parseInt($("#tags_number").val()) + 1;
        var index = 2;
        $("div[name=tagLabel]").each(function(){
            $(this).remove();
        });
        $("div[name=tagDescription]").each(function(){
            $(this).remove();
        });
        $("div[name=tagDivider]").each(function(){
            $(this).remove();
        });

        while(index < number){
            var tag_fields = '<div name="tagDivider" class="col-md-12"><hr></div>'
                            +'<div name="tagLabel" class="col-md-6">'
                                +'<div class="panel-body">'
                                    +'<div class="x_title">'
                                        +'<h4>Label</h4>'
                                    +'</div>'
                                    +'<input id="set_tag_label" class="set-article-title" name="setTagLabel_'+index+'" maxlength="24" required="Mandatory field"></input>'
                                +'</div>'
                            +'</div>'
                            +'<div name="tagDescription" class="col-md-6">'
                                +'<div class="panel-body">'
                                    +'<div class="x_title">'
                                        +'<h4>Brief-Description</h4>'
                                    +'</div>'
                                    +'<input id="set_tag_description" class="set-article-subtitle" name="setTagDescription_'+index+'" maxlength="255" required="Mandatory field"></input>'
                                +'</div>'
                            +'</div>';
            $("#tag_box").append(tag_fields);
            index++;
        }
        $("input[name=tagsNumber]").val(parseInt($("#tags_number").val()));
    });


    // Change avatar
    $("#upload_avatar").click(function(){
        $("#avatar_file").click();
    });

    // Edit profile actives the input
    $("#edit_profile").click(function(){
        var link_count = 0;

        $("#username, #country, #employment, #email").removeClass("user-profile-field-read");
        $("#username, #country, #employment, #email").removeAttr("readonly");
        $("#username, #country, #employment, #email").addClass("user-profile-field-write");
        $("li[name=link]").each(function(){
            $(this).children("a").remove();
            $(this).children("input").attr("type", "text");
            link_count++;
        });
        if(link_count < 4){
            var other_link;
            while(link_count < 4){
                switch (link_count) {
                    case 0:  other_link = '<li class="m-top-xs" name="link">'+
                        '<i class="fa fa-github user-profile-icon"></i>&nbsp'+
                        '<input id="link_'+link_count+'" name="setLink_'+link_count+'" class="user-profile-field-write" value="" type="text"/>'+
                        '</li>';
                        break;
                    case 1: other_link = '<li class="m-top-xs" name="link">'+
                        '<i class="fa fa-dropbox user-profile-icon"></i>&nbsp'+
                        '<input id="link_'+link_count+'" name="setLink_'+link_count+'" class="user-profile-field-write" value="" type="text"/>'+
                        '</li>';
                        break;
                    case 2: other_link = '<li class="m-top-xs" name="link">'+
                        '<i class="fa fa-facebook user-profile-icon"></i>&nbsp'+
                        '<input id="link_'+link_count+'" name="setLink_'+link_count+'" class="user-profile-field-write" value="" type="text"/>'+
                        '</li>';
                        break;
                    case 3: other_link = '<li class="m-top-xs" name="link">'+
                        '<i class="fa fa-linkedin user-profile-icon"></i>&nbsp'+
                        '<input id="link_'+link_count+'" name="setLink_'+link_count+'" class="user-profile-field-write" value="" type="text"/>'+
                        '</li>';
                        break;
                    default: break;
                }
                $("#info_list").append(other_link);
                link_count++;
            }
        }
        $("#description_0").css({"display":"none"});
        $("#description_1").css({"display":"block"});
        $("#send_user_info").attr("disabled", false);
    });

    // Active article's dropdown of sidebar
    if(url_temp == "section=manage"){
        $("#article_li").addClass("active");
        $("#liA1").addClass("current-page");
        $("#liA1").parent("ul").css({"display":"block"});
    }
    if(url_temp == "section=draft"){
        if(url_temp.split('&')[0] == "section=draft"){
            $("#article_li").addClass("active");
            $("#liA2").addClass("current-page");
            $("#liA2").parent("ul").css({"display":"block"});
        }else{
            $("#article_li").addClass("active");
            $("#liA2").addClass("current-page");
            $("#liA2").parent("ul").css({"display":"block"});
        }
    }

    // Change password
    $("#change_pwd-link").click(function() {
        if(dropdown_temp){
            $("#change_pwd-container").slideUp(600, function () {
                $("#pwd_cur_value").hide();
                $("#pwd_new_value").hide();
                $("#pwd_submit").hide();
                $(this).hide();
            });
            dropdown_temp = 0;
        }else{
            $("#change_pwd-container").hide();
            $("#pwd_cur_value").show();
            $("#pwd_new_value").show();
            $("#pwd_submit").show();
            $("#change_pwd-container").slideDown(600, function () {
                $(this).show();
            });
            dropdown_temp = 1;
        }
    });
});


// Check the AddPage form fields
function add_blogPage(e){
    var background = $("#bg_file").prop("src");
    var title = $("#set_title").val();
    var subtitle = $("#set_subtitle").val();
    var page = $("#set_position").val();

    if(title == "" || subtitle == "" || page == "" || background == "../img/Blog/background/admin-bg/blog-default-bg.jpg"){
        alert("All fields are mandatory!");
        e.preventDefault();
        return false;
    }
}


// Check the addCategory form fields
function add_newCategory(e){
    var background = $("#set_category_bg").val();
    var name = $("#set_category_name").val();
    var description = $("#set_category_description").val();

    if(name == "" || description == "" || background == ""){
        alert("All fields are mandatory!");
        e.preventDefault();
        return false;
    }
}

// Change admin password
function change_password(){
    var url = "controllers/script/other-script.php";
    var old_pwd = $("#pwd_cur_value").val();
    var new_pwd = $("#pwd_new_value").val();

    $.ajax(url, {
        method : "POST",
        data : {
            "key" : "changePwd",
            "old_pwd" : old_pwd,
            "new_pwd" : new_pwd
        },
        dataType : "text",
        success: function(response){
            backup_counter--;
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}
