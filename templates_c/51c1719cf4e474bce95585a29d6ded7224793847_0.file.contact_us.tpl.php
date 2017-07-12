<?php
/* Smarty version 3.1.30, created on 2017-07-12 15:21:46
  from "/Users/Davide/Desktop/Blog/templates/contact_us.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5966226ae3af14_75486071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51c1719cf4e474bce95585a29d6ded7224793847' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/templates/contact_us.tpl',
      1 => 1492794120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5966226ae3af14_75486071 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- Main Content: Form to contact the staff -->
<div class="row" id="contact_content">

    <?php if (isset($_smarty_tpl->tpl_vars['error_message']->value) || isset($_smarty_tpl->tpl_vars['success_message']->value)) {?>

        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['notice_message']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </div>

    <?php } else { ?>

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
    <?php }?>
</div>
<?php }
}
