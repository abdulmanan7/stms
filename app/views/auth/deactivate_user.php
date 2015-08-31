<?php $this->load->view('auth/header');?>
<body class='login'>
	<div class='wrapper'>
		<div class='row'>
			<div class='col-lg-12'>
				<?php echo form_open("auth/deactivate/" . $user->id);?>
				<legend><?php echo lang('deactivate_heading');?></legend>
				<p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
				<fieldset>
					<div class="form-group">
						<label for=""> <?php echo lang('deactivate_confirm_y_label', 'confirm');?></label>
						<input type="radio" name="confirm" value="yes" checked="checked" />
					</div>
					<div class="form-group">
						<label for=""> <?php echo lang('deactivate_confirm_n_label', 'confirm');?></label>
						<input type="radio" name="confirm" value="no" />
					</div>

					<?php echo form_hidden($csrf);?>
					<?php echo form_hidden(array('id' => $user->id));?>
					<?php echo form_submit('submit', lang('deactivate_submit_btn'), "class='btn btn-success'");?>
				</fieldset>

				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<?php $this->load->view('auth/footer');?>