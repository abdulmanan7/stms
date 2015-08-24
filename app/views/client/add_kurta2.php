<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class='panel panel-default'>
	<div class='panel-heading'>
		<i class='icon-edit icon-large'></i>
		<?php echo lang('heading_kurta_add');?>
	</div>
	<div class='panel-body'>
		<form id="form" class="form-horizontal" action="<?php echo base_url('client/update_kurta');?>" method="Post" role="form">
			<div class="col-lg-12">
			<!-- 	<?php echo form_hidden('client_id', $client['client_id']);?>
			<?php echo form_hidden('kurta_id', $client['kurta_id']);?>
			<?php echo form_hidden('cellphone', $client['cellphone']);?>
			<?php echo form_hidden('address', $client['address']);?>
			<?php echo form_hidden('name', $client['name']);?> -->
				<!-- <div class="form-group">
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
				</div> -->
				<div class="row">
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('lambai');?>
					<?php echo img_field('lambai')?>
				</div>
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('mora');?>
					<?php echo img_field('mora')?>
				</div>
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('shoulder');?>
					<?php echo img_field('shoulder')?>
				</div>
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('chatti');?>
					<?php echo img_field('chatti')?>
				</div>
				</div><!--row end -->
				<div class="row">
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('tera');?>
					<?php echo img_field('tera')?>
				</div>
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('collar');?>
					<?php echo img_field('collar')?>
				</div>
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('asteen');?>
					<?php echo img_field('asteen')?>
				</div>
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('daman');?>
					<?php echo img_field('daman')?>
				</div>
				</div><!--row end -->
				<div class="row">
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('shalwar');?>
					<?php echo img_field('shalwar')?>
				</div>
				<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
					<?php echo form_error('pancha');?>
					<?php echo img_field('pancha')?>
				</div>
				</div><!--row end -->
				<div class="form-actions">
					<button type="submit" class="btn btn-primary"><?php echo lang('btn_save_next');?></button>
				</div>
			</form>
		</div><!--Span close-->
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
