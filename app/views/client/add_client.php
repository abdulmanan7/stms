<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="halflings-icon edit"></i><span class="break"></span>Client
				Information
			</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i
					class="halflings-icon chevron-up"></i></a> <a href="#"
					class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="mobile"><?php echo lang('lb_mobile_no')?></label>
					<div class="controls">
						<input name="mobile" class="input-xlarge" id="mobile" type="text"
							value="" placeholder="Enter name here"> <input type="submit"
							class="btn btn-info btn-xs" name="search" value="Search">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="name"><?php echo lang('lb_client_name')?></label>
					<div class="controls">
						<input name="name" class="input-xlarge focused" id="name"
							type="text" value="" placeholder="Enter name here">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="address"><?php echo lang('lb_address')?></label>
					<div class="controls">
						<input name="address" class="input-xxlarge" id="address"
							type="text" value="" placeholder="Enter name here">
					</div>
				</div>
				<input type="submit" name="next" value="next">
			</form>
		</div>
	</div>
</div>
<!--/span-->
<!--/row-->
