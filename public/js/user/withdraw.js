$('#withdraw-form').validate({
    ignore: [],
    rules: {
        card_number: {
            required: true,
            number: true,
        },
        card_exp: {
            required: true,
            date: true,
        },
        card_cvv: {
            required: true,
            number: true,
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

