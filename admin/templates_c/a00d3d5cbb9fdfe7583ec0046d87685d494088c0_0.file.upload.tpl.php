<?php
/* Smarty version 3.1.30, created on 2017-07-07 17:38:23
  from "/Users/Davide/Desktop/Blog/admin/templates/upload.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595faaef482d68_56144299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a00d3d5cbb9fdfe7583ec0046d87685d494088c0' => 
    array (
      0 => '/Users/Davide/Desktop/Blog/admin/templates/upload.tpl',
      1 => 1499441902,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595faaef482d68_56144299 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Upload page -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dropzone</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>Drag multiple files to the box below for multi upload or click to select files. With the button placed at the bottom of the page, you perform the upload.</p>
                <form action="controllers/upload_service.php" method="POST" class="dropzone">
                    <button id="uploader" name="uploader" class="btn btn-primary btn-upload" type="submit">Upload</button>
                </form>
                <br />
                <br />
                <br />
                <br />
            </div>
        </div>
    </div>
</div>
<?php }
}
