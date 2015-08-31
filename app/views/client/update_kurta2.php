<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $kurta = $client['kurta'];unset($client['kurta']);?>
<div class="col-lg-12 bg-primary">
	<form id="form" class="form-horizontal" action="<?php echo base_url('client/update_kurta/' . $client['kurta_id']);?>" method="Post">
		<?php echo form_hidden('client_id', $client['client_id']);?>
		<div class="info-header header-md"><?php echo $client['name']?>
			<span class="pull-right tiny-text"><i class='icon-edit icon-large'></i>
				<?php echo lang('heading_kurta_update');?></span>
			</div>
			<address class="pad-12">
				<strong><?php echo $client['cellphone']?></strong>
				<p><?php echo $client['city']?></p>
				<p><?php echo $client['address']?></p>
			</address>
			<div class="info-body">
				<div class="row">
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('lambai');?>
						<?php echo img_field('lambai', $kurta['lambai'])?>
					</div>
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('mora');?>
						<?php echo img_field('mora', $kurta['mora'])?>
					</div>
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('shoulder');?>
						<?php echo img_field('shoulder', $kurta['shoulder'])?>
					</div>
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('chatti');?>
						<?php echo img_field('chatti', $kurta['chatti'])?>
					</div>
				</div><!--row end -->
				<div class="row">
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('tera');?>
						<?php echo img_field('tera', $kurta['tera'])?>
					</div>
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('collar');?>
						<?php echo img_field('collar', $kurta['collar'])?>
					</div>
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('asteen');?>
						<?php echo img_field('asteen', $kurta['asteen'])?>
					</div>
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('daman');?>
						<?php echo img_field('daman', $kurta['daman'])?>
					</div>
				</div><!--row end -->
				<div class="row">
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('shalwar');?>
						<?php echo img_field('shalwar', $kurta['shalwar'])?>
					</div>
					<div class="col-xs-6 col-xxs col-sm-4 col-md-3">
						<?php echo form_error('pancha');?>
						<?php echo img_field('pancha', $kurta['pancha'])?>
					</div>
				</div><!--row end -->
				<div class="form-actions">
					<button type="submit" class="btn btn-success"><?php echo lang('btn_save');?></button>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($) {

			$('#form').validate(
			{
				rules: {
					'lambai': {
						maxlength:2,
						number:true,
						required: true
					},
					'mora': {
						maxlength: 2,
						number:true,
						required: true
					},
					'shalwar': {
						maxlength:2,
						number:true,
						required: true
					},
					'shoulder': {
						maxlength:2,
						number:true,
						required: true
					},
					'chatti': {
						maxlength:2,
						number:true,
						required: true
					},
					'tera': {
						maxlength:2,
						number:true,
						required: true
					},
					'collar': {
						maxlength:2,
						number:true,
						required: true
					},
					'asteen': {
						maxlength:2,
						number:true,
						required: true
					},
					'daman': {
						maxlength:2,
						number:true,
						required: true
					},
					'pancha': {
						maxlength:2,
						number:true,
						required: true
					}

				}
			});
		});
	</script>
