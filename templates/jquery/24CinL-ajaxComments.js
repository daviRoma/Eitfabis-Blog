/* 24CinL Blog - Comment functions */

var article_id_temp = parseInt($("#article_id").val());

var comment_form = '<div id="comment_form" class="write-comment-container">'+
                        '<div id="" class="comment-header-write">'+
                            '<span> Write your comment &nbsp  </span>'+
                            '<i class="fa fa-pencil"></i>'+
                        '</div>'+
                        '<div class="row control-group comment-field-group">'+
                            '<div class="form-group col-xs-11 floating-label-form-group controls">'+
                                '<label>Name</label>'+
                                '<input id="v_name" type="text" name="name" class="form-control form-distance" placeholder="Name"  maxlength="32" autocomplete="off" required style="font-size:18px;"/>'+
                                '<p class="help-block text-danger"></p>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row control-group comment-field-group">'+
                            '<div class="form-group col-xs-11 floating-label-form-group controls">'+
                                '<label>Comment</label>'+
                                '<textarea id="v_comment" rows="3" name="comment" class="form-control form-distance" placeholder="Comment" maxlength="255" autocomplete="off" required style="font-size:18px;"></textarea>'+
                                '<p class="help-block text-danger"></p>'+
                            '</div>'+
                        '</div>'+
                        '</br>'+
                        '<div class="row">'+
                            '<div class="form-group col-xs-11">'+
                                '<button id="v_public" type="submit" name="public" class="btn btn-default pull-right" onClick="add_comment(event)">Public</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>';


// Show comments with modal window
function show_comments(e){
    e.preventDefault();
    var url = "controllers/script/showComments-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "article_id" : article_id_temp
        },
        dataType: "html",
        success: function(response){
            $('<div class="overlay"></div>').prependTo('body').fadeIn(200, function() {
                $('.overlay').append(response).hide().fadeIn(600);
            });

            exitModalComments();
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Show more comments
function show_more_comments(e){
    e.preventDefault();

    var url = "controllers/script/comments-script.php";
    var requested_page = parseInt($("#comments_current_page").val()) + 1;
    var page_limit = $("#comments_page_limit").val();

    $.ajax(url, {
        method: "POST",
        data: {
            "add" : 0,
            "requestedPage" : requested_page,
            "article" : article_id_temp
        },
        dataType: "html",
        success: function(response) {
            $("div[name=scroll_comments]").remove();
            if(requested_page == page_limit){
                $("#more_comments").removeClass("active-elem");
                $("#more_comments").addClass("hide-elem");
            }
            $(response).appendTo("#comments_list").hide().slideDown(800);
            $("#comments_current_page").val(requested_page);
        },
        error: function(xhr){
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Insert new comment
function add_comment(e){
    e.preventDefault();

    var url = "controllers/script/comments-script.php";
    var name = $("#v_name").val();
    var content = $("#v_comment").val();

    if(check_comment_field(name, content)){
        $.ajax(url, {
            method: "POST",
            data: {
                "add" : 1,
                "name" : name,
                "content" : content,
                "article" : article_id_temp
            },
            dataType: "html",
            success: function(response) {
                if(response != 'ERROR'){
                    var num_comments = parseInt($("#number_of_comments").val());

                    if(num_comments > 0){
                        $(".modal-comment").animate({scrollTop: 0}, 600, function(){
                            $("#comments_list").children().remove();
                            $("#comments_list").append(response).hide().fadeIn(800);
                            $("#comment_form").replaceWith(comment_form);
                        });
                        if($("#comments_page_limit").val() > 1){
                            $("#more_comments").removeClass("hide-elem");
                            $("#more_comments").addClass("active-elem");
                        }
                        $("#count_comments").text(num_comments + 1);
                        $("#comments_current_page").val(1);
                        $("#number_of_comments").val(num_comments + 1);
                    }else{
                        $("#no_comments").remove();
                        $("#c_container").append('<div id="comments_list"> </div>');
                        $("#comments_list").append(response).hide().fadeIn(800);
                        $("#comment_form").replaceWith(comment_form);
                        $("#count_comments").text(num_comments + 1);
                        $("#comments_current_page").val(1);
                        $("#number_of_comments").val(num_comments + 1);
                    }
                }else{
                    alert(response + ": comment inserting, try again");
                    $('#modal_comment').fadeOut(200, function(){
                        $('.overlay').fadeOut(300, function(){
                            $('.overlay').remove();
                        });
                    });
                }
            },
            error: function(xhr) {
                alert("ERROR: " + xhr.responseText + xhr.status);
            }
        });
    }
}


// Check the correctness of the input comment fields
function check_comment_field(c_name, c_content){
    if(c_name == "" || c_content == ""){
        alert("The fields cannot be empty!");
        return false;
    }
    if(c_name.lenght > 32){
        alert("Name must be at most 32 characters lenght");
        return false;
    }
    if(c_content.lenght > 500){
        alert("The text of the comment must be at most 500 characters lenght");
        return false;
    }
    return true;
}


// Exit from modal window of comments
function exitModalComments(){
    $('.overlay').click(function(event){
        var target = $(event.target);
        if(target.is('.overlay')){
            $('#modal_comment').fadeOut(200, function(){
                $('.overlay').fadeOut(300, function(){
                    $('.overlay').remove();
                });
            });
        }else{
            return false;
        }
    });
}
