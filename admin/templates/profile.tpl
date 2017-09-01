<!-- Admin profile page -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Report <small>Activity and info</small></h2>
                {if isset($error)}<h2 id="error_field" class="pull-right"><small class="error-field">{$error}</small></h2>{/if}
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="controllers/profile_service.php" method="POST">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div class="profile-box" id="crop-avatar" title="Avatar">
                                <img id="avatar_img" class="img-responsive avatar-view" src="../{$user.img_address}" alt="Avatar" title="Change the avatar">
                                <img id="avatar_fake" src="" style="display:none;">
                                <span>
                                    <i id="upload_avatar" class="fa fa-cloud-upload"></i>
                                </span>
                            </div>
                            <input id="avatar_file" type="file" name="avatar_file" style="display: none;"/>
                        </div>
                        <h3>
                            <input id="username" name="setUsername" class="user-profile-field-read" value="{$username}" maxlength="32" style="width:220px;" readonly required/>
                        </h3>

                        <ul id="info_list" class="list-unstyled user_data">
                            <li>
                                &nbsp<i class="fa fa-map-marker user-profile-icon"></i>&nbsp
                                <input id="country" name="setCountry" class="user-profile-field-read" value="{$user.country}" readonly required/>
                            </li>
                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i>&nbsp
                                <input id="employment" name="setEmployment" class="user-profile-field-read" value="{$user.employment}" readonly required/>
                            </li>
                            <li>
                                <i class="fa fa-envelope user-profile-icon"></i>&nbsp
                                <input id="email" name="setEmail" class="user-profile-field-read" value="{$user.email}" readonly required/>
                            </li>
                            {if isset($user.link[0])}
                                <li class="m-top-xs" name="link">
                                    <i class="fa fa-github user-profile-icon"></i>
                                    <a href="{$user.link[0]}" target="_blank">&nbsp {$user.link[0]}</a>
                                    <input id="link_0" name="setLink_0" class="user-profile-field-write" value="{$user.link[0]}" type="hidden"/>
                                </li>
                            {/if}
                            {if isset($user.link[1])}
                                <li class="m-top-xs" name="link">
                                    <i class="fa fa-dropbox user-profile-icon"></i>
                                    <a href="{$user.link[1]}" target="_blank">&nbsp {$user.link[1]}</a>
                                    <input id="link_1" name="setLink_1" class="user-profile-field-write" value="{$user.link[1]}" type="hidden"/>
                                </li>
                            {/if}
                            {if isset($user.link[2])}
                                <li class="m-top-xs" name="link">
                                    <i class="fa fa-linkedin user-profile-icon"></i>
                                    <a href="{$user.link[2]}" target="_blank">&nbsp {$user.link[2]}</a>
                                    <input id="link_2" name="setLink_2" class="user-profile-field-write" value="{$user.link[2]}" type="hidden"/>
                                </li>
                            {/if}
                            {if isset($user.link[3])}
                                <li class="m-top-xs" name="link">
                                    <i class="fa fa-facebook user-profile-icon"></i>
                                    <a href="{$user.link[3]}" target="_blank">&nbsp {$user.link[3]}</a>
                                    <input id="link_3" name="setLink_3" class="user-profile-field-write" value="{$user.link[3]}" type="hidden"/>
                                </li>
                            {/if}
                        </ul>

                        </br>
                        <!-- Change password -->
                        <span id="change_pwd-link" class="change-pwd-link">
                            <i class="fa fa-user-secret"></i> &nbsp Change password
                        </span>
                        <div id="change_pwd-container" class="change-pwd-container">
                            <input id="pwd_cur_value" name="curr_pwd" class="user-profile-field-write" type="password" value="" placeholder="current password" style="display:none;"/>
                            <input id="pwd_new_value" name="new_pwd" class="user-profile-field-write" type="password" value="" placeholder="new password" style="display:none;"/>
                            <button id="pwd_submit" name="pwdSubmit" class="btn btn-primary btn-sm" style="height:25px;width:75px;padding:0px;display:none;"><i class="fa fa-check"></i>&nbsp Confirm</button>
                        </div>

                        <hr style="margin-top:5px;">
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
                                            {foreach $articles as $article}
                                                <tr>
                                                    <td style="color:#b30000;">{$article.id}</td>
                                                    <td style="color:#000;">{$article.title}</td>
                                                    <td style="color:#00b300; font-weight:bold;">{$article.category}</td>
                                                    <td>{$article.tags}</td>
                                                    <td style="width:12%; margin-right:5px; color:#476b6b;">{$article.date}</td>
                                                </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                    <!-- end user projects -->
                                </div>
                                <!-- Information -->
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                                    <p id="description_0" class="user-profile-field-about-read">
                                        {$user.brief_description}
                                    </p>
                                    <textarea id="description_1" name="setBriefDescription" rows="5" cols="100" class="user-profile-field-about-write" style="display:none;">{$user.brief_description}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
