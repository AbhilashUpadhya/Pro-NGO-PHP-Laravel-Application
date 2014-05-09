@extends('layout.main')


@section('title')
Change Password
@endsection

@section('content')
<style type="text/css">
#thisform{

	box-shadow: 5px 5px 5px #888888;
}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<br><br>

{{Form::open(array('class'=> 'basic-grey','id'=> 'thisform'))}}


<div class ="field">
{{Form::label('old_password','Old Password : ')}}
{{Form::password('old_password')}}
@if($errors->has('old_password'))
{{$errors->first('old_password')}}
@endif
</div>


<div class ="field">
{{Form::label('password','New Password : ')}}
{{Form::password('password')}}
@if($errors->has('password'))
{{$errors->first('password')}}
@endif
</div>


<div class ="field">
{{Form::label('password_again','New Password Again : ')}}
{{Form::password('password_again')}}
@if($errors->has('password_agian'))
{{$errors->first('old_password_again')}}
@endif
</div>

{{Form::submit('Change Password',array('class' => 'button'))}}

{{Form::close()}}

@endsection

