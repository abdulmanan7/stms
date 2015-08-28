<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" id="main-row">
	<div class="col-md-4 ">
		<div class="search-bar push-up-15">
			<form action="" method="POST" role="form">
			<label for="cellphone" >Search by cellphone</label>
				<div class='input-group'>
					<input id="by_cellphone" class='search form-control' name='cellphone' placeholder='Enter Cellphone...' type='text'>
					<span class='input-group-btn'>
						<button class='btn' type='submit' name="cellphone">
							<i class='icon-search'></i>
						</button>
					</span>
			</div><!--col-md-12 end -->
			<label for="cellphone">Search by name</label>
				<div class='input-group'>
					<input id="by_name" class='search form-control' name='search' placeholder='Enter Client Name...' type='text'>
					<span class='input-group-btn'>
						<button class='btn' type='submit' name="name">
							<i class='icon-search'></i>
						</button>
					</span>
				</div>
			</form>
		</div>
		<?php if (empty($clients)): ?>
<p class="no-data"><?php echo lang('msg_no_data'); ?></p>
<?php else: ?>

	<div class="info-box">
	<div class="info-header">
		<p>Recent Added Records</p>
	</div>
	<div class="info-body">
		<?php foreach ($clients as $client): ?>
		<div class="client-rec">
	<div class="col-lg-12 head">
		<?php echo htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8'); ?>
		<p><?php echo htmlspecialchars($client['cellphone'], ENT_QUOTES, 'UTF-8'); ?></p>
	</div>

	<div class="col-lg-12 action">
		<a class='btn btn-info' href='<?php echo base_url("client/view/" . $client['id']); ?>'>
			<i class='icon-folder-open'></i>
		</a>
		<a class='btn btn-success' href='<?php echo base_url("client/update/" . $client['id']); ?>'>
			<i class='icon-edit'></i>
		</a>
		<a class='btn btn-danger' href='<?php echo base_url("relation/remove/" . $client['id']); ?>'>
			<i class='icon-trash'></i>
		</a>
	</div>
</div>
<?php endforeach; ?>
<?php endif ?>
	</div>

	</div>
	</div>


	<div class="col-md-8 client_info">
	</div>
</div><!-- row end -->
<script>
  	$(function() {
    $( "#by_cellphone" ).autocomplete({
      source: "<?php echo base_url('ajax/get_client_by_cell'); ?>
		",
		minLength: 2,
		select: function( event, ui ) {
		display_client( ui.item ? ui.item.value:'no-data' );
		}
		});
		$( "#by_name" ).autocomplete({
		source: "
<?php echo base_url('ajax/get_client_by_name'); ?>
	",
	minLength: 2,
	select: function( event, ui ) {
	display_client( ui.item ? ui.item.label:'no-data' );
	}
	});
	});
	function display_client (param) {
	if (param=='no-data') {
	var div='<div class="no-data">Nothing selected</div>'
	$('.client_info').appendTo(div);
	};
	$.ajax({
	url: '
<?php echo base_url("ajax/get_client_details"); ?>
		',
		dataType: 'html',
		data: {param: param},
		success:function(msg){
		$(".client_info").remove();
		$('#main-row').append($('<div class="col-md-8 client_info"></div>'));
		$(".client_info").html(msg);
		},
		});
		}
</script>