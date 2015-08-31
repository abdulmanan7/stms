<?php $this->load->view('partial/panel-start');?>
<?php if (empty($client)): ?>
<p class="no-data"><?php echo lang('msg_no_record');?></p>
<?php else: ?>
<div class="row">
  <div class="col-lg-12">
    <div class="info-box info-info info-lg">
      <div class="info-header header-sm"><?php echo $client['name'] . "<span class='pull-right'>" . client_relation($client['client_id']) . "</span>"?></div>
      <div class="info-body">
        <strong><?php echo $client['cellphone']?></strong>
        <p><?php echo $client['city']?></p>
        <p><?php echo $client['address']?></p>
        <p><?php echo button('add_detail', 'client/choose_type/' . $client['client_id'] . "?link=client/add_kurta/", "Add detail ,Waskat ,kurta etc.", 'xs', 'icon-plus-sign');?></p>
        <?php $count = 0;if (!empty($kurtas)): ?>
        <?php foreach ($kurtas as $kurta): ?>
        <div class="info-box info-default">
          <div class="info-header header-sm">Kurta Pemaish Details <span class="badge"><?php echo ++$count;?></span><?php echo button('edit', 'client/update_kurta/' . $kurta['kurta_id'], 'edit client', 'xs pull-right', 'icon-edit');?></div>
          <div class="info-body">
            <?php echo box_img($kurta['lambai'], 'lambai');?>
          <?php echo box_img($kurta['chatti'], 'chatti');?>
          <?php echo box_img($kurta['tera'], 'tera');?>
          <?php echo box_img($kurta['shoulder'], 'shoulder');?>
          <?php echo box_img($kurta['collar'], 'collar');?>
          <?php echo box_img($kurta['asteen'], 'asteen');?>
          <?php echo box_img($kurta['mora'], 'mora');?>
          <?php echo box_img($kurta['daman'], 'daman');?>
          <?php echo box_img($kurta['pancha'], 'pancha');?>
            <!-- <div class="detail"><span class="badge"><?php echo lang('lb_lambai')?></span><h4><?php echo find_style($kurta['lambai']);?></h4></div>
            <div class="detail"><span class="badge"><?php echo lang('lb_chatti')?></span><h4><?php echo find_style($kurta['chatti']);?></h4></div>
            <div class="detail"><span class="badge"><?php echo lang('lb_tera')?></span><h4><?php echo find_style($kurta['tera']);?></h4></div>
            <div class="detail"><span class="badge"><?php echo lang('lb_shoulder')?></span><h4><?php echo find_style($kurta['shoulder']);?></h4></div>
            <div class="detail"><span class="badge"><?php echo lang('lb_collar')?></span><h4><?php echo find_style($kurta['collar']);?></h4></div>
            <div class="detail"><span class="badge"><?php echo lang('lb_asteen')?></span><h4><?php echo find_style($kurta['asteen']);?></h4></div>
            <div class="detail"><span class="badge"><?php echo lang('lb_mora')?></span><h4><?php echo find_style($kurta['mora']);?></h4></div>
            <div class="detail"><span class="badge"><?php echo lang('lb_daman')?></span><h4><?php echo find_style($kurta['daman']);?></h4></div>
            <div class="detail"><span class="badge"><?php echo lang('lb_pancha')?></span><h4><?php echo find_style($kurta['pancha']);?></h4></div> -->
          </div>
          </div><!--info-box detail end-->
          <?php endforeach?>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
  <?php endif?>
  <?php $this->load->view('partial/panel-end');?>