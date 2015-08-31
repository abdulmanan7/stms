<?php $this->load->view('auth/header');?>
<body class='login'>
	<div class='wrapper'>
		<div class='row'>
			<div class='col-lg-12'>
				<?php echo form_open(current_url());?>
				<legend><?php echo lang('edit_group_heading');?></legend>
				<p><?php echo lang('edit_group_subheading');?></p>
				<div id="infoMessage"><?php echo $message;?></div>
				<fieldset>
					<div class='form-group'>
						<label for="group-name"><?php echo lang('edit_group_name_label', 'group_name');?> </label>
						<?php echo form_input($group_name);?>
					</div>
					<div class='form-group'>
						<label for="description"><?php echo lang('edit_group_desc_label', 'description');?> </label>
						<?php echo form_input($group_description);?>
					</div>
					<?php echo form_submit('submit', lang('edit_group_submit_btn'), "class='btn btn-primary'");?>
				</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<?php $this->load->view('auth/footer');?>