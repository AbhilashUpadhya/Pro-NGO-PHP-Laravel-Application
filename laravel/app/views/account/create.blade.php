@extends('layout.main')
@section('title')
Sign Up
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
	'url' => '/account/create/',
	'class' => 'basic-grey',
	'id' => 'thisform'
))}}
<h1>Sign Up
        <span>Please fill with proper credentials.</span>
</h1>
<div class="field">
{{Form::label('email','Email : ')}}
{{Form::text('email')}}
@if($errors->has('email'))
<br>
{{$errors->first('email')}}
@endif
</div>

<div class="field">
{{Form::label('username','Username : ')}}
{{Form::text('username')}}
@if($errors->has('username'))
<br>
{{$errors->first('username')}}
@endif
</div>

<div class="field">
{{Form::label('password','Password : ')}}
{{Form::password('password')}}
@if($errors->has('password'))
<br>
{{$errors->first('password')}}
@endif
</div>

<div class="field">
{{Form::label('password_again','Password again :  ')}}
{{Form::password('password_again')}}
@if($errors->has('password_again'))
<br>
{{$errors->first('password_again')}}
@endif
</div>
{{Form::submit('Create new account',array(
	'class' => 'button'
))}}
{{Form::close()}}


@endsection