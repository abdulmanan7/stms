<?php $this->load->view('auth/header');?>
<body class='login'>
	<div class='wrapper'>
		<div class='row'>
			<div class='col-lg-12'>
				<?php echo form_open("auth/create_group");?>
				<legend><?php echo lang('create_group_heading');?></legend>
				<p><?php echo lang('create_group_subheading');?></p>
				<div id="infoMessage"><?php echo $message;?></div>
				<fieldset>
					<div class='form-group'>
						<label for="group-name"><?php echo lang('create_group_name_label', 'group_name');?> </label>
						<?php echo form_input($group_name);?>
					</div>
					<div class='form-group'>
						<label for="description"><?php echo lang('create_group_desc_label', 'description');?> </label>
						<?php echo form_input($description);?>
					</div>
					<?php echo form_submit('submit', lang('create_group_submit_btn'), "class='btn btn-primary'");?>
				</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<?php $this->load->view('auth/footer');?>