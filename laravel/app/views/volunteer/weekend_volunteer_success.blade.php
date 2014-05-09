@extends('layout.main')


@section('title')
Thank you
@endsection

@section('content')

@if(Session::has('success'))
<style type="text/css">
#thankyou{
	box-shadow: 5px 4px 5px #888888; 
}
</style>
<br><br>
<h1 style="text-align:center;font-weight: normal;
font-family: inherit;
font-style: oblique;
font-size: 24px;
color: rgb(230, 68, 104);">Thank you for enrolling as a volunteer..!</h1><br><br>
<img id="thankyou" src="{{asset('images/thanks.gif')}}"/ style="margin-left: 38%;
width: 300px;">



<?php

if(Session::has('success')) {

$phone_no = Session::get('phone_no');	
include_once("ViaNettSMS.php");

// Declare variables.
$Username = ""; //ViaNett Username
$Password = ""; //Vianett Password
$MsgSender = "";//sender Number.
$DestinationAddress = "+91".$phone_no;
$Message = "Thank you for enrolling as a volunteer.";

// Create ViaNettSMS object with params $Username and $Password
$ViaNettSMS = new ViaNettSMS($Username, $Password);
try
{
	// Send SMS through the HTTP API
	$Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
	// Check result object returned and give response to end user according to success or not.
	if ($Result->Success == true)
		$Message = "Message successfully sent!";
	else
		$Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
}
catch (Exception $e)
{
	//Error occured while connecting to server.
	$Message = $e->getMessage();
}

}
?>


@endif
@stop
 








