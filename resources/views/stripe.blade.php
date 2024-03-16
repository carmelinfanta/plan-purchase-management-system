<!DOCTYPE html>
<html>
<head>
<title>Stripe Payment Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style type="text/css">
.panel-title {
display: inline;
font-weight: bold;
}
.display-table {
display: table;
}
.display-tr {
display: table-row;
}
.display-td {
display: table-cell;
vertical-align: middle;
width: 61%;
}
</style>
</head>
<body>
    <div class="row">
   <div style="padding:100px;" class="container d-flex justify-content-center align-items-center w-100 vh-100">
   
    <div class="col-lg w-50 h-100" style="margin-left:-800px;">
    <h1 class="text-secondary">Purchased Plans</h1>
    @foreach($purchasedPlans as $purchasedPlan)
        <p>{{$purchasedPlan->plan_name}}</p><h1>{{$purchasedPlan->plan_price}}</h1>
    @endforeach
    </div>
</div>

    <div class="col-md-4 h-50 p-3 rounded bg-white border" style="margin-left:-1500px;margin-top:100px;">
<div class="container">
<h4 class="text-primary">Pay Now</h4>
<label class="text-dark font-weight-bold">Email:</label>
<input type="email" value="{{$data->email}}" size="30" disabled/>
<div class="panel-body">
@if (Session::has('success'))
<div class="alert alert-success text-center">
<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
<p>{{ Session::get('success') }}</p>
</div>
@endif
<form
role="form"
action="{{route('stripe.post')}}"
method="post"
class="require-validation"
data-cc-on-file="false"

id="payment-form">
@csrf
<div class='form-row row'>
<div class='form-group mb-3 required'>
<label class='control-label'>Name on Card</label> <input
class='form-control' type='text' >
</div>
</div>
<div class='form-row row'>
<div class=' form-group card required'>
<label class='control-label '>Card Number</label> <input
autocomplete='off' class='form-control card-number'
type='text'>
</div>
</div>
<div class='form-row row'>
<div class=' form-group cvc required'>
<label class='control-label'>CVC</label> <input autocomplete='off'
class='form-control card-cvc' placeholder='ex. 311''
type='text'>
</div>
<div class=' form-group expiration required'>
<label class='control-label' style="margin-left: 5px;">Expiration Month</label> <input
class='form-control card-expiry-month' style="margin-left: 5px;" placeholder='MM' 
type='text'>
</div>
<div class=' form-group expiration required'>
<label class='control-label'>Expiration Year</label> <input
class='form-control card-expiry-year' placeholder='YYYY' 
type='text'>
</div>
</div>

<div class="row">
<div class="col-xs-12">
<button class="btn btn-primary btn-lg btn-block" type="submit">Pay</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
    </div>
</div>
</body>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
var $form = $(".require-validation");
$('form.require-validation').bind('submit', function(e) {
var $form = $(".require-validation"),
inputSelector = ['input[type=email]', 'input[type=password]',
'input[type=text]', 'input[type=file]',
'textarea'
].join(', '),
$inputs = $form.find('.required').find(inputSelector),
$errorMessage = $form.find('div.error'),
valid = true;
$errorMessage.addClass('hide');
$('.has-error').removeClass('has-error');
$inputs.each(function(i, el) {
var $input = $(el);
if ($input.val() === '') {
$input.parent().addClass('has-error');
$errorMessage.removeClass('hide');
e.preventDefault();
}
});
if (!$form.data('cc-on-file')) {
e.preventDefault();
Stripe.setPublishableKey('pk_test_51OuhwPSAfFhqfzub6GLK6bPM4LCEd97o8VU6twFSNYvC9bYwgfXt4VO5AwiY2KA3PCWiNieAIJweXVmzfnqRUVHd00axtxxydW');
Stripe.createToken({
number: $('.card-number').val(),
cvc: $('.card-cvc').val(),
exp_month: $('.card-expiry-month').val(),
exp_year: $('.card-expiry-year').val()
}, stripeResponseHandler);
}
});
function stripeResponseHandler(status, response) {
if (response.error) {
$('.error')
.removeClass('hide')
.find('.alert')
.text(response.error.message);
} else {
/* token contains id, last4, and card type */
var token = response['id'];
$form.find('input[type=text]').empty();
$form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
$form.get(0).submit();
}
}
});
</script>
</html>