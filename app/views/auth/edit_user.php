        <?php $this->load->view('partial/header');?>
        <div id="infoMessage"><?php echo $message;?></div>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-edit icon-large'></i>
              <?php echo lang('edit_user_heading');?>
          </div>
          <div class='panel-body'>
          <?php echo form_open(uri_string(), "class='form-horizontal'");?>
              <fieldset>
                <legend><?php echo lang('edit_user_subheading');?></legend>
                <div class='form-group row'>
                  <label class='col-lg-2 control-label'><?php echo lang('edit_user_fname_label', 'first_name');?></label>
                  <div class='col-lg-4'>
                     <?php echo form_input($first_name);?>
                     <p class='help-block'><?php echo form_error('first_name');?></p>
                  </div>
                  <div class='col-lg-6'>
                      <?php echo form_input($last_name);?>
                     <p class='help-block'><?php echo form_error('last_name');?></p>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-lg-2 control-label'><?php echo lang('edit_user_company_label', 'company');?></label>
                  <div class='col-lg-10'>
                  <?php echo form_input($company);?>
                    <p class='help-block'><?php echo form_error('company');?></p>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-lg-2 control-label'><?php echo lang('edit_user_phone_label', 'phone');?></label>
                  <div class='col-lg-10'>
                  <?php echo form_input($phone);?>
                    <p class='help-block'><?php echo form_error('phone');?></p>
                  </div>
                </div>
                <div class='form-group row'>
                  <label class='col-lg-2 control-label'><?php echo lang('edit_user_password_label', 'password');?></label>
                  <div class='col-lg-5'>
                  <?php echo form_input($password);?>
                    <p class='help-block'><?php echo form_error('password');?></p>
                </div>
                  <div class='col-lg-5'>
                  <?php echo form_input($password_confirm);?>
                    <p class='help-block'><?php echo form_error('password_confirm');?></p>
                  </div>
                </div>
                <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group): ?>
            <div class="form-group" style="margin-left: 4px;">
<div class="checkbox-inline">
              <label class="checkbox">
              <?php
$gID = $group['id'];
$checked = null;
$item = null;
foreach ($currentGroups as $grp) {
	if ($gID == $grp->id) {
		$checked = ' checked="checked"';
		break;
	}
}
?>

              <input type="checkbox" name="groups[]" class="checkbox-inline" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8');?>
              </label>
              </div>
              </div>
          <?php endforeach?>

      <?php endif?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf);?>
              </fieldset>
              <div class='form-actions'>
                <?php echo form_submit('submit', lang('edit_user_submit_btn'), "class='btn btn-success'");?>
                <a class='btn' href='#'>Cancel</a>
              </div>
            <?php echo form_close();?>
          </div>
        </div>
              <?php $this->load->view('partial/footer');?>