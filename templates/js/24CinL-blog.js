/* 24CinL Blog - JavaScript for visitors */


// Ready function
$(function(){

    category_tag_buttons();

    $('#subscribe_validate').submit(function() {
        var sEmail = $('#email').val();

        // Checking empty fields
        if ($.trim(sEmail).length == 0 ) {
            alert('This fields cannot be empty');
            return false;
        }

        if (!validateEmail(sEmail)) {
            alert('Invalid Email Address');
            return false;
        }
    });

});

// Validates email address through a regular expression.
function validateEmail(sEmail) {
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}


// Set the Category-Tag navbar buttons on Category or on Tag
function category_tag_buttons(){
    if(window.location.href.toString().split("?")[1] == "section=category"){
        $('#category').css({ "background-color" : "#f4f4f4", "border-left" : "2px solid #454545" });
        $('#tag').css({ "background-color" : "#fff", "border-left" : "2px solid #dedede" });
        $('#catEtag_search').attr("placeholder", "Category");
    }
    if(window.location.href.toString().split("?")[1] == "section=tag"){
        $('#tag').css({ "background-color" : "#f4f4f4", "border-left" : "2px solid #454545" });
        $('#category').css({ "background-color" : "#fff", "border-left" : "2px solid #dedede" });
        $('#catEtag_search').attr("placeholder", "Tag");
    }
}
