<!-- Basic Tables design -->
<table id="table_basic" class="table table-striped">
    <thead>
        <tr>
            {foreach $heads as $head}
                <th>{$head}</th>
            {/foreach}
                <th>Delete</th>
        </tr>
    </thead>

    {if isset($basic_rows)}
        <tbody>
            {foreach $basic_rows as $basic_row}
                <tr>
                    {foreach $basic_row as $basic_value}
                        <td id="{$basic_value@key}" name="data_basic_row"
                            {if $basic_value@key == id} style="padding-top:12px;width:20px;"{/if}
                            {if $basic_value@key == date} style="padding-top:13px;width:15%;"{/if}
                            {if $basic_value@key == name} style="padding-top:12px;width:10%;"{/if}
                            {if $basic_value@key == content} style="padding-top:12px;width:60%;"{/if}>
                            {$basic_value}
                        </td>
                    {/foreach}
                    <td>
                        <span class="table-basic-button" name="delete_button" onClick="delete_row({$basic_row.id})"><i id="delete" class="fa fa-trash" title="Delete"></i></span>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    {/if}
</table>

{if isset($empty_rows)}
    <div class="no-comments-present active-elem">
        <p> {$empty_rows} </p>
    </div>
{/if}
