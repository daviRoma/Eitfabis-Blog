/* 24CinL Blog - JavaScript for Admins */


var url = window.location.href.toString().split("?");


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

        $("#country, #employment, #email").removeClass("user-profile-field-read");
        $("#country, #employment, #email").removeAttr("readonly");
        $("#country, #employment, #email").addClass("user-profile-field-write");
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
    if(url[1] == "section=manage"){
        $("#article_li").addClass("active");
        $("#liA1").addClass("current-page");
        $("#liA1").parent("ul").css({"display":"block"});
    }
    if(url[1] == "section=draft"){
        $("#article_li").addClass("active");
        $("#liA2").addClass("current-page");
        $("#liA2").parent("ul").css({"display":"block"});
    }
    if(url[1].split('&')[1].split('=')[0] == "id"){
        $("#article_li").addClass("active");
        $("#liA2").addClass("current-page");
        $("#liA2").parent("ul").css({"display":"block"});
    }
});
