<div class="col-lg-12">
	<p class="client-name"><?php echo $client['name'] . "<span class='pull-right'>" . client_relation($client['id']) . "</span>"?></p>
      <address>
        <strong><?php echo $client['cellphone']?></strong>
        <p><?php echo $client['city']?></p>
        <p><?php echo $client['address']?></p>
      </address>
</div>