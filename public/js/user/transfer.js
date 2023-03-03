$('#transfer-form').validate({
    ignore: [],
    rules: {
        phone: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 11,
        },
        money: {
            required: true,
            number: true,
            min: 1,
            multiple_of_50000: true,
        },
    },
    submitHandler: function(form) {
        form.submit();
        $('#btn-withdraw').prop('disabled', true);
    }
});

