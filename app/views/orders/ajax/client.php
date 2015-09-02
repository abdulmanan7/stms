<div class="">
	<form action="" method="POST" class="form-horizontal" role="form">
	<div class="col-sm-4">
	<div class="info-box info-primary">
		<div class="info-header"><?php echo $client['name']?></div>
		<div class="info-body">
			<strong><?php echo $client['cellphone']?></strong>
			<p><?php echo $client['city']?></p>
			<p><?php echo $client['address']?></p>

		</div>
	</div>
	<div class="details">Select Details</div>
		<div class="form-group">
		</div>
		<select name="cloths_no" id="input" class="form-control">
			<option value="">-- Select Cloths No --</option>
		<?php foreach ($cloths_no as $key => $no): ?>
			<option value="<?php echo $no;?>">-- <?php echo $key;?> --</option>
		<?php endforeach?>
		</select>
		</div>
		<div class="col-sm-8">
		<div class="info-box info-success">
			<div class="info-header">
				Select Desire products
			</div>
			<div class="info-body">
			<?php foreach ($products as $product): ?>
				<div class="info-box info-xs info-default">
				<div class="info-header">
					<p class="badge"><?php echo $product['name']?></p>
				</div>
				<div class="info-body">
					<p class="price"><?php echo format_price($product['price']);?></p>
					<?php echo checkbox('squaredTwo', '1', $product['name'], '');?>
				</div>
				</div>
			<?php endforeach?>
			</div>
		</div>
		<div class="order-footer">
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>