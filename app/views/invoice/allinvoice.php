<?php if (null !== $this->session->flashdata('message')) {
	$messageArray = $this->session->flashdata('message');
	$message = $messageArray['message'];
}
?>
<?php $this->load->view('partial/panel-start');?>

		  <?php if (empty($allinvoice)): ?>
		  	 <p class="no-data"><?php echo lang('msg_no_data');?></p>
		  <?php else: ?>
                   <form name="" method="get" action="<?php echo site_url('invoice');?>" role="form" id="form"
                         class="form-horizontal">
                       <div class="col-md-3">
                           <?php echo form_input('start_date', isset($start_date) ? $start_date : '', 'id="start_date" class="form-control datepicker" placeholder=' . '"' . lang('placeholder_start_date') . '"' . "'");?>
                           <span class="error"><?php echo form_error('start_date');?></span>
                       </div>
                       <div class="col-md-3">
                           <?php echo form_input('end_date', isset($end_date) ? $end_date : '', 'id="end_date" class="form-control datepicker" placeholder=' . '"' . lang('placeholder_end_date') . '"' . "'");?>
                           <span class="error"><?php echo form_error('end_date');?></span>
                       </div>
                       <div class="col-md-3">
                           <?php echo "<select name='status_id' class='form-control customer' >";
echo "<option value=''>--Select--</option>";
foreach ($status as $row) {
	echo "<option value='" . $row['id'] . "'" . "data-per='" . $row['id'] . "'" . (isset($status_id) ? (($row['id'] == $status_id) ? "selected=selected" : '') : '') . ">" . $row['name'] . "</option>";
}
echo "</select>";?>
                           <span class="error"><?php echo form_error('status_id');?></span>
                       </div>
                       <div class="col-md-3">
                           <input type="submit" name="submit" class="btn btn-primary"
                                  value="<?php echo lang('filter_btn');?>">
                       </div>
                   </form>
              <table class="table table-striped table-bordered">
				 <thead>
					<tr>
						<th>	<?php echo lang('view_date_label');?>			</th>
						<th>	<?php echo lang('view_customer_name_label');?>	</th>
						<th>	<?php echo lang('status_view_status_label');?></th>
						<th class="text-right">	<?php echo lang('view_total_label');?>		</th>
						<th>	<?php echo lang('view_action');?>				</th>
					</tr>
				 </thead><!-- table head -->
				  <?php foreach ($allinvoice as $val): ?>
				 <tbody>
					<tr>
						<td><?php echo dateformat($val['current_time_stamp']);?></td>
						<td><?php echo $val['customer_name'];?></td>
                        <td class="text-center"><a class="popup <?php echo ($val['invoice_statuses_id'] == 1) ? "label label-warning" : "label label-success";?>"
                                href="#invoice_status_modal" data-toggle="modal" data-id="<?php echo $val["id"]?>"
                                data-comment="<?php echo $val['comment']?>"
                                data-target="#invoice_status_modal") data-original-title="Click to change Status"><?php echo $val['invoice_status'];?></a></td>
						<td><span class="pull-right"><?php echo $val['currency_symbol_left'];?><?php echo floatFormat($val['total']);?><?php echo " " . $val['currency_symbol_right'];?></span></td>
					  	<td>
                            <a href="#emailmodal" class="btninv_st btn btn-default btn-xs" data-toggle="modal" data-id="<?php echo $val["id"]?>"
                               data-cemail="<?php echo $val["customer_email"]?>" data-cname="<?php echo $val["customer_name"]?>"
                               data-target="#emailmodal" ><?php echo lang('email_btn');?> </a>
                            <a href="<?php echo site_url('invoice/singleinvoice') . "/" . $val['id'];?>" class="btn btn-xs btn-warning popup" data-original-title="View">
                              <i class="glyphicon glyphicon-eye-open glyphicon-white" ></i>
                            </a>
                            <a href="<?php echo site_url('invoice/update') . "/" . $val['id'];?>" class="btn btn-xs btn-info popup" data-original-title="Update">
                              <i class="glyphicon glyphicon-edit glyphicon-white" ></i>
                            </a>
                            <a href="<?php echo site_url('invoice/getpdf') . "/" . $val['id'];?>" class="btn btn-xs btn-success popup" data-original-title="Download PDF">
                            <i class="glyphicon glyphicon-download glyphicon-white" ></i>
                            </a>
                            <a href="invoice/delete/<?php echo $val['id'];?>" class="delete btn btn-xs btn-danger popup" id="a_delete" data-original-title="Delete Record">
                              <i class="glyphicon glyphicon-remove glyphicon-white" ></i>
                            </a>
					  </td>
					</tr>
				</tbody>
				  <?php endforeach?>
			</table>
<?php $this->load->view('partial/panel-end');?>
		  <?php endif?>
   <?php $this->load->view('invoice/modal/email');?>
   <?php $this->load->view('invoice/modal/invoice_status');?>
<script>
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('#start_date').datepicker({
        onRender: function (date) {
            return date.valueOf() > now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('#end_date')[0].focus();
    }).data('datepicker');
    var checkout = $('#end_date').datepicker({
        onRender: function (date) {
            return date.valueOf() == checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        checkout.hide();
    }).data('datepicker');
    $('#form').validate(
        {
            rules: {
                start_date: {
                    date: true,
                    required: true
                },
                end_date: {
                    date: true,
                    required: true
                },
                status_id: {
                    required: true
                }
            }
        });

</script>
