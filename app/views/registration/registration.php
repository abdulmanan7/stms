<!DOCTYPE html>
<html class='no-js' lang='en'>
	<head>
		<meta charset='utf-8'>
		<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
		<title>Registration</title>
		<meta content='lab2023' name='author'>
		<meta content='' name='description'>
		<meta content='' name='keywords'>
		<link href='<?php echo find_url("css", "application-a07755f5.css");?>' rel="stylesheet" type="text/css" />
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href='<?php echo find_url("images", "favicon.ico");?>' rel="icon" type="image/ico" />
		<link href='<?php echo find_url("css", "custom.css");?>' rel="stylesheet" type="text/css" />
	</head>
	<body class='login'>
		<!-- <div class='wrapper'> -->
		<div class="container-fluid">
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
			<section class="container registration">
				<div class="container-page">
					<div class="col-md-6">
					<?php echo isset($message) ? $message : '';?>
						<form action="<?php echo base_url('registration/sign_up');?>" method="POST" role="form">
							<legend><h3 class="dark-grey">Registration</h3></legend>
							<div class="form-group col-lg-12">
								<label>Cellphone</label>
								<?php echo form_input($username);?>
							</div>
							<div class="form-group col-lg-6">
								<label>Password</label>
								<?php echo form_input($password);?>
							</div>
							<div class="form-group col-lg-6">
								<label>Repeat Password</label>
								<?php echo form_input($password_confirm);?>
							</div>
							<div class="form-group col-lg-6">
								<label>Email Address</label>
								<?php echo form_input($email);?>
							</div>
							<div class="form-group col-lg-6">
								<label>Company Name</label>
								<?php echo form_input($company);?>
							</div>
						</div>
						<div class="col-md-6 info-block">
							<h3 class="dark-grey">Terms and Conditions</h3>
							<p>
								By clicking on "Register" you agree to The Company's' Terms and Conditions
							</p>
							<p>
								By registring you will be automatically subscribe to free basic pakage which proivde free unlimited pemaish entry and retrival -
								<strong>To avail all functionality you have to subscribe at very low and afortable price starting from Rs.1000</strong>
							</p>
							<p>
								it's is very powerfull application ,your data is store permanent and can be access any time anywhere all you have to log in and access.
							</p>
							<p>
								Smart tailoring managment teams work 24/7 to provide best customer support and to make it more reliable,trust worthy.
							</p>
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</form>
				</div>
			</section>
		</div>
		<!-- </div> -->
		<!-- Footer -->
		<!-- Javascripts -->
	</body>
</html>