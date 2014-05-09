@extends('layout.main')

@section('title')
Admin Login
@endsection

@section('content')


<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

<style type="text/css">
#thisform{

	box-shadow: 5px 5px 5px #888888;
}
</style>
<br> <br >
{{Form::open(array('url'=>'/adminlogin','class' => 'basic-grey','id' => 'thisform'))}}
<label>Please Login:</label>
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


{{Form::submit('Log In',array('class' => 'button'))}}
{{Form::close()}}
@endsection
