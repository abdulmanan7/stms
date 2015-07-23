<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="halflings-icon edit"></i><span class="break"></span><?php echo lang('heading_add');?>
			</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i
					class="halflings-icon chevron-up"></i></a> <a href="#"
					class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal" action="<?php echo base_url('client/add');?>" method="Post">
				<div class="control-group">
					<label class="control-label" for="cellphone"><?php echo lang('lb_mobile')?></label>
					<div class="controls">
						<input name="cellphone" class="input-xlarge" id="cellphone" type="text"
							value="" placeholder="<?php echo lang('placeholder_cellphone');?>">
							 <span class="validation_error">
							  <?php echo form_error('cellphone');?>
							 </span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="name"><?php echo lang('lb_client_name')?></label>
					<div class="controls">
						<input name="name" class="input-xlarge focused" id="name"
							type="text" value="" placeholder="<?php echo lang('placeholder_name');?>">
							 <span class="validation_error">
							  <?php echo form_error('name');?>
							 </span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="address"><?php echo lang('lb_address')?></label>
					<div class="controls">
						<input name="address" class="input-xxlarge" id="address"
							type="text" value="" placeholder="<?php echo lang('placeholder_address');?>">
							 <?php echo form_error('address');?>
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary"><?php echo lang('btn_save_next');?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--/span-->
<!--/row-->
