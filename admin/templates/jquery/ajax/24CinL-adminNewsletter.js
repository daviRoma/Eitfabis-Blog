/* 24CinL Blog - JavaScript for Admins */

$(function(){

    // Select type button
    $("#set_newsletter_type").click(function(){
        var selected = $(event.target);
        if(selected.hasClass("active")){
            selected.removeClass("active");
        }else{
            $("#set_newsletter_type").children().each(function(){
                if($(this).hasClass("active"))
                    $(this).removeClass("active");
            });
            selected.addClass("active");
        }
    });

    // Select frequency button
    $("#set_newsletter_frequency").click(function(){
        var selected = $(event.target);
        if(selected.hasClass("active")){
            selected.removeClass("active");
        }else{
            $("#set_newsletter_frequency").children().each(function(){
                if($(this).hasClass("active"))
                    $(this).removeClass("active");
            });
            selected.addClass("active");
        }
    });

    // Save newsletter
    $("#save_newsletter").click(function(){
        check_newsletter_fields();
    });

});

// Select type field
function newsletter_type(){
    var type = "";
    $("#set_newsletter_type").children().each(function(){
        if($(this).hasClass("active"))
            type = $(this).val();
    });
    return type;
}

// Select frequency field
function newsletter_frequency(){
    var frequency = "";
    $("#set_newsletter_frequency").children().each(function(){
        if($(this).hasClass("active"))
            frequency = $(this).val();
    });
    return frequency;
}

// Check the newsletter form fields
function check_newsletter_fields(){
    var title = $("#set_newsletter_title").val();
    var type = newsletter_type();
    var frequency = newsletter_frequency();
    var content = $("#editor-one").html();

    if(title == "" || type == "" || frequency == "" || content == ""){
        alert("All fields are mandatory!");
        return false;
    }else{
        add_newsletter(title, type, frequency, content);
    }
}

// Start script and add newsletter
function add_newsletter(title, type, frequency, content){
    var url = "controllers/script/newsletter-script.php";

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "insert",
            "title" : title,
            "type" : type,
            "frequency" : frequency,
            "content" : content
        },
        dataType : "text",
        success: function(response){
            alert(response);
            location.reload();
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}
