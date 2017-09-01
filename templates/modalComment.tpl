<!-- Modal window for list of comments -->
<div id="modal_comment" class="modal-comment">

    <div class="modal-content-comments">
        <div class="modal-body-comments">
            <div id="comment_header" class="modal-comment-header">
                <span> Comments </span>
            </div>
            <!-- Comment List -->
            <hr class="comment-divider">
            <div id="c_container">
                {if isset($comments)}
                    <div id="comments_list">
                        {include $comment_body}
                    </div>
                {else}
                    <div id="no_comments" class="modal-no-comment-header">
                        <span> No comment present </span>
                    </div>
                {/if}
            </div>
            <!-- /Comment List -->

            <div id="more_comments" {if $comments_page_limit > 1} class="comment-show-more active-elem" {else} class="comment-show-more hide-elem" {/if}>
                <a id="show_more_comments" href="#" onClick="show_more_comments(event)"> &nbsp Show more &nbsp </a>
                </br><i class="fa fa-sort-down"></i>
                <input id="comments_current_page" type="hidden" value="1"/>
            </div>

            <!-- Comment Form -->
            <div id="comment_form" class="write-comment-container">
                <div id="" class="comment-header-write">
                    <span> Write your comment &nbsp  </span>
                    <i class="fa fa-pencil"></i>
                </div>
                <div class="row control-group comment-field-group">
                    <div class="form-group col-xs-11 floating-label-form-group controls">
                        <label>Name</label>
                        <input id="v_name" type="text" name="name" class="form-control form-distance" placeholder="Name"  maxlength="32" autocomplete="off" required style="font-size:18px;"/>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group comment-field-group">
                    <div class="form-group col-xs-11 floating-label-form-group controls">
                        <label>Comment</label>
                        <textarea id="v_comment" rows="3" name="comment" class="form-control form-distance" placeholder="Comment" maxlength="500" autocomplete="off" required style="font-size:18px;"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="form-group pull-right" style="margin-right:40px;">
                        <button id="v_public" type="submit" name="public" class="btn btn-default" onClick="add_comment(event)">Public</button>
                    </div>
                </div>
            </div>
            <!-- Comment Form -->
        </div>
    </div>
</div>
