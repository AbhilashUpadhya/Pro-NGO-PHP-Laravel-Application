<?php

class AccountController extends BaseController {

     public function getCreate(){
            return View::make('account.create');
       }

               public function postCreate(){
                  
                  $validator = Validator::make(Input::all(),
                  	array( 
                       'email'       => 'required|max:50|email|unique:users',
                       'username'    => 'required|max:20|min:3|unique:users',
                       'password'    => 'required|min:6',
                       'password_again' => 'required|same:password'
             
                   		));

                  if($validator->fails()){
                  	return Redirect::route('account-create')
                  	                  ->withErrors($validator)
                  	                  ->withInput();

                  }else{
                     
                     $email =Input::get('email');
                     $username=Input::get('username');
                     $password=Input::get('password');
                     $code=str_random(60);

                     $user= User::create(
                     	array(
                     		'email' => $email,
                     		'username'=> $username,
                     		'password' =>Hash::make($password),
                     		'code' =>  $code,
                     		'active' => 0
                     		));
                     if($user){

                       Mail::send('emails.auth.activate',array('link'=> URL::route('account-active',$code) ,'username' => $username), function ($message) use ($user) {
                       	$message->to($user->email,$user->username)->subject('Activate your Account');
                       });

                       return Redirect::route('home')
                                  ->with('global','A confirmation mail has been sent.');
                     }
                  }
              
               }

   

         public function getActive($code){

              $user = User::where('code','=',$code)->where('active','=',0)->first();



              if($user){
              	$user->code='';
              	$user->active=1;

              	if($user->save()){
                     return Redirect::route('home')
                            ->with('global','Account Activated, Now you can log in.'); 
              	}

              }

             return Redirect::route('home')
                            ->with('global','We could not activate your account.'); 
         }





         public function getLogin(){
          return View::make('account.login');
         }



    
         public function postLogin(){
         
          $validator = Validator::make(Input::all(),
              array( 
                 'email'       => 'required|email',
                 'password'    => 'required'

         ));
          
          if($validator->fails()){
            return Redirect::route('account-login')
                               ->withErrors($validator)
                               ->withInput();
             
          }else{

             $remember = (Input::has('remember')) ? true : false;
            
             $auth =Auth::attempt(array(
              'email' =>Input::get('email'),
              'password' => Input::get('password'),
              'active' => 1
              ),$remember);

             if($auth){

              return Redirect::intended('/');
             }else{
              return Redirect::route('account-login')
                              ->with('global','Incorrect email or password, please try again.');
             }

          return redirect::route('account-login')
                              ->with('global','Something went wrong.');
          }

       }



  public function logout()
  {
    Auth::logout();
   return Redirect::route('home');
     
  }


  public function getchangepass(){

    return View::make('account.password');
  }



  public function postchangepass(){

    $validator = Validator::make(Input::all(),array(
      'old_password'  =>'required',
      'password'  =>'required|min:6',
      'password_again'  => 'required|same:password'
      ));

    if($validator->fails()){
       return Redirect::route('account-change-pass')
                           ->withErrors($validator);
    }else{

       $user=User::find(Auth::user()->id);

       $old_password = Input::get('old_password');
       $password = Input::get('password');

      if(Hash::check($old_password,$user->getAuthPassword())){
        $user->password=Hash::make($password);
        if($user->save()){
           return Redirect::route('home')->with('global','Your password has been changed.!!');
        }
      }else{
       return Redirect::route('home')->with('global','Your Old password is wrong...');
      }
    }

    return Redirect::route('account-change-pass')
    ->with('global','Something went wrong ! Could not change your password');
 }
   

   public function getForgot(){

    return View::make('account.forgot');
   }

    public function postForgot(){
   $validator = Validator::make(Input::all(),array(
    
    'email'  => 'required|email'

    ));
    
      if($validator->fails()){
      
      return Redirect::route('account-forgot')
                       ->withErrors($validator)
                       ->withInput();
      }else{
      
      $user = User::where('email','=',Input::get('email'))->first();
 
      if($user){
      $code =str_random(60);
      $password = str_random(10);

      $user->code  =$code;
      $user->password_temp =Hash::make($password);

      if($user->save()){

        Mail::send('emails.auth.forgot',array('link' =>URL::route('account-forgot-activate',$code),'username' => $user->username,'password' => $password),function($message) use ($user) {
         
         $message->to($user->email,$user->username)->subject('Your New Password');
        });

        return Redirect::route('home')->with('global','A new password has been sent to your email id.');
      }
      }
      }

    return Redirect::route('account-forgot')->with('global','Cound not request your new password.');
   }

public function getForgotActivate($code){

$user = User::where('code','=',$code)->where('password_temp','!=','')->first();
if($user){

$user->password=$user->password_temp;
$user->password_temp='';
$user->code='';

if($user->save()){
  return Redirect::route('home')->with('global','Your password has been recovered.');
}
}
return Redirect::route('home')->with('global','Cound not recover account.');
}

}