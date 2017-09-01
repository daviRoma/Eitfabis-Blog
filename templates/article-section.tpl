
<!-- Article piece -->
<div class="post-preview">
    <a href="article.php?title={$article.title}&id={$article.id}">
        <h2 class="post-title">
            {$article.title}
        </h2>
        <h3 class="post-subtitle">
            {$article.subtitle}
        </h3>
    </a>
    <span class="post-meta">Posted by <a href="about_us.php">{$article.author}</a> on {$article.date} - in</span>
    <span class="in-line">
        <a class="category-field-set" href="category-tag.php?section=category&name={$article.category}"> <b> {$article.category} </b> </a>
    </span>
    <span id="article_comment_link" class="comment-count-field pull-right"><i class="fa fa-comments-o"></i> ({$article.comments}) </span>
    </br>
    <div class="tag-divider in-line">
        {if isset($article.tags)}
            {foreach $article.tags as $tag}
                <a class="field-tag-set" href="category-tag.php?section=tag&name={$tag}">
                    <span > {$tag} </span>
                </a>
            {/foreach}
        {/if}
    </div>
</div>
