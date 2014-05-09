@extends('layout.main')

@section('content')

<style type="text/css">
span{

	position: absolute;
}
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
<div id="mainwrapper">

<div style="height:30px;">
<h2 style="padding:0px;">Enrollement Form For {{$title}}</h2>
<br>
</div>
{{Form::open(array('class'=>'basic-grey'))}}
<input type="hidden" name="id" value="{{$id}}">
<div class="field">
{{Form::label('fullname','Your Full Name :')}}
{{Form::text('fullname')}}
<script >
var f1 = new LiveValidation('fullname');
f1.add( Validate.Presence );
</script>
@if($errors->has('fullname'))
<br>
    {{$errors->first('fullname')}}
@endif
</div>
<br>
<div class="field">
<input type="radio" name="gender" value="M" />Male
<input type="radio" name="gender" value="F" />Female
<input type="radio" name="gender" value="O" />Other
@if($errors->has('gender'))
<br>
           {{$errors->first('gender')}}

      @endif
</div>
<br><br>
<div class="field">
<label for="dob"> Your Date Of Birth :<br>
<input type="date" id="dob" name="dob" value="01-01-2014">
</label>
@if($errors->has('dob'))
<br>
           {{$errors->first('dob')}}
 @endif
</div>

<div class="field">
{{Form::label('occupation','Your Occupation :')}}
{{Form::text('occupation')}}
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
{{Form::label('purpose','  Why do you like to volunteer ?')}}
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
{{Form::label('address','Your Address Please :')}}
{{Form::textarea('address')}}

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
{{Form::label('pincode','Area Pincode please :')}}
{{Form::text('pincode')}}
<script >
var f1 = new LiveValidation('pincode',{onlyOnSubmit: true });
f1.add( Validate.Presence );
f1.add( Validate.Length, { minimum: 6, maximum: 10 } );
</script>
@if($errors->has('pincode'))
<br>
           {{$errors->first('pincode')}}
      @endif


</div>

<div class="field">
{{Form::label('phone_no','Your Contact Number :')}}
{{Form::text('phone_no')}}

<script >
var f1 = new LiveValidation('phone_no',{onlyOnSubmit: true });
f1.add( Validate.Presence );
f1.add( Validate.Numericality );
f1.add( Validate.Length, { minimum: 8, maximum: 16} );
</script>

@if($errors->has('phone_no'))
<br>
           {{$errors->first('phone_no')}}
      @endif
</div>
{{Form::submit('Okay, I wish to volunteer',array('class'=>'button'))}}

{{Form::close()}}
</div>

@endsection