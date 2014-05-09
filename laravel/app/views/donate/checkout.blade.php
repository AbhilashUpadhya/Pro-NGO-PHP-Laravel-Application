@extends('layout.main')

@section('title')
Payment
@endsection


@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<div id="mainwrapper">

<div class="field">
<p style="text-align-center;color:black;font-size:20px;">Alright, Last Step is to make donation.<br> We use <b>Stripe</b> service to accept payments. Kindly make the payment below.</p>
</div><br>
<div class="mainform">
	{{Form::open()}}
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="{{ Config::get('stripe.publishable_key') }}"
    data-amount=""
    data-name="Donation Procedure"
    data-description="Donate for one child."
    data-image="{{ asset('images/donate_icon.jpg') }}">
  </script>

<input type="hidden" name="first_name" value="{{$data['first_name']}}">  
<input type="hidden" name="surname" value="{{$data['surname']}}">
<input type="hidden" name="dob" value="{{$data['dob']}}">
<input type="hidden" name="gender" value="{{$data['gender']}}">
<input type="hidden" name="purpose" value="{{$data['purpose']}}">
<input type="hidden" name="occupation" value="{{$data['occupation']}}">
<input type="hidden" name="address" value="{{$data['address']}}">
<input type="hidden" name="pincode" value="{{$data['pincode']}}">
<input type="hidden" name="phone_no" value="{{$data['phone_no']}}">
<input type="hidden" name="amount" value="{{$data['amount']}}">
<input type="hidden" name="_token" value="{{csrf_token() }}"/>

 {{Form::close()}}
</div>
</div>
@endsection