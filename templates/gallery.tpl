
<!-- Main Content: Photo gallery -->
<div class="row" id="gallery_container">

    <div class="col-lg-12 col-md-12 col-xs-12">
        <hr style="margin-top: -15px;">
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="pictures-container">
            {foreach $pictures as $picture}
                <div id="picture" class="picture-box" title="{$picture.name}" data-toggle="tooltip" onClick="showModal({$picture@key}, event)">
                    <img class="img-responsive" src="{$picture.image}" alt="">
                </div>
            {/foreach}
        </div>
    </div>
    </br>
    <div class="col-lg-12" style="margin-left:12px;">
        {include $page_navigation}
    </div>
</div>
