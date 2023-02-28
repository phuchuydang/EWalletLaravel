$('#register-form').validate({
    onfocusout: function (element) {
        $(element).valid();
    },
    onchange: function (element) {
        $(element).valid();
    },
    rules: {
        email: {
            required: true,
            maxlength: 50,
            email: true
        },
        fullname: {
            required: true,
            maxlength: 50
        },
        phone: {
            required: true,
            maxlength: 13
        },
        address: {
            required: true,
            maxlength: 100
        },
        birthday: {
            required: true,
            greater_date: new Date().toISOString().split('T')[0]
        },
        fcard: {
            required: true,
            filesize: 2097152,
        },
        bcard: {
            required: true,
            filesize: 2097152,
        },
    },
    submitHandler: function(form) {
        form.submit();
        $('#btn-register').prop('disabled', true);
    }
});