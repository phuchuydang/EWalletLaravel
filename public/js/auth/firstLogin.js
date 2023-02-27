$('#firstLogin-form').validate({
    onfocusout: function (element) {
        $(element).valid();
    },
    onkeyup: function (element) {
        $(element).valid();
    },
    rules: {
        password: {
            required: true,
            maxlength: 50,
            regExpression: true,
        },
        conf_password: {
            required: true,
            maxlength: 50,
            equalTo: "#password"
        }
    },
    submitHandler: function(form) {
        form.submit();
        $('#change-btn').prop('disabled', true);
    }
});