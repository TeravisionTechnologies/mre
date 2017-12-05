jQuery.validator.addMethod("names", function(value, element) {
	return this.optional(element) || /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð _,.\'-]+$/.test(value);
}, "Only alphabetic characters allowed.");
jQuery.validator.addMethod("email2", function(value, element) {
	return this.optional(element) || /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(value);
}, "Invalid email format.");

jQuery(function($) {
	var errorContainer = $("<div class='error error-es'>Por favor llene los campos requeridos</div><div class='error error-en'>Please fill out the required fields</div>").prependTo("#commentform").hide();
	var errorLabelContainer = $("<div class='error errorlabels'></div>").prependTo("#commentform").hide();
	$("#commentform").validate({
		rules: {
			author: {
				required: true,
				names: true
			},
			email: {
				required: true,
				email2: true
			},
			comment: "required"
		},
		errorContainer: errorContainer,
		errorLabelContainer: errorLabelContainer,
		ignore: ":hidden"
	});
	$.validator.messages.required = "";
	$.validator.messages.email = "&raquo; " + $.validator.messages.email;
	$.validator.messages.url = "&raquo; " + $.validator.messages.url;
});