@extends('layout.main')
@section('title')
One time Donation
@endsection

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<script>
$(document).ready(function(){
  $(".topdivone").click(function(){
    $(".type2donate").slideDown("slow");
  });
});
</script>

<style type="text/css">
.topdivone{

border: 2px solid rgba(186, 227, 247, 0.67);
box-shadow: 5px 4px 5px #888888; 
padding:0px;
width:750px;
color:green;
margin-left:auto;
margin-right: auto;
margin-top: 60px;
}


.type2donate{

	display:none;

border:2px solid rgba(186, 227, 247, 0.67);
box-shadow: 5px 4px 5px #888888; 
padding:0px;
width:750px;
color:green;
margin:auto;
}

#step1{
	padding: 0px;
	position: relative;
}

#step2,#step3{

position: relative;
	display: none;
	padding: 0px;
}


span{
	font-size: 10px;
	position: absolute;
	color: blue;
}

</style>


<script >
$(document).ready(function(){
  $("#step1_next").click(function(){
    $("#step1").hide();
    $("#step2").show();
  });

   $("#step2_next").click(function(){
    $("#step2").hide();
    $("#step3").show();
  });

    $("#step2_back").click(function(){
    $("#step2").hide();
    $("#step1").show();
  });

     $("#step3_back").click(function(){
    $("#step3").hide();
    $("#step2").show();
  });
  
});
</script>

<div class="container_12">

<div class="topdivone">
   <img src="{{asset('images/donate_once.jpg')}}" style="width:100%;height:210px;">
</div>
	<div class="type2donate">
{{Form::open(array('id'=>'type2donateform','class' => 'basic-grey','style' => 'width:auto;'))}}

<div id="step1">
<div class="field">
	{{Form::label('first_name', 'First Name :')}}
     {{Form::text('first_name','',array('maxlength'=> '50','id' => 'first_name'))}}
      @if($errors->has('first_name'))
           {{$errors->first('first_name')}}

      @endif
      <script >
var f1 = new LiveValidation('first_name');
f1.add( Validate.Presence );
</script>
</div>

<div class="field">
	{{Form::label('surname', 'Surame :')}}
     {{Form::text('surname','',array('maxlength'=> '50','id' => 'surname'))}}
     
</div>


<div class="field">

	<input type="radio"  id="male" name="gender" value="M">Male


<input type="radio"  id="female" name="gender" value="F">Female
<input type="radio"  id="other" name="gender" value="O">Other

@if($errors->has('gender'))
           {{$errors->first('gender')}}

      @endif

</div>

<div class="field">
<br>
<label for="dob"> DOB <br>
<input type="date" id="dob" name="dob" value="2014-01-01" />
</label>
@if($errors->has('dob'))
           {{$errors->first('dob')}}
      @endif

</div>
<button type="button" id="step1_next" class="button" style="margin-left:250px">Proceed</button>

</div>

<div id="step2"> 

<div class="field">
{{Form::label('occupation','Occupation : ')}}
{{Form::text('occupation','',array('id'=>'occupation'))}}
<script >
var f1 = new LiveValidation('occupation');
f1.add( Validate.Presence );
</script>
@if($errors->has('occupation'))
           {{$errors->first('occupation')}}
      @endif
</div>

<div class="field">

{{Form::label('purpose','Your Purpose Of Donating : ')}}
{{Form::textarea('purpose','',array('id'=>'purpose'))}}
<script >
var f1 = new LiveValidation('purpose');
f1.add( Validate.Presence );
</script>
@if($errors->has('purpose'))
           {{$errors->first('purpose')}}
      @endif

</div>

<div class="field">
{{Form :: label('address','Address :')}}

	{{Form::textarea('address','',array('id'=>'address', 'maxlength' => '200'))}}

<script >
var f1 = new LiveValidation('address');
f1.add( Validate.Presence );
</script>
@if($errors->has('address'))
           {{$errors->first('address')}}
      @endif

</div>

<div class="field">

{{Form :: label('pincode','Pin Code :')}}
	 {{Form::text('pincode','',array('id'=>'pincode'))}}
	 <script >
var f1 = new LiveValidation('pincode',{onlyOnSubmit: true });
f1.add( Validate.Presence );
f1.add( Validate.Length, { minimum: 6, maximum: 10} );
</script>
@if($errors->has('pincode'))
           {{$errors->first('pincode')}}
      @endif
</div>
<button type="button" class="button" id="step2_back" >Back</button>
<button type="button" class="button" id="step2_next" >Proceed</button>
</div>



<div id="step3">
<div class="field">
{{Form::label('phone_no', 'Your Contact Number :')}}
{{Form::text('phone_no','',array('maxlength' => '10','id' => 'phone_no'))}}
<script >
var f1 = new LiveValidation('phone_no',{onlyOnSubmit: true });
f1.add( Validate.Presence );
f1.add( Validate.Numericality );
</script>

@if($errors->has('phone_no'))
           {{$errors->first('phone_no')}}
      @endif

</div>

<div class="field">
	{{Form::label('amount', 'Agree to donate : ')}}
	<select name="amount" id="amount">
		 <option value="" selected="selected">--Choose Amount--</option>
<option value="1600">1000 Rs</option>
<option value="5000">3000 Rs</option>
<option value="8300">5000 Rs</option>
	</select>
	<script >
var f1 = new LiveValidation('amount');
f1.add( Validate.Presence );
</script>
@if($errors->has('amount'))
           {{$errors->first('amount')}}
      @endif

</div>
<div class="field">
	<input type="checkbox" id="aut"><br >
<label for="aut" >I Agree to the <a href="#" target="_blank" > terms and conditions </a> of the organization.</label>
<script >
var f1 = new LiveValidation('aut',{onlyOnSubmit: true });
f1.add( Validate.Acceptance );
</script>
</div>
<button type="button" class="button" id="step3_back" style="border: 1px ridge brown;margin-left: 208px;">Back</button>
{{Form::submit('Proceed To Donate',array('class' => 'button'))}}

</div>
{{Form::close()}}
</div>
</div>
@endsection