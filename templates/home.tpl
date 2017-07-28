
<!-- Main content: Home page that contains the articles list -->
<div class="row" id="articles" {if isset($home_style)}{$home_style}{/if}>
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        {foreach $articles as $article}
            {include $list_of_articles}
            <hr style="margin-bottom:50px;">
        {/foreach}

        {include $page_navigation}
    </div>
</div>
