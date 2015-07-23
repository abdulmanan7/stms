<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php //pr($client);?>
<?php if (!isset($client['mobile']) && !empty($client['mobile'])): ?>
	<?php redirect("client/add");?>
<?php endif?>
<?php
$client_data = "?client_id=" . $client['client_id'] . "&name=" . $client['name'] . "&address=" . $client['address'] . "&cellphone=" . $client['cellphone'];
?>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2>
				<i class="halflings-icon edit"></i><span class="break"></span>Choose What do you want...
			</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i
					class="halflings-icon chevron-up"></i></a> <a href="#"
					class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<a class="quick-button metro blue span2" href="<?php echo base_url('client/add_kurta' . $client_data);?>">
					<i class=" glyphicons-icon sweater"></i>
					<p>Kurta Pemiash</p>
				</a>
				<a class="quick-button metro green span2" href="<?php echo base_url('client/add_waskat' . $client_data);?>">
					<i class="glyphicons-icon t-shirt"></i>
					<p>Waskat Pemaish</p>
				</a>
				<a class="quick-button metro pink span2" href="<?php echo base_url('client/add_pant' . $client_data);?>">
					<i class="glyphicons-icon pants"></i>
					<p>Pant Pemaish</p>
				</a>
				<a class="quick-button metro yellow span2" href="<?php echo base_url('client/add_jacket' . $client_data);?>">
					<i class="glyphicons-icon t-shirt"></i>
					<p>Jacket Pemaish</p>
				</a>
				<a href="#"  class="btn btn-xlarge"><i class="glyphicons-icon t-shirt" ></i></a>
              <a href="#"  class="btn btn-xlarge" ><i class="glyphicons-icon sweater" ></i></a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--/span-->
<!--/row-->
