<?php $this->load->view('partial/panel-start');?>
<?php if (empty($clients)): ?>
	<p class="no-data"><?php echo lang('msg_no_data');?></p>
<?php else: ?>
<table class='table table-bordered'>
	<thead>
		<tr>
			<th><?php echo lang('lb_client_name');?></th>
			<th><?php echo lang('lb_mobile');?></th>
			<th><?php echo lang('lb_city');?></th>
			<th><?php echo lang('lb_address');?></th>
			<th class='actions'><?php echo lang('lb_actions');?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($clients as $client): ?>
			<tr>
			<td><?php echo htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8');?></td>
			<td><?php echo htmlspecialchars($client['cellphone'], ENT_QUOTES, 'UTF-8');?></td>
			<td><?php echo htmlspecialchars($client['city'], ENT_QUOTES, 'UTF-8');?></td>
			<td><?php echo htmlspecialchars($client['address'], ENT_QUOTES, 'UTF-8');?></td>
			<td><a class='btn btn-info' href='<?php echo base_url("client/view/" . $client['id']);?>'>
                    <i class='icon-folder-open'></i>
                  </a>
			<a class='btn btn-success' href='<?php echo base_url("client/update_kurta/" . $client['id']);?>'>
                    <i class='icon-edit'></i>
                  </a>
			 <a class='btn btn-danger' href='<?php echo base_url("relation/remove/" . $client['id']);?>'>
                    <i class='icon-trash'></i>
                  </a>
			</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
<?php endif?>
<?php $this->load->view('partial/panel-end');?>