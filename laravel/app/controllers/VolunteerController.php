<?php
class VolunteerController extends BaseController {


public function start(){
return View::make('volunteer.volunteer');

}



public function type1(){

return View::make('volunteer.type1');

}


public function type2(){

 $cur = date("Y-m-d",time());
         $events=Eventinfo::where('start_date','>',$cur)->orderby('start_date')->get();


return View::make('volunteer.type2')->with(array('events' => $events));


}


public function pincodetest(){

$validator= Validator::make(Input::all(),array(
      'pincode' => 'required|min:6|max:10'
	));


if($validator->fails()){

 return Redirect::route('volunteer-type1')->withErrors($validator)->withInput();

}else {

function getLnt($zip){
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=
".urlencode($zip)."&sensor=false";
$result_string = file_get_contents($url);
$result = json_decode($result_string, true);
$result1[]=$result['results'][0];
$result2[]=$result1[0]['geometry'];
$result3[]=$result2[0]['location'];
return $result3[0];
}

function getDistance($zip1, $zip2, $unit){
$first_lat = getLnt($zip1);
$next_lat = getLnt($zip2);
$lat1 = $first_lat['lat'];
$lon1 = $first_lat['lng'];
$lat2 = $next_lat['lat'];
$lon2 = $next_lat['lng']; 
$theta=$lon1-$lon2;
$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
cos(deg2rad($theta));
$dist = acos($dist);
$dist = rad2deg($dist);
$miles = $dist * 60 * 1.1515;
$unit = strtoupper($unit);

if ($unit == "K"){
return ($miles * 1.609344)." ".$unit;
}

}



$malleshwaram="560003";
$jayanagar="560011";
$kormangala="560034";







$distance1 = getDistance(Input::get('pincode'),$malleshwaram,"K");
$distance2= getDistance(Input::get('pincode'),$jayanagar,"K");
$distance3 = getDistance(Input::get('pincode'),$kormangala,"K");


if($distance1 < $distance2) {
	if($distance1 < $distance3){
		$near= 'malleshwaram';
	}else{
		$near= 'kormangala';
	}
}else{
  if($distance2 < $distance3){

  	$near ='jayanagar';
  }else{
  	$near ='kormangala';
  }


}
return Redirect::route('volunteer-type1')->with('near',$near);
}


}


public function type1post(){

$validator = Validator::make(Input::all(),array(
	'name' => 'required|max:30',
	'dob' => 'required|date',
	'occupation' => 'required|max:50',
	'purpose' =>  'required|max:1000',
	'address' =>'required|max:200',
	'category' =>'required',
	'gender'  => 'required',
	'date' => 'required|date',
	'interest' => 'required',
	'phone_no' => 'required|min:8|max:10'

));

if($validator->fails()){
  return Redirect::route('volunteer-type1')->withErrors($validator)->withInput();

}else{
 
$volunteer = Weekendvolunteer::create(array(
	'user_id'  => Auth::user()->id,
	'name'    => Input::get('name'),
	'dob'    => Input::get('dob'),
	'gender'    => Input::get('gender'),
	'occupation'    => Input::get('occupation'),
	'purpose'    => Input::get('purpose'),
	'category'    => Input::get('category'),
	'interest'    => Input::get('interest'),
	'date'    => Input::get('date'),
	'address'    => Input::get('address'),
	'phone_no'    => Input::get('phone_no')
	)); 

	if($volunteer){	

		Mail::send('emails.auth.weekend_volunteer',array('name' => Input::get('name')), function ($message)  {
                        $message->to(Auth::user()->email,Input::get('name'))->subject('Greetings Volunteer.');
                       });

                       return Redirect::route('weekend_volunteer_success')->with('success','success')
                                                                  ->with('phone_no',Input::get('phone_no'));

	}


}

 return Redirect::route('volunteer-type1')->with('global','Something went wrong, please try again..!');

}


public function type1success(){
if(Session::has('success')){
	return View::make('volunteer.weekend_volunteer_success');
}else{
	return Redirect::route('volunteer-type1')->with('global','Wrong Request!');
}
}


public function eventvolunteer($id){

 $cur = date("Y-m-d",time());
         $events=Eventinfo::where('start_date','>',$cur)->where('id','=',$id)->first();			

     if($events){
     
     return View::make('volunteer.type2next')->with(array('id' => $id,'title' => $events['title']));

     }else{

     	return Redirect::route('volunteer-type2');
     }
   

   return Redirect::route('home');
}

public function eventvolunteerpost($id){

	$validator =Validator::make(Input::all(),array(

		'fullname' => 'required|max:70',
		'gender' => 'required',
		'dob' => 'required|date',
		'address' => 'required|max:200',
		'purpose' => 'required|max:1000',
		'pincode' => 'required|min:6|max:10',
		'occupation' => 'required|max:50',
		'phone_no' => 'required|min:8|max:15'
	  ));

	if($validator->fails()){
		return Redirect::route('event-volunteer',$id)->withErrors($validator)->withInput();
	}else{

		$vol=Volunteer::create(array(
			'user_id' => Auth::user()->id,
			'email' => Auth::user()->email,
			'fullname' => Input::get('fullname'),
			'gender' => Input::get('gender'),
			'dob'   => Input::get('dob'),
			'address' => Input::get('address'),
			'purpose'  => Input::get('purpose'),
			'pincode'  =>  Input::get('pincode'),
			'type'  => 'E',
			'occupation' => Input::get('occupation'),
			'phone_number'  => Input::get('phone_no') 
			));

		if($vol){
			

				$event=Eventinfo::where('id','=',$id)->first();
				$event->volunteer()->save($vol);

				Mail::send('emails.auth.weekend_volunteer',array('name' => Input::get('fullname')), function ($message)  {
                        $message->to(Auth::user()->email,Input::get('fullname'))->subject('Greetings Volunteer.');
                       });


				return View::make('volunteer.event_volunteer_success')->with(array('phone' => Input::get('phone_no')));		

				
		}
	}
	
		return Redirect::route('event-volunteer',$id)->with('global','Oops, Something Went Wrong, Please Try Again..!');
}


} 