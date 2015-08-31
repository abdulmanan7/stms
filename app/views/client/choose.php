<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php //pr($client);?>
<?php if (!isset($id)): ?>
	<?php redirect("client/add");?>
<?php endif?>
<div class='panel panel-default'>
	<div class='panel-heading'>
		<i class='icon-edit icon-large'></i>
		Choose what do want to add
	</div>
	<div class='panel-body'>
		<div class="center-block">
			<a class="quick-button metro blue span2" href="<?php echo base_url($link . "/" . $id);?>">
				<i class="glyphicons-icon sweater"></i>
				<p class="special-btn btn-success">Enter Kurta Pemiash</p>
			</a>
			<!-- <a class="quick-button metro green span2" href="<?php echo base_url('client/add_waskat/' . $id);?>">
				<i class="glyphicons-icon t-shirt"></i>
				<p class="special-btn btn-info">Enter Waskat Pemaish</p>
			</a>
			<a class="quick-button metro pink span2" href="<?php echo base_url('client/add_pant/' . $id);?>">
				<i class="glyphicons-icon pants"></i>
				<p class="special-btn btn-warning">Enter Pant Pemaish</p>
			</a>
			<a class="quick-button metro yellow span2" href="<?php echo base_url('client/add_jacket/' . $id);?>">
				<i class="glyphicons-icon t-shirt"></i>
				<p class="special-btn btn-danger">Enter Jacket Pemaish</p>
			</a> -->
		</div>
	</div>
</div>