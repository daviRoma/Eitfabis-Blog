/* 24CinL Blog - JavaScript for Admins */


// Global variables
var position = $("#position").text();


// Ready function
$(function(){
    $("#bg_file").change(previewBackground);
    $("#upload_img_file").change(upload_file);
    $("#avatar_file").change(avatar_preview);

    // Set upload file
    $("#upload_file").click(function(){
        $("#upload_img_file").click();
    });
});


// Set an image selected by user as background preview
function previewBackground(e){
    var maxWidth = 0;
    var maxHeight = 0;
    var img = $("#bg_file").val().toString().split("\\");
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
            var newImg = $('<img id=bg_fake src="' + src + '" style="display:none;">');

            $("#bg_fake").replaceWith(newImg);
            newImg.on('load', function() {
                if(position == "Categories"){
                    maxWidth = 640;
                    maxHeight = 480;
                    if(newImg.outerWidth() > maxWidth || newImg.outerHeight() > maxHeight){
                        alert("Image dimension not allowed. It will be at most "+ maxWidth +" x "+ maxHeight +".");
                        return false;
                    }else{
                        $("#set_category_bg").val(img[0] + "." + img[1]);
                        $("#bg_image").attr("src", src);
                    }
                }else{
                    maxWidth = 1280;
                    maxHeight = 720;
                    if(newImg.outerWidth() < maxWidth || newImg.outerHeight() < maxHeight){
                        alert("Image dimension not allowed. It will be at least "+ maxWidth +" x "+ maxHeight +".");
                        return false;
                    }else{
                        $("#bg_image").attr("src", src);
                    }
                }
            });
        };
        reader.onerror = function(event) {
            alert("ERROR TYPE: " + event.target.error.code);
        };
        reader.readAsDataURL(imgFile);
    }
}


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

// Delete selected category
function delete_category(event){
    var category = $(event.target).parent().parent().children("span").text();
    var url = "controllers/category_service.php";

    if(confirm("Delete '" + category + "'. Are you sure?")){
        $.ajax(url, {
            method : "POST",
            data : {
                "deleteCategory" : category
            },
            dataType : "html",
            success: function(response){
                alert("The operation has been succesfull." + " '"+category+"' cagtegory has been deleted.");
                location.reload();
            },
            error: function(xhr) {
                alert("ERROR: " + xhr.responseText + xhr.status);
            }
        });
    }else
        return false;
}


// Set an image selected by user as user avatar
function avatar_preview(e){
    var maxWidth = 0;
    var maxHeight = 0;
    var img = $("#avatar_file").val().toString().split("\\");
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
        if(imgFile.size > 5168000){
            alert("File dimension exceeded");
            return false;
        }
        var reader = new FileReader();
        reader.onload = function(event) {
            var src = event.target.result;
            var newImg = $('<img id=avatar_fake src="' + src + '" style="display:none;">');

            $("#avatar_fake").replaceWith(newImg);
            newImg.on('load', function() {
                maxWidth = 800;
                maxHeight = 800;
                if(newImg.outerWidth() > maxWidth || newImg.outerHeight() > maxHeight){
                    alert("Image dimension not allowed. It will be at most "+ maxWidth +" x "+ maxHeight +".");
                    return false;
                }else{
                    avatar_upload(imgFile);
                    $("#avatar_img").attr("src", src);
                }
            });
        };
        reader.onerror = function(event) {
            alert("ERROR TYPE: " + event.target.error.code);
        };
        reader.readAsDataURL(imgFile);
    }
}


// Perform avatar upload with an ajax call
function avatar_upload(file){
    var url = "controllers/script/uploadAvatar-script.php";
    var file_data = file;
    var form_data = new FormData();
    form_data.append('avatar_file', file_data);

    $.ajax(url, {
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        method: "POST",
        dataType: "text",  // what to expect back from the PHP script, if anything
        success: function(response){
            $("#user_picture").attr("src", ".." + response);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
     });
}
