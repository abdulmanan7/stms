<?php $kurtaPemaish = true;
$wasketPemaish = true;
$invoice = true;
$jaket = true;
$pant = true;
?>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Client Information</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="mobile">Mobile No:</label>
					<div class="controls">
						<input name="mobile" class="input-xlarge" id="mobile" type="text" value="" placeholder="Enter name here">
					<input type="submit" class="btn btn-info btn-xs" name="search" value="Search">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="name">Client Name:</label>
					<div class="controls">
						<input name="name" class="input-xlarge focused" id="name" type="text" value="" placeholder="Enter name here">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="address">Address:</label>
					<div class="controls">
						<input name="address" class="input-xxlarge" id="address" type="text" value="" placeholder="Enter name here">
					</div>
				</div>
					<!-- <div class="control-group">
						<label class="control-label">Mobile No.</label>
						<div class="controls">
							<span class="input-xlarge uneditable-input"></span>
						</div>
					</div> -->
				</form>
				<div class="row-fluid sortable">
					<?php if ($kurtaPemaish): ?>
						<div class="box blue span6">
							<div class="box-header" data-orignal-title>
								<h2><i class="icon-user"></i><span class="break"></span>Kurta Pemaish</h2>
							</div>
							<div class="box-content">
								this is for invoices
							</div>
						</div>
					<?php endif?>
					<?php if ($invoice): ?>
						<div class="box black span6">
							<div class="box-header">
								<h2><i class="icon-tasks white"></i><span class="break"></span>Invoices</h2>
							</div>
							<div class="box-content">
								this is for invoices
							</div>
						</div>
					<?php endif?>
						<div class="row-fluid sortable">
					<?php if ($wasketPemaish): ?>
							<div class="box green span6">
								<div class="box-header">
									<h2><i class="icon-certificate"></i><span class="break"></span>Wasket Pemaish</h2>
								</div>
								<div class="box-content">
								<form action="#">
								<?php echo form_input('', '');?>
									<?php foreach ($wasketPemaish as $value): ?>

									<?php endforeach?>
								</form>
								</div>
							</div>
					<?php endif?>
					<?php if ($jaket): ?>
							<div class="box greenDark span6">
								<div class="box-header">
									<h2><i class="icon-star"></i><span class="break"></span>Jacket Pemaish</h2>
								</div>
								<div class="box-content">
									reserved for wasket pemaish
								</div>
							</div>
					<?php endif?>
					</div>
						<div class="row-fluid sortable">
					<?php if ($pant): ?>
							<div class="box pink span6">
								<div class="box-header">
									<h2><i class="icon-bookmark"></i><span class="break"></span>Pant Pemaish</h2>
								</div>
								<div class="box-content">
									reserved for wasket pemaish
								</div>
							</div>
					<?php endif?>
						</div>
				</div>
			</div>
		</div><!--/span-->

	</div><!--/row-->
