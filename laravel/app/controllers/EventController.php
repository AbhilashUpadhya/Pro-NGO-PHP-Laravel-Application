<?php
class EventController extends BaseController {


public function index($id){
    $event= Eventinfo::where('id','=',$id)->first();

    $title= $event['title'];
    $desc =$event['description'];
    $date = $event['start_date'];
    $timings = $event['start_time'].' to '.$event['end_time'];
    $location =$event['location'];
    $img=$event['image'];	
    $image = 'data:image/jpeg;base64,' . base64_encode($img);
    return View::make('event.eventview')->with(array('title'=>$title,'desc'=> $desc, 'date' => $date, 'timings' => $timings, 'location' => $location, 'image' =>$image ));

}


}
