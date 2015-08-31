<div class='panel panel-default'>
  <div class='panel-heading'>
    <i class='icon-plus icon-large'></i> <?php echo lang('heading_add');?>
    </div>
  <div class='panel-body'>
     <?php echo form_open('products/add', 'id="form" class="form-horizontal" role="form"');?>
     <div class="form-group">
      <label for="name" class="control-label sr_only col-md-3"><?php echo lang('name_label');?></label>
      <div class="col-md-7">
       <?php echo form_input('name', set_value('name'), 'id="name" class="form-control"' . 'placeholder=' . '"' . lang('placeholder_name') . '"' . "'");?>
       <?php echo form_error('name');?>
     </div>
   </div>
  <div class="form-group">
    <label for="price" class="control-label sr_only col-md-3"><?php echo lang('price_label');?></label>
    <div class="col-md-7">
     <?php echo form_input('price', set_value('price'), 'id="price" class="form-control"' . 'placeholder=' . '"' . lang('placeholder_price') . '"' . "'");?>
     <?php echo form_error('price');?>
   </div>
 </div>
 <div class="form-group">
  <label for="notes" class="control-label sr_only col-md-3"><?php echo lang('notes_label');?></label>
  <div class="col-md-7">
    <?php echo form_input('notes', set_value('notes'), 'id="notes" class="form-control"' . 'placeholder=' . '"' . lang('placeholder_notes') . '"' . "'");?>
    <?php echo form_error('notes');?>
  </div>
</div>
<button type="submit" class="col-md-offset-3 btn btn-primary"><?php echo lang('create_btn');?></button>
<?php form_close();?>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#form').validate(
    {
      rules: {
        name: {
          minlength: 2,
          required: true
        },
        price: {
          minlength: 1,
          required: true,
          number: true
        },
      }
    });
  });
</script>