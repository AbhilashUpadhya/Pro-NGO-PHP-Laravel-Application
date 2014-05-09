<?php

class AdminController extends BaseController {


     
     


	public function getlogin(){

     return View::make('admin.login');

	}

    



	public function postlogin(){


 	 $validator = Validator::make(Input::all(),
              array( 
                 'email'       => 'required|email',
                 'password'    => 'required'

         ));
          
          if($validator->fails()){
            return Redirect::route('adminlogin')
                               ->withErrors($validator)
                               ->withInput();
             
          }else{

                       $user= User::with('admin')->where('email', '=',Input::get('email'))->first();
                       $admin=$user->admin->first();

                       if($admin){
                       
                         $auth =Auth::attempt(array(
			              'email' =>Input::get('email'),
			              'password' => Input::get('password'),
			              'active' => 1
			              ));


                         if($auth){
                         	$code=str_random(60);
                             return Redirect::route('adminbase')->with('code',$code);                           
                         }

                       }


                        }

	                           return Redirect::route('adminlogin')
                              ->with('global','Could not login, try again.');

} 

         
   public function base(){

   	if(Session::has('code')){
      
       $ecsdonors= Ecsdonor::with('user')->get();
       $events=Eventinfo::with('volunteer')->get();
       $type2donors= Twodonor::with('user')->orderby('date')->get();
       $otherdonors=Otherdonor::with('user')->get();       
       $weekendvolunteers=Weekendvolunteer::with('user')->get();


       return View::make('admin.baseview')->with(array('ecsdonors' => $ecsdonors, 'events' =>$events,'type2donors' => $type2donors,'otherdonors' => $otherdonors,'weekendvols' => $weekendvolunteers));
       
  	}

Auth::logout();
   return Redirect::route('home');
     }




   public function confmailone($code){
    if(Session::has('key1')){
        $code=trim($code);
        $code= substr($code,1);

        $mailarr=explode(',',$code);
        
      Mail::send('emails.auth.adminvolreminder',array('',''), function ($message) use ($mailarr) {
                        $message->to($mailarr,'Dear Volunteer')->subject('Event Reminder');
                       });
     
        return '<h1>Mails Successfully sent..!<h1>';
        
    } 
    
   }

   public function confmailtwo($code){

    if(Session::has('key2')||Session::has('key3')){

Mail::send('emails.auth.typetwodonornotification',array('',''), function ($message) use ($code) {
                        $message->to($code,'Dear Donor')->subject('Notification');
                       });
     
        return '<h1>Mails Successfully sent..!<h1>';
        

    }
   }


   public function createevent(){

    $validator = Validator::make(Input::all(),array(
      'title'           =>      'required|max:50',
      'description'     =>      'required',
      'address'         =>      'required|max:200',
      'location'        =>      'required|max:50',
      'pincode'         =>      'required|max:10',
      'start_date'      =>      'required',
      'end_date'        =>      'required',
      'start_time'      =>      'required',
      'end_time'        =>      'required',
      'filename'        =>      'required',
      'image'           =>      'required|image'

      ));

      if($validator->fails()){
        $code=str_random(60);
                    return Redirect::route('adminbase')->with('code',$code)
                                      ->withErrors($validator)
                                      ->withInput();

                  }else{

                    $file= file_get_contents($_FILES['image']['tmp_name']);

                    $event= Eventinfo::create(array(
                      'title' => Input::get('title'),
                      'description' => Input::get('description'),
                      'address' => Input::get('address'),
                      'location' => Input::get('location'),
                      'pincode' => Input::get('pincode'),
                      'start_date' => Input::get('start_date'),
                      'end_date' => Input::get('end_date'),
                      'start_time' => Input::get('start_time'),
                      'end_time' => Input::get('end_time'),
                      'filename' => Input::get('filename'),
                      'image' => $file


                      ));

                    if($event){
                      $code=str_random(60);
                    
                       return Redirect::route('adminbase')->with('code',$code)
                                  ->with('global','New Event has been added.');
                    }
                  }
                  Auth::logout();
                  return Redirect::route('home')
                                  ->with('global','Something went wrong, please try again.');
                    

   }

}