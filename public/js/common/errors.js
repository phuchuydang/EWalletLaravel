var require = jQuery.validator.format('{0} must be required.');
var maxLenght = 50;
var error_maxlength = jQuery.validator.format('{0} must be less than {2} characters. ({1} characters now)');
var error_regExpression = jQuery.validator.format('{0} must be at least 1 number and 1 letter.');
var error_filesize = jQuery.validator.format('Size of {0} must be less than {1} bytes');
var error_greater_date = jQuery.validator.format('{0} must be smaller than {1}.');
$.validator.messages.required = function (param, input) {
    $data = $(input).data('label');
    return require($data);
}

$.validator.messages.maxlength = function (param, input) {
    $data = $(input).data('label');
    inputLength = $(input).val().length;
    return error_maxlength($data, maxLenght ,inputLength);
}

$.validator.addMethod("regExpression", function (value, element) {
    return this.optional(element) || /^(?=.*[0-9])(?=.*[a-z])/.test(value);
}, error_regExpression);

$.validator.messages.regExpression = function (param, input) {
    $data = $(input).data('label');
    return error_regExpression($data);
};

$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, error_filesize);

$.validator.messages.filesize = function (param, input) {
    $data = $(input).data('label');
    return error_filesize($data, param);
};

$.validator.addMethod('greater_date', function (value, element, param) {
    return this.optional(element) || (new Date(value) < new Date(param));
}, error_greater_date);

$.validator.messages.greater_date = function (param, input) {
    $data = $(input).data('label');
    $now = new Date().toISOString().split('T')[0];
    return error_greater_date($data, $now);
};

$.validator.setDefaults({
    errorPlacement: function (error, element) {
        error.css('color', 'red');
        if(element.attr('name') == 'username') {
            error.appendTo('#invalid-feedback-username');
        }
        if (element.attr('name') == 'password') {
            error.appendTo('#invalid-feedback-password');
        }
        if (element.attr('name') == 'conf_password') {
            error.appendTo('#invalid-feedback-conf_password');
        }
        if (element.attr('name') == 'email') {
            error.appendTo('#invalid-feedback-email');
        }
        if (element.attr('name') == 'fullname') {
            error.appendTo('#invalid-feedback-fullname');
        }
        if (element.attr('name') == 'phone') {
            error.appendTo('#invalid-feedback-phone');
        }
        if (element.attr('name') == 'birthday') {
            error.appendTo('#invalid-feedback-birthday');
        }
        if (element.attr('name') == 'address') {
            error.appendTo('#invalid-feedback-address');
        }
        if (element.attr('name') == 'fcard') {
            error.appendTo('#invalid-feedback-fcard');
        }
        if (element.attr('name') == 'bcard') {
            error.appendTo('#invalid-feedback-bcard');
        }
        if (element.attr('name') == 'address') {
            error.appendTo('#invalid-feedback-address');
        }
    }
});