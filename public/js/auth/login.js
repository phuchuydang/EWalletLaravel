$('#login-form').validate({
    onfocusout: function (element) {
        $(element).valid();
    },
    rules: {
        username: {
            required: true,
            maxlength: 50
        },
        password: {
            required: true,
            maxlength: 50
        }
    },
    submitHandler: function(form) {
        form.submit();
        //disable button
        $('#login-btn').prop('disabled', true);
    }
});