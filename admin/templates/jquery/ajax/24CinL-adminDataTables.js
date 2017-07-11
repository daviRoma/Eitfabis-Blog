/* 24CinL Admin panel - DataTables functions */


// Global variables declaration
var count = 0;
var dataRow = new Array();          //Array storage (object) of the table rows
var dataBackup = new Array();       //Array for table rows backup
var dataBackupPlus = new Array();   //Auxiliary array for object backup only
var DBbackup = new Array();         //Array for DB data storage
var table_columns = new Array();
var position = $("#position").text();
var priority = 0;
var last_op = 0;                //0 for a single operation; 1 for multiple operation
var totSelected = 0;


// Ready function
$(function(){
    if(position == "Subscribers"){
        $('html, body').animate({
            scrollTop: ($("#table_container").offset().top)-113
        }, 700);
    }

    set_dataTableRows();
    show_dataTableRows(0);

    $("#undo").attr("disabled", "disabled");
    count_selected();
    /*
    window.history.click(function () {
        alert("aa");
    });*/

});


//Setting dataTable
function set_dataTableRows(){
    var i = 0;
    var id = 0;

    $("th[name=column_name]").each(function () {
        table_columns[i] = $(this).text().toLowerCase();
        i++;
    });
    $("#data_table-body").css({"display" : "none"});
    $("#data_table-body").children().each(function () {
        id = parseInt($(this).children("td[name=id]").children("input[name=table_input-field]").val());
        //object-data array
        dataRow[count] = new Array();
        dataRow[count]["object"] = $(this);
        dataRow[count]["id"] = id;
        dataRow[count]["op"] = 0;
        dataRow[count]["priority"] = 0;
        dataRow[count]["selected"] = 0;
        dataBackupPlus[count] = new Array();
        dataBackupPlus[count] = dataRow[count];
        //object-data array backup
        dataBackup[count] = new Array();
        dataBackup[count]["id"] = id;
        dataBackup[count]["op"] = "";
        dataBackup[count]["priority"] = 0;
        dataBackup[count]["selected"] = 0;
        //data array
        DBbackup[count] = new Array();
        for(i = 0; i < table_columns.length; i++){
            DBbackup[count][i] = $(this).children("td[name="+table_columns[i]+"]").children("input[name=table_input-field]").val();
        }
        count++;
    });
}


// Show the rows of DataTable 10 at a time
function show_dataTableRows(start){
    var index = parseInt(start + 10);
    var table_footer = "";
    var page = parseInt($("#currentPage").val());
    var total_rows = dataRow.length;
    var total_page = get_totalPage(dataRow.length);
    var indexCounter = start;

    $("#data_table-body").children().remove();

    if(index > total_rows)
        index = total_rows;

    for(var i = start; i < index; i++)
        $("#data_table-body").append(dataRow[i]["object"]);

    $("input[name=row_index]").each(function () {
        $(this).val(indexCounter);
        indexCounter++;
    });

    table_footer = "Showing " + (parseInt(start + 1)) + " to " + index + " of " + total_rows + " entries";
    $("span[name=show-entries]").text(table_footer);

    if(total_page == 1){
        $("#previous_button").addClass("op-not-enable");
        $("#next_button").addClass("op-not-enable");
    }else{
        if(page == 1){
            $("#previous_button").addClass("op-not-enable");
            $("#next_button").removeClass("op-not-enable");
        }else{
            if(page == total_page){
                $("#next_button").addClass("op-not-enable");
                $("#previous_button").removeClass("op-not-enable");
            }else{
                $("#previous_button").removeClass("op-not-enable");
                $("#next_button").removeClass("op-not-enable");
            }
        }
    }
    $("#starting_row").val(start);
    $("#data_table-body").fadeIn(1000);
}


/* ***************************** OPERATIONS ******************************** */

// Choose the right DataRow operation according to user click
function select_operation(e, row){
    e.preventDefault();
    switch(e.target.id){
        case "delete" :
            if(confirm("Are you sure?"))
                delete_one(row);
            break;
        case "edit" :
            editModal(row);
            break;
        case "load" :
            loadPreview(row);
            break;
        default : break;
    }
}


// Choose the right operation between add or edit
function select_addORedit(e){
    e.preventDefault();
    switch($("#modalOperation").val()){
        case "add" :
            add_one();
            break;
        case "edit" :
            edit_one();
            break;
        default : break;
    }
}


// Add one new row on the DB
function add_one(){
    var url = "controllers/script/edit-script.php";
    var toAdd= new Array();
    var i = 0;

    $("tbody[name=modalTable-body]").children("tr").children("td").children("input[name=table_input-field]").each(function(){
        toAdd[i] = $(this).val();
        i++;
    });

    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "row" : toAdd,
            "operation" : "add"
        },
        dataType : "html",
        success: function(response){
            alert(response);
            location.reload();
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Modify one table row with new data
function edit_one(){
    var url = "controllers/script/edit-script.php";
    var toEdit = new Array();
    var i = 0;
    var oldId = parseInt($("tbody[name=modalTable-body]").children("tr").children("td").children("div").children("#row_check").val());

    $("tbody[name=modalTable-body]").children("tr").children("td").children("input[name=table_input-field]").each(function(){
        toEdit[i] = $(this).val();
        i++;
    });

    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "row" : toEdit,
            "oldId" : oldId,
            "operation" : "edit"
        },
        dataType : "html",
        success: function(response){
            var compare = response.substr(0,5);

            if(compare == "Error"){
                alert(response);
                exitModal();
            }else{
                priority++;

                for(var i = 0; i < dataRow.length; i++){
                    if(dataRow[i]["id"] == oldId){
                        dataRow[i]["object"] = response;
                        dataRow[i]["id"] = toEdit[0];
                        dataRow[i]["priority"] = priority;
                        dataRow[i]["selected"] = 0;
                        break;
                    }
                }
                for(var j = 0; j < dataBackup.length; j++){
                    if(dataBackup[j]["id"] == oldId){
                        dataBackup[j]["op"] = "edit";
                        dataBackup[j]["priority"] = priority;
                        break;
                    }
                }

                exitModal();
                reload_pageTable();
                $("#undo").removeAttr("disabled");
                last_op = 0;
            }
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Takes the selected row and loads the content
function loadPreview(row) {
    var url = "controllers/script/loadPreview-script.php";
    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "row" : row
        },
        dataType : "html",
        success: function(response){
            $('<div class="overlay"></div>').prependTo('body').fadeIn(600);
            $(response).appendTo('.overlay').fadeIn(700).show();
            // Exit from modal window of pictures
            $('.overlay').click(function(event){
                $('#previewModal').fadeOut(300, function(){
                    $('.overlay').fadeOut(300, function(){
                        $('.overlay').remove();
                    });
                });
            });
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Delete one selected row
function delete_one(row){
    var url = "controllers/script/delete-script.php";
    var indexDel = 0;

    for(var i = 0; i < dataRow.length; i++) {
        if(dataRow[i]["id"] == row) {
            indexDel = i
            break;
        }
    }

    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "row" : row,
            "number" : 1
        },
        dataType : "html",
        success: function(response){
            if(response == "STOP"){
                alert("Admins cannot be deleted!");
            }else{
                priority++;
                dataRow.splice(indexDel, 1);

                for(var j = 0; j < dataBackup.length; j++) {
                    if(dataBackup[j]["id"] == row) {
                        dataBackup[j]["op"] = "delete";
                        dataBackup[j]['priority'] = priority;
                        break;
                    }
                }
                reload_pageTable();
                $("#undo").removeAttr("disabled");
                last_op = 0;
            }
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Delete more row selected by user
function delete_selected(e){
    var url = "controllers/script/delete-script.php";
    var toDeleted_index = new Array();
    var toDeleted_id = new Array();
    var total = 0;

    for(var i = 0; i < dataRow.length; i++){
        if(dataRow[i]["selected"] == 1){
            toDeleted_id[total] = dataRow[i]["id"];
            total++;
        }
    }

    if(total > 0){
        if(!confirm("Delete all "+total+" selected rows?"))
            return false;
    }else{
        alert("Selected at least one row");
        return false;
    }

    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "row" : toDeleted_id,
            "number" : toDeleted_id.length
        },
        dataType : "html",
        success: function(response){
            if(response == "STOP"){
                alert("Admins cannot be deleted!");
            }else{
                priority++;

                for(var i = 0; i < dataBackup.length; i++) {
                    for(var j = 0; j < toDeleted_id.length; j++){
                        if(dataBackup[i]["id"] == toDeleted_id[j]) {
                            dataBackup[i]["op"] = "delete_all";
                            dataBackup[i]['priority'] = priority;
                            break;
                        }
                    }
                }
                var k = toDeleted_id.length - 1;
                for(var i = dataRow.length-1; i > 0; i--){
                    if(dataRow[i]["id"] == toDeleted_id[k]){
                        dataRow.splice(i, 1);
                        k--;
                    }
                }
                remove_checked();

                $("#total_pageTable").val(parseInt(dataRow.length/10) + 1);
                $("#currentPage").text(1);
                $("#currentPage").val(1);
                show_dataTableRows(0);
                $("#undo").removeAttr("disabled");
                last_op = 1;
            }
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Restore the last change made by user
function restore_row(e){
    for(var i = 0; i < dataBackup.length; i++){
        if(dataBackup[i]["priority"] == priority){
            operation = dataBackup[i]["op"];
            break;
        }
    }
    if(operation == "delete" || operation == "delete_all"){
        restoreDeleted();
    }
    if(operation == "edit"){
        restoreEdited();
    }
}


//Restore last rows deleted
function restoreDeleted(){
    var url = "controllers/script/restore-script.php";
    var toRestore_data = new Array();      //Array of data for DB insert
    var toRestore_index = new Array();   //Array of object for JS insert
    var toRestore_id = new Array();
    var maxPriorityElem = 0;
    var counter = 0;

    if(last_op == 0){
        for(var i = 0; i < dataBackup.length; i++){
            if(dataBackup[i]["priority"] == priority){
                maxPriorityElem = dataBackup[i]["id"];
                toRestore_index[0] = i;
                for(var j = 0; j < DBbackup.length; j++){
                    if(DBbackup[j][0] == maxPriorityElem){
                        toRestore_data[0] = new Array();
                        toRestore_data[0] = DBbackup[j];
                    }
                }
                break;
            }
        }
    }else{
        for(var i = 0; i < dataBackup.length; i++){
            if(dataBackup[i]["priority"] == priority){
                toRestore_id[counter] = dataBackup[i]["id"];
                toRestore_index[counter] = i;
                counter++;
            }
        }
        counter = 0;
        for(var i = 0; i < DBbackup.length; i++){
            for(var j = 0; j < toRestore_id.length; j++){
                if(DBbackup[i][0] == toRestore_id[j]){
                    toRestore_data[counter] = new Array();
                    toRestore_data[counter] = DBbackup[i];
                    counter++;
                }
            }
        }
    }

    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "row" : toRestore_data,
            "operation" : "delete",
            "number" : toRestore_data.length
        },
        dataType : "html",
        success: function(response){
            if(last_op == 0){
                dataBackup[toRestore_index[0]]["op"] = "";
                dataBackup[toRestore_index[0]]["priority"] = 0;
                dataBackup[toRestore_index[0]]["selected"] = 0;
                dataRow.push(dataBackupPlus[toRestore_index[0]]);
            }else{
                for(var i = 0; i < toRestore_index.length; i++)
                    dataRow.push(dataBackupPlus[toRestore_index[i]]);
            }

            dataRow_IdSort();
            $("#total_pageTable").val(parseInt(dataRow.length/10) + 1);
            $("#currentPage").val(1);
            $("#currentPage").text(1);
            show_dataTableRows(0);

            priority--;
            if(priority == 0){
                last_op = 0;
                $("#undo").attr("disabled", "disabled");
            }else{
                set_LastOp();
                $("#undo").removeAttr("disabled");
            }
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Restore last row edited, replacing with the original value
function restoreEdited(){
    var url = "controllers/script/restore-script.php";
    var toRestore_data = new Array();      //Array of data for DB insert
    var toRestore_index = 0;
    var maxPriorityElem = 0;
    var oldId = 0;

    for(var i = 0; i < dataBackup.length; i++){
        if(dataBackup[i]["priority"] == priority){
            maxPriorityElem = dataBackup[i]["id"];
            toRestore_index = i;
            for(var j = 0; j < DBbackup.length; j++){
                if(DBbackup[j][0] == maxPriorityElem){
                    toRestore_data = DBbackup[j];
                    break;
                }
            }
            break;
        }
    }
    for(var k = 0; k < dataRow.length; k++){
        if(dataRow[k]["priority"] == dataBackup[toRestore_index]["priority"]){
            oldId = dataRow[k]["id"];
            maxPriorityElem = k;
            break;
        }
    }
    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "row" : toRestore_data,
            "operation" : "edit",
            "oldId" : oldId
        },
        dataType : "html",
        success: function(response){
            dataBackup[toRestore_index]["op"] = "";
            dataBackup[toRestore_index]["priority"] = 0;
            dataBackup[toRestore_index]["selected"] = 0;
            dataRow[maxPriorityElem]['object'] = response;

            reload_pageTable();
            priority--;
            if(priority == 0){
                last_op = 0;
                $("#undo").attr("disabled", "disabled");
            }else{
                set_LastOp();
                $("#undo").removeAttr("disabled");
            }
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Send newsletters to all subscribers
function send_news(e){
    var url = "controllers/script/newsletter-script.php";
    var to_send = 0;
    var total = 0;

    for(var i = 0; i < dataRow.length; i++){
        if(dataRow[i]["selected"] == 1){
            to_send = dataRow[i]["id"];
            total++;
        }
    }

    if(total > 0){
        alert("Selected at most one row!");
        return false;
    }

    $.ajax(url, {
        method : "POST",
        data : {
            "operation" : "send",
            "newsletter" : to_send
        },
        dataType : "text",
        success: function(response){
            alert("Newletters send success!");
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Save all the changes made by the user
function save_changes(e){
    e.preventDefault();
    location.reload();
}


/* ******************************* PAGER *********************************** */

// Go to the previous page of the DataTable
function previous_dataRows(){
    $('html, body').animate({
        scrollTop: ($("#table_container").offset().top)-117
    }, 500);
    $("#data_table-body").fadeOut(700, function () {
        var reqPage = parseInt($("#currentPage").val()) - 1
        var previousRowsStart = parseInt($("#starting_row").val()) - 10;
        $("#currentPage").text(reqPage);
        $("#currentPage").val(reqPage);
        show_dataTableRows(previousRowsStart);
    });
}

// Go to the next page of the DataTable
function next_dataRows(){
    $('html, body').animate({
        scrollTop: ($("#table_container").offset().top)-117
    }, 500);
    $("#data_table-body").fadeOut(700, function () {
        var reqPage = parseInt($("#currentPage").val()) + 1
        var nextRowsStart = parseInt($("#starting_row").val()) + 10;
        $("#currentPage").text(reqPage);
        $("#currentPage").val(reqPage);
        show_dataTableRows(nextRowsStart);
    });
}

// Reload the current page of the DataTable
function reload_pageTable(){
    $("#data_table-body").fadeOut(600);
    var new_start = parseInt($("#starting_row").val());
    $('html, body').animate({
        scrollTop: ($("#table_container").offset().top)-117
    }, 500);
    show_dataTableRows(new_start);
}


/* ******************************* CHECKBOX *********************************** */

// Marks one dataTables rows as checked
function selected_checkbox(elem){
    var index = $(elem).children("input[name=row_index]").val();

    if($(elem).hasClass("checked")){
        $(elem).removeClass("checked");
        $(elem).parent().parent("tr").removeClass("selected");
        $(elem).children("input[name=table_records]").removeAttr("checked");
        dataRow[index]["selected"] = 0;

        if($("#table_head").hasClass("selected")){
            var removeElem = parseInt($("th[class=bulk-actions]").children("a").children("span").text()) - 1;
            if(removeElem == 0){
                $("div[name=select_allCheckbox]").removeClass("checked");
                $("#table_head").removeClass("selected");
                $("#table_head").each(function () {
                    $("th[class=column-title]").css({"display" : "table-cell"});
                });
                $("th[class=bulk-actions]").css({"display" : "none"});
                $("th[class=bulk-actions]").children("a").children("span").text("");
            }else{
                $("th[class=bulk-actions]").children("a").children("span").text(removeElem);
            }
        }
        totSelected--;
    }else{
        $(elem).children("input[name=table_records]").attr("checked", "true");
        $(elem).addClass("checked");
        $(elem).parent().parent("tr").addClass("selected");
        dataRow[index]["selected"] = 1;

        if($("#table_head").hasClass("selected")){
            var addElem = parseInt($("th[class=bulk-actions]").children("a").children("span").text()) + 1;
            $("th[class=bulk-actions]").children("a").children("span").text(addElem);
        }
        totSelected++;
    }
    count_selected();
}


// Marks all dataTable rows as checked
function selected_allCheckbox(elem){
    var selectedCounter = 0;

    if($(elem).hasClass("checked")){
        $("div[name=data_check]").each(function () {
            if($(this).hasClass("checked"))
                totSelected--;
        });
        $(elem).removeClass("checked");
        $(elem).parent().parent("tr").removeClass("selected");
        $("#table_head").each(function () {
            $("th[class=column-title]").css({"display" : "table-cell"});
        });
        $("th[class=bulk-actions]").css({"display" : "none"});

        $("#data_table-body").each(function () {
            $("tr").removeClass("selected");
            $("tr").children("td").children("div").children("input[name=table_records]").removeAttr("checked");
            $("tr").children("td").children("div").removeClass("checked");
            $("tr[name=data_row]").each(function () {
                var index = $(this).children("td").children("div").children("input[name=row_index]").val();
                dataRow[index]["selected"] = 0;
            });
        });
        $("th[class=bulk-actions]").children("a").children("span").text("");

    }else{

        $(elem).addClass("checked");
        $(elem).parent().parent("tr").addClass("selected");
        $("#table_head").each(function () {
            $("th[class=column-title]").css({"display" : "none"});
        });
        $("th[class=bulk-actions]").css({"display" : "table-cell"});

        $("#data_table-body").each(function () {
            $("tr").addClass("selected");
            $("tr").children("td").children("div").children("input[name=table_records]").attr("checked", "true");
            $("tr").children("td").children("div").addClass("checked");
            $("tr[name=data_row]").each(function () {
                var index = $(this).children("td").children("div").children("input[name=row_index]").val();
                dataRow[index]["selected"] = 1;
            });
        });
        $("div[name=data_check]").each(function () {
            if($(this).hasClass("checked")){
                selectedCounter++;
                totSelected++;
            }
        });
        $("th[class=bulk-actions]").children("a").children("span").text(selectedCounter);
    }
    count_selected();
}


// Remove selectd and checked class or attribute from all rows
function remove_checked(){
    $("#table_head").removeClass("selectd");
    $("div[name=select_allCheckbox]").removeClass("checked");
    $("#table_head").each(function () {
        $("th[class=column-title]").css({"display" : "table-cell"});
    });
    $("th[class=bulk-actions]").css({"display" : "none"});

    $("#data_table-body").each(function () {
        $("tr").removeClass("selected");
        $("tr").children("td").children("div").children("input[name=table_records]").removeAttr("checked");
        $("tr").children("td").children("div").removeClass("checked");
    });
    $("th[class=bulk-actions]").children("a").children("span").text("");
}


/* **************************** MODAL WINDOWS ****************************** */

// Open modal window for "edit" operation
function editModal(row){
    var url = "controllers/script/editModal-script.php";
    var toEdit = new Array();

    for(var i = 0; i < dataBackup.length; i++){
        if(dataBackup[i]["id"] == row){
            toEdit = DBbackup[i];
        }
    }

    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "row" : toEdit,
            "operation" : "edit"
        },
        dataType : "html",
        success: function(response){
            if(response == "STOP"){
                alert("Access Denied");
            }else{
                $('<div class="overlay"></div>').prependTo('body').fadeIn(600);
                $(response).appendTo('.overlay').fadeIn(700).show();
                var $this = $("tbody[name=modalTable-body]").children("tr");
                $this.children("td").children("input[name=table_input-field]").removeAttr("readonly");
                $this.children("td[name=table_td-checkbox]").css({"display" : "none"});
                $this.children("td[name=table_td-operation]").css({"display" : "none"});
            }
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Open modal window for "add" operation
function addModal(e){
    e.preventDefault();
    var url = "controllers/script/editModal-script.php";

    if(priority > 0){
        alert("Save changes before proceeding");
        return false;
    }

    $.ajax(url, {
        method : "POST",
        data : {
            "position" : position,
            "operation" : "add"
        },
        dataType : "html",
        success: function(response){
            $('<div class="overlay"></div>').prependTo('body').fadeIn(600);
            $(response).appendTo('.overlay').fadeIn(700).show();
            var $this = $("tbody[name=modalTable-body]").children("tr");
            $this.children("td").children("input[name=table_input-field]").removeAttr("readonly");
            $this.children("td[name=table_td-checkbox]").css({"display" : "none"});
            $this.children("td[name=table_td-operation]").css({"display" : "none"});
        },
        error: function(xhr) {
            alert("ERROR: " + xhr.responseText + xhr.status);
        }
    });
}


// Exit from modal window
function exitModal(){
    var $this = $("tbody[name=modalTable-body]").children("tr");
    $this.children("td").children("input[name=table_input-field]").attr("readonly", "readonly");
    $this.children("td[name=table_td-checkbox]").css({"display" : "none"});
    $this.children("td[name=table_td-operation]").css({"display" : "none"});
    $(".overlay").fadeOut(500, function () {
        $(this).remove();
    });
}


/* ****************************** UTILITY ********************************** */

// Enable and disable Delete (all) button
function count_selected(){
    if(totSelected > 0)
        $("#delete_selected").removeAttr("disabled");
    else
        $("#delete_selected").attr("disabled", "disabled");
}


// Perform dataRow sort by id
function dataRow_IdSort(){
    var max;
    var swap;

    for(var i = 0; i < dataRow.length-1; i++){
        max = i;
        for (var j = i+1; j < dataRow.length; j++){
            if (dataRow[j]["id"] > dataRow[max]["id"]) {
                max = j;
            }
        }
        swap = dataRow[max];
        dataRow[max] = dataRow[i];
        dataRow[i] = swap;
    }
}


// Set lastOp variable
function set_LastOp(){
    var counter = 0;
    for(var i = 0; i < dataBackup.length; i++)
        if(dataBackup[i]["priority"] == priority)
            counter++;

    if(counter == 1)
        last_op = 0;
    else
        last_op = 1;
}


// Get the total number of the table
function get_totalPage(row){
    var page = row / 10;

    if(row % 10 == 0)
        return parseInt(page);
    else
        return String(parseInt(page) + 1).substring(0,1);
}
