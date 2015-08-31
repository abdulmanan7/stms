<div class='panel-footer'>
<?php echo isset($links) ? $links : '';?>
</div>
</div><!--pannel body end-->
</div><!--pannel end-->
<script>
  $(function() {
    $( "#search" ).autocomplete({
      source: "<?php echo base_url('ajax/get_client_by_cell');?>",
      minLength: 2,
      select: function( event, ui ) {
       client_id=ui.item.value;
       window.location.href = '<?php if ($heading == "Client View") {echo base_url("client/view?search=");} else {echo base_url("client/index?search=");}
;?>'+client_id;
    }
});
});
</script>