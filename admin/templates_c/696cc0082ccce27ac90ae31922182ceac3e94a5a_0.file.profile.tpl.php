<?php
/* Smarty version 3.1.30, created on 2017-07-13 14:01:10
  from "/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59676106a85c62_33567632',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '696cc0082ccce27ac90ae31922182ceac3e94a5a' => 
    array (
      0 => '/Users/Davide/Desktop/Eitfabis-Blog/admin/templates/profile.tpl',
      1 => 1499856923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59676106a85c62_33567632 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Admin profile page -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Report <small>Activity and info</small></h2>
                <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><h2 id="error_field" class="pull-right"><small class="error-field"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</small></h2><?php }?>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="controllers/profile_service.php" method="POST">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div class="profile-box" id="crop-avatar" title="Avatar">
                                <img id="avatar_img" class="img-responsive avatar-view" src="../<?php echo $_smarty_tpl->tpl_vars['user']->value['img_address'];?>
" alt="Avatar" title="Change the avatar">
                                <img id="avatar_fake" src="" style="display:none;">
                                <span>
                                    <i id="upload_avatar" class="fa fa-cloud-upload"></i>
                                </span>
                            </div>
                            <input id="avatar_file" type="file" name="avatar_file" style="display: none;"/>
                        </div>
                        <h3><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</h3>

                        <ul id="info_list" class="list-unstyled user_data">
                            <li>
                                &nbsp<i class="fa fa-map-marker user-profile-icon"></i>&nbsp
                                <input id="country" name="setCountry" class="user-profile-field-read" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['country'];?>
" readonly required/>
                            </li>
                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i>&nbsp
                                <input id="employment" name="setEmployment" class="user-profile-field-read" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['employment'];?>
" readonly required/>
                            </li>
                            <li>
                                <i class="fa fa-envelope user-profile-icon"></i>&nbsp
                                <input id="email" name="setEmail" class="user-profile-field-read" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" readonly required/>
                            </li>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['link'][0])) {?>
                                <li class="m-top-xs" name="link">
                                    <i class="fa fa-github user-profile-icon"></i>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['link'][0];?>
" target="_blank">&nbsp <?php echo $_smarty_tpl->tpl_vars['user']->value['link'][0];?>
</a>
                                    <input id="link_0" name="setLink_0" class="user-profile-field-write" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['link'][0];?>
" type="hidden"/>
                                </li>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['link'][1])) {?>
                                <li class="m-top-xs" name="link">
                                    <i class="fa fa-dropbox user-profile-icon"></i>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['link'][1];?>
" target="_blank">&nbsp <?php echo $_smarty_tpl->tpl_vars['user']->value['link'][1];?>
</a>
                                    <input id="link_1" name="setLink_1" class="user-profile-field-write" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['link'][1];?>
" type="hidden"/>
                                </li>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['link'][2])) {?>
                                <li class="m-top-xs" name="link">
                                    <i class="fa fa-linkedin user-profile-icon"></i>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['link'][2];?>
" target="_blank">&nbsp <?php echo $_smarty_tpl->tpl_vars['user']->value['link'][2];?>
</a>
                                    <input id="link_2" name="setLink_2" class="user-profile-field-write" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['link'][2];?>
" type="hidden"/>
                                </li>
                            <?php }?>
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['link'][3])) {?>
                                <li class="m-top-xs" name="link">
                                    <i class="fa fa-facebook user-profile-icon"></i>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['link'][3];?>
" target="_blank">&nbsp <?php echo $_smarty_tpl->tpl_vars['user']->value['link'][3];?>
</a>
                                    <input id="link_3" name="setLink_3" class="user-profile-field-write" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['link'][3];?>
" type="hidden"/>
                                </li>
                            <?php }?>
                        </ul>

                        </br>
                        <hr>
                        <!-- Edit and Submit -->
                        <a id="edit_profile" class="btn btn-warning"><i class="fa fa-edit m-right-xs"></i>&nbsp Edit</a>
                        <button id="send_user_info" name="profileSubmit" class="btn btn-success pull-right" type="submit" disabled><i class="fa fa-save m-right-xs"></i>&nbsp Save</button>
                        </br>
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">About Me</a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Articles</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    <!-- start user projects -->
                                    <table class="data table table-striped no-margin">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Tags</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
                                                <tr>
                                                    <td style="color:#b30000;"><?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
</td>
                                                    <td style="color:#000;"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</td>
                                                    <td style="color:#00b300; font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['article']->value['category'];?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['article']->value['tags'];?>
</td>
                                                    <td style="width:12%; margin-right:5px; color:#476b6b;"><?php echo $_smarty_tpl->tpl_vars['article']->value['date'];?>
</td>
                                                </tr>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        </tbody>
                                    </table>
                                    <!-- end user projects -->
                                </div>
                                <!-- Information -->
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                                    <p id="description_0" class="user-profile-field-about-read">
                                        <?php echo $_smarty_tpl->tpl_vars['user']->value['brief_description'];?>

                                    </p>
                                    <textarea id="description_1" name="setBriefDescription" rows="5" cols="100" class="user-profile-field-about-write" style="display:none;">
                                        <?php echo $_smarty_tpl->tpl_vars['user']->value['brief_description'];?>

                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php }
}
