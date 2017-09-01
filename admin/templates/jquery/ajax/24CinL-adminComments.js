/* 24CinL Admin panel - Comments functions */


// Ready function
$(function(){
    $("#table_basic_container").css({"display":"none"});
    $("#delete_all, #back_table").hide();
});


// Show all the comments related to one article
function show_comments(){
    if(show_check()){
        var url = "controllers/script/comments-script.php";
        var article_id;

        $("tr[name=data_row]").each(function() {
            if($(this).hasClass("selected")){
                article_id = $(this).children("td[name=id]").children("input").val();
            }
        });

        $.ajax(url, {
            method : "POST",
            data : {
                "operation" : 1,        // Show comments
                "article_id" : article_id
            },
            dataType : "html",
            success: function(response){
                $("#table_basic_container").fadeIn(500);
                $("#no_comments").removeClass("active-elem");
                $("#no_comments").addClass("hide-elem");
                $(response).appendTo("#comments_table").show().fadeIn(700);
                $("#membership_article").val(article_id);

                if(!count_data_basic_row()){
                    $("#delete_all").hide();
                    $("#back_table").show();
                }else{
                    $("#delete_all, #back_table").show();
                }
            },
            error: function(xhr) {
                alert("ERROR: " + xhr.responseText + xhr.status);
            }
        });
    }
}


// Check if we are already viewing comments
function show_check(){
    var article_set = $("#membership_article").val();
    if(article_set > 0) return false;
    return true;
}


// Rows counter
function count_data_basic_row(){
    var count = 0;
    $("td[name=data_basic_row]").each(function() {
        count++;
    });
    return count;
}


// Remove comments table
function remove_table(){
    $("#membership_article").val(0);
    $("#table_basic_container").fadeOut(500, function() {
        $("#comments_table").children().remove();
        $("#no_comments").removeClass("hide-elem");
        $("#no_comments").addClass("active-elem");
        $("#delete_all, #back_table").hide();

        $("tr[name=data_row]").each(function() {
            if($(this).hasClass("selected")){
                $(this).removeClass("selected");
                $(this).children("td[name=table_td-checkbox]").children("div").removeClass("checked");
                $(this).children("td[name=table_td-checkbox]").children("div").children("input[name=table_records]").removeAttr("checked");
            }
        });
    });

    $("tr[name=data_row]").each(function () {
        var index = $(this).children("td").children("div").children("input[name=row_index]").val();
        dataRow[index]["selected"] = 0;
    });
    totSelected = 0;
    count_selected();
}


// Delete the selected row
function delete_row(elem){
    var url = "controllers/script/comments-script.php";
    var article_id = $("#membership_article").val();

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : 2,        // Delete comment
            "comment_id" : elem,
            "article_id" : article_id
        },
        dataType : "html",
        success: function(response){
            $("#table_basic").replaceWith(response);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}

// Delete the selected row
function delete_all(){
    var url = "controllers/script/comments-script.php";
    var article_id = $("#membership_article").val();

    if(confirm("Do you want to delete all comments?")){

        $.ajax(url, {
            method : "POST",
            data : {
                "operation" : 3,        // Delete all comments
                "article_id" : article_id
            },
            dataType : "html",
            success: function(response){
                $("#table_basic").replaceWith(response);
            },
            error: function(xhr) {
                alert("ERROR: " + xhr.responseText + xhr.status);
            }
        });
    }
}
