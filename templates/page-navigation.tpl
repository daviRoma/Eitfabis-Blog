<!-- Footer: Browse the articles list, tag list or pictures-->

{if isset($articles)}
    <ul class="pager">
        {if isset($subPosition)}
            <input id="subPosition" name="{$subPosition}" value="{$subPosition}" type="hidden"/>
        {/if}
        <li id="next_page" class="next" {if !$nextPage_style} style="display:none;" {else} style="display:block;" {/if} onClick="go_next(event)">
            <a href="?{if isset($option)}{$option}{/if}currentPage={$page_set+1}">{$next} &nbsp<i class="glyphicon glyphicon-arrow-right"></i></a>
        </li>
        <li id="previous_page" class="previous" {if !$previousPage_style} style="display:none;" {else} style="display:block;" {/if} onClick="go_back(event)">
            <a href="?{if isset($option)}{$option}{/if}currentPage={$page_set-1}"><i class="glyphicon glyphicon-arrow-left"></i>&nbsp {$back}</a>
        </li>
    </ul>

    <input type="hidden" name="current_page" value="{$current_page}" id="current_page"/>
    <p class="text-center pager-label"> Page {$current_page} of {$page_limit} </p>
    <input type="hidden" name="page_limit" value="{$page_limit}" id="page_limit"/>
{else}
    <ul class="pager-other">
        <li id="back_page" {if !$backPage_style} class="next-back-button hide-button" {else} class="next-back-button active-elem" {/if} onClick="backPage(event)">
            <a href="?{if isset($option)}{$option}{/if}currentPage={$page_set-1}">
                <b>BACK</b>
            </a>
        </li>
        <li>
            <input id="current_page" type="hidden" name="current_page" value="{$current_page}" />
            <span>{$current_page} of {$page_limit}</span>
        </li>
        <li id="next_page" {if !$nextPage_style} class="next-back-button hide-button" {else} class="next-back-button active-elem" {/if} onClick="nextPage(event)">
            <a href="?{if isset($option)}{$option}{/if}currentPage={$page_set+1}">
                <b>NEXT</b>
            </a>
        </li>
    </ul>
{/if}
