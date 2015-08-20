        <?php $this->load->view('partial/header');?>
        <div class='panel panel-default'>
          <div class='panel-heading'>
            <i class='icon-edit icon-large'></i>
              <?php echo lang('create_user_heading');?>
          </div>
          <div class='panel-body'>
          <?php echo form_open("auth/create_user", "class='form-horizontal'");?>
              <fieldset>
                <legend><?php echo lang('create_user_subheading');?></legend>
                <div class='form-group row'>
                  <label class='col-lg-2 control-label'><?php echo lang('create_user_fname_label', 'first_name');?></label>
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
                  <label class='col-lg-2 control-label'><?php echo lang('create_user_company_label', 'company');?></label>
                  <div class='col-lg-10'>
                  <?php echo form_input($company);?>
                    <p class='help-block'><?php echo form_error('company');?></p>
                  </div>
                </div>
                <div class='form-group row'>
                  <label class='col-lg-2 control-label'>  <?php echo lang('create_user_email_label', 'email');?></label>
                  <div class='col-lg-6'>
                   <?php echo form_input($email);?>
                    <p class='help-block'><?php echo form_error('email');?></p>
                  </div>
                  <div class='col-lg-4'>
                  <?php echo form_input($phone);?>
                    <p class='help-block'><?php echo form_error('phone');?></p>
                  </div>
                </div>
                <div class='form-group row'>
                  <label class='col-lg-2 control-label'><?php echo lang('create_user_password_label', 'password');?></label>
                  <div class='col-lg-5'>
                  <?php echo form_input($password);?>
                    <p class='help-block'><?php echo form_error('password');?></p>
                </div>
                  <div class='col-lg-5'>
                  <?php echo form_input($password_confirm);?>
                    <p class='help-block'><?php echo form_error('password_confirm');?></p>
                  </div>
                </div>
              </fieldset>
              <div class='form-actions'>
                <?php echo form_submit('submit', lang('create_user_submit_btn'), "class='btn btn-success'");?>
                <a class='btn' href='#'>Cancel</a>
              </div>
            <?php echo form_close();?>
          </div>
        </div>
              <?php $this->load->view('partial/footer');?>