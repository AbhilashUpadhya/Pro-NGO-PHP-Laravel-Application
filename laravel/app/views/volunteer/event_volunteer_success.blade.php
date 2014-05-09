@extends('layout.main')

@section('title')
Thank You
@endsection

@section('content')
<<!-- br>
<br>
<h1 style="text-align:center;">Thank you for enrolling as a Volunteer.!  We look forward to see you soon..! </h1>
<br> -->
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
width: 300px;"><br><br>
<h1 style="text-align:center;color:rgb(129, 223, 107);"><a href="{{URL::route('volunteer-type2')}}">Volunteer for more events.</a></h1> 
<?php

include_once("ViaNettSMS.php");

// Declare variables.
$Username = "abi.anvekar@gmail.com";
$Password = "pbbqc";
$MsgSender = "+918095996718";
$DestinationAddress = "+91".$phone;
$Message = "Thank you for enrolling as a Volunteer..!";

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

?>
@stop