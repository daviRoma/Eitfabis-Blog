/* 24CinL Blog - JavaScript for Admins */


// Global variables
var img_counter = 0;
var backup_counter = 0;
var set_empty_file = '<input id="set_img_file_0" name="set_img_file_0" class="set-img-file" maxlength="48" value=""/>';
var img_path = "";


// Ready function
$(function(){
    // Disabled tag selects
    $("#tags_label_1 , #tags_label_2 , #tags_label_3").prop("disabled", "disabled");

    // If category will be selected, enable tag select 1
    $("#set_category").change(function(){
        var category = $(this).val();
        $("#tags_label_2 , #tags_label_3").prop("disabled", "disabled");
        if(category != "Other"){
            $("#tags_label_1").prop("disabled", false);
            get_tagsByCategory(category, 1);
        }else{
            $("#tags_label_1 , #tags_label_2 , #tags_label_3").prop("disabled", "disabled");
            $("#tags_label_1 , #tags_label_2 , #tags_label_3").val("default");
        }
    });

    // Enable tag select 2
    $("#tags_label_1").change(function(){
        var tag = $(this).val();
        if(tag != "default"){
            $("#tags_label_2").prop("disabled", false);
            get_tagsByCategory($("#set_category").val(), 2);
        }
    });
    // Enable tag select 3
    $("#tags_label_2").change(function(){
        var tag = $(this).val();
        if(tag != "default"){
            $("#tags_label_3").prop("disabled", false);
            get_tagsByCategory($("#set_category").val(), 3);
        }
    });

    // if draft is set
    if($("#set_category").val() != "Other"){
        $("#tags_label_1").prop("disabled", false);
        var category = $("#set_category").val();
        get_tagsByCategory(category, 1);
    }
    if($("#descr").html() != ""){
        $("#editor-one").append($("#descr").html());
    }
});


// Load an img file to upload
function upload_file(e){
    var maxWidth = 0;
    var maxHeight = 0;
    var img = $("#upload_img_file").val().toString().split("\\");
    img = img[img.length - 1].split(".");

    var ext = img[img.length - 1].toUpperCase();
    var imgFile = this.files;

    if(imgFile == undefined || imgFile.length == 0)
        return false;

    imgFile = this.files[0];
    var imgFileType = imgFile.type;
    var match = ["image/jpeg", "image/png", "image/jpg", "image/gif"];

    if(!((imgFileType == match[0]) || (imgFileType == match[1]) || (imgFileType == match[2]))){
        alert("Type file " + ext + " not supported");
        return false;
    }else{
        if(imgFile.size > 7168000){
            alert("File dimension exceeded");
            return false;
        }
        var reader = new FileReader();
        reader.onload = function(event) {
            var src = event.target.result;
            var newImg = $('<img id=img_fake_1 src="' + src + '" style="display:none;">');

            $("#img_fake_1").replaceWith(newImg);
            newImg.on('load', function() {
                maxWidth = 1920;
                maxHeight = 1080;
                if(newImg.outerWidth() > maxWidth || newImg.outerHeight() > maxHeight){
                    alert("Image dimension not allowed. It will be at most "+ maxWidth +" x "+ maxHeight +".");
                    return false;
                }else{
                    var file_name = img[0] + "." + img[1];
                    run_upload(imgFile, file_name);
                }
            });
        };
        reader.onerror = function(event) {
            alert("ERROR TYPE: " + event.target.error.code);
        };
        reader.readAsDataURL(imgFile);
    }
}


// Perform file upload with an ajax call
function run_upload(file, file_name){
    var url = "controllers/script/uploadImg-script.php";
    var file_data = file;
    var form_data = new FormData();
    form_data.append('upload_img_file', file_data);

    $.ajax(url, {
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        method: "POST",
        dataType: "html",  // what to expect back from the PHP script, if anything
        success: function(response){
            img_path = "../" + String(response);

            // File path linked to article
            var new_input = '<input id="set_img_file_'+img_counter+'" name="set_img_file_'+img_counter+'" class="set-img-file" maxlength="128" value=""/>';
            // Cross icon to remove upload
            var new_undo = '<a id="undo_img_file_'+img_counter+'" href="#" class="undo-img-file" onClick="remove_upload(event, '+img_counter+')"><i class="fa fa-close"></i></a>';
            // Preview file
            var new_path = '<input id="path_file_'+img_counter+'" name="path_file_'+img_counter+'" maxlength="24" value="" style="display:none;"/>';

            if(backup_counter == 0){
                $("#set_img_file_0").remove();
                $("#img_upload").append(new_input, new_undo, new_path);
                $("#set_img_file_" + img_counter).val(file_name);
                $("#path_file_" + img_counter).val(String(response));
            }else{
                $("#img_upload").append(new_input, new_undo, new_path);
                $("#set_img_file_" + img_counter).val(file_name);
                $("#path_file_" + img_counter).val(String(response));
            }
            // Set editor preview picture
            var img_tag = '<img id="tag_image_'+img_counter+'" name="tag_imane_'+img_counter+'" class="img-responsive article-img-preview" src="" style="text-align:center;">';
            var img_caption = '<span class="img-caption"> Brief description .. </span></br>';
            $("#editor-one").append(img_tag);
            $("#editor-one").append(img_caption);
            $("#tag_image_"+img_counter).attr("src", img_path);
            img_counter++;
            backup_counter++;
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
     });
}


// Remove all reference of upload file selected on the page and unlink the file from server
function remove_upload(e, i){
    e.preventDefault();
    var url = "controllers/script/article-script.php";
    var index = i;
    var path = $("#path_file_"+index).val();

    if(backup_counter == 1){
        $("#set_img_file_"+index).remove();
        $("#undo_img_file_"+index).remove();
        $("#path_file_"+index).remove();
        $("#tag_image_"+index).remove();
        $("#img_upload").append(set_empty_file);
    }else{
        $("#set_img_file_"+index).remove();
        $("#undo_img_file_"+index).remove();
        $("#path_file_"+index).remove();
        $("#tag_image_"+index).remove();
    }
    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "remove_file",
            "file_path" : path
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


// Fill the tag select option
function get_tagsByCategory(category, tag_list_number){
    var url = "controllers/script/article-script.php";
    var old_tag = new Array();

    old_tag = tag_list_check(tag_list_number);

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "tag_list",
            "old_tag" : old_tag,
            "category" : category
        },
        dataType : "html",
        success: function(response){
            switch(tag_list_number){
                case 1:
                    $("#tags_label_1").children().remove();
                    $("#tags_label_1").append('<option value="default"> &nbsp - TAG - </option>');
                    $("#tags_label_1").append(response);
                    $("#tags_label_2").children().remove();
                    $("#tags_label_2").append('<option value="default"> &nbsp - TAG - </option>');
                    $("#tags_label_2").append(response);
                    $("#tags_label_3").children().remove();
                    $("#tags_label_3").append('<option value="default"> &nbsp - TAG - </option>');
                    $("#tags_label_3").append(response);
                    break;
                case 2:
                    $("#tags_label_2").children().remove();
                    $("#tags_label_2").append('<option value="default"> &nbsp - TAG - </option>');
                    $("#tags_label_2").append(response);
                    $("#tags_label_3").children().remove();
                    $("#tags_label_3").append('<option value="default"> &nbsp - TAG - </option>');
                    $("#tags_label_3").append(response);
                    break;
                case 3:
                    $("#tags_label_3").children().remove();
                    $("#tags_label_3").append('<option value="default"> &nbsp - TAG - </option>');
                    $("#tags_label_3").append(response);
                    break;
                default: break;
            }
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Check if other tag has just been selected
function tag_list_check(number){
    var tags = new Array();
    switch(number){
        case 1: tags[0] = "none"; break;
        case 2: tags[0] = $("#tags_label_1").val(); break;
        case 3: tags[0] = $("#tags_label_1").val();
                tags[1] = $("#tags_label_2").val();
                break;
        default: break;
    }
    return tags;
}


// Check the correctness of the fields before publishing the article
function public_article(e){
    var content = $("#editor-one").html();
    var category = $("#set_category").val();
    var background = $("#bg_file").prop("src");

    if(background == "../img/Blog/background/admin-bg/article-default-bg.jpg"){
        alert("Please enter a cover image before proceeding.");
        return false;
    }
    if(content == ""){
        alert("Impossible to publish an article without content!");
        return false;
    }else{
        $("#article_content").val(content);
    }
    if(category == "Other"){
        alert("Article without category cannot be published.");
        return false;
    }
    if(backup_counter > 0)
        $("#file_number").val(img_counter);

    return true;
}


// Insert article as draft
function make_draft(){
    var url = "controllers/script/article-script.php";
    var title = $("#set_article_title").val();
    var subtitle = $("#set_article_subtitle").val();
    var content = $("#editor-one").html();
    var category = $("#set_category").val();
    var fileNumber = parseInt($("#fileNumber").val());
    var uploads = new Array();
    var tags = new Array();
    tags[0] = $("#tags_label_1").val();
    tags[1] = $("#tags_label_2").val();
    tags[2] = $("#tags_label_3").val();

    if(title == "" && subtitle == "" && content == "" && category == "Other" && tag[0] == "default"){
        alert("You cannot save an empty draft");
        return false;
    }

    var i = 0;
    while(fileNumber > 0){
        if($("#set_img_file_"+(fileNumber-1)).val() != "" )
            uploads[i] = $("#set_img_file_"+(fileNumber-1)).val();
        fileNumber--;
        i++;
    }

    if(confirm("Background will not be saved, continue?")){

        $.ajax(url, {
            method : "POST",
            data : {
                "operation" : "make_draft",
                "title" : title,
                "subtitle" : subtitle,
                "content" : content,
                "category" : category,
                "tags" : tags,
                "uploads" : uploads
            },
            dataType : "html",
            success: function(response){
                alert("Saved as draft");
                location.reload();
            },
            error: function(xhr) {
                alert("ERROR: " + xhr.responseText + xhr.status);
            }
        });
    }
}


// Set all fields to empty
function reset_all_fields(){
    $("#set_article_title").val("");
    $("#set_article_subtitle").val("");
    // reset background
    $("#bg_image").attr("src", "../img/Blog/background/admin-bg/article-default-bg.jpg");
    $("#bg_image").val("");
    $("#bg_image").file = "";
    $("#bg_fake").attr("src", "");
    // reset editor, category and tags
    $("#editor-one").children().remove();
    $("#set_category").prop("selectedIndex", 0);
    $("#tags_label_1 , #tags_label_2 , #tags_label_3").prop("selectedIndex", 0);
    $("#tags_label_1 , #tags_label_2 , #tags_label_3").prop("disabled", "disabled");
}


// Get the content of the draft
function choose_draft(elem){
    window.location = "articles.php?section=draft&id="+elem;
}


// Delete the selected draft
function delete_draft(elem){
    var url = "controllers/script/article-script.php";

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "delete_draft",
            "draft_id" : elem
        },
        dataType : "text",
        success: function(response){
            alert("Draft deleted");
            location.reload();
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}
