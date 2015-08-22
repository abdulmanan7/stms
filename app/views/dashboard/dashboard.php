<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
	<div class="col-lg-2">
		<div class="search-bar">
			<div class='col-md-12'>
			<label for="cellphone" class="">search by Cellphone</label>
				<div class='input-group'>
					<input id="by_cellphone" class='search form-control' name='cellphone' placeholder='Enter Cellphone...' type='text'>
					<span class='input-group-btn'>
						<button class='btn' type='submit' name="cellphone">
							<i class='icon-search'></i>
						</button>
					</span>
				</div>
			</div><!--col-md-12 end -->
<br />
<br />
<br />
			<div class='col-md-12'>
			<label for="cellphone" class="">search by Name</label>
				<div class='input-group'>
					<input id="by_name" class='search form-control' name='search' placeholder='Enter Client Name...' type='text'>
					<span class='input-group-btn'>
						<button class='btn' type='submit' name="name">
							<i class='icon-search'></i>
						</button>
					</span>
				</div>
			</div><!--col-md-12 end -->
		</div>
	</div>
	<div class="col-lg-10 client_info">
	</div>
</div><!-- row end -->
<script>
  $(function() {
    $( "#by_cellphone" ).autocomplete({
      source: "<?php echo base_url('order/get_client');?>",
      minLength: 2,
      select: function( event, ui ) {
        display_client( ui.item ?
          /*"Selected: " + ui.item.value + " aka " + ui.item.id*/ ui.item.value:
          'no-data' );
    }
});
});
  function display_client (cellphone) {
    if (cellphone=='no-data') {
        var div='<div class="no-data">Nothing selected</div>'
        $('.client_info').appendTo(div);
    };
    $.ajax({
     url: '<?php echo base_url("ajax/get_client");?>',
     dataType: 'html',
     data: {cellphone: cellphone},
     success:function(msg){
      // $(".client_info").remove();
      // var div='<div class="client_info"></div>'
        // $('#tags').append(div)
        $(".client_info").html(msg);
    },
});
}
</script>