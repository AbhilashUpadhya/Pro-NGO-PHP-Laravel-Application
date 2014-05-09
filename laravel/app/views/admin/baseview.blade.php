@extends('layout.main')

@section('title')
Baseview
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<script>
$(document).ready(function(){
  $(".ecsheader").click(function(){
    $(".ecsdonors").slideToggle("slow");
  });

  $(".type1header").click(function(){
    $(".type1donors").slideToggle("slow");
  });

  $(".type3header").click(function(){
    $(".type3donors").slideToggle("slow");
  });

   $(".type2header").click(function(){
    $(".type2donors").slideToggle("slow");
  });

    $(".eventheader").click(function(){
    $(".events").slideToggle("slow");
  });

     $(".addeventheader").click(function(){
    $(".addevent").slideToggle("slow");
  });
});
</script>

<style>

.ecsheader,.type1header,.type2header,.eventheader,.addeventheader,.type3header{
border: 2px solid rgba(230, 198, 135, 0.57);

border-radius:20px;
box-shadow: 5px 4px 5px #888888;
padding:0px;
width:850px;
color:green;
margin-left:auto;
margin-right: auto;
margin-top: 60px;
}
.ecsdonors,.type1donors,.type2donors,.events,.addevent,.type3donors{

 display:none;
 border:2px solid rgba(230, 198, 135, 0.57);
 border-radius:20px;
padding:0px;
width:850px;
color:green;
margin:auto;

}
#ecstable,#eventtable,#type2table,#type3table{

/*border:1px solid black;
border-radius:20px;*/

width:850px;
}

tr,th{
	/*border:1px ridge grey;*/
    border-radius:20px;
	padding: 2px;

}
table td{
	border: 1px solid rgb(223, 219, 198);
    border-radius:20px;
	padding :5px;
	text-align:center;

}

span{
    position: relative;
}
</style>

<div class="container_12">
             <
             <div class="ecsheader">
              <p style="text-align:center;color: rgb(83, 37, 39); font-size: 16px;">View all ECS Donors</p>
             </div>
             <div class="ecsdonors">
             	<table id="ecstable">
             		<tr>
             			<th>Name</th>
             			<th>Surname</th>
             			<th>Email</th>
             			<th> Postal Address</th>
             			<th>Pin Code</th>

             		</tr>
             	@foreach($ecsdonors as $donor)
             	
             		<tr>
             			<td>{{$donor['first_name']}}</td>
             			<td>{{$donor['surname']}}</td>
             			<td>{{$donor->user['email']}}</td>
             			<td>{{$donor['address']}}</td>
             			<td>{{$donor['pincode']}}</td>
             		</tr>
             	
             	@endforeach
             	</table>
             </div>

             <div class="type1header">
             	<p style="text-align:center;color: rgb(83, 37, 39); font-size: 16px;">View All Other Donors.</p>
             </div>

             <div class="type1donors">
             	
                <?php   Session::put('key3','val');
            ?>
                <table id="type2table">
                    <tr>
                        <th>Name</th>
                        <th>Donations</th>
                        <th>Other</th>
                        <th>comments</th>
                        <th>Date</th>
                        <th>Mail</th>
                        

                    </tr>
                @foreach($otherdonors as $donor)
                
                    <tr>
                        <td>{{$donor->user['username']}}</td>
                        <td>{{$donor['interest']}}</td>
                        <td>{{$donor['other']}}</td>
                        <td>{{$donor['comment']}}</td>
                        
                        <td>{{$donor['date']}}</td>
                        <td>{{$donor->user['email']}}<br> 
                        <a href="{{URL::route('mailtodonor', $donor->user['email'] )  }}" target="_blank" style="color:blue;"> Send Mail!</a>
                        </td>
                    </tr>
                
                @endforeach
                </table>

             </div>


             <div class="type2header">
             	<p style="text-align:center;color: rgb(83, 37, 39); font-size: 16px;">View all One Time Donors.</p>
             </div>

             <div class="type2donors">

                <?php   Session::put('key2','val');
            ?>
             	<table id="type2table">
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Amount</th>
                        <th> Postal Address</th>
                        <th>Pin Code</th>
                        <th>Date</th>
                        <th>Mail</th>

                    </tr>
                @foreach($type2donors as $donor)
                
                    <tr>
                        <td>{{$donor['first_name']}}</td>
                        <td>{{$donor['surname']}}</td>
                        <td>{{$donor['amount']}}</td>
                        <td>{{$donor['address']}}</td>
                        <td>{{$donor['pincode']}}</td>
                        <td>{{$donor['date']}}</td>
                        <td>{{$donor->user['email']}}<br> 
                        <a href="{{URL::route('mailtodonor', $donor->user['email'] )  }}" target="_blank" style="color:blue;"> Send Mail!</a>
                        </td>
                    </tr>
                
                @endforeach
                </table>

             </div>


















             <div class="type3header">
                <p style="text-align:center;color: rgb(83, 37, 39); font-size: 16px;">View All Weekend  Volunteers.</p>
             </div>

             <div class="type3donors">
                
               
                <table id="type3table">
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>gender</th>
                        <th>Date</th>
                        <th>Interests</th>
                        <th>phone no</th>
                        

                    </tr>
                @foreach($weekendvols as $vols)
                
                    <tr>
                        <td>{{$vols->user['email']}}</td>
                        <td>{{$vols['name']}}</td>
                        <td>{{$vols['category']}}</td>
                        <td>{{$vols['gender']}}</td>
                        
                        <td>{{$vols['date']}}</td>
                        <td>{{$vols['interest']}}</td>
                        <td>{{$vols['phone_no']}}</td>
                    </tr>
                
                @endforeach
                </table>

             </div>









             <div class="eventheader">
             <p style="text-align:center;color: rgb(83, 37, 39); font-size: 16px;">View All Events</p>
             </div>

             <div class="events">
            <?php   Session::put('key1','val');
            ?>
            <table id="eventtable">
            	<tr>
            	<th>Title</th>
            	<th>Location</th>
            	<th>Address</th>
            	<th>Date</th>
            	<th>Timings</th>
            	<th>No.Volunteers</th>
            </tr>
            	@foreach($events as $event)
            	<tr>
            		<td>{{$event['title']}}</td>

            		<td>{{$event['location']}}</td>
            		<td>{{$event['address']}}</td>
            		<td>{{$event['start_date']}}</td>
            		<td>{{$event['start_time']}} to {{$event['end_time']}}</td>
            		<td>{{count($event->volunteer)}}
            			<?php 
                        $str="";
                          foreach($event->volunteer as $vol){
                                $str=$str.','.$vol['email'];
                          }
                          
                         
                          ?><br>
                         <a href="{{URL::route('mailtovolunteer',$str)}}" target="_blank" style="color:blue;">Mail them!</a>
                          
                        
            		</td>

            	</tr>
            	@endforeach
            </table>

             </div>

             <div class="addeventheader">
             	<p style="text-align:center;color: rgb(83, 37, 39); font-size: 16px;">Add New Event</p>
             </div>
               
             <div class="addevent">
             	{{Form::open(array('url'=>'/admin/event','files'=>true,'class' => 'basic-grey','style' => 'width:initial;margin:auto;'))}}
             <div class="field">
                {{Form::label('title','Title')}}
                {{Form::text('title','',array('maxlength'=>'50'))}}
                @if($errors->has('title'))
                {{$errors->first('title')}}
                @endif
             </div>

              <div class="field">
                {{Form::label('description','Event Description :')}}
                {{Form::textarea('description','',array('rows'=>'10','cols' => '15'))}}
                @if($errors->has('description'))
                {{$errors->first('description')}}
                @endif
             </div>

              <div class="field">
                {{Form::label('address','Address')}}
                {{Form::textarea('address','',array('rows'=>'10','cols' => '15'))}}
                @if($errors->has('address'))
                {{$errors->first('address')}}
                @endif

             </div>

              <div class="field">
                {{Form::label('location','Location')}}
                {{Form::text('location','',array('maxlength'=>'50'))}}
                @if($errors->has('location'))
                {{$errors->first('location')}}
                @endif

             </div>

              <div class="field">
                {{Form::label('pincode','Pincode')}}
                {{Form::text('pincode','',array('maxlength'=>'10'))}}
                @if($errors->has('pincode'))
                {{$errors->first('pincode')}}
                @endif

             </div>

              <div class="field">
                    Start Date : <br>
                <input type="date" name="start_date" value="2014-01-01">

             </div>

              <div class="field">
                 End Date : <br>
                <input type="date" name="end_date" value="2014-01-01">

             </div>
              

              <div class="field">
                {{Form::label('start_time','Start Time')}}
                {{Form::text('start_time','',array('maxlength'=>'15'))}}
                @if($errors->has('start_time'))
                {{$errors->first('start_time')}}
                @endif

             </div>

              <div class="field">
                {{Form::label('end_time','End Time')}}
                {{Form::text('end_time','',array('maxlength'=>'15'))}}
                @if($errors->has('end_time'))
                {{$errors->first('end_time')}}
                @endif

             </div>

              <div class="field">
                {{Form::label('filename','Filename')}}
                {{Form::text('filename','',array('maxlength'=>'50'))}}
                @if($errors->has('filename'))
                {{$errors->first('filename')}}
                @endif

             </div>
              <br>
             <div class="field">
                <input type="file" name="image">
             </div>
             <br>
             <div class="field">
                {{Form::submit('Add Event',array('class' => 'button'))}}
             </div>


             {{Form::close()}}
             </div>
             
              


            </div>

@endsection
