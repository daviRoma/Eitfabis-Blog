<?php
/* Smarty version 3.1.30, created on 2017-07-20 22:27:02
  from "/Users/Davide/Desktop/Eitfabis-Blog/templates/user-section.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59711216a57ca6_81789809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bebdb81065ed45212c619f2c9bf3f2476949f77e' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/templates/user-section.tpl',
      1 => 1492794524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59711216a57ca6_81789809 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!-- User piece -->
<div class="row">

    <!-- Profile Image -->
    <div class="col-lg-4 col-md-5">
        <img class="profile-user-img img-responsive img-circle center-block" src="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_img'];?>
">
    </div>

    <div class="col-lg-8 col-md-10">
        <!-- Username -->
        <h3 class="profile-username"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</h3>
        <hr class="field-divider" style="border-color: #000;">

        <!-- Employment -->
        <div class="col-md-11">
            <strong><i class="fa fa-file"></i> Employment</strong>
            <p class="text-muted user-field-section"><?php echo $_smarty_tpl->tpl_vars['user']->value['employment'];?>
</p>
            <hr class="field-divider">
        </div>

        <!-- Brief description -->
        <div class="col-md-11">
            <strong><i class="fa fa-book"></i> About me</strong>
            <p class="text-muted user-field-section">
                <?php echo $_smarty_tpl->tpl_vars['user']->value['brief_description'];?>

            </p>
            <hr class="field-divider">
        </div>

        <!-- Country -->
        <div class="col-md-11">
            <strong><i class="fa fa-flag"></i> Country</strong>
            <p class="text-muted user-field-section"><?php echo $_smarty_tpl->tpl_vars['user']->value['country'];?>
 </p>
            <hr class="field-divider">
        </div>

        <!-- Link -->
        <div class="col-md-11">
            <strong><i class="fa fa-link"></i> Link</strong> </br>
            <span class="text-muted user-field-section">

            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['links'])) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['user']->value['links'][0])) {?>
                    <a class="fa fa-github user-link" href="<?php echo $_smarty_tpl->tpl_vars['user']->value['links'][0];?>
" target=”_blank”></a>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['user']->value['links'][1])) {?>
                    <a class="fa fa-dropbox user-link" href="<?php echo $_smarty_tpl->tpl_vars['user']->value['links'][1];?>
" target=”_blank”></a>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['user']->value['links'][2])) {?>
                    <a class="fa fa-linkedin user-link" href="<?php echo $_smarty_tpl->tpl_vars['user']->value['links'][2];?>
" target=”_blank”></a>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['user']->value['links'][3])) {?>
                    <a class="fa fa-facebook user-link" href="<?php echo $_smarty_tpl->tpl_vars['user']->value['links'][3];?>
" target=”_blank”></a>
                <?php }?>
            <?php } else { ?>
                <span class="text-muted user-field-section"> No available links for this user </span>
            <?php }?>

            </span>
            <hr class="field-divider">
        </div>
    </div>
</div>
<?php }
}
