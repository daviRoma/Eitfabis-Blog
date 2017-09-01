<!-- Comment body -->
{foreach $comments as $comment}
    <div id="comment_section" name="a_comment" class="comment-container">
        <div class="comment-field-group">
            <div class="comment-content-name">
                <span id="com_name" type="text" name="name">{$comment.name}</span>
            </div>
            <div class="comment-content-text">
                <p id="c_content" name="content">{$comment.content}</p>
            </div>
            <div class="comment-date">
                <small id="c_date" name="date">{$comment.date}</small>
            </div>
        </div>
    </div>
{/foreach}
    <div class="hide-elem" name="scroll_comments">
        <input id="comments_page_limit" type="hidden" value="{$comments_page_limit}"/>
    </div>
