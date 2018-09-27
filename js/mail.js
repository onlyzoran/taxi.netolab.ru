jQuery(document).ready(function ($)
{
	$("#send-mail").click(function ()
    {
		var phone = $('input#phone').val(); // get the value of the input field
		var error = false;
		if (phone == "" || phone == " ") {
			$('#err-phone').show(500);
			$('#err-phone').delay(4000);
			$('#err-phone').animate({
				height: 'toggle'
			}, 500, function () {
				// Animation complete.
			});
			error = true; // change the error state to true
		}
		if (error == false)
        {
			var dataString = $('#contact-form').serialize(); // Collect data from form
			$.ajax({
				type: "POST",
				url: $('#contact-form').attr('action'),
				data: dataString,
				timeout: 6000,
				error: function (request, error) {

				},
				success: function (response) {
					response = $.parseJSON(response);
					if (response.success) {
						$('#successSend').show();
						$("#name").val('');
						$("#phone").val('');
						swal("Ваша заявка принята!", "Наш менеджер свяжется с вами.", "success");
					} else {
						$('#errorSend').show();
					}
				}
			});
			return false;
		}
		return false; // stops user browser being directed to the php file
	});
});