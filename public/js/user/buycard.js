$('#buyCard-form').validate({
    ignore: [],
    // onfocusout: function (element) {
    //     $(element).valid();
    // },
    // onkeyup: function (element) {
    //     $(element).valid();
    // },
    rules: {
        cardtype: {
            required: true,
        },
        amount: {
            required: true,
            number: true,
            min: 1,
            range: [1, 5],

        },
        card_denomination: {
            required: true,
        },
    },
    submitHandler: function(form) {
        form.submit();
        $('#btn-deposit').prop('disabled', true);
    }
});

