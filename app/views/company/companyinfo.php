<?php if (null!==$this->session->flashdata('message')) {
    $messageArray=$this->session->flashdata('message');
    $message=$messageArray['message'];
} ?>
<?php if(isset($record)): ?>


<!-- <img scr="<?php // echo $upload_data['full_path'];?>"> -->
<div class="col-sm-10">
    <div class="row">
        <div class="col-sm-12">
            <?php if (!empty($message)) {
                echo '<div class="alert alert-success">'
                    . $message . '</div>';
            }?>
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"><span class="glyphicon glyphicon-info-sign"
                                                                            aria-hidden="true"></span>

                        <p><?php echo lang('heading'); ?></p>

                        <p class="text-right"
                           id="userbtn"><?php echo anchor("company/changelogo/", lang('update_logo_btn'), 'class="btn btn-xs btn-success"'); ?>
                            |
                            <?php echo anchor('taxtype', lang('tax_setting_btn'), 'class="btn btn-info btn-xs"') ?>
                        </p>
                    </div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <?php echo form_open('#', 'class="form-horizontal" role="form"'); ?>

                    <div class="form-group">
                        <label for="name" class="control-label col-xs-5"><?php echo lang('name_label'); ?>*</label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['name']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="attn_name" class="control-label col-xs-5"><?php echo lang('attn_label'); ?>*</label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['attn_name']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address1" class="control-label col-xs-5"><?php echo lang('address1_label'); ?>
                            *</label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['address1']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address2"
                               class="control-label col-xs-5"><?php echo lang('address2_label'); ?></label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['address2']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="control-label col-xs-5"><?php echo lang('city_label'); ?>*</label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['city']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="state" class="control-label col-xs-5"><?php echo lang('state_label'); ?>*</label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['state']; ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country" class="control-label col-xs-5"><?php echo lang('country_label'); ?>
                            *</label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['country']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="postcode" class="control-label col-xs-5"><?php echo lang('postcode_label'); ?>*</label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['postcode']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label col-xs-5"><?php echo lang('email_label'); ?>*</label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['email']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="control-label col-xs-5"><?php echo lang('phone_label'); ?></label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['phone']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fax" class="control-label col-xs-5"><?php echo lang('fax_label'); ?></label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['fax']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="vat_no" class="control-label col-xs-5"><?php echo lang('vat_no_label'); ?></label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['VAT_no']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="registration_no"
                               class="control-label col-xs-5"><?php echo lang('registration_no_label'); ?></label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo $record['registration_no']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="footer_notes"
                               class="control-label col-xs-5"><?php echo lang('footer_notes_label'); ?></label>

                        <div class="col-xs-7">
                            <p class="form-control-static"><?php echo '<p>' . $record['footer_notes'] . '</p>'; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5"></div>
                        <?php echo anchor("company/update/","<i class='glyphicon glyphicon-edit'></i> ".lang('edit_btn'),'class="btn btn-success"') ;?>
                    </div>
                </div>

                <?php form_close(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>