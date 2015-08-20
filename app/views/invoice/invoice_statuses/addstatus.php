<!-- <img scr="<?php// echo $upload_data['full_path'];?>"> -->
 <div class="col-sm-10">
    <div class="row">
        <div class="col-sm-12">
        <?php if(!empty($message)) {
        echo '<div class="alert alert-success">'
        .$message.'</div>';}?>
  <div class="panel panel-default bootstrap-admin-no-table-panel">
    <div class="panel-heading">
      <div class="panel-heading">
        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i><p class="mleft8"><?php echo lang('status_heading_add'); ?></p>
      </div>
  <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
     <?php  echo form_open('invoice/save_invoice_status','class="form-horizontal" id="form" role="form"');  ?>
            <div class="form-group">
              <label for="name" class="control-label sr_only col-md-3"><?php echo lang('status_name_label'); ?></label>
              <div class="col-md-7">
                  <?php echo form_input('name',set_value('name'), 'id="name" class="form-control"'.'placeholder='.'"'.lang('status_placeholder_name').'"'."'");?>
                  <?php echo form_error('name'); ?>
              </div>
            </div>
  <div class="checkbox">
    <div class="col-md-3 col-md-offset-3">
        <input type="checkbox" name="is_enable" checked value="1"><?php echo lang('status_is_enable_label'); ?>
      </div>
  </div>
  <div class="checkbox">
    <div class="col-md-3 col-md-offset-3">
    <input type="checkbox" name="is_default" value="0"><?php echo lang('status_is_default_label'); ?>
        </div>
      </div>
  </div>

            <button type="submit" class="col-md-offset-3 btn btn-primary"><?php echo lang('status_add_new_btn'); ?></button>
   <?php form_close(); ?>
</div>
</div>
</div>
</div>
</div>
<script>
  $(document).ready(function() {

    $('#form').validate(
      {
        rules: {
          name: {
            minlength: 2,
            required: true
          }
        }
      });
  });

</script>