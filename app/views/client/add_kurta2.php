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
						<?php echo form_error('lambai');?>
						<?php echo img_field('lambai', $kurta['lambai'])?>
						<?php echo form_error('mora');?>
						<?php echo img_field('mora', $kurta['mora'])?>
						<?php echo form_error('shoulder');?>
						<?php echo img_field('shoulder', $kurta['shoulder'])?>
						<?php echo form_error('chatti');?>
						<?php echo img_field('chatti', $kurta['chatti'])?>
						<?php echo form_error('tera');?>
						<?php echo img_field('tera', $kurta['tera'])?>
						<?php echo form_error('collar');?>
						<?php echo img_field('collar', $kurta['collar'])?>
						<?php echo form_error('asteen');?>
						<?php echo img_field('asteen', $kurta['asteen'])?>
						<?php echo form_error('daman');?>
						<?php echo img_field('daman', $kurta['daman'])?>
						<?php echo form_error('shalwar');?>
						<?php echo img_field('shalwar', $kurta['shalwar'])?>
						<?php echo form_error('pancha');?>
						<?php echo img_field('pancha', $kurta['pancha'])?>
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
					maxlength:2,
					number:true,
					required: true
				},
				'mora': {
					maxlength: 2,
					number:true,
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
				},
				'lambai-x': {xField:true,},
					'mora-x': {xField:true,},
					'shalwar-x': {xField:true,},
					'shoulder-x': {xField:true,},
					'tera-x': {xField:true,},
					'collar-x': {xField:true,},
					'asteen-x': {xField:true,},
					'daman-x': {xField:true,},
					'pancha-x': {xField:true,},
			}
		});
	});
</script>
