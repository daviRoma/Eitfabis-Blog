
<!-- Tag piece -->
{foreach $tags as $tag}
    <div class="tag-container">
        <a class="tag-box" href="?section=tag&name={$tag.label}" title="{$tag.label}" onClick="go_to_articles(this, event)">
            <span class="fa fa-tag">&nbsp
                {$tag.label}
            </span></br>
            <i> {$tag.description} </i>
        </a>
    </div>
{/foreach}
</br>
<div class="col-lg-12">
    {include $page_navigation}
</div>
