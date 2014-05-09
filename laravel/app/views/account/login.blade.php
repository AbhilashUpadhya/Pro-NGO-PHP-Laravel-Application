@extends('layout.main')

@section('title')
Log In
@endsection

@section('content')
<style type="text/css">
#thisform{

	box-shadow: 5px 5px 5px #888888;
}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<br><br>
{{Form::open(array(
	'class' => 'basic-grey','id' => 'thisform'))}}
<h1>Login
        <span>Please fill with proper credentials.</span>
</h1>
<div class="field">

{{Form::label('email','Email :')}}
{{Form::text('email')}}
@if($errors->has('email'))
{{$errors->first('email')}}
@endif

</div>
<div class="field">
{{Form::label('password','Password : ')}}
{{Form::password('password')}}
@if($errors->has('password'))
{{$errors->first('password')}}
@endif
</div>

<div class="field">
	 
	<label for="remember">
		<input type="checkbox" name="remember" id="remember">
		Keep me logged in.
		</label> 
</div>
<a href="{{URL::route('account-forgot')}}" style="color:green;">Forgot Password?</a><br><br>
{{Form::submit('Log In', array(
	'class' => 'button'
))}}

{{Form::close()}}

@endsection