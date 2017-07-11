
<!-- Main Content: Form to contact the staff -->
<div class="row" id="contact_content">

    {if isset($error_message) || isset($success_message)}

        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {include $notice_message}
        </div>

    {else}

        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p>Want to get in touch with us? Fill out the form below to send us a message and we will try to get back to you within 24 hours!</p>

            <form id="contact_staff" action="controllers/contact_service.php" method="post" name="sentMessage">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Name</label>
                        <input id="c_name" type="text" name="name" class="form-control form-distance" placeholder="Name"  autocomplete="off" required data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Email Address</label>
                        <input id="c_email" type="email" name="email" class="form-control form-distance" placeholder="Email Address" autocomplete="off" required data-validation-required-message="Please enter your email address.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Message</label>
                        <textarea id="c_message" rows="5" name="message" class="form-control form-distance" placeholder="Message" autocomplete="off" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                </br>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button id="send" type="submit" name="send" class="btn btn-default" onClick="">Send</button>
                    </div>
                </div>
            </form>
        </div>
    {/if}
</div>
