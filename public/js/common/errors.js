var require = jQuery.validator.format('{0} must be required.');
var maxLenght = 50;
var error_maxlength = jQuery.validator.format('{0} must be less than {2} characters. ({1} characters now)');
var error_regExpression = jQuery.validator.format('{0} must be at least 1 number and 1 letter.');
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
    }
});