<!-- Modal window for edit tables row -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <table class="table table-striped jambo_table" name="modalTable">
                <thead>
                    <tr id="table_head" class="headings">
                        {foreach $table_head as $head}
                            <th class="column-title" name="column_name">{$head}</th>
                        {/foreach}
                    </tr>
                </thead>
                <tbody name="modalTable-body">
                    <tr class="even pointer" id="data_row" name="data_row" role="row">
                        <td class="a-center " name="table_td-checkbox">
                            <div class="icheckbox_flat-green" style="position: relative;" name="data_check" onClick="selected_checkbox(this)">
                                <input id="row_check" type="checkbox" class="table-checkbox" value="{$row.id}" name="table_records">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); border: 0px; opacity: 0; background-position: initial initial; background-repeat: initial initial;"></ins>
                                <input id="row_index" type="hidden" value="" name="row_index">
                            </div>
                        </td>
                        {foreach $row as $value}
                            {if $value@key == category}
                                <td id="{$value@key}" class=" " name="{$value@key}">
                                    <div class="select-category-menu-modal">
                                        <select id="set_category" name="setCategory">
                                            {foreach $value as $name}
                                                <option value="{$name}">{$name}</option>
                                            {/foreach}
                                        </select>
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </td>
                            {else}
                                <td id="{$value@key}" class=" " name="{$value@key}" {if $value@key == id} style="width:7%; margin-right:5px;"{/if}>
                                    <input id="{$value@key}" class="table_td-input" name="table_input-field" value="{$value}" readonly="readonly"/>
                                </td>
                            {/if}
                        {/foreach}
                        <td class="table-operation" name="table_td-operation">
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
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <hr style="margin-bottom: 13px;">
            <button id="cancel_edit" class="btn btn-sm btn-default" type="button" onclick="exitModal()">Cancel</button>
            <button id="confirm_edit" class="btn btn-sm btn-success" type="button" onclick="select_addORedit(event)">Confirm</button>
        </div>
        <input id=modalOperation type="hidden" value="{$operation}" name="modalOperation">
    </div>
</div>
