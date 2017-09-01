
<!-- Main Content: List of categories or tags -->
<div class="row" id="catEtag_row">

    <div id="catEtag_header" class="col-lg-12 col-md-12 col-xs-12">

        {if isset($category) || isset($tag)}
            <div class="col-lg-3 col-md-3 col-xs-3">
                <div class="catEtag-header-back">
                    {if isset($temp_section)}
                        <input id="temp_section" name="{$temp_section}" value="{$temp_section}" type="hidden"/>
                    {/if}
                    <a href="?section={$section}" title="{$section}" onClick="turn_back_to_section(this,event)"><i class="fa fa-arrow-left"></i></a>
                </div>
            </div>

            {if isset($category)}
                <div class="col-lg-6 col-md-6 col-xs-6">
                    <div class="category-header text-center">
                        <img class="img-responsive" src="{$category.background}" alt="">
                        <input id="temp_option" name="{$category.name}" value="{$category.name}" type="hidden"/>
                        <h1>{$category.name}</h1>
                        <span>{$category.description}</span>
                    </div>
                </div>
            {else}
                <div class="col-lg-6 col-md-6 col-xs-6">
                    <div class="tag-header text-center">
                        <input id="temp_option" name="{$tag.name}" value="{$tag.name}" type="hidden"/>
                        <h1><i class="fa fa-tag" style="color:#264d73;"></i> &nbsp{$tag.label}</h1>
                        <span>{$tag.description}</span>
                    </div>
                </div>
            {/if}

        {else}

            <div class="navbar-category-tag">
                <ul class="navbar-button-left" type="none">
                    <li id="category" class="navbar-elem" {if isset($categoryLink_style)}{$categoryLink_style}{/if} onClick="show_categories(event)">
                        <input id="temp_link_category" name="category" value="category" type="hidden"/>
                        <a class="elem-link" href="category-tag.php?section=category">
                            Category
                        </a>
                    </li>
                    <li id="tag" class="navbar-elem" {if isset($tagLink_style)}{$tagLink_style}{/if} onClick="show_tags(event, 1)">
                        <input id="temp_link_tag" name="tag" value="tag" type="hidden"/>
                        <a class="elem-link" href="category-tag.php?section=tag">
                            Tag
                        </a>
                    </li>
                </ul>

                <!-- Real time search -->
                <ul id="realTimeSearch" class="navbar-search-right" type="none">
                    <li class="navbar-search-elem">
                        <form class="mini-search-form" action="" method="post">
                            <div class="col-xs-10 ">
                                <input class="mini-search" id="catEtag_search" name="search" type="text" onkeyup="real_time()" placeholder="">
                            </div>
                        </form>
                    </li>
                </ul>
                <input id="current_section" type="hidden" value="{$current_section}"/>
            </div>
        {/if}

    </div>
    <!-- /Row Header -->

    <div id="hr_divider" class="col-lg-12">
        <hr>
    </div>

    {if isset($categories) || isset($tags)}
        <div id="catEtag_container" class="col-lg-12 col-md-12 col-xs-12">
            {if isset($categories)}
                {include $list_of_categories}
            {else}
                {include $list_of_tags}
            {/if}
        </div>
        <div class="col-lg-12">
            <hr>
        </div>
    {/if}

</div>
<!-- /Row -->

{if isset($articles)}
    {include $home_page}
{/if}
