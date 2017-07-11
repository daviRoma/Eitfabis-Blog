
<!-- Category piece -->
{foreach $categories as $category}
    <div class="col-lg-3 col-md-4 col-xs-6">
        <a class="category-box" href="?section=category&name={$category.name}" title="{$category.name}" onClick="go_to_articles(this, event)">
            <img class="img-responsive" src="{$category.background}" alt="">
            <span>
                <strong>{$category.name}</strong>
                <small>{$category.description}</small>
            </span>
        </a>
    </div>
{/foreach}
