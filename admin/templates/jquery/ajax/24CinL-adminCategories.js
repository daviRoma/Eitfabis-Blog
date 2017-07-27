/* 24CinL Blog - JavaScript for Admins */


// Edit selected category
function edit_category(elem){
    var save_button = '<button id="save_edit" class="btn btn-sm btn-success" onClick="save_edit_changes('+elem+')"><i class="fa fa-save"></i> Save</button>';
    $("#edit_category").replaceWith(save_button);
    $("#category_name").removeAttr("readonly");
    $("#category_name").css({"border-bottom":"0.7px solid #009933"});
    $("#category_description").removeAttr("readonly");
    $("#category_description").css({"border-bottom":"0.7px solid #009933"});
    $("#delete_category").attr("disabled", "disabled");
}


// Save edit changes
function save_edit_changes(elem){
    var url = "controllers/script/category-script.php";
    var new_name = $("#category_name").val();
    var new_description = $("#category_description").val();

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
            $("#save_edit").replaceWith(edit_button);
            $("#category_name").attr("readonly", "readonly");
            $("#category_name").css({"border-bottom":"none"});
            $("#category_description").attr("readonly", "readonly");
            $("#category_description").css({"border-bottom":"none"});
            $("#delete_category").removeAttr("disabled");
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Delete selected category
function delete_category(elem){
    var url = "controllers/script/category-script.php";

    if(confirm("Delete '" + category + "'. Are you sure?")){
        $.ajax(url, {
            method : "POST",
            data : {
                "operation" : "delete",
                "category_id" : elem
            },
            dataType : "text",
            success: function(response){
                alert("The operation has been succesfull." + " '"+category+"' cagtegory has been deleted.");
                location.reload();
            },
            error: function(xhr) {
                alert("ERROR: " + xhr.responseText + xhr.status);
            }
        });
    }
}
