<?php
/* Smarty version 3.1.30, created on 2017-06-05 17:14:49
  from "/Users/Davide/Desktop/Blog/admin/templates/modalPreview.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593575698eb365_25598036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '04387e58e1bca3b34055609042be309f76d1274e' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/admin/templates/modalPreview.tpl',
      1 => 1496675492,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593575698eb365_25598036 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Modal window for edit tables row -->
<div id="previewModal" class="modal-preview">
    <div class="modal-content-preview">
        <div class="modal-body-preview">
            <header>
                <div class="row">
                    <div class="col-md-12 box-img">
                        <img class="img-responsive" src="../<?php echo $_smarty_tpl->tpl_vars['background']->value;?>
">
                        <div class="box-txt-hover">
                            <h1 class="txt-hover"><strong><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</strong></h1>
                            <hr class="small">
                            <span class="txt-hover"><?php echo $_smarty_tpl->tpl_vars['subtitle']->value;?>
</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="preview-container" id="modalPreview-content">
                <?php echo $_smarty_tpl->tpl_vars['preview_content']->value;?>

            </div>
        </div>
        <div class="modal-footer-preview">
            <hr style="margin-bottom: 13px;">
            <div class="footer-mailchimp">
                <div class="container text-center">
                    <h2>Want more from 24CinL?</h2>
                    <h5>Subscribe to our mailing list to receive an update when new items arrive!</h5>
                    <div class="col-md-6 col-md-offset-3">
                        <div class="input-group input-group-lg">
                            <input id="email" type="email" name="email" class="form-control" placeholder="Email address...">
                            <span class="input-group-btn">
                                <button name="subscribe" class="btn btn-primary">Subscribe!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
