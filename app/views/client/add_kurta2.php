<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class='panel panel-default'>
	<div class='panel-heading'>
		<i class='icon-edit icon-large'></i>
		<?php echo lang('heading_kurta_add');?>
	</div>
	<div class='panel-body'>
		<form id="form" class="form-horizontal" action="<?php echo base_url('client/add_kurta/' . $client['id']);?>" method="Post" role="form">
			<div class="col-lg-12">
			<?php echo form_hidden('client_id', $client['id']);?>
		<div class="info-header header-md"><?php echo $client['name']?>
			<span class="pull-right tiny-text"><i class='icon-plus icon-large'></i>
				<?php echo lang('heading_kurta_add');?></span>
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
