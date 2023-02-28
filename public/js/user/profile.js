$('#profile-form').validate({
    ignore: [],
    onfocusout: function (element) {
        $(element).valid();
    },
    onkeyup: function (element) {
        $(element).valid();
    },
    onfocusout: function (element) {
        if ($(element).attr('name') == 'password') {
            if ($(element).val() == '' && $('#conf_password').val() == '') {
                $('#password').rules('remove');
                $('#conf_password').rules('remove');
            } else {
                $('#password').rules('add', {
                    required: true,
                    checkByteWordUpdate : true,
                    maxlength: 20,
                    checkLengthUpdate: true,
                    regExpression: true,
                });
                $('#conf_password').rules('add', {
                    required: true,
                    equalTo: '#password',
                    maxlength: 20,
                });
                $(element).valid();
            }
        } else{
            $(element).valid();
        }
    }, 
    onchange: function (element) {
        if($(element).attr('name') == 'password' || $(element).attr('name') == 'conf_password'){
            if($(element).val() == ''){
                $('#password').rules('remove');
                $('#conf_password').rules('remove');
            } else {
                $('#password').rules('add', {
                    required: true,
                    regExpression: true,
                });
                $('#conf-password').rules('add', {
                    required: true,
                    equalTo: '#password',
                });
                $(element).valid();
            }
        }
    },
    rules: {
        email: {
            required: true,
            email: true,
            maxlength: 255,
        },
        address: {
            required: true,
            maxlength: 255,
        },
        fullname: {
            required: true,
            maxlength: 255,
        },
        birthday: {
            required: true,
            date: true,
            greater_date: new Date().toISOString().split('T')[0],
        },
    },
    submitHandler: function(form) {
        form.submit();
        $('#btn-update').prop('disabled', true);
    }
});