/* 24CinL Admin panel - Comments functions */


var gs_temp_id = 0;         // Temporary id
var gr_or_serv_temp = "";   //Temporary location


// Show the selected group for editing or deleting
function go_to_group(){
    var url = "controllers/script/group_service-script.php";
    var group_id = $("#select_group").val();

    if(group_id == "default")
        return false;

    $.ajax(url, {
        method : "GET",
        data : {
            "grserv" : "group",
            "id" : group_id
        },
        contentType: "application/json; charset=utf-8",
        dataType : "json",
        success: function(response){
            var data = response;

            $("p[name=empty_gs_edit]").hide();
            $("#gs_edit_container").hide();
            $("#serviceEdit_container").hide();

            $("#groupEdit_container").show();
            $("#gs_edit_buttonGroup").show();
            $("#gs_edit_container").slideDown(600, function() {
                $(this).show();
            });

            $("#groupEdit_container").children().find("#set_g_name").val(data['role']);
            $("#groupEdit_container").children().find("#set_g_desc").val(data['description']);
            $("#groupEdit_container").children().find("#select_starter").val(data['start']);

            gr_or_serv_temp = "group";
            gs_temp_id = group_id;
            $("#select_service").prop('selectedIndex', 0);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Show the selected service for editing or deleting
function go_to_service(){
    var url = "controllers/script/group_service-script.php";
    var service_id = $("#select_service").val();

    if(service_id == "default")
        return false;

    $.ajax(url, {
        method : "GET",
        data : {
            "grserv" : "service",
            "id" : service_id
        },
        contentType: "application/json; charset=utf-8",
        dataType : "json",
        success: function(response){
            var data = response;

            $("p[name=empty_gs_edit]").hide();
            $("#gs_edit_container").hide();
            $("#groupEdit_container").hide();

            $("#serviceEdit_container").show();
            $("#gs_edit_buttonGroup").show();
            $("#gs_edit_container").slideDown(600, function() {
                $(this).show();
            });

            $("#serviceEdit_container").children().find("#set_s_label").val(data['label']);
            $("#serviceEdit_container").children().find("#set_s_name").val(data['name']);

            if(data['page'] == 1){
                $("#serviceEdit_container").children().find("#primary_service").children("div").children("label").children("div").addClass("checked");
            }else{
                $("#serviceEdit_container").children().find("#primary_service").children("div").children("label").children("div").removeClass("checked");
            }

            if(data['available'] == 1){
                $("#serviceEdit_container").children().find("#available_service").children("div").children("label").children("div").addClass("checked");
            }else{
                $("#serviceEdit_container").children().find("#available_service").children("div").children("label").children("div").removeClass("checked");
            }

            $("#serviceEdit_container").children().find("#group_list").children().find("input").each(function(){
                for(var i = 0; i < data['groupId'].length; i++){
                    if(data['groupId'][i] == $(this).val()){
                        $(this).parent("div").addClass("checked");
                        break;
                    }else{
                        $(this).parent("div").removeClass("checked");
                    }
                }
            });

            gr_or_serv_temp = "service";
            gs_temp_id = service_id;
            $("#select_group").prop('selectedIndex', 0);
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Save group or service changes
function confirm_gs_changes(){
    var url = "controllers/script/group_service-script.php";
    
    switch(gr_or_serv_temp){
        case "group":
            var group = new Array();
            group[0] = gs_temp_id;
            group[1] = $("#groupEdit_container").children().find("#set_g_name").val();
            group[2] = $("#groupEdit_container").children().find("#set_g_desc").val();
            group[3] = $("#groupEdit_container").children().find("#select_starter").val();

            $.ajax(url, {
                method : "POST",
                data : {
                    "operation" : 1,        // Edit
                    "grserv" : gr_or_serv_temp,
                    "new_data" : group
                },
                dataType : "html",
                success: function(response){
                    alert("Group modified.");
                    remove_gs_list();
                },
                error: function(xhr) {
                    alert("ERROR: " + xhr.responseText + xhr.status);
                }
            });
            break;

        case "service":
            var service = new Array();
            service[0] = gs_temp_id;
            service[1] = $("#serviceEdit_container").children().find("#set_s_label").val();
            service[2] = $("#serviceEdit_container").children().find("#set_s_name").val();
            if($("#serviceEdit_container").children().find("#main_service").parent("div").hasClass("checked")){
                service[3] = 1;
            }else{
                service[3] = 0;
            }
            if($("#serviceEdit_container").children().find("#available_service").parent("div").hasClass("checked")){
                service[4] = 1;
            }else{
                service[4] = 0;
            }
            service[5] = new Array();
            var count = 0;
            $("#serviceEdit_container").children().find("#group_list").children().find("input").each(function(){
                if($(this).parent("div").hasClass("checked")){
                    service[5][count] = $(this).val();
                    count++;
                }
            });

            $.ajax(url, {
                method : "POST",
                data : {
                    "operation" : 1,        // Edit
                    "grserv" : gr_or_serv_temp,
                    "new_data" : service
                },
                dataType : "html",
                success: function(response){
                    alert("Service modified.");
                    remove_gs_list();
                },
                error: function(xhr) {
                    alert("ERROR: " + xhr.responseText + xhr.status);
                }
            });
            break;
        default: break;
    }
}


// Delete one group or service
function delete_gs(){
    if(confirm("Delete this "+gr_or_serv_temp+"?")){
        $.ajax(url, {
            method : "POST",
            data : {
                "operation" : 0,        // Edit
                "grserv" : gr_or_serv_temp,
                "id" : gs_temp_id
            },
            dataType : "html",
            success: function(response){
                remove_gs_list();
            },
            error: function(xhr) {
                alert("ERROR: " + xhr.responseText + xhr.status);
            }
        });
    }
}


// Remove group or service edit form
function remove_gs_list(){
    gs_temp_id = 0;
    $("#gr_or_serv").val("");
    $("#select_group, #select_service").prop('selectedIndex', 0);

    $("#gs_edit_container").slideUp(600, function() {
        $(this).show();
        $("#serviceEdit_container").hide();
        $("#groupEdit_container").hide();
        $("#gs_edit_buttonGroup").hide();
        $("p[name=empty_gs_edit]").slideDown(600, function() {
            $(this).show();
        });
    });
}
