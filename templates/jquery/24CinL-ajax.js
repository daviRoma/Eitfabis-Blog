/* 24CinL Blog - Ajax functions */


$(function(){
    $("#articles").fadeIn();

    var elements = $('#catEtag_container');

    // Real-Time Search
    $('#catEtag_search').keyup(function() {
        if($("#liveSearch_error").is(':visible'))
            $("#liveSearch_error").remove();

        var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$', reg = RegExp(val, 'i'), text;

        elements.children().show().filter(function() {
            text = $(this).text().replace(/\s+/g, ' ');
            return !reg.test(text);
        }).hide();

        if(!elements.children().is(':visible')){
            elements.prepend('<div id="liveSearch_error" class="col-lg-12"><span> "No element found"</span></div>');
        }
    });

});


/* ******************************* ARTICLES ******************************** */

// Go to articles list, obtained by category or tag.
function go_to_articles(elem, e){
    e.preventDefault();
    var check = window.location.href.toString().split("?")[1].split("=")[1];

    if(check == "category")
        articles_by_category(elem.title);

    if(check == "tag")
        articles_by_tag(elem.title);
}

// Paging articles - Button next
function go_next(e){
    e.preventDefault();
    var requested_page = parseInt($('#current_page').val()) + 1;
    var position = $('#page_url').text();
    var option_1 = $('#subPosition').val();
    var option_2 = $('#temp_option').val();

    var url = "controllers/script/articles-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "currentPage" : requested_page,
            "position" : position,
            "option_1" : option_1,
            "option_2" : option_2
        },
        dataType: "html",
        success: function(response) {
            $('html, body').animate({
                scrollTop: ($("#page_content").offset().top)-100
            }, 500, function(){
                    $("#articles").fadeOut(400, function(){
                        $("#articles").remove();
                        $("#page_content").append(response);
                        $("#articles").fadeIn();
                    });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?" + url_by_position(position, option_1, option_2) + "currentPage=" + requested_page);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Paging articles - Button back
function go_back(e){
    e.preventDefault();
    var requested_page = parseInt($('#current_page').val()) - 1;
    var position = $('#page_url').text();
    var option_1 = $('#subPosition').val();
    var option_2 = $('#temp_option').val();

    var url = "controllers/script/articles-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "currentPage" : requested_page,
            "position" : position,
            "option_1" : option_1,
            "option_2" : option_2
        },
        dataType: "html",
        success: function(response) {
            $('html, body').animate({
                scrollTop: ($("#page_content").offset().top)-100
            }, 500, function(){
                    $("#articles").fadeOut(400, function(){
                        $("#articles").remove();
                        $("#page_content").append(response);
                        $("#articles").fadeIn();
                    });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?" + url_by_position(position, option_1, option_2) + "currentPage=" + requested_page);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


/* ******************************** CATEGORY ****************************** */

// Show Categories
function show_categories(e){
    e.preventDefault();
    var requested_section = $('#temp_link_category').val();
    var url = "controllers/script/category&tag-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "section": requested_section
        },
        dataType: "html",
        success: function(response) {
            $('#category').css({ "background-color" : "#f4f4f4", "border-left" : "2px solid #454545" });
            $('#tag').css({ "background-color" : "#fff", "border-left" : "2px solid #dedede" });
            $('#catEtag_search').attr("placeholder", "Category");

            $('html, body').animate({
                scrollTop: ($("#page_content").offset().top)-115
            }, 500, function(){
                $('#catEtag_container').slideUp(700, function(){
                    $('#catEtag_container').children().remove();
                    $('#catEtag_container').append(response).delay(100);
                    $('#catEtag_container').slideDown(1000);
                });
            });

            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?section=" + requested_section);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Show articles by category
function articles_by_category(name){
    var url = "controllers/script/category-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "category" : name
        },
        dataType: "html",
        success: function(response) {
            $('html, body').animate({
                scrollTop: ($("#page_content").offset().top)-100
            }, 300, function(){
                    $("#page_content").slideUp(600, function() {
                        $("#page_content").empty();
                        $("#page_content").append(response);
                        $("#page_content").slideDown(600);
                    });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?section=category&name=" + name );
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


/* ********************************** TAGS ******************************** */

// Show Tags
function show_tags(e, r_page){
    e.preventDefault();
    var requested_section = $('#temp_link_tag').val();
    var url = "controllers/script/category&tag-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "section": requested_section,
            "currentPage" : r_page
        },
        dataType: "html",
        success: function(response) {
            $('#tag').css({ "background-color" : "#f4f4f4", "border-left" : "2px solid #454545" });
            $('#category').css({ "background-color" : "#fff", "border-left" : "2px solid #dedede" });
            $('#catEtag_search').attr("placeholder", "Tag");

            $('html, body').animate({
                scrollTop: ($("#page_content").offset().top)-115
            }, 500, function(){
                $('#catEtag_container').slideUp(700, function(){
                    $('#catEtag_container').children().remove();
                    $('#catEtag_container').append(response).delay(100);
                    $('#catEtag_container').slideDown(1000);
                });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            if(r_page == 1)
                window.history.pushState("", "24CinL | Blog", currentUrl + "?section=" + requested_section);
            else
                window.history.pushState("", "24CinL | Blog", currentUrl + "?section=" + requested_section + "&currentPage=" + r_page);

        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}

// Show previous tags
function back_tags(e){
    e.preventDefault();
    var requested_page = parseInt($('#current_page').val()) - 1;
    show_tags(e, requested_page);
}

// Show next tags
function next_tags(e){
    e.preventDefault();
    var requested_page = parseInt($('#current_page').val()) + 1;
    show_tags(e, requested_page);
}

// Show articles by tag
function articles_by_tag(name){
    var url = "controllers/script/tag-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "tag" : name
        },
        dataType: "html",
        success: function(response) {
            $('html, body').animate({
                scrollTop: ($("#page_content").offset().top)-100
            }, 300, function(){
                    $("#page_content").slideUp(600, function() {
                        $("#page_content").empty();
                        $("#page_content").append(response);
                        $("#page_content").slideDown(600);
                    });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?section=tag&name=" + name );
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


/* ******************************** SEARCH ******************************** */

// Search articles - Button search
function start_search(e){
    e.preventDefault();
    var method = "";
    var title = $('#s_title').val();
    var category = $('#s_category').val();
    var tag = $('#s_tag').val();

    if(title == "" && category == "" && tag == ""){
        search_error();
    }

    if(title != "")
        method += "title-";
    if(category != "")
        method += "category-";
    if(tag != "")
        method += "tag";
    else
        method = method.substring(0, method.length - 1);

    var url = "controllers/script/search-script.php";

    $.ajax(url, {
        method: "POST",
        data: {
            "method" : method,
            "title" : title,
            "category" : category,
            "tag" : tag
        },
        dataType: "html",
        success: function(response) {
            $('html, body').animate({
                scrollTop: ($("#page_content").offset().top)-100
            }, 400, function(){
                    $("#page_content").slideUp(500, function(){
                        $('#page_content').children().remove();
                        $('#page_content').append(response);
                        $('#search_body').css({"display":"none"});
                        $('#show_form').css({"display":"block"});
                        $('#temp').removeClass("fa fa-arrow-down");
                        $('#temp').addClass("fa fa-arrow-right");
                        $('#form_display_status').val('right');
                        $('#page_content').slideDown(500, function(){});
                    });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?method=" + method + "&title=" + title + "&category=" + category + "&tag=" + tag);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}

// All search-fields are empty - Search
function search_error(){
    var errorMessage = "Complete at least one field to start your search.";
    var url = "controllers/script/search-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "error" : true,
            "errorMessage" : errorMessage
        },
        dataType: "html",
        success: function(response) {
            $('html, body').animate({
                scrollTop: ($("#page_content").offset().top)-100
            }, 400, function(){
                    $("#page_content").slideUp(500, function(){
                        $('#page_content').children().remove();
                        $('#page_content').css({"display":"none"});
                        $('#page_content').append(response);
                        $('#search_body').css({"display":"none"});
                        $('#show_form').css({"display":"block"});
                        $('#form_display_status').val('right');
                        $('#temp').removeClass("fa fa-arrow-down");
                        $('#temp').addClass("fa fa-arrow-right");
                        $('#page_content').slideDown(500, function(){});
                    });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?error=true&" + errorMessage);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
    exit();
}


// Enable and disable dropdown - Search
function display_search_form(e){
    e.preventDefault();
    if($('#form_display_status').val() == "down"){
        $('#form_display_status').val('right');
        $('#search_body').slideUp(500, function(){
            $('#temp').removeClass("fa fa-arrow-down");
            $('#temp').addClass("fa fa-arrow-right");
            $('#search_body').css({"display":"none"});
        });
    }else{
        $('#temp').addClass("fa fa-arrow-down");
        $('#form_display_status').val('down');
        $('#search_body').slideDown(500, function(){
            $('#search_body').css({"display":"block"});
        });
    }
}


/* ******************************** GALLERY ******************************** */

// Shows to the next list of pictures
function next_pictures(e){
    e.preventDefault();
    var url = "controllers/script/gallery-script.php";
    var requested_page = parseInt($('#current_page').val()) + 1;

    $.ajax(url, {
        method: "GET",
        data: {
            "currentPage" : requested_page
        },
        dataType: "html",
        success: function(response){
            $('html, body').animate({
                scrollLeft: ($("#page_content").offset().top)-115
            }, 400, function(){
                $('#gallery_container').fadeOut(500, function(){
                    $('#gallery_container').replaceWith(response);
                    $('#gallery_container').fadeIn(700);
                });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?currentPage=" + requested_page);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Shows the back list of pictures
function back_pictures(e){
    e.preventDefault();
    var url = "controllers/script/gallery-script.php";
    var requested_page = parseInt($('#current_page').val()) - 1;

    $.ajax(url, {
        method: "GET",
        data: {
            "currentPage" : requested_page
        },
        dataType: "html",
        success: function(response){
            $('html, body').animate({
                scrollLeft: ($("#page_content").offset().top)-115
            }, 400, function(){
                $('#gallery_container').fadeOut(500, function(){
                    $('#gallery_container').replaceWith(response);
                    $('#gallery_container').fadeIn(700);
                });
            });
            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?currentPage=" + requested_page);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Open modal window
function showModal(elem_key, e){
    e.preventDefault();
    var url = "controllers/script/showPicture-script.php";

    var current_key = parseInt(elem_key);

    $.ajax(url, {
        method: "GET",
        data: {
            "key" : current_key
        },
        dataType: "html",
        success: function(response) {
            $('<div class="overlay"></div>').prependTo('body').fadeIn(600);
            $(response).appendTo('.overlay').fadeIn(700).show();
            exitModalWindow();
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Go to next picture in modal window
function nextModalPicture(e){
    e.preventDefault();
    var url = "controllers/script/showPicture-script.php";

    var requested_key = parseInt($('#temp_key').val()) + 1;

    $.ajax(url, {
        method: "GET",
        data: {
            "key" : requested_key
        },
        dataType: "html",
        success: function(response) {
            $('#image_modal').fadeOut(400, function (){
                $('#image_modal').replaceWith(response);
                $('#image_modal').fadeIn(500);
            });
            exitModalWindow();
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Go to next picture in modal window
function backModalPicture(e){
    e.preventDefault();
    var url = "controllers/script/showPicture-script.php";

    var requested_key = parseInt($('#temp_key').val()) - 1;

    $.ajax(url, {
        method: "GET",
        data: {
            "key" : requested_key
        },
        dataType: "html",
        success: function(response) {
            $('#image_modal').fadeOut(400, function (){
                $('#image_modal').replaceWith(response);
                $('#image_modal').fadeIn(500);
            });
            exitModalWindow();
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Exit from modal window of pictures
function exitModalWindow(){
    $('.overlay').click(function(event){
        var target = $(event.target);
        if(target.is('img') || target.is('#next_picture') || target.is('#previous_picture')){
            return false;
        }
        $('#image_modal').fadeOut(200, function(){
            $('.overlay').fadeOut(300, function(){
                $('.overlay').remove();
            });
        });
    });
}


/* ******************************** UTILITY ******************************** */

// Get a piece of URL by current position
function url_by_position(position, option_1, option_2){
    var url = window.location.href.toString().split("?")[0];
    switch (position) {
        case "Home":
            return "";
            break;

        case "Category & Tag":
            return option_1 + "&";
            break;

        case "Search":
            var options = option_2.split("||");
            var section = "method=" + option_1 + "&" + "title=" +  options[0] + "&category=" + options[1] + "&tag=" + options[2] + "&";
            return section;
            break;

        default: break;
    }
}


// Bottom navbar using for paging pictures and tags
function backPage(e){
    var position = $('#page_url').text();

    if(position == 'Category & Tag')
        back_tags(e);
    if(position == 'Gallery')
        back_pictures(e);
}

function nextPage(e){
    var position = $('#page_url').text();

    if(position == 'Category & Tag')
        next_tags(e);
    if(position == 'Gallery')
        next_pictures(e);
}


// Turn back to the previous section (category or tag)
function turn_back_to_section(elem, e){
    e.preventDefault();
    var section = elem.title;
    var url = "controllers/script/backToSection-script.php";

    $.ajax(url, {
        method: "GET",
        data: {
            "section" : section
        },
        dataType: "html",
        success: function(response) {
            $('html, body').animate(300, function(){
                    $("#page_content").slideUp(600, function() {
                        $("#page_content").empty();
                        $("#page_content").append(response);
                        section_style(section);
                        $("#page_content").slideDown(600);
                    });
            });

            var currentUrl = window.location.href.toString().split("?")[0];
            window.history.pushState("", "24CinL | Blog", currentUrl + "?section=" + section);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Set style of Category&Tag navbar
function section_style(section){
    if(section == "category"){
        $('#category').css({ "background-color" : "#f4f4f4", "border-left" : "2px solid #454545" });
        $('#tag').css({ "background-color" : "#fff", "border-left" : "2px solid #dedede" });
        $('#catEtag_search').attr("placeholder", "Category");
    }
    if(section == "tag"){
        $('#tag').css({ "background-color" : "#f4f4f4", "border-left" : "2px solid #454545" });
        $('#category').css({ "background-color" : "#fff", "border-left" : "2px solid #dedede" });
        $('#catEtag_search').attr("placeholder", "Tag");
    }
}
