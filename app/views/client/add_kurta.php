<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class='panel panel-default'>
	<div class='panel-heading'>
		<i class='icon-edit icon-large'></i>
		<?php echo lang('heading_kurta_add');?>
	</div>
	<div class='panel-body'>
		<form id="form" class="form-horizontal" action="<?php echo base_url('client/update_kurta');?>" method="Post">
			<div class="col-lg-6">
				<?php echo form_hidden('client_id', $client['client_id']);?>
				<?php echo form_hidden('kurta_id', $client['kurta_id']);?>
				<?php echo form_hidden('cellphone', $client['cellphone']);?>
				<?php echo form_hidden('address', $client['address']);?>
				<?php echo form_hidden('name', $client['name']);?>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="mobile"><?php echo lang('lb_mobile')?></label>
					<div class="col-lg-10">
						<span class="form-control"><?php echo $client['cellphone'];?></span>
						<span class="validation_error">
							<?php echo form_error('cellphone');?>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="name"><?php echo lang('lb_client_name')?></label>
					<div class="col-lg-10">
						<span class="form-control"><?php echo $client['name'];?></span>
						<span class="validation_error">
							<?php echo form_error('name');?>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label class=" col-lg-2 control-label" for="address"><?php echo lang('lb_address')?></label>
					<div class="col-lg-10">
						<span class="form-control"><?php echo $client['address']?></span>
						<?php echo form_error('address');?>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="lambai"><?php echo lang('lb_lambai')?></label>
					<div class="col-lg-7">
						<input name="lambai" class="form-control" id="lambai" type="text"
						value="<?php echo set_value('label');?>" placeholder="<?php echo lang('placeholder_lambai');?>">
						<span class="validation_error">
							<?php echo form_error('lambai');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="lambai-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="mora"><?php echo lang('lb_mora')?></label>
					<div class="col-lg-7">
						<input name="mora" class="form-control" id="mora"
						type="text" value="" placeholder="<?php echo lang('placeholder_mora');?>">
						<span class="validation_error">
							<?php echo form_error('mora');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="mora-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="shoulder"><?php echo lang('lb_shoulder')?></label>
					<div class="col-lg-7">
						<input name="shoulder" class="form-control" id="shoulder"
						type="text" value="" placeholder="<?php echo lang('placeholder_shoulder');?>">
						<span class="validation_error">
							<?php echo form_error('shoulder');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="shoulder-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="chatti"><?php echo lang('lb_chatti')?></label>
					<div class="col-lg-7">
						<input name="chatti" class="form-control" id="chatti"
						type="text" value="" placeholder="<?php echo lang('placeholder_chatti');?>">
						<span class="validation_error">
							<?php echo form_error('chatti');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="chatti-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="tera"><?php echo lang('lb_tera')?></label>
					<div class="col-lg-7">
						<input name="tera" class="form-control" id="tera" type="text"
						value="<?php echo set_value('tera');?>" placeholder="<?php echo lang('placeholder_tera');?>">
						<span class="validation_error">
							<?php echo form_error('tera');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="tera-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="collar"><?php echo lang('lb_collar')?></label>
					<div class="col-lg-7">
						<input name="collar" class="form-control" id="collar" type="text"
						value="<?php echo set_value('collar');?>" placeholder="<?php echo lang('placeholder_collar');?>">
						<span class="validation_error">
							<?php echo form_error('collar');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="collar-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="asteen"><?php echo lang('lb_asteen')?></label>
					<div class="col-lg-7">
						<input name="asteen" class="form-control" id="asteen" type="text"
						value="<?php echo set_value('asteen');?>" placeholder="<?php echo lang('placeholder_asteen');?>
						">
						<span class="validation_error">
							<?php echo form_error('asteen');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="asteen-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="daman"><?php echo lang('lb_daman')?></label>
					<div class="col-lg-7">
						<input name="daman" class="form-control" id="daman" type="text"
						value="<?php echo set_value('daman');?>" placeholder="<?php echo lang('placeholder_daman');?>">
						<span class="validation_error">
							<?php echo form_error('daman');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="daman-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="shalwar"><?php echo lang('lb_shalwar')?></label>
					<div class="col-lg-7">
						<input name="shalwar" class="form-control" id="shalwar" type="text"
						value="<?php echo set_value('shalwar');?>" placeholder="<?php echo lang('placeholder_shalwar');?>">
						<span class="validation_error">
							<?php echo form_error('shalwar');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="shalwar-x" />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-lg-2 control-label" for="pancha"><?php echo lang('lb_pancha')?></label>
					<div class="col-lg-7">
						<input name="pancha" class="form-control" id="pancha" type="text"
						value="<?php echo set_value('pancha');?>" placeholder="<?php echo lang('placeholder_pancha');?>">
						<span class="validation_error">
							<?php echo form_error('pancha');?>
						</span>
					</div>
					<div class="col-lg-3">
						<input type="text" class="form-control" placeholder="e.g 1/2,1/4" name="pancha-x" />
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary"><?php echo lang('btn_save_next');?></button>
				</div>
			</form>
		</div><!--Span close-->
		<div class="col-lg-6">
			<img src="<?php echo base_url('res/img/res_imgs/final.jpg"');?>" alt="">
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {

		$('#form').validate(
		{
			rules: {
				'lambai': {
					maxlength:3,
					number:true,
					required: true
				},
				'mora': {
					maxlength: 3,
					number:true,
					required: true
				},
				'shalwar': {
					maxlength:3,
					number:true,
					required: true
				},
				'shoulder': {
					maxlength:3,
					number:true,
					required: true
				},
				'chatti': {
					maxlength:3,
					number:true,
					required: true
				},
				'tera': {
					maxlength:3,
					number:true,
					required: true
				},
				'collar': {
					maxlength:3,
					number:true,
					required: true
				},
				'asteen': {
					maxlength:3,
					number:true,
					required: true
				},
				'daman': {
					maxlength:3,
					number:true,
					required: true
				},
				'pancha': {
					maxlength:3,
					number:true,
					required: true
				}

			}
		});
	});
</script>
