<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
	</div>

<!-- <div class="col-md-3 statbox purple" onTablet="span6" onDesktop="col-md-3">
			<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
			<div class="number">854<i class="icon-arrow-up"></i></div>
			<div class="title">visits</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="col-md-3 statbox green" onTablet="span6" onDesktop="col-md-3">
			<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
			<div class="number">123<i class="icon-arrow-up"></i></div>
			<div class="title">sales</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="col-md-3 statbox blue noMargin" onTablet="span6" onDesktop="col-md-3">
			<div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
			<div class="number">982<i class="icon-arrow-up"></i></div>
			<div class="title">orders</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div>
		<div class="col-md-3 statbox yellow" onTablet="span6" onDesktop="col-md-3">
			<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
			<div class="number">678<i class="icon-arrow-down"></i></div>
			<div class="title">visits</div>
			<div class="footer">
				<a href="#"> read full report</a>
			</div>
		</div> -->



	<div class="col-md-8 client_info">
	</div>
</div><!-- row end -->
<script>
  $(function() {
    $( "#by_cellphone" ).autocomplete({
      source: "<?php echo base_url('ajax/get_client_by_cell');?>",
      minLength: 2,
      select: function( event, ui ) {
        display_client( ui.item ? ui.item.value:'no-data' );
    }
});
  $( "#by_name" ).autocomplete({
      source: "<?php echo base_url('ajax/get_client_by_name');?>",
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
     url: '<?php echo base_url("ajax/get_client_details");?>',
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