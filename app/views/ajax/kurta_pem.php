<?php $kurta = $client['kurta'];unset($client['kurta']);?>
<?php $this->load->view('ajax/panel-start');?>
<?php if (empty($client)): ?>
  <p class="no-data"><?php echo lang('msg_no_record');?></p>
<?php else: ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="col-lg-12 color-gray client-info">
       <div class="info-header header-sm"><?php echo $client['name'] . "<span class='pull-right'>" . $client_relation . "</span>"?></div>
        <address class="pad-12">
          <strong><?php echo $client['cellphone']?></strong>
          <p><?php echo $client['city']?></p>
          <p><?php echo $client['address']?></p>
        </address>
      </div>
      </div>
      <div class="col-lg-12 push-up">
      <div class="info-box info-default">
          <div class="info-header header-sm">Kurta Pemaish Details <a href="<?php echo base_url('client/update_kurta/' . $client['clientId']);?>" data-toggle="tooltip" data-original-title="Edit client" class="pull-right btn btn-warning btn-xs"><i class="icon-edit"> </i> Edit</a></div>
          <div class="info-body">
            <div class="detail"><span class="badge">Lambai</span><h4><?php echo find_style($kurta['lambai']);?></h4></div>
            <div class="detail"><span class="badge">Chatti</span><h4><?php echo find_style($kurta['chatti']);?></h4></div>
            <div class="detail"><span class="badge">Tera</span><h4><?php echo find_style($kurta['tera']);?></h4></div>
            <div class="detail"><span class="badge">Shoulder</span><h4><?php echo find_style($kurta['shoulder']);?></h4></div>
            <div class="detail"><span class="badge">Collar</span><h4><?php echo find_style($kurta['collar']);?></h4></div>
            <div class="detail"><span class="badge">Asteen</span><h4><?php echo find_style($kurta['asteen']);?></h4></div>
            <div class="detail"><span class="badge">Mora</span><h4><?php echo find_style($kurta['mora']);?></h4></div>
            <div class="detail"><span class="badge">Daman</span><h4><?php echo find_style($kurta['daman']);?></h4></div>
            <div class="detail"><span class="badge">Pancha</span><h4><?php echo find_style($kurta['pancha']);?></h4></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif?>
<?php $this->load->view('ajax/panel-end');?>