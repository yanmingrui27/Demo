Stripe.setPublishableKey('pk_test_51IVftMB2JF2oH8Dv1eUlJWThylujDxpz7hiNlDxlhsUwl2FBXHZhmUX0FUrVaxgmeDvXL8K3ikrojEmTQtv3QPQf00nl3ipRmC');
var $form = $('#checkout-form');

$form.submit(function(event){
	$('#charge-error').addClass('hidden');
	$form.find('button').prop('disabled', true);
	Stripe.card.createToken({
		number: $('#card-number').val(),
		cvc: $('#card-cvc').val(),
		exp_month: $('#exp-mon').val(),
		exp_year: $('#exp-year').val(),
		name: $('#card-name').val()
	}, StripeResponseHandler);
	return false;
});

function StripeResponseHandler(status, response){
	if(response.error){
		$('#charge-error').removeClass('hidden');
		$('#charge-error').text(response.error.message);
		$form.find('button').prop('disabled',false);
	}else{
		var token = response.id;
		$form.append($('<input type="hidden" name="stripeToken"/>').val(token));
		
		//submit form
		$form.get(0).submit();
	}
}