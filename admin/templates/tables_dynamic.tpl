
<table class="table table-striped jambo_table bulk_action">
    <thead>
        <tr id="table_head" class="headings">
            <th>
                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" name="select_allCheckbox" style="position: relative;" onClick="selected_allCheckbox(this)">
                    <input type="checkbox" id="check-all" class="table-checkbox">
                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0; background-position: initial initial; background-repeat: initial initial;"></ins>
                </div>
            </th>
            {foreach $table_head as $head}
                <th class="column-title" name="column_name">{$head}</th>
            {/foreach}
            <th class="column-title">Operations</th>
            <th class="bulk-actions" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Selected Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
            </th>
        </tr>
    </thead>
    <tbody id="data_table-body">
        {foreach $rows as $row}
            <tr class="even pointer" id="data_row" name="data_row" role="row">
                <td class="a-center " name="table_td-checkbox">
                    <div class="icheckbox_flat-green" style="position: relative;" name="data_check" onClick="selected_checkbox(this)">
                        <input id="row_check" type="checkbox" class="table-checkbox" value="{$row.id}" name="table_records">
                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0; background-position: initial initial; background-repeat: initial initial;"></ins>
                        <input id="row_index" type="hidden" value="" name="row_index">
                    </div>
                </td>
                {foreach $row as $value}
                    <td id="{$value@key}" class=" " name="{$value@key}" {if $value@key == id} style="width:7%; margin-right:5px;"{/if}
                                                                        {if $value@key == backup || $value@key == gallery} style="width:7%; padding-left:27px;"{/if}
                                                                        {if $value@key == folder} style="width:7%; padding-left:10px;"{/if}
                                                                        {if $value@key == description} style="width:60%; padding-left:5px; padding-right:20px;"{/if}
                                                                        {if $value@key == author} style="width:15%;"{/if}
                                                                        {if $value@key == password} style="width:15%;"{/if}
                                                                        {if $value@key == email} style="width:27%;"{/if}
                                                                        {if $value@key == name} style="width:18%;"{/if}>
                        <input id="{$value@key}" class="table_td-input" name="table_input-field" value="{$value}" readonly="readonly"/>
                    </td>
                {/foreach}
                <td class="table-operation" name="table_operation">
                    <a name="delete_button" {if !isset($operation_1)} class="op-not-enable" {/if} href="#" onclick="select_operation(event, {$row.id})">
                        <i id="delete" class="fa fa-trash" title="Delete"></i>
                    </a>
                    <a name="edit_button" {if !isset($operation_2)} class="op-not-enable" {/if} href="#" onclick="select_operation(event, {$row.id})" >
                        <i id="edit" class="fa fa-pencil" title="Edit"></i>
                    </a>
                    <a name="load_button" {if !isset($operation_3)} class="op-not-enable" {/if} href="#" onclick="select_operation(event, {$row.id})">
                        <i id="load" class="fa fa-play-circle" title="Load"></i>
                    </a>
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
<div class="col-md-4">
    <div class="table_count-entries">
        <span name="show-entries">Showing entries</span>
    </div>
</div>
<div class="col-md-4 pull-right">
    <ul class="table_pagination">
        <li class="paginate_button-previous"><button type="button" id="previous_button" onClick="previous_dataRows()">Previous</button></li>
        <li class="paginate_button-page" id="currentPage" value="1" onClick="reload_pageTable()"> 1 </li>
        <li class="paginate_button-next"> <button type="button" id="next_button" onClick="next_dataRows()">Next</button></li>
    </ul>
    <input type="hidden" id="starting_row" value="0"/>
    <input type="hidden" id="total_pageTable" value="{$total_pageTable}"/>
</div>
