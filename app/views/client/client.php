<?php $this->load->view('partial/panel-start');?>
<?php if (empty($clients)): ?>
<p class="no-data"><?php echo lang('msg_no_data');?></p>
<?php else: ?>
<?php foreach ($clients as $client): ?>
<div class="client-rec">
	<div class="col-sm-2 head">
		<?php echo htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8');?>
		<p><?php echo htmlspecialchars($client['cellphone'], ENT_QUOTES, 'UTF-8');?></p>
	</div>
	<div class="col-sm-7 tail">
		<?php echo htmlspecialchars($client['address'], ENT_QUOTES, 'UTF-8');?><br />
		<?php echo htmlspecialchars($client['city'], ENT_QUOTES, 'UTF-8');?>
	</div>
	<div class="col-sm-3 action">
		<a class='btn btn-info' href='<?php echo base_url("client/view/" . $client['id']);?>'>
			<i class='icon-folder-open'></i>
		</a>
		<a class='btn btn-success' href='<?php echo base_url("client/update/" . $client['id']);?>'>
			<i class='icon-edit'></i>
		</a>
		<a class='btn btn-danger' href='<?php echo base_url("relation/remove/" . $client['id']);?>'>
			<i class='icon-trash'></i>
		</a>
	</div>
</div>
<?php endforeach;?>
<?php endif?>
<?php $this->load->view('partial/panel-end');?>