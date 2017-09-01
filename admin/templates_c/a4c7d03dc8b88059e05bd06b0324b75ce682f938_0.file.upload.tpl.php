<?php
/* Smarty version 3.1.30, created on 2017-08-08 10:33:11
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/upload.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598977476a3035_71716353',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4c7d03dc8b88059e05bd06b0324b75ce682f938' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/upload.tpl',
      1 => 1500643999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598977476a3035_71716353 (Smarty_Internal_Template $_smarty_tpl) {
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
