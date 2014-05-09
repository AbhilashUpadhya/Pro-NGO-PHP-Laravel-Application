@extends('layout.main')

@section('title')
Donate
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

<div class="container_12">

              <div id="mainwrapper">
                  <!-- Image Caption 1 -->

                  <h1 style="text-align:center;font-weight: normal;
font-family: inherit;
font-style: oblique;
font-size: 24px;
color: rgb(123, 123, 172);">Monthly or One time Donations</h1><br><br>
                      <div id="box-1" class="box " >

                        <a href="{{route('donate-type1')}}">
                        <img id="image-1" src="{{ asset('images/sponsor.jpg') }} " />
                          <span class="caption fade-caption">
                            <p style="text-align:center;"><h1><b>Monthly Sponsorship</b></h1><br></p> <p style="text-align:center;">Donate for a child's basic education and health every month.
                              <ul style="text-align:center"> <li>Education</li>
                                   <li>Health Care</li>
                                    <li>Nutritious Food</li>
                              </ul>
                            </p>
                          </span>
                          </a>
                      </div>


                          <div id="box-2" class="box" style="margin-top:100px;">
                          <a href="{{route('donate-type2')}}">
                        <img id="image-1" src="{{ asset('images/sponsor1.jpg') }} "/>
                          <span class="caption fade-caption">
                            <p style="text-align:center;"><h1><b>One Time Donation</b></h1><br></p> <p style="text-align:center;">Donate for a cause.
                              <ul style="text-align:center"> <li>Team Building</li>
                                   <li>Working for a cause</li>
                                    <li>Make a difference</li>
                              </ul>
                            </p>
                          </span>
                          </a>
                      </div>
              </div>
  
   <!--        
                <div class="grid_6" style="margin-top:20px;">
                   {{HTML::link('/donate/type1','Donation Type One.')}}
                   <p>Sponser a child. Monthly Sponsorship for a needy child.</p>
                   <div class="clear"></div>
                </div>
                <div class="grid_5 prefix_1" style="margin-top:20px;">
                    
                {{HTML::link('/donate/type2','Donation Type Two.')}}   
                <p>Donate for the cause. One time donation.</p>
               
                    
                </div> 
               --> 
</div>



@endsection