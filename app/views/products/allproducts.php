<?php $this->load->view('partial/panel-start');?>
        <?php if (empty($allproducts)): ?>
            <p class="no-data">No Record Added Yet.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>    <?php echo lang('view_name_label');?>           </th>
                    <th>    <?php echo lang('view_price_label');?>          </th>
                    <th>    <?php echo lang('view_notes_label');?>          </th>
                    <th>    <?php echo lang('view_action');?>               </th>

                </tr>
                </thead>
                <?php foreach ($allproducts as $key): ?>

                    <tbody>

                    <tr>

                        <td><?php echo $key['name'];?></td>
                        <td><?php echo $key['price'];?></td>
                        <td><?php echo $key['notes'];?></td>
                        <td>
                            <a href="<?php echo site_url('products/update') . "/" . $key['id'];?>" class="btn btn-xs btn-info" data-original-title="Update">
                                <i class="glyphicon glyphicon-edit glyphicon-white" ></i>
                            </a>
                            <a href="<?php echo site_url('products/delete') . "/" . $key['id'];?>" class="delete btn btn-xs btn-danger" data-original-title="Delete">
                                <i class="glyphicon glyphicon-trash glyphicon-white" ></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                <?php endforeach?>
            </table>
        <?php endif?>
<?php $this->load->view('partial/panel-end');?>