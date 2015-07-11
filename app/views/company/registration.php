<?php $this->load->view('partial/head');?>
<div class="container-fluid-full">
	<div class="row-fluid">

		<div class="row-fluid">
			<div class="login-box">
				<div class="icons">
					<a href="index.html"><i class="halflings-icon home"></i></a>
					<a href="#"><i class="halflings-icon cog"></i></a>
				</div>
				<h2>Welcome to Tailoring Managment System Registeration</h2>
				<form class="form-horizontal" action="<?php echo base_url('company/registration');?>" method="post">
						<div class="input-prepend" title="company_name">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input class="input-large span10" name="company_name" id="company_name" type="text" placeholder="type company_name"/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="owner">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input class="input-large span10" name="owner" id="owner" type="text" placeholder="type owner"/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="country">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input class="input-large span10" name="country" id="country" type="text" placeholder="type country"/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="state">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input class="input-large span10" name="state" id="state" type="text" placeholder="type state"/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="city">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input class="input-large span10" name="city" id="city" type="text" placeholder="type city"/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="address">
							<span class="add-on"><i class="halflings-icon user"></i></span>
							<input class="input-large span10" name="address" id="address" type="text" placeholder="type address"/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="Password">
							<span class="add-on"><i class="halflings-icon lock"></i></span>
							<input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
						</div>
						<div class="clearfix"></div>

						<div class="input-prepend" title="confirm_Password">
							<span class="add-on"><i class="halflings-icon lock"></i></span>
							<input class="input-large span10" name="confirm_password" id="confirm_password" type="password" placeholder="type confirm_password"/>
						</div>
						<div class="clearfix"></div>

						<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

						<div class="button-login">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
						<div class="clearfix"></div>
					</form>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>
				</div><!--/span-->
			</div><!--/row-->


		</div><!--/.fluid-container-->

	</div><!--/fluid-row-->

	<!-- start: JavaScript-->

	<?php $this->load->view('partial/tail');?>