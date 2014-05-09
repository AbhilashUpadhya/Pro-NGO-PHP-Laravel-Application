@extends('layout.main')
@section('title')
Forgot Password
@endsection

@section('content')
<style type="text/css">
#thisform{

	box-shadow: 5px 5px 5px #888888;
}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<br><br>

{{Form::open(array('class' => 'basic-grey','id'=> 'thisform'))}}

<div class="field">

{{Form::label('email','Enter your Email : ')}}
{{Form::text('email')}}
@if($errors->has('email'))
{{$errors->first('email')}}
@endif

</div>

{{Form::submit('Recover Password',array('class' => 'button'))}}
{{Form::close()}}
@endsection