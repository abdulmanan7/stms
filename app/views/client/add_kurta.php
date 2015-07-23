<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php //pr($client);?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="halflings-icon edit"></i><span class="break"></span><?php echo lang('heading_kurta_add');?>
			</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i
					class="halflings-icon chevron-up"></i></a> <a href="#"
					class="btn-close"><i class="halflings-icon remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action="<?php echo base_url('client/add_kurta');?>" method="Post">
					<div class="span6">
						<?php echo form_hidden('client_id', $client['client_id']);?>
						<?php echo form_hidden('cellphone', $client['cellphone']);?>
						<?php echo form_hidden('address', $client['address']);?>
						<?php echo form_hidden('name', $client['name']);?>
						<div class="control-group">
							<label class="control-label" for="mobile"><?php echo lang('lb_mobile')?></label>
							<div class="controls">
								<span class="input-xlarge uneditable-input"><?php echo $client['cellphone'];?></span>
								<span class="validation_error">
									<?php echo form_error('cellphone');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="name"><?php echo lang('lb_client_name')?></label>
							<div class="controls">
								<span class="input-xlarge uneditable-input"><?php echo $client['name'];?></span>
								<span class="validation_error">
									<?php echo form_error('name');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="address"><?php echo lang('lb_address')?></label>
							<div class="controls">
							<span class="input-xlarge uneditable-input"><?php echo $client['address']?></span>
								<?php echo form_error('address');?>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="lambai"><?php echo lang('lb_lambai')?></label>
							<div class="controls">
								<input name="lambai" class="input-small" id="lambai" type="text"
								value="<?php echo set_value('label');?>" placeholder="<?php echo lang('placeholder_lambai');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="lambai-x" />
								<span class="validation_error">
									<?php echo form_error('lambai');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="mora"><?php echo lang('lb_mora')?></label>
							<div class="controls">
								<input name="mora" class="input-small focused" id="mora"
								type="text" value="" placeholder="<?php echo lang('placeholder_mora');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="mora-x" />
								<span class="validation_error">
									<?php echo form_error('mora');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="shoulder"><?php echo lang('lb_shoulder')?></label>
							<div class="controls">
								<input name="shoulder" class="input-small" id="shoulder"
								type="text" value="" placeholder="<?php echo lang('placeholder_shoulder');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="shoulder-x" />
								<span class="validation_error">
									<?php echo form_error('shoulder');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="chatti"><?php echo lang('lb_chatti')?></label>
							<div class="controls">
								<input name="chatti" class="input-small" id="chatti"
								type="text" value="" placeholder="<?php echo lang('placeholder_chatti');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="chatti-x" />
								<span class="validation_error">
									<?php echo form_error('chatti');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="tera"><?php echo lang('lb_tera')?></label>
							<div class="controls">
								<input name="tera" class="input-small" id="tera" type="text"
								value="<?php echo set_value('tera');?>" placeholder="<?php echo lang('placeholder_tera');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="tera-x" />
								<span class="validation_error">
									<?php echo form_error('tera');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="collar"><?php echo lang('lb_collar')?></label>
							<div class="controls">
								<input name="collar" class="input-small" id="collar" type="text"
								value="<?php echo set_value('collar');?>" placeholder="<?php echo lang('placeholder_collar');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="collar-x" />
								<span class="validation_error">
									<?php echo form_error('collar');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="asteen"><?php echo lang('lb_asteen')?></label>
							<div class="controls">
								<input name="asteen" class="input-small" id="asteen" type="text"
								value="<?php echo set_value('asteen');?>" placeholder="<?php echo lang('placeholder_asteen');?>
								">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="asteen-x" />
								<span class="validation_error">
									<?php echo form_error('asteen');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="daman"><?php echo lang('lb_daman')?></label>
							<div class="controls">
								<input name="daman" class="input-small" id="daman" type="text"
								value="<?php echo set_value('daman');?>" placeholder="<?php echo lang('placeholder_daman');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="daman-x" />
								<span class="validation_error">
									<?php echo form_error('daman');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="shalwar"><?php echo lang('lb_shalwar')?></label>
							<div class="controls">
								<input name="shalwar" class="input-small" id="shalwar" type="text"
								value="<?php echo set_value('shalwar');?>" placeholder="<?php echo lang('placeholder_shalwar');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="shalwar-x" />
								<span class="validation_error">
									<?php echo form_error('shalwar');?>
								</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="pancha"><?php echo lang('lb_pancha')?></label>
							<div class="controls">
								<input name="pancha" class="input-small" id="pancha" type="text"
								value="<?php echo set_value('pancha');?>" placeholder="<?php echo lang('placeholder_pancha');?>">
								<input type="text" class="input-small" placeholder="e.g 1/2,1/4" name="pancha-x" />
								<span class="validation_error">
									<?php echo form_error('pancha');?>
								</span>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary"><?php echo lang('btn_save_next');?></button>
						</div>
					</form>
				</div><!--Span close-->
				<div class="span6">
					<img src="<?php echo base_url('res/img/res_imgs/final.jpg"');?>" alt="">
				</div>
			</div>
		</div>
	</div>
	<!--/span-->
	<!--/row-->
	<script type="text/javascript">
		$('#form').validate(
		{
			rules: {
				'lambai': {
					maxlength:3,
					required: true
				},
				'mora': {
					maxlength: 3,
					required: true
				},
				'shalwar': {
					maxlength:3,
					required: true
				},
				'shoulder': {
					maxlength:3,
					required: true
				}
				'chatti': {
					maxlength:3,
					required: true
				}
				'tera': {
					maxlength:3,
					required: true
				}
				'collar': {
					maxlength:3,
					required: true
				}
				'asteen': {
					maxlength:3,
					required: true
				}
				'daman': {
					maxlength:3,
					required: true
				}
				'pancha': {
					maxlength:3,
					required: true
				}

			}
		});
	</script>
