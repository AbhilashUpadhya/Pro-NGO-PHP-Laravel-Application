<?php

Route::get('/', array(


	'as'   => 'home',
	'uses' =>  'HomeController@home'
	)); 

Route::get('/index1',array( 'as' => 'index1' ,function(){

return View::make('layout.index1');

}));


Route::get('/index2',array( 'as' => 'index2' ,function(){

return View::make('layout.index2');

}));



Route::get('/index3',array( 'as' => 'index3' ,function(){

return View::make('layout.index3');

}));


Route::get('/index4',array( 'as' => 'index4' ,function(){

return View::make('layout.index4');

}));







Route::get('/donate',array(
    'as' => 'donate',
    'uses' => 'DonateController@start'

    ));

Route::get('/volunteer',array(
    'as' => 'volunteer',
    'uses' => 'VolunteerController@start'

    ));



Route::get('/adminlogin',array(
    'as' => 'adminlogin',
    'uses' => 'AdminController@getlogin'
    ));

Route::get('/mailtovolunteer/{code}',array(
    'as' => 'mailtovolunteer',
    'uses' => 'AdminController@confmailone'
    ));

Route::get('/mailtodonor/{code}',array(
    'as' => 'mailtodonor',
    'uses' => 'AdminController@confmailtwo'
    ));

Route::get('/event/detail/{id}',array(
    'as' => 'viewevent',
    'uses' => 'EventController@index'
    ));







//Authenticated group.
Route::group(array('before' => 'auth'),function(){

  



//CSRF group
Route::group(array('before' => 'csrf'),function(){


Route::post('/account/changepass',array(
   'as'  => 'account-change-pass-post',
   'uses'  => 'AccountController@postchangepass'   
   ));


Route::post('/donate/type1/first',array(

 'as' => 'donate-type1-first',
 'uses' => 'DonateController@type1first'
  ));

Route::post('/donate/type1/second',array(

 'as' => 'donate-type1-second',
 'uses' => 'DonateController@type1second'
  ));


Route::post('/donate/type2',array(
    'as' => 'donate-type2-post',
    'uses' => 'DonateController@type2post'

    ));
Route::post('/admin/event',array(
  'as' => 'admin-event',
  'uses' =>'AdminController@createevent'
  ));

Route::post('/donate/checkout',array(
    'as'    =>'checkout-post', 
    'uses'  =>'DonateController@checkoutpost'
 
    ));

Route::post('/volunteer/type1/pincodetest',array(
    'as'    =>'pincodetest', 
    'uses'  =>'VolunteerController@pincodetest'
 
    ));

Route::post('/volunteer/type1',array(
    'as' => 'volunteer-type1-post',
    'uses' => 'VolunteerController@type1post'

    ));

Route::post('/volunteer/event/{id}',array(
    'as'  => 'event-volunteer-post',
    'uses'  => 'VolunteerController@eventvolunteerpost'
  ));



});





Route::get('/account/logout',array(
   
   'as' => 'account-logout',
   'uses' => 'AccountController@logout'
  ));



Route::get('/account/changepass',array(
   'as'  => 'account-change-pass',
   'uses'  => 'AccountController@getchangepass'   
   ));


Route::get('/donate/type1',array(
    'as' => 'donate-type1',
    'uses' => 'DonateController@type1'

    ));

Route::get('/donate/type2',array(
    'as' => 'donate-type2',
    'uses' => 'DonateController@type2'

    ));

Route::get('/donate/checkout',array(
    'as'    =>'checkout', 
    'uses'  =>'DonateController@checkout'
 
    ));

Route::get('/donate/successone',array(
    'as' => 'donatesuccessone',
    'uses' => 'DonateController@successone'

    ));

Route::get('/donate/successtwo',array(
    'as' => 'donatesuccesstwo',
    'uses' => 'DonateController@successtwo'

    ));

Route::get('/volunteer/type1',array(
    'as' => 'volunteer-type1',
    'uses' => 'VolunteerController@type1'

    ));

Route::get('/volunteer/type1/success',array(

  'as'  => 'weekend_volunteer_success',
  'uses'  => 'VolunteerController@type1success'
  ));

Route::get('/volunteer/type2',array(
    'as' => 'volunteer-type2',
    'uses' => 'VolunteerController@type2'

    ));


Route::get('/admin/base/',array(
 'as'  => 'adminbase',
 'uses'  => 'AdminController@base'


  ));


Route::get('/volunteer/event/{id}',array(
    'as'  => 'event-volunteer',
    'uses'  => 'VolunteerController@eventvolunteer'
  ));



});


//Unauthenticated group.
Route::group(array('before' => 'guest') ,function(){

  

  //CSRF protection group 
                        Route::group(array('before'=>'csrf'),function(){

                         Route::post('/account/create',array(
                            'as'   => 'account-create-post',
                           'uses' => 'AccountController@postCreate'
                  	       ));


                          Route::post('/account/login',array(
                          'as' => 'account-login-post',
                          'uses' => 'AccountController@postLogin'

                          ));



                        Route::post('/account/forgot',array(
                          'as' => 'account-forgot-post',
                          'uses' => 'AccountController@postForgot'

                          ));

                         Route::post('/adminlogin',array(
                         'as' => 'adminlogin-post',
                          'uses' => 'AdminController@postlogin'

                          ));

                      });

  Route::get('/account/create',array(
       'as'   => 'account-create',
       'uses' => 'AccountController@getCreate'

  	));


  Route::get('/account/active/{post}',array(
       'as' => 'account-active',
       'uses' => 'AccountController@getActive'

  	));

  Route::get('/account/login',array(
    'as' => 'account-login',
    'uses' => 'AccountController@getLogin'

    ));



  Route::get('/account/forgot',array(
    'as' => 'account-forgot',
    'uses' => 'AccountController@getForgot'

    ));

  Route::get('/account/forgot-activate/{code}',array(
    'as' => 'account-forgot-activate',
    'uses' => 'AccountController@getForgotActivate'

    ));







});