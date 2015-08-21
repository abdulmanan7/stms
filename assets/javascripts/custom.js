jQuery.validator.setDefaults({
    errorPlacement: function(error, element) {
        // if the input has a prepend or append element, put the validation msg after the parent div
        if (element.parent().hasClass('input-prepend') || element.parent().hasClass('input-append')) {
            error.insertAfter(element.parent());
            // else just place the validation message immediatly after the input
        } else {
            error.insertAfter(element);
        }
    },
    errorElement: "small", // contain the error msg in a small tag
    wrapper: "div", // wrap the error message and small tag in a div
    highlight: function(element) {
                $(element).nextAll().children('small').addClass('text-danger');
        $(element).closest('.form-group').addClass('has-error'); // add the Bootstrap error class to the form group
        $(element).closest('.form-group').removeClass('has-success'); // remove the Boostrap Success class from the form group

    },
    success: function(element) {
        $(element).closest('.form-group').removeClass('has-error'); // remove the Boostrap error class from the form group
        $(element).closest('.form-group').addClass('has-success'); // add the Bootstrap success class to the form group
    }
});
 $('body').on('click', '.delete', function(event) {
        if (!confirm("Are you sure! want to delete the Record?")) {
            return false;
        }
    });
 $(document).ready(function() {
    $("body").on('keypress', '.quantity,.price', (function(event) {
        if (event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46) {
            return 0;
        } else if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    })); //Quantity Field Validation

    $('body').on('click', '.addDescription', function(event) {
        $(this).next().toggle('slow');
    }); //Add Description Hide Show
    $("#products").on('click', '.close', function() {
        $(this).parent().parent().remove();
        sumUp('.total', '#total_total'); //callling function from myjs file
        sumUpPer();
    });
    $('#addmore').on('click', function() {
        var cloneRow = $('.prods:first').clone();
        cloneRow.find("input").val("").end();
        cloneRow.find(".product").removeAttr('readonly');
        cloneRow.find(".enable-input").remove();
        cloneRow.find(".total").text("0").end();
        cloneRow.find(".stock").text('0').end();
        cloneRow.find(".close").remove();
        cloneRow.find(".total").parent().after('<div class="col-sm-1"><button type="button" class="close margin-left-5"  data-original-title="Remove row" data-dismiss="alert"> <i class="fa fa-minus-circle"></i></button></div>');
        cloneRow.find(".footerinput").css({
            "display": "none"
        }).text('');
        cloneRow.appendTo('#products');
        autoField();

    }); //Add Dynamic Row
    $('body').on('click', '.product', function(event) {
        event.preventDefault();
        $(this).removeAttr('readonly');
        $(this).parent().find('input').val('');
        $(this).parent().next().children(':first-child').val('');
        $(this).parent().nextAll().eq(1).find('span').remove();
        $(this).parent().find('span').remove();
    });
}); //Documents Ready
