<div class="row" id="main-row">
<div class="col-lg-4" class='client'>
    <form action="<?php echo base_url('order/get_client_info');?>" method="GET" class="form-inline" role="form">
        <div class="form-group" style="margin-left: 18px;">
            <label class="sr-only" for="cellphone">cellphone</label>
            <input type="text" name="cellphone" class="form-control" id="tags" placeholder="Enter cellphone no..">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <?php if (isset($client)): ?>
      <div class="client_info">
      <div class="col-lg-12">
        <p class="client-name"><?php echo $client['name']?></p>
        <address>
            <strong><?php echo $client['cellphone']?></strong>
            <p><?php echo $client['city']?></p>
            <p><?php echo $client['address']?></p>
        </address>
    </div>
</div>
<?php endif?>
<div class="client_info">
</div>
</div>
</div>
<script>
  $(function() {
    $( "#tags" ).autocomplete({
      source: "<?php echo base_url('ajax/get_client_by_cell');?>",
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
     url: '<?php echo base_url("order/get_client_info");?>',
     dataType: 'html',
     data: {cellphone: cellphone},
     success:function(msg){
         $(".client_info").remove();
        $('#main-row').append($('<div class="col-lg-4 client_info"></div>'));
        $(".client_info").html(msg);
    },
});
}
</script>