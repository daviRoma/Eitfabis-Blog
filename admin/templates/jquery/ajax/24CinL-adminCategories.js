/* 24CinL Blog - JavaScript for Admins */

var catId_temp = 0;

// Ready function
$(function(){
    $("#cat_bg_file").change(catBg_upload);
});

// Edit selected category
function edit_category(elem){
    var save_button = '<button id="save_edit" class="btn btn-sm btn-success" title="Save" onClick="save_edit_changes('+elem+')"><i class="fa fa-save"></i> Save</button>';
    var $this = $(event.target);

    $("#table_categoryList").children("tr").each(function() {
        var cat_id = $(this).find("#cat_id").val();
        if(cat_id == elem){
            $this.replaceWith(save_button);
            $(this).find("#category_name").removeAttr("readonly");
            $(this).find("#category_name").css({"border-bottom":"0.7px solid #009933"});
            $(this).find("#category_description").removeAttr("readonly");
            $(this).find("#category_description").css({"border-bottom":"0.7px solid #009933"});
            $(this).find("#delete_category").attr("disabled", "disabled");
        }
    });
}


// Save edit changes
function save_edit_changes(elem){
    var url = "controllers/script/category-script.php";
    var $this = $(event.target);
    var new_name = "";
    var new_description = "";

    $("#table_categoryList").children("tr").each(function() {
        var cat_id = $(this).find("#cat_id").val();
        if(cat_id == elem){
            new_name = $(this).find("#category_name").val();
            new_description = $(this).find("#category_description").val();
        }
    });

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "edit",
            "category_id" : elem,
            "new_name" : new_name,
            "new_description" : new_description
        },
        dataType : "text",
        success: function(response){
            var edit_button = '<button id="edit_category" class="btn btn-sm btn-success" onClick="edit_category('+elem+')"><i class="fa fa-pencil"></i> Edit</button>';
            $this.replaceWith(edit_button);
            $("#table_categoryList").children("tr").each(function() {
                var cat_id = $(this).find("#cat_id").val();
                if(cat_id == elem){
                    $(this).find("#category_name").attr("readonly", "readonly");
                    $(this).find("#category_name").css({"border-bottom":"none"});
                    $(this).find("#category_description").attr("readonly", "readonly");
                    $(this).find("#category_description").css({"border-bottom":"none"});
                    $(this).find("#delete_category").removeAttr("disabled");
                }
            });
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Delete selected category
function delete_category(elem){
    var url = "controllers/script/category-script.php";
    var category = "";

    $("#table_categoryList").children("tr").each(function() {
        var cat_id = $(this).find("#cat_id").val();
        if(cat_id == elem){
            category = $(this).find("#category_name").val();
        }
    });

    if(confirm("Delete '" + category + "'. Are you sure?")){
        $.ajax(url, {
            method : "POST",
            data : {
                "operation" : "delete",
                "category_id" : elem
            },
            dataType : "text",
            success: function(response){
                alert("The operation has been succesfull." + " '"+category+"' category has been deleted.");
                location.reload();
            },
            error: function(xhr) {
                alert("ERROR: " + xhr.responseText + xhr.status);
            }
        });
    }
}

// Update category background
function update_cat_bg(elem){
    $("#cat_bg_file").click();
    catId_temp = elem;
}

// Set a selected image as category background
function catBg_upload(e){
    var maxWidth = 0;
    var maxHeight = 0;
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
            var newImg = $('<img id=img_fake src="' + src + '" style="display:none;">');

            newImg.on('load', function() {
                maxWidth = 2048;
                maxHeight = 1080;
                if(newImg.outerWidth() > maxWidth || newImg.outerHeight() > maxHeight){
                    alert("Image dimension not allowed, too big.");
                    return false;
                }else{
                    // Perform upload
                    var url = "controllers/script/category-script.php";
                    var form_data = new FormData();
                    form_data.append('category_bg_file', imgFile);
                    form_data.append('operation', "upload_img");
                    form_data.append('id', parseInt(catId_temp));

                    $.ajax(url, {
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        method: "POST",
                        dataType: "text",  // what to expect back from the PHP script, if anything
                        success: function(response){
                            alert("Background was changed successfully!");
                        },
                        error: function(xhr) {
                            alert("ERROR: " + xhr.responseText + xhr.status);
                        }
                     });
                }
            });
        };
        reader.onerror = function(event) {
            alert("ERROR TYPE: " + event.target.error.code);
        };
        reader.readAsDataURL(imgFile);
    }
}
