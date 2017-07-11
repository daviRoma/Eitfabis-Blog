
<!-- Main Content: Search article -->
<div class="row" id="search_header">

    {if isset($error_message) || isset($success_message)}
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {include $notice_message}
        </div>
    {/if}

    <div id="show_form" class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <a class="show-form" href="#" onClick="display_search_form(event);">
                <span> New search </span>
                <i class="fa fa-arrow-down" id="temp"></i>
                <input id="form_display_status" type="hidden" name="form_display_status" value="down" />
            </a>
    </div>

    <div id="search_body" class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

        <div class="search-intro-section">
            <span>Start your article search by title, category and/or tag. </span></br>
            <span>You can insert at most one category and at most three tags. Tag separated by '@'.</span>
        </div>

        <form id="search_form" action="controllers/search_service.php" method="post" onSubmit="start_search(event)">
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Title</label>
                    <input id="s_title" type="text" name="title" class="form-control" placeholder="Insert title or keyword" >
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group in-line">
                <div class="form-group col-xs-5 floating-label-form-group controls pull-left">
                    <label>Category</label>
                    <input id="s_category" type="text" name="category" class="form-control" placeholder="Category">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group col-xs-6 floating-label-form-group controls pull-right">
                    <label>Tag</label>
                    <input id="s_tag" type="text" name="tag" class="form-control" placeholder="Tag">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="form-group col-xs-12">
                    <button id="search_start" type="submit" name="search" class="btn btn-default">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
{if isset($temp_option)}
    <input id="temp_option" name="{$temp_option}" value="{$temp_option}" type="hidden"/>
{/if}

{if isset($articles)}
    <hr>
    {include $home_page}
{/if}
