@extends('layout.main')

@section('title')
Weekend Volunteering
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

<div class="container_12">
<div class="mainform">
<br><br>
{{Form::open(array(
  'class' => 'basic-grey',
  'style' => 'margin-left:0px;margin-right:0px;'

))}}
<h1>Weekend Volunteering Enrollment
        <span></span>
</h1>
<div class="field">
{{Form::label('name', 'Your Full Name :')}}
{{Form::text('name','',array('id' => 'name', 'maxlength' => '30'))}}
<script >
var f1 = new LiveValidation('name');
f1.add( Validate.Presence );
</script>
@if($errors->has('name'))
<br>
    {{$errors->first('name')}}
@endif

</div>

<div class="field">

{{Form::label('dob', 'Date of Birth :')}}
<input type="date" name="dob" value="2014-01-01" />

@if($errors->has('dob'))
<br>
           {{$errors->first('dob')}}
 @endif


</div>

<div class="field">

<input type="radio"  id="male" name="gender" value="M">Male

<input type="radio"  id="female" name="gender" value="F">Female

<input type="radio"  id="other" name="gender" value="O">Other
@if($errors->has('gender'))
<br>
           {{$errors->first('gender')}}

      @endif

</div>
<br><br>
<div class="field">

{{Form::label('occupation','Occupation : ')}}
{{Form::text('occupation','',array('id'=>'occupation'))}}
<script >
var f1 = new LiveValidation('occupation');
f1.add( Validate.Presence );
</script>
@if($errors->has('occupation'))
<br>
           {{$errors->first('occupation')}}
      @endif

</div>

<div class="field">
{{Form::label('purpose','  Why do you like volunteering ?')}}
{{Form::textarea('purpose','',array('id'=>'purpose'))}}
<script >
var f1 = new LiveValidation('purpose');
f1.add( Validate.Presence );
</script>
@if($errors->has('purpose'))
<br>
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
<br>
           {{$errors->first('address')}}
      @endif
</div>


<div class="field">
<label>Which one would prefer you ?</label><br>
<input type="checkbox" name="category" id="category1" value="1">2 Hours on Saturday

<input type="checkbox" name="category" id="category2" value="2">2 Hours on Sundays

<input type="checkbox" name="category" id="category3" value="3">2 hours both on Saturday and Sunday
<br><br>
<script >
var f1 = new LiveValidation('category');
f1.add( Validate.Presence );
</script>
@if($errors->has('category'))
<br>
           {{$errors->first('category')}}
      @endif
</div>
<br><br>
<div calss="field">
<label>
When would you like to start ?</label><br>
<input type="date" name="date" value="01/01/2014">
@if($errors->has('date'))
           {{$errors->first('date')}}
      @endif
      
</div>
<br><br>

<div class="field">
<label>Your Area Of Interest</label><br>
<input type="checkbox" name="interest" id="teaching" value="teaching">Teaching

<input type="checkbox" name="interest" id="team_leading" value="team_leading">Team Leading

<input type="checkbox" name="interest" id="funds" value="funds">Fund Raising

<input type="checkbox" name="interest" id="mentoring" value="mentoring">Mentoring

<script >
var f1 = new LiveValidation('interest');
f1.add( Validate.Presence );
</script>

@if($errors->has('interest'))
<br>
           {{$errors->first('interest')}}
      @endif
</div>
<br>
<div class="field">
{{Form::label('phone_no', 'Your Contact Number :')}}
{{Form::text('phone_no','',array('maxlength' => '10','id' => 'phone_no'))}}
<script >
var f1 = new LiveValidation('phone_no',{onlyOnSubmit: true });
f1.add( Validate.Presence );
f1.add( Validate.Numericality );
</script>

@if($errors->has('phone_no'))
<br>
           {{$errors->first('phone_no')}}
      @endif

</div>
{{Form::submit('Volunteer',array('class' => 'button' ))}}
{{Form::close()}}
</div>


<div class="pindiv" >
<div class="field">
{{Form::open(array('url' => '/volunteer/type1/pincodetest','id' => 'pincodeform','action' => "?flag=true", 'class' => 'basic-grey' ,'style' => 'width:350px;position:absolute;left:66%;top:210px;'))}}
<h1>Closest Center</h1>
    {{Form :: label('pincode','Your Pin Code :')}}
	 {{Form::text('pincode','',array('id'=>'pincode'))}}
	 <script >
var f1 = new LiveValidation('pincode',{onlyOnSubmit: true });
f1.add( Validate.Presence );
f1.add( Validate.Length, { minimum: 6, maximum: 10} );
</script>
@if($errors->has('pincode'))
<br>
           {{$errors->first('pincode')}}
      @endif

@if(Session::has('near'))
      <strong> <p style="color:green">  {{Session::get('near')}} will be the nearest center to you. </p></strong>
      @endif      
      
{{Form::submit('See Our Nearest Center',array('class' => 'button'))}}
{{Form::close(array('id' => 'pincodeform'))}}

</div>
</div>
</div>

@stop