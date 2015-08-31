<?php $this->load->view('auth/header');?>
<?php if (null !== $this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
}
?>
<body class='login'>
  <div class='wrapper'>
    <div class='row'>
      <div class='col-lg-12'>
        <div class='brand text-center'>
          <h1>
          <div class='logo-icon'>
            <img src="<?php echo base_url('assets/images/logo.png');?>" alt="smart tailor logo" class="logo-img"/>
          </div>
          Smart Tailor
          </h1>
        </div>
      </div>
    </div>
    <div class='row'>
      <div class='col-lg-12'>
        <?php echo form_open("auth/login");?>
        <fieldset class='text-center'>
          <legend>Login to your account</legend>
          <div id="infoMessage"><?php if (!empty($message)): ?>
            <?php echo $message;?>
          <?php endif?></div>
          <div class='form-group'>
            <?php echo form_input($identity);?>
          </div>
          <div class='form-group'>
            <?php echo form_input($password);?>
            <?php echo form_error();?>
          </div>
          <div class='text-center'>
            <div class='checkbox'>
              <label>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                <?php echo lang('login_remember_label', 'remember');?>
              </label>
            </div>
            <button class="btn btn-default" name='sign_in' type="submit">Sign in</button>
            <br>
            <a href="<?php echo base_url('forgot_password');?>"><?php echo lang('login_forgot_password');?></a>
            <br>
            <br>
            <a href="<?php echo base_url('registration');?>" class="pull-right"><?php echo lang('not_register_yet');?></a>
          </div>
        </fieldset>
        <?php echo form_close();?>
      </div>
    </div>
  </div>
  <?php $this->load->view('auth/footer');?>