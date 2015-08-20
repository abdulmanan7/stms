<?php $this->load->view('auth/header');?>
<body class='login'>
	<div class='wrapper'>
		<div class='row'>
			<div class='col-lg-12'>
				<?php echo form_open("auth/forgot_password");?>
					<legend><?php echo lang('forgot_password_heading');?></legend>
					<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
				<div id="infoMessage"><?php echo $message;?></div>
				<fieldset>
				<div class='form-group'>
					<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
					<?php echo form_input($email);?>
				</div>
				<?php echo form_submit('submit', lang('forgot_password_submit_btn'), "class='btn btn-default'");?>
				<a href="<?php echo base_url('auth/login')?>">Go back</a>
				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php echo form_close();?>
<?php $this->load->view('auth/footer');?>