@extends('layout.main')

@section('title')
Thank You
@endsection

@section('content')
<style type="text/css">
#thankyou{
	box-shadow: 5px 4px 5px #888888; 
}
</style>
@if(Session::has('success'))
<br><br>
<h1 style="text-align:center;font-weight: normal;
font-family: inherit;
font-style: oblique;
font-size: 24px;
color: rgb(122, 122, 244);">Thank you for your support..!</h1><br><br>
<img id="thankyou" src="{{asset('images/thankyou.jpg')}}"/ style="margin-left:40%">
@endif
 @stop
 