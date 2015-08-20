<div class="col-sm-10">
    <div class="row">
        <div class="col-sm-12">
            <!-- message Error or any other  -->
            <?php if(!empty($message)) {
                echo '<div class="alert alert-success">'.$message.'</div>';}?>

            <div class="panel panel-default bootstrap-admin-no-table-panel">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><p><?php echo lang('heading_add');?></div>
                </div>
                <div class="bootstrap-admin-no-table-panel-content bootstrap-admin-panel-content collapse in">
                    <?php  echo form_open('invoice/add','class="form-horizontal " id="form" role="form"');  ?>

                    <!-- Client Dropdown -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="customer_id"><?php echo lang('name_label'); ?></label>
                        <div class="col-md-8">
                            <?php echo form_dropdown('customer_id',$customers,$selected_customer,'class="form-control selectize-select" placeholder='.'"'.lang('placeholder_name').'"'."'");?>
                        </div>
                    </div>
                    <!-- Client Dd Closed -->

                    <!-- Date Field -->
                    <div class="form-group">
                        <label for="date" class="control-label sr_only col-md-2"><?php echo lang('date_label'); ?></label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <?php echo form_input('date',date("D M d, Y G:i a"), 'id="date" class="form-control datepicker" placeholder='.'"'.lang('placeholder_date').'"'."'");?>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                <?php echo form_error('date'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- date Field Closed -->
                    <!-- Currency Dropdown -->

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="currency"><?php echo lang('currency_label'); ?></label>
                        <div class="col-md-8">
                            <?php echo "<select name='currency' class='form-control currency' >";
                            foreach ($currency as $row)
                            {
                                echo "<option value='".$row['id']."'"."data-symLeft='".$row['symbol_left']."'>".$row['symbol_left'].$row['title']."</option>";
                            }
                            echo "</select>";?>
                            <?php echo form_error('currency'); ?>
                        </div>
                    </div>
                    <!-- Currency Dd Closed -->

                    <!-- Product AutoComplete Field -->
                    <div class="form-group">
                        <div class="col-md-12" id="products">
                            <div class="row labels">
                                <!-- labels goes here... -->
                                <div class="col-sm-3">
                                    <label for="product[]"><?php echo lang('product_label'); ?></label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="price[]"><?php echo lang('price_label'); ?></label>
                                </div>
                                <div class="col-sm-2">
                                    <label for="qty[]"><?php echo lang('quantity_label'); ?></label>
                                </div>
                                <div class="col-sm-3">
                                    <label for="tax_id[]"><?php echo lang('tax_type_label'); ?></label>
                                </div>

                                <div class="col-sm-2">
                                    <label for="total"><?php echo lang('total_label'); ?></label>
                                </div>
                            </div>
                            <div class="row prods">

                                <div class="col-sm-3">
                                    <input type="text" name="product[]" class="product form-control" <?php echo set_value('product[]'); ?> placeholder='<?php echo lang('placeholder_product'); ?>'>
                                    <?php echo form_error('product[]'); ?>

                                    <input type="hidden" name="product_id[]" <?php set_value("");?>>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="price[]" class="price form-control"<?php echo set_value("price[]");?> placeholder='<?php echo lang('placeholder_price'); ?>'>
                                    <?php echo form_error('price[]'); ?>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="qty[]" class="quantity form-control"<?php echo set_value("qty[]");?> placeholder='<?php echo lang('placeholder_quantity'); ?>'>
                                    <?php echo form_error('qty[]'); ?>
                                </div>
                                <div class="col-sm-3">
                                    <?php echo "<select name='tax_type[]' class='form-control tax_type' >";
                                    foreach ($taxs as $row) {
                                        echo "<option value='".$row['id']."'"."data-per='".$row['percentage']."'>".$row['name']."</option>";
                                    }
                                    echo "</select>";?>
                                    <?php echo form_error('tax_type[]'); ?>
                                </div>
                                <div class="col-sm-2">
                                    <span class="curr_left"></span><span class="total">0</span></span>
                                </div>
                                <div class="descDiv col-sm-12">
                                    <label class="addDescription label label-info"><?php echo lang('add_description_btn')?></label>
                                    <!-- <div class="footerNotes"> -->
                                    <textarea name="description[]" cols="40" rows="3" class="footerinput form-control" placeholder='<?php echo lang('placeholder_description'); ?>' style="display: none;" <?php echo set_value("description[]");?>></textarea>
                                    <?php echo form_error('description[]'); ?>
                                    <!-- </div> -->
                                </div>

                            </div>
                        </div>
                    </div><!--horental form content closed -->
                    <span class="col-md-1 btn btn-success btn-xs" id="addmore"><?php echo lang('add_more_btn'); ?></span>
                    <div class="col-md-offset-8">
                        <label for="subtotal"><?php echo lang('sub_total_label'); ?></label>
                        <div class="bold-text pull-right"><span class="curr_left"> </span><span id="sub_total" class="subtotal">0</span><span class="curr_right"></span></div>
                    </div>
                    <div class="col-md-offset-8">
                        <label for="tax"><?php echo lang('tax_label'); ?></label>
                        <div class="bold-text pull-right"> <span class="curr_left"> </span><span id="tax_total" class="taxTotal">0</span><span class="curr_right"></span></div>
                    </div>
                    <div class="col-md-offset-8">
                        <label for="totaltotal"><?php echo lang('total_label'); ?></label>
                        <div class="bold-text pull-right"> <span class="curr_left"> </span><span id="total_total" class="totaltotal">0</span><span class="curr_right"></span></div>
                    </div>
                    <button type="submit" class="col-md-offset-9 btn btn-primary"><?php echo lang('submit_btn'); ?></button>
                    <?php form_close(); ?>

                </div><!-- bootstrap-admin-no-table-panel-content -->
            </div><!-- panel panel-default bootstrap-admin-no-table-panel -->
        </div><!-- form area div -->
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $('.datepicker').datepicker();
        getCurrency('');
        autoField();
        $('#form').validate(
            {
                rules: {
                    product: {
                        minlength: 2,
                        required: true
                    },
                    qty: {
                        required: true
                    }
                }
            });

        $('body').on('keyup','.quantity', function() {
            $(this).parent().nextAll().eq(1).children().next('span.total').text(function(){
                var sum = 0;
                var qtyVal=parseFloat($(this).parent().prevAll().eq(1).children(':first-child').val());
                var Cprice=parseFloat($(this).parent().prevAll().eq(2).children(':first-child').val());
                var rawper=parseFloat($(this).parent().prevAll().eq(0).children(':first-child').find(':selected').data('per'));
                var percentage=calPercentage(rawper);
                if (!isNaN(Cprice) & !isNaN(Cprice) & !isNaN(qtyVal)) {
                    sum = qtyVal*Cprice*percentage;
                }else{
                    sum = 0;
                }
                return sum.toFixed(2);
            });
            sumUpTotal();//callling function from myjs file
            sumUpPer();
            sumUpPrice();
        });

    });
    $('body').on('change', '.currency', function(event) {
        var CurId=$(this).find(':selected').val();
        getCurrency(CurId);
    });
    function getCurrency(CurId) {
        var left;
        var right;
        var url='<?php echo site_url("invoice/jsonCurrency"); ?>'+'/'+CurId;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {},
            url: url,
            success: function(data) {
                $.each(data, function(index, element) {
                    left = element.symbol_left;
                    right = element.symbol_right;
                });
                $('.curr_left').html(left);
                $('.curr_right').html(right);
            }
        });
    }
    function autoField(){
        $(".product").autocomplete({
            source: '<?php echo site_url("invoice/get_products"); ?>',
            select: function(e,ui) {
                $(this).next().val(ui.item.id);
                $(this).parent().next().children(':first-child').val(ui.item.price);
                $(this).parent().nextAll().eq(1).children(':first-child').val("");
                $(this).parent().nextAll().eq(3).children(':first-child').val("");
            }//autocomplete finish
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            var inner_html = '<a><div class="list_item_container">' + item.label + '</div></a>';
            return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
        };
    }

</script>