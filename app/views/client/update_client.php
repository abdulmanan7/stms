<?php $this->load->view('partial/panel-start-simple');?>
		<form class="form-horizontal" action="<?php echo base_url('client/update/' . $client['id']);?>" method="Post">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="cellphone"><?php echo lang('lb_mobile')?></label>
				<div class="col-lg-10">
					<input name="cellphone" class="form-control" id="cellphone" type="text"
					value="<?php echo set_value('cellphone', $client['cellphone'])?>" placeholder="<?php echo lang('placeholder_cellphone');?>">
					<span class="validation_error">
						<?php echo form_error('cellphone');?>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="name"><?php echo lang('lb_client_name')?></label>
				<div class="col-lg-10">
					<input name="name" class="form-control"  id="name"
					type="text" value="<?php echo set_value('name', $client['name'])?>" placeholder="<?php echo lang('placeholder_name');?>">
					<span class="validation_error">
						<?php echo form_error('name');?>
					</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="city"><?php echo lang('lb_city')?></label>
				<div class="col-lg-10">
					<input name="city" class="form-control" id="city"
					type="text" value="<?php echo set_value('city', $client['city'])?>" placeholder="<?php echo lang('placeholder_city');?>">
					<?php echo form_error('city');?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label" for="address"><?php echo lang('lb_address')?></label>
				<div class="col-lg-10">
					<input name="address" class="form-control" id="address"
					type="text" value="<?php echo set_value('address', $client['address'])?>" placeholder="<?php echo lang('placeholder_address');?>">
					<?php echo form_error('address');?>
				</div>
			</div>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary"><?php echo lang('btn_save_next');?></button>
			</div>
		</form>
	</div>
</div>