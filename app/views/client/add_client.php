<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class='panel panel-default'>
	<div class='panel-heading'>
		<i class='icon-plus icon-large'></i>
		<?php echo lang('create_user_heading');?>
	</div>
	<div class='panel-body'>
		<form class="form-horizontal" action="<?php echo base_url('client/add');?>" method="Post">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="cellphone"><?php echo lang('lb_mobile')?></label>
				<div class="col-lg-10">
					<input name="cellphone" class="form-control" id="cellphone" type="text"
					value="" placeholder="<?php echo lang('placeholder_cellphone');?>">
					<span class="validation_error">
						<?php echo form_error('cellphone');?>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="name"><?php echo lang('lb_client_name')?></label>
				<div class="col-lg-10">
					<input name="name" class="form-control"  id="name"
					type="text" value="" placeholder="<?php echo lang('placeholder_name');?>">
					<span class="validation_error">
						<?php echo form_error('name');?>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="city"><?php echo lang('lb_city')?></label>
				<div class="col-lg-10">
					<input name="city" class="form-control" id="city"
					type="text" value="" placeholder="<?php echo lang('placeholder_city');?>">
					<?php echo form_error('city');?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="address"><?php echo lang('lb_address')?></label>
				<div class="col-lg-10">
					<textarea name="address" cols="20" rows="3" class="form-control" placeholder="<?php echo lang('placeholder_address');?>"></textarea>
					<?php echo form_error('address');?>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-primary"><?php echo lang('btn_save_next');?></button>
			</div>
		</form>
	</div>
</div>