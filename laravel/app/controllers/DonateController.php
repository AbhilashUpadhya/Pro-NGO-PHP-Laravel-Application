<?php

class DonateController extends BaseController {

public function start(){
return View::make('donate.donate');

}


public function type1(){
return View::make('donate.type1');

}



public function type2(){
return View::make('donate.type2');

}


public function type1first(){

	 $validator = Validator::make(Input::all(),array(
         'first_name' => 'required|max:30',
         'gender'  => 'required',
         'occupation'  => 'required|max:50',
         'address' => 'required|max:200',
         'pincode' => 'required|min:6|max:10',
	 	));

    if($validator->fails()){

    	return Redirect::route('donate-type1')
                                  ->with('global','Some fields were not filled properly, please try again.');

    }else{

   		$donor= Ecsdonor::create(array(

   			'user_id' => Auth::user()->id,
   			'first_name' => Input::get('first_name'),
   			'surname' => Input::get('surname'),
   			'gender' => Input::get('gender'),
   			'occupation' => Input::get('occupation'),
   			'address' => Input::get('address'),
   			'pincode' => Input::get('pincode'),
   			'comment' => Input::get('comment')
  			));
           
   		if($donor){
          
          
          
          $name= Input::get('first_name');
          $gender=Input::get('gender');


          Mail::send('emails.auth.donateone',array('gender' => $gender ,'name' => $name), function ($message) use ($name) {
                       	$message->to(Auth::user()->email,$name)->subject('Thank you');
                       });

                       return Redirect::route('donatesuccessone')->with('success','success');
                                  

   		}
    }

 return Redirect::route('donate-type1')->with('global','Something went wrong, please try again. ');
}







public function successone(){
	return View::make('donate.donatesuccess');
}


public function successtwo(){
  return View::make('donate.donatesuccesstwo');
}


public function type2post(){

$validator = Validator::make(Input::all(),array(
         'first_name' => 'required|max:50',
         'surname'=> 'max:50',
         'dob'  => 'required|date',
         'gender'  => 'required',
         'purpose' =>'required',
         'occupation'  => 'required|max:100',
         'address' => 'required|max:200',
         'pincode' => 'required|min:6|max:10',
         'phone_no' => 'required|min:8|max:20',
         'amount'  => 'required'
    ));

    if($validator->fails()){

      return Redirect::route('donate-type2')
                                 ->withErrors($validator)
                                 ->withInput();
    }else{
  
  $input= Input::all();

  return Redirect::route('checkout')->with('first_name', Input::get('first_name'))
                                ->with('surname',Input::get('surname'))
                                ->with('dob',Input::get('dob'))
                                ->with('gender',Input::get('gender'))
                                ->with('purpose',Input::get('purpose'))
                                ->with('occupation',Input::get('occupation'))
                                ->with('address',Input::get('address'))
                                ->with('pincode',Input::get('pincode'))
                                ->with('phone_no',Input::get('phone_no'))
                                ->with('amount',Input::get('amount'));

  
}
}





public function checkout(){
  
if(Session::has('first_name')&&Session::has('surname')&&Session::has('dob')&&Session::has('gender')&&Session::has('purpose')&&Session::has('occupation')&&Session::has('address')&&Session::has('pincode')&&Session::has('phone_no')&&Session::has('amount')){
$data=array(

'first_name' => Session::get('first_name'),
'surname' => Session::get('surname'),
'dob'=>Session::get('dob'),
'gender'=>Session::get('gender'),
'purpose'=>Session::get('purpose'),
'occupation'=>Session::get('occupation'),
'address'=>Session::get('address'),
'pincode'=>Session::get('pincode'),
'phone_no'=>Session::get('phone_no'),
'amount'=>Session::get('amount')
);

return View::make('donate.checkout')->with('data',$data);
}

return Redirect::route('home')->with('global','Wrong request .');
}


public function checkoutpost(){



  $validator = Validator::make(Input::all(),array(
         'first_name' => 'required|max:50',
         'surname'=> 'max:50',
         'dob'  => 'required|date',
         'gender'  => 'required',
         'purpose' =>'required',
         'occupation'  => 'required|max:100',
         'address' => 'required|max:200',
         'pincode' => 'required|min:6|max:10',
         'phone_no' => 'required|min:8|max:20',
         'amount'  => 'required'
    ));

    if($validator->fails()){

      return Redirect::route('home')->with('global','Something went wrong, transaction failed.');
                                 
    }else{
  

  Stripe::setApiKey(Config::get('stripe.secret_key'));

  $token= Input::get('stripeToken');
  $amount= Input::get('amount');

  try{

    $charge= Stripe_Charge::create(array(
     
      
      "amount" => $amount,
      "currency"  => "usd",
      "card" => $token,
      "description" =>  "Onetime-Donation"
      ));

  }catch(Stripe_CardError $e) {
  // Since it's a decline, Stripe_CardError will be caught
  $body = $e->getJsonBody();
  $err  = $body['error'];

  print('Status is:' . $e->getHttpStatus() . "\n");
  print('Type is:' . $err['type'] . "\n");
  print('Code is:' . $err['code'] . "\n");
  // param is '' in this case
  print('Param is:' . $err['param'] . "\n");
  print('Message is:' . $err['message'] . "\n");
} catch (Stripe_InvalidRequestError $e) {
  return "Invalid parameters were supplied to Stripe's API";
} catch (Stripe_AuthenticationError $e) {
  return " Authentication with Stripe's API failed(maybe you changed API keys recently)";
} catch (Stripe_ApiConnectionError $e) {
  return "Network communication with Stripe failed";
} catch (Stripe_Error $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
  return "Generic error caught.";
} catch (Exception $e) {
  return "Something else happened, completely unrelated to Stripe";
}


//Store in database.

$donor= Twodonor::create(array(

        'user_id' => Auth::user()->id,
        'first_name' => Input::get('first_name'),
        'surname' => Input::get('surname'),
        'gender' => Input::get('gender'),
        'dob' => Input::get('dob'),
        'token' => $token,
        'occupation' => Input::get('occupation'),
        'address' => Input::get('address'),
        'pincode' => Input::get('pincode'),
        'purpose' => Input::get('purpose'),
        'amount' => Input::get('amount'),
        'phone_no' => Input::get('phone_no'),
        'date' => date("Y-m-d",time())

        ));
  
    if($donor){


      $name= Input::get('first_name');
          $gender=Input::get('gender');


          Mail::send('emails.auth.donatetwo',array('name' => $name), function ($message) use ($name) {
                        $message->to(Auth::user()->email,$name)->subject('Thank you');
                       });

                       return Redirect::route('donatesuccesstwo')->with('success','success')
                                                                  ->with('phone_no',Input::get('phone_no'));


    }

}
return Redirect::route('home')->with('global','Something went wrong, transaction failed.');
}


public function type1second(){

$validator = Validator::make(Input::all(),array(

    
    'other' => 'required_if:od,""',
    'od'    => 'required_if:other,""'

  ));
if($validator->fails()){
return Redirect::route('donate-type1')
                                  ->with('global','Some fields were not filled properly, please try again.');

}else{

$donor= Otherdonor::create(array(
  'user_id' => Auth::user()->id,
  'interest' => Input::get('od'),
  'other'  => Input::get('other'),
  'comment'  =>Input::get('comment'),
  'date' => date("Y-m-d", time())
  ));

if($donor) {
Mail::send('emails.auth.donatetwo',array('name' => Auth::user()->first_name), function ($message)  {
                        $message->to(Auth::user()->email,Auth::user()->first_name)->subject('Thank you');
                       });

                       return Redirect::route('donatesuccessone')->with('success','success');
                                  


}
}
return Redirect::route('home')->with('global','Something went wrong! Plaese Try again.');
}

}