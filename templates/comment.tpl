<!-- Comment section -->

<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">

    <div class="comment-container">
        <div id="" class="comment-header">
            <span> Write your comment &nbsp  </span>
            <i id="" class="fa fa-pencil"></i>
        </div>
        <div class="row control-group comment-field-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Name</label>
                <input id="c_name" type="text" name="name" class="form-control form-distance" placeholder="Name"  maxlength="32" autocomplete="off" required style="font-size:18px;"/>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="row control-group comment-field-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Comment</label>
                <textarea id="" rows="3" name="comment" class="form-control form-distance" placeholder="Comment" autocomplete="off" required style="font-size:18px;"></textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="form-group col-xs-12">
                <button id="send" type="submit" name="send" class="btn btn-default pull-right" onClick="">Send</button>
            </div>
        </div>
    </div>

    <hr class="comment-divider"/>

    {foreach $comments as $comment}
        <div class="comment-container">
            <div class="row control-group comment-field-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <input id="c_name" type="text" name="name" class="form-control form-distance" value="{$comment.name}" readonly style="font-size:18px;"/>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group comment-field-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <textarea id="c_message" name="content" class="form-control form-distance" readonly style="font-size:18px;">{$comment.content}</textarea>
                    <p class="help-block text-danger"></p>
                </div>
            </div>
        </div>
        <hr class="comment-divider"/>
    {/foreach}
</div>
