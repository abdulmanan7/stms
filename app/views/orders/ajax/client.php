<div class="col-lg-12">
	<div class="info-header"><?php echo $client['name'] . "<span class='pull-right'>" . client_relation($client['id']) . "</span>"?></div>
      <div class="info-body">
        <strong><?php echo $client['cellphone']?></strong>
        <p><?php echo $client['city']?></p>
        <p><?php echo $client['address']?></p>
      </div>
</div>