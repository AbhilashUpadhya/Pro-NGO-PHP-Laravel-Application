@extends('layout.main')

@section('title')
Volunteer
@endsection

@section('content')
<div class="container_12">
                <div class="grid_6" style="margin-top:20px;">
                  <!--  {{HTML::link('/volunteer/type1','Weekend Volunteering.')}}
                   <p>Spend a few hours of your weekend to bring the change ..</p>
                   <div class="clear"></div> -->

                   <div id="box-1" class="box " style="box-shadow: 5px 4px 5px #888888;" >

                        <a href="{{route('volunteer-type1')}}"><img id="image-1" src="{{ asset('images/volunteer.jpg') }} " /></a>
                   </div>       
                        <br>
                          <div class="caption fade-caption">
                            <a href="{{route('volunteer-type1')}}">
                            <p style="text-align:center;"><strong style="font-size: 20px;
color: yellowgreen;">Weekend Volunteering</strong><br>Spend a few hours of your weekend for a cause.
                              <ul style="text-align:center"> <li>Work For Change</li>
                                   <li>Come Up With Ideas</li>
                                    <li>Help Make A Better Tomorrow.</li>
                              </ul>
                            </p>
                            </a>
                          </div>
                         
                      

                </div>
                <div class="grid_5 prefix_1" style="margin-top:20px;">
                    
               <!--  {{HTML::link('/volunteer/type2','Event Based Volunteering.')}}   
                <p>Volunteer for a perticular events.</p>
                -->
                <div id="box-1" class="box " style="box-shadow: 5px 4px 5px #888888;" >

                        <a href="{{route('volunteer-type2')}}"><img id="image-1" src="{{ asset('images/vols.gif') }} " style="height: 190px; width:515px;" /></a>
                   </div>       
                        <br>
                          <div class="caption fade-caption">
                            <a href="{{route('volunteer-type2')}}">
                            <p style="text-align:center;"><strong style="font-size: 20px;color: yellowgreen;">Volunteer At An Event</strong><br> You Can pick an event that suites you work there.
                               <ul style="text-align:center"> <li>Work For Change</li>
                                   <li>Build A team</li>
                                    <li>Work at our events.</li>
                              </ul>
                            </p>
                            </a>
                          </div>

                    
                </div>
            </div>

@endsection