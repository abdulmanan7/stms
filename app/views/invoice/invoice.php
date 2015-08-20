<div class="col-sm-10" >
    <div class="row">
        <div class="col-xs-6" id="invoiceLogo">
            <h1>
                <a href="#">
                    <img src="<?php echo base_url($company['logo']); ?>">
                </a>
            </h1>
        </div>
        <div class="col-xs-6 text-right">

            <h1 class="invoiceHeading"><?php echo lang('heading'); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo lang('view_bailer_details_label'); ?> <a
                            href="#"><?php echo $invoice['invoice']['company_name'] ?></a></h4>
                </div>
                <div class="panel-body">
                    <p>
                        <small><?php echo $invoice['invoice']['company_address1']; ?></small>
                        <br>
                        <br>
                        <small><?php echo $invoice['invoice']['company_email']; ?></small>
                        <br>
                        <small><?php echo $invoice['invoice']['company_fax']; ?></small>
                        <br>
                        <small><?php echo $invoice['invoice']['company_phone']; ?></small>
                    </p>
                </div>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo lang('view_receiver_details_label'); ?> <a
                            href="#"><?php echo $invoice['invoice']['customer_name'] ?></a></h4>
                </div>
                <div class="panel-body">
                    <p>
                        <small><?php echo $invoice['invoice']['customer_address']; ?></small>
                        <br>
                        <br>
                        <small><?php echo $invoice['invoice']['customer_email']; ?></small>
                        <br>
                        <small><?php echo $invoice['invoice']['customer_attn_name']; ?></small>
                        <br>
                        <small><?php echo $invoice['invoice']['customer_phone']; ?></small>
                    </p>
                </div>

            </div>
        </div>
        <div class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo lang('view_invoice_details_label'); ?></h4>
                </div>
                <div class="panel-body">
                    <p>
                        <?php echo lang('invoice_no_label'); ?>
                        <small><?php echo $invoice['invoice']['id']; ?></small>
                        <br>
                        <br>
                        <?php echo lang('date_label'); ?>
                        <small><?php echo dateformat($invoice['invoice']['current_time_stamp']); ?></small>
                        <br>
                        <?php echo lang('status_view_status_label'); ?>
                        <small><a href="#invoice_status_modal" data-toggle="modal"
                                  data-id="<?php echo $invoice['invoice']['id'] ?>"
                                  data-comment="<?php echo $invoice['status']['comment'] ?>"
                                  data-target="#invoice_status_modal"')><?php echo $invoice['status']['status']; ?></a>
                        </small>
                        <br>
                        <?php echo lang('total_label'); ?>
                        <small><?php echo $invoice['invoice']['currency_symbol_left'] . $invoice['invoice']['total']; ?></small>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- / end client details section -->
    <table class="table">
        <thead>
        <tr>
            <th>
                <h4><?php echo lang('product_label'); ?></h4>
            </th>
            <th>
                <h4><?php echo lang('quantity_label'); ?></h4>
            </th>
            <th>
                <h4><?php echo lang('price_label'); ?></h4>
            </th>
            <th>
                <h4>Tax</h4>
            </th>
            <th>
                <h4><?php echo lang('sub_total_label'); ?></h4>
            </th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($invoice['invoice_details'] as $key => $detailsval) {
            echo "<tr>";
            echo "<td>" .$detailsval['product_name']."</td>";
            echo "<td class='text-center'>".$detailsval['quantity']."</td>";
            echo "<td class='text-right'>".$invoice['invoice']['currency_symbol_left'].$detailsval['price']."</td>";
            echo "<td class='text-right'>".$invoice['invoice']['currency_symbol_left'].$detailsval['product_tax']."</td>";
            echo "<td class='text-right'>".$invoice['invoice']['currency_symbol_left'].$detailsval['product_total']."</td>";
            echo "</tr>";
            echo "<tr>";if (!empty($detailsval['product_description'])) {
                echo "<td colspan='5' class='active'>" .$detailsval['product_description']."</td></tr>";
            }

        } ?>
        </tbody>

    </table>
    <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
            <p>
                <strong>
                    <?php echo lang('sub_total_label') . "<br>" ?>
                    <?php echo lang('tax_label') . "<br>" ?>
                    <?php echo lang('total_label') . "<br>" ?>
                </strong>
            </p>
        </div>
        <div class="col-xs-2">
            <strong>
                <?php echo $invoice['invoice']['currency_symbol_left'] . $invoice['invoice']['subtotal'] . " " . $invoice['invoice']['currency_symbol_right']; ?>
                <br>
                <?php echo $invoice['invoice']['currency_symbol_left'] . $invoice['invoice']['totaltax'] . " " . $invoice['invoice']['currency_symbol_right']; ?>
                <br>
                <?php echo $invoice['invoice']['currency_symbol_left'] . $invoice['invoice']['total'] . " " . $invoice['invoice']['currency_symbol_right']; ?>
                <br>
            </strong>
        </div>
    </div>
    <!--   <div class="row">
      <div class="col-xs-5">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h4>Bank details</h4>
          </div>
          <div class="panel-body">
            <p>Your Name</p>
            <p>Bank Name</p>
            <p>SWIFT : --------</p>
            <p>Account Number : --------</p>
            <p>IBAN : --------</p>
          </div>
        </div>
      </div>
      <div class="col-xs-7">
        <div class="span7">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4>Contact Details</h4>
            </div>
            <div class="panel-body">
              <p>
                Email : you@example.com <br><br>
                Mobile : -------- <br> <br>
                Twitter : <a href="https://twitter.com/tahirtaous">@TahirTaous</a>
              </p>
              <h4>Payment should be made by Bank Transfer</h4>
            </div>

          </div>
        </div>
      </div></div> -->
</div>
<?php $this->load->view('invoice/modal/invoice_status');?>