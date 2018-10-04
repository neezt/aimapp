<!-- flag icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/icons/flags/flags.min.css" media="all">

<div id="page_content">
        <div id="page_content_inner">
            <form action="" class="uk-form-stacked" id="user_edit_form">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-7-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                <input type="hidden" id="codehash" value="<?=$user[0]->code ?>">
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="<?php echo base_url();?>assets/img/voluntaries/<?=$user[0]->picture ?>" id="userAvatar" alt="user avatar"/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="user_edit_avatar_control" id="user_edit_avatar_control">
                                        </span>
                                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                    </div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"><?=$user[0]->name ?></span><span class="sub-heading" id="user_edit_position"><?=$user[0]->deparment ?></span></h2>
                                </div>
                                <div class="md-fab-wrapper">
                                    <div class="md-fab md-fab-toolbar md-fab-small md-fab-accent">
                                        <i class="material-icons">&#xE8BE;</i>
                                        <div class="md-fab-toolbar-actions">
                                            <button type="submit" id="user_edit_save" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Save"><i class="material-icons md-color-white">&#xE161;</i></button>
                                            <button type="button" id="user_print" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Print"><i class="material-icons md-color-white">&#xE555;</i></button>
                                            <button type="submit" id="user_edit_delete" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Delete"><i class="material-icons md-color-white">&#xE872;</i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="user_content">
                                <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                    <li class="uk-active"><a href="#">Basic</a></li>
                                    
                                </ul>
                                <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                    <li>
                                        <div class="uk-margin-top">
                                            <h3 class="full_width_in_card heading_c">
                                                Informaci&oacute;n General
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_uname_control">Nombre</label>
                                                    <input class="md-input" type="text" id="user_edit_uname_control" name="user_edit_uname_control" />
                                                </div>
                                                <div class="uk-width-medium-1-2">
                                                    <label for="user_edit_position_control">Departamento</label>
                                                    <input class="md-input" type="text" id="user_edit_position_control" name="user_edit_position_control" />
                                                </div>
                                            </div>
                                            <div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <label for="user_edit_personal_info_control">Sobre él</label>
                                                    <textarea class="md-input" name="user_edit_personal_info_control" id="user_edit_personal_info_control" cols="30" rows="4">Quis vero quia distinctio aut distinctio labore sed qui qui sint id atque officia dolorem nulla minus a quam qui incidunt inventore et quis nostrum asperiores non ducimus neque libero occaecati ullam rerum aut hic non adipisci quaerat dolore illo commodi cupiditate excepturi et quibusdam magni autem magni occaecati.</textarea>
                                                </div>
                                            </div>
                                            <h3 class="full_width_in_card heading_c">
                                                Idiomas
                                            </h3>
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-1-1">
                                                    <select id="user_edit_languages" name="user_edit_languages" multiple>
                                                        <option value="gb" selected>English</option>
                                                        <option value="pl" selected>Polish</option>
                                                        <option value="fr" selected>French</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <h3 class="full_width_in_card heading_c">
                                                Contacto
                                            </h3>
                                            <div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                                </span>
                                                                <label>Email</label>
                                                                <input type="text" class="md-input" name="user_edit_email" value="imayert@hotmail.com" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                                </span>
                                                                <label>Phone Number</label>
                                                                <input type="text" class="md-input" name="user_edit_phone" value="586.633.0760" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon uk-icon-facebook-official"></i>
                                                                </span>
                                                                <label>Facebook</label>
                                                                <input type="text" class="md-input" name="user_edit_facebook" value="facebook.com/envato" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon uk-icon-twitter"></i>
                                                                </span>
                                                                <label>Twitter</label>
                                                                <input type="text" class="md-input" name="user_edit_twitter" value="twitter.com/envato" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon uk-icon-linkedin"></i>
                                                                </span>
                                                                <label>Linkdin</label>
                                                                <input type="text" class="md-input" name="user_edit_linkdin" value="linkedin.com/company/envato" />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="md-list-addon-icon uk-icon-google-plus"></i>
                                                                </span>
                                                                <label>Google+</label>
                                                                <input type="text" class="md-input" name="user_edit_google_plus" value="plus.google.com/+envato/about" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-3-10">
                        <div class="md-card">
                            <div class="md-card-content">
                                <h3 class="heading_c uk-margin-medium-bottom">Other settings</h3>
                                <div class="uk-form-row">
                                    <input type="checkbox" checked data-switchery id="user_edit_active" />
                                    <label for="user_edit_active" class="inline-label">User Active</label>
                                </div>
                                <hr class="md-hr">
                                <div class="uk-form-row">
                                    <label class="uk-form-label" for="user_edit_role">User Role</label>
                                    <select data-md-selectize>
                                        <option value="">Select...</option>
                                        <option value="admin">Admin</option>
                                        <option value="super_admin">Super Admin</option>
                                        <option value="editor" selected>Editor</option>
                                        <option value="author">Author</option>
                                        <option value="none">None</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <!-- common functions -->

    <script src="<?php echo base_url();?>assets/js/common.min.js"></script>

    <!-- uikit functions -->
    <script src="<?php echo base_url();?>assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url();?>assets/js/altair_admin_common.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom/uikit_fileinput.min.js"></script>
    <!--  user edit functions -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/pages/page_user_edit.min.js"></script>
