@extends('layout.main')

@section('title')
Event Volunteering
@endsection

@section('content')
<style type="text/css">
table td{
  border:none;
}
</style>

<link rel="stylesheet" type="text/css" href="{{ asset('css/tablestyle.css') }}">

<div class="tablediv">

<div class="events" style="margin-top:50px;">
            <table  style="width:86%;margin:auto">
              <thead>
            	<tr>
            	<th style="font-size:15px;">Title</th>
            	<th style="font-size:15px;">Location</th>
            	<th style="font-size:15px;">Address</th>
            	<th style="font-size:15px;">Event Date</th>
            	<th style="font-size:15px;">Event Timings</th>
            	<th style="font-size:15px;">Description</th>
            	<th style="font-size:15px;">No.Volunteers Enrolled</th>
            </tr>
            </thead>
            <tbody>
            	@foreach($events as $event)
           	<tr class="even"><?php $img=$event['image'];	
                  $image = 'data:image/jpeg;base64,' . base64_encode($img);?>
            		<td style="font-size:15px;">{{$event['title']}}</td>
            		<td>{{$event['location']}}</td>
            		<td>{{$event['address']}} <br> <img src="<?php echo $image?>" width="150px" height="100px" style="box-shadow: 5px 5px 5px #888888;"/ ></td>
            		<td>{{$event['start_date']}}</td>
            		<td>{{$event['start_time']}} to <br>{{$event['end_time']}}</td>
            		<td>{{$event['description']}}</td>
            		<td><p style="font-sixe:15px;">{{count($event->volunteer)}} </p> <a href="{{URL::route('event-volunteer',$event['id'])}}"><img src="{{asset('images/vol.jpg')}}" style="width:50px;height:50px;"><br><br><p style="color:green">I want to volunteer !</p></a> </td>

           	</tr>

            	@endforeach
              </tbody>
            </table>

             </div>


</div>	
 

@stop