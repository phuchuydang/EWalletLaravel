$('#deposit-form').validate({
    ignore: [],
    // onfocusout: function (element) {
    //     $(element).valid();
    // },
    // onkeyup: function (element) {
    //     $(element).valid();
    // },
    rules: {
        amount: {
            required: true,
            number: true,
            min: 1,
        },
        card_number: {
            required: true,
            number: true,
        },
        expire_date : {
            required: true,
            date: true,
        },
        cvv: {
            required: true,
            number: true,
        }, 
    },
    submitHandler: function(form) {
        form.submit();
        $('#btn-deposit').prop('disabled', true);
    }
});

