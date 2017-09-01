
<!-- Article Content -->
<article>
    <div class="row">
        <div class="hide-elem">
            <input id="article_id" type="hidden" value="{$id}"/>
        </div>
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            {$content}

        </div>
        <div class="col-lg-10 col-lg-offset-1 col-md-12 col-md-offset-1">
            <hr class="article-footer-divider">
            <span class="article-footer-desc">
                in
                <a class="category-field-set" href="category-tag.php?section=category&name={$category}">
                    <b>{$category}</b>
                </a>
                tagged by
            </span>
            {foreach $tags as $tag}
                <a class="field-tag-set" href="category-tag.php?section=tag&name={$tag}">
                    <span> {$tag} </span>
                </a>
            {/foreach}
            <span class="comment-link pull-right">
                <a id="comment_link" href="#" onClick="show_comments(event)"> Show comments <i class="fa fa-comments-o"></i> (<span id="count_comments">{$num_comments}</span>) </a>
                <input id="number_of_comments" type="hidden" value="{$num_comments}"/>
            </span>
        </div>
    </div>
    </br>

</article>
