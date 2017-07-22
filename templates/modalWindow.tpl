
<!-- Modal window for gallery images -->
<div id="image_modal" class="modal">
    <div class="modal-content">

        <div class="modal-body">
            <input id="temp_key" name="{$picture_key}" value="{$picture_key}" type="hidden"/>
            <i id="previous_picture" class="fa fa-chevron-left" onClick="backModalPicture(event)"/>
            <img class="img-responsive" src="{$image}" alt="" data-toggle="modal" date-target="#image_modal">
            <i id="next_picture" class="fa fa-chevron-right" onClick="nextModalPicture(event)"/>
            <span>{$name}</span> </br>
            <p>{$description}</p>
        </div>

        <div class="modal-footer">
            <span>
                <strong>From:</strong>
                {if $article_id != ""}
                    <a href="article.php?title={$article_title}&id={$article_id}" alt="">{$article_title}</a>
                {else}
                    <a href="index.php" alt="">{$article_title}</a>
                {/if}
            </span>
        </div>

    </div>
</div>
