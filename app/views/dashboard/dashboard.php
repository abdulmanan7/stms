<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row" id="main-row">
	<div class="col-xs-2 search-box">
		<div class="search-bar">
			<form action="" method="POST" role="form">
			<div class='col-xs-12 push-up-15'>
			<label for="cellphone" >Search by cellphone</label>
				<div class='input-group'>
					<input id="by_cellphone" class='search form-control' name='cellphone' placeholder='Enter Cellphone...' type='text'>
					<span class='input-group-btn'>
						<button class='btn' type='submit' name="cellphone">
							<i class='icon-search'></i>
						</button>
					</span>
				</div>
			</div><!--col-md-12 end -->
			<div class='col-xs-12'>
			<label for="cellphone">Search by name</label>
				<div class='input-group'>
					<input id="by_name" class='search form-control' name='search' placeholder='Enter Client Name...' type='text'>
					<span class='input-group-btn'>
						<button class='btn' type='submit' name="name">
							<i class='icon-search'></i>
						</button>
					</span>
				</div>
			</div><!--col-md-12 end -->
			</form>
		</div>
	</div>
	<div class="col-lg-10 client_info">
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
        $('#main-row').append($('<div class="col-lg-10 client_info"></div>'));
        $(".client_info").html(msg);
    },
});
}
</script>