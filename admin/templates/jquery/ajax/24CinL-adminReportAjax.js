/* 24CinL Admin panel - Reports functions */



/* ***************************** OPERATIONS ******************************** */

// Show the report selected
function show_report(e, report_id){
    e.preventDefault();
    var url = "controllers/script/report-script.php";

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "show",
            "report" : report_id
        },
        dataType : "html",
        success: function(response){
            $("#report_container").fadeOut(500, function(){
                $("#report_content").remove();
                $("#report_container").append(response);
                $("#report_container").fadeIn();
            });
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}

// Open email client
function mail_reply(){
    var receiver = $("#report_email").attr("title");
    window.location.href = "mailto:" + receiver + "?subject=24CinL%20developer%20team&body=Insert%20message%20here";
}

// Insert report to archiver
function archive_report(report_id){
    var url = "controllers/script/report-script.php";

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "archive",
            "report" : report_id
        },
        dataType : "html",
        success: function(response){
            $("input[name=report_id_prev]").each(function(){
                if($(this).val() == report_id)
                    $(this).parent("div[name=report_archive]").children("i").replaceWith('<i class="fa fa-check-circle"></i>');
            });
            $("#archive_report").replaceWith('<button id="unarchive_report" class="btn btn-sm btn-default" type="button" onClick="unarchive_report('+ report_id
                +')" data-placement="top" title="Unarchive"><i class="fa fa-circle-thin"></i></button>');
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}

// Remove report to archiver
function unarchive_report(report_id){
    var url = "controllers/script/report-script.php";

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "unarchive",
            "report" : report_id
        },
        dataType : "html",
        success: function(response){
            $("input[name=report_id_prev]").each(function(){
                if($(this).val() == report_id)
                    $(this).parent("div[name=report_archive]").children("i").replaceWith('<i class="fa fa-circle-o"></i>');
            });
            $("#unarchive_report").replaceWith('<button id="archive_report" class="btn btn-sm btn-default" type="button" onClick="archive_report('+ report_id
                +')" data-placement="top" title="Archive"><i class="fa fa-check-circle"></i></button>');
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}

// Delete report
function delete_report(report_id){
    var url = "controllers/script/report-script.php";

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "delete",
            "report" : report_id
        },
        dataType : "html",
        success: function(response){
            var prev_id = 0;
            $("input[name=report_id_prev]").each(function(){
                if($(this).val() == report_id)
                    $(this).parent("div[name=report_archive]").parent().parent("a").remove();
                show_report(event, prev_id);
                prev_id = $(this).val();
            });
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}

// Delete report
function delete_archived(){
    var url = "controllers/script/report-script.php";

    if(!confirm("Delete all report archived. Are you sure?"))
        return false;

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "delete_archived"
        },
        dataType : "html",
        success: function(response){
            if(response == 0)
                alert("No report deleted");
            else{
                alert(response + "report deleted");
                location.reload();
            }
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}
