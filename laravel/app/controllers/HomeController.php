<?php

class HomeController extends BaseController {
     //Home Route.
	public function home(){
   

$cur = date("Y-m-d",time());
         $allevents=Eventinfo::where('start_date','>',$cur)->orderby('start_date')->get();
         $eventlist=$allevents->take(4);

		return View::make('hello')->with('eventlist',$eventlist);
	}
 
 


	


}