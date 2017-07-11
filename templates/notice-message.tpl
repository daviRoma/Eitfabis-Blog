<!-- Message: Error -->
<div id="error" class="col-lg-12 col-md-12 col-xs-12" {if !isset($error_message)}style="display:none;"{/if}>
    <div class="error-label text-center">
        <strong class="fa fa-times"> Error! </strong>
        <span id="error_message">{$error_message}</span>
        <hr>
    </div>
</div>

<!-- Message: Success -->
<div id="success" class="col-lg-12 col-md-12 col-xs-12" {if !isset($success_message)}style="display:none;"{/if}>
    <div class="success-label text-center">
        <strong class="fa fa-check"> Success! </strong>
        <span id="success_message">{$success_message}</span>
        <hr>
    </div>
</div>
