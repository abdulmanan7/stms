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