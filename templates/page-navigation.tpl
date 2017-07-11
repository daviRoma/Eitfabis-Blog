
<!-- Footer: Browse the articles list-->
{if isset($articles)}
    <ul class="pager">
        {if isset($subPosition)}
            <input id="subPosition" name="{$subPosition}" value="{$subPosition}" type="hidden"/>
        {/if}
        <li class="next" id="next_page" onClick="go_next(event)" {if isset($nextPage_style)}{$nextPage_style}{/if}>
            <a href="?{if isset($option)}{$option}{/if}currentPage={$page_set+1}">{$next} &nbsp<i class="glyphicon glyphicon-arrow-right"></i></a>
        </li>
        <li class="previous" id="previous_page" onClick="go_back(event)" {if isset($previousPage_style)}{$previousPage_style}{/if}>
            <a href="?{if isset($option)}{$option}{/if}currentPage={$page_set-1}"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp {$back}</a>
        </li>
    </ul>

    <input type="hidden" name="current_page" value="{$current_page}" id="current_page"/>
    <p class="text-center pager-label"> Page {$current_page} of {$page_limit} </p>
    <input type="hidden" name="page_limit" value="{$page_limit}" id="page_limit"/>
{else}
    <ul class="pager-other">
        <li class="nextBack-button" onClick="backPage(event)" {if isset($backPage_style)}{$backPage_style}{/if}>
            <a href="?{if isset($option)}{$option}{/if}currentPage={$page_set-1}">
                <b>BACK</b>
            </a>
        </li>
        <li>
            <input id="current_page" type="hidden" name="current_page" value="{$current_page}" />
            <span>{$current_page} of {$page_limit}</span>
        </li>
        <li class="nextBack-button" onClick="nextPage(event)" {if isset($nextPage_style)}{$nextPage_style}{/if}>
            <a href="?{if isset($option)}{$option}{/if}currentPage={$page_set+1}">
                <b>NEXT</b>
            </a>
        </li>
    </ul>
{/if}
