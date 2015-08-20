<?php $this->load->view('auth/header');?>
<body class='login'>
	<div class='wrapper'>
		<div class='row'>
			<div class='col-lg-12'>
				<?php echo form_open('auth/reset_password/' . $code);?>
				<legend><?php echo lang('reset_password_heading');?></legend>
				<div id="infoMessage"><?php echo $message;?></div>
				<fieldset>
					<div class='form-group'>
						<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
						<?php echo form_input($new_password);?>
					</div>
					<div class='form-group'>
						<label for="new_password_confirm">
							<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?>
						</label>
						<?php echo form_input($new_password_confirm);?>
					</div>
					<div class='form-group'>
						<?php echo form_input($user_id);?>
						<?php echo form_hidden($csrf);?>
					</div>
					<?php echo form_submit('submit', lang('reset_password_submit_btn'), "class='btn btn-default'");?>
				</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<?php $this->load->view('auth/footer');?>