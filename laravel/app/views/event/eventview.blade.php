@extends('layout.main')


@section('title')

Events
@endsection

@section('content')
<style type="text/css">
#one,#two,#four{
	
	text-align: center;
}
#three{

	margin-left: 20%;
}
h3{
color: rgb(106, 91, 91);
font-family: georgia;
font-size: 18px;
margin-bottom: 0px;
}
#three{
	box-shadow: 10px 10px 10px #888888;
}

</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
 <div class="mainwrapper" style="width: 800px;
margin: auto;
background-color: #EEE;
border: 2px solid #DADADA;
text-shadow: 1px 1px 1px #FFF;
color: #888;
box-shadow: 2px 2px 2px #888888;">
 	<div id="one" class="title">
 		<h2 style="color: rgb(106, 93, 89);
font-size: 40px;
text-shadow: 1px 1px 1px grey;">{{$title}}</h2>
 	</div>
 	
 	<div class="img">
<img id="three" width="500px" src="{{$image}}" />
 	</div>

<br>
<div id="test" style="border: 2px solid rgba(87, 73, 73, 0.47);;
margin: auto;
width: 600px;
box-shadow: 5px 5px 5px #888888;" >
<br>
<p style="text-align:center;font-size:20px;color:black;font-size: 30px;"> Event Card</p>
<div id="two" class="location">
    <h3 style=""> Event at : {{$location}} </h3>
     <h3> Event Date : {{$date}} </h3>
     <h3> Event Timings : {{$timings}} </h3>
	</div>
<br> 
 	<div id="four" class="desc">
 		<p style="color: rgb(137, 53, 53);
font-family: cursive;
font-size: 15px;">{{$desc}}</p> 
 	</div>
</div> 	
 </div>

@endsection