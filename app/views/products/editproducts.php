            <h3 class="page-header">
             <i class="icon-edit" aria-hidden="true"></i> <?php echo lang('heading_update');?>
           </h3>
         <!-- /.col -->
           <?php echo form_open('products/update/' . $product['id'], 'id="form" class="form-horizontal" role="form"');?>
           <div class="form-group">
            <label for="name" class="control-label sr_only col-md-3"><?php echo lang('name_label');?></label>
            <div class="col-md-7">
             <?php echo form_input('name', $product['name'], 'id="name" class="form-control"' . 'placeholder=' . '"' . lang('placeholder_name') . '"' . "'");?>
             <?php echo form_error('name');?>
           </div>
         </div>
        <div class="form-group">
          <label for="price" class="control-label sr_only col-md-3"><?php echo lang('price_label');?></label>
          <div class="col-md-7">
           <?php echo form_input('price', $product['price'], 'id="price" class="form-control"' . 'placeholder=' . '"' . lang('placeholder_price') . '"' . "'");?>
           <?php echo form_error('price');?>
         </div>
       </div>
       <div class="form-group">
        <label for="notes" class="control-label sr_only col-md-3"><?php echo lang('notes_label');?></label>
        <div class="col-md-7">
         <?php echo form_input('notes', $product['notes'], 'id="notes" class="form-control"' . 'placeholder=' . '"' . lang('placeholder_notes') . '"' . "'");?>
         <?php echo form_error('notes');?>
       </div>
     </div>
     <button type="submit" class="col-md-offset-3 btn btn-primary"><?php echo lang('update_btn');?></button>
     <?php form_close();?>
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
          minlength: 2,
          required: true
        },
      }
    });
  });
</script>