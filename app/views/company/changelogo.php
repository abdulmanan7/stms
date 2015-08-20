<?php if (null!==$this->session->flashdata('message')) {
    $messageArray=$this->session->flashdata('message');
    $message=$messageArray['message'];
} ?>
<?php if(!isset($record)){echo "No Record ";} ?>

<!-- <img scr="<?php // echo $upload_data['full_path'];?>"> -->
<div class="col-sm-10">
    <div class="row">
        <div class="col-sm-12">
            <?php if(!empty($message)) {
                echo '<div class="alert alert-danger">'
                    .$message.'</div>';}?>
            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span><?php echo lang('heading_change_logo');?></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <?php  echo form_open_multipart('company/do_upload','class="form-horizontal" role="form"');  ?>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <a href="#"><img src="<?php echo base_url();echo $record['logo']; ?>"></a>
                        </div>
                        <div class="col-sm-8">
                                <div class="form-group">
                                    <span class="add-on"><i class="icon-envelope"></i></span>
                                    <span class="help-block">Supported Files jpg,gif,png,jpeg<br/>File size must not be greater then 200kb.</span>
                                    <?php echo form_upload('logo', $record['logo'], 'id="logo" class="form-control upload"'.'placeholder='.'"'.lang('placeholder_logo').'"'."'");?>
                                    <?php echo form_error('logo'); ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-upload"></i><?php echo lang('update_btn');?></button>
                                </div>
                            </div>
                    </div>
                    <?php form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>