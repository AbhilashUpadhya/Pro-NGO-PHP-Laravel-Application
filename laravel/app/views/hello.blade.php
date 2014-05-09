@extends('layout.main')


@section('title')
HOME
@endsection

@section('slider')

<div class="fluidHeight container_12">
            <div class="sliderContainer">
                <div class="iosSlider">
                    <div class="slider">
                        <div class="item item1">
                            <div class="inner">
                                <div class="text1"><span>Join our Campaign<br> Help homeless people.</span></div>
                            </div>
                        </div>
                        <div class="item item2">
                            <div class="inner">
                                <div class="text1"><span>Make the right choice! <br>Help those who are in need.</span></div>
                            </div>
                        </div>
                        <div class="item item3">
                            <div class="inner">
                                <div class="text1"><span>Our mission is to engage more people in the fight <br> for better life of needy people</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slideSelectors">
                    <div class="item selected"></div>
                    <div class="item"></div>
                    <div class="item"></div>
                    
                </div>
            </div>
        </div>
@endsection

@section('content')


 
<div class="ic">March 24, 2014!</div>


            <div class="container_12">
                <div class="grid_6">
                    <h2>Meet Our Team</h2>
                    <img src="images/page1_img1.jpg" alt="" class="img_inner fleft">
                    <div class="extra_wrapper">
                        <p class="col2"><a href="#">Our team mainly consists of youngsters from across the country.</a></p>
                        The main core members of our organization.<br>
                        <a href="#" class="btn">Learn More</a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="grid_5 prefix_1">
                    <h2>Our Mission</h2>
                    <div class="rel1">
                        A self-reliant and happy society where there is harmony and the developmental needs are addressed locally through individuals who act without vested interest..</p>
                        <p> A self-reliant and happy society where there is harmony</p>
                    </div>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div>
            <div class="hor"></div>
            <div class="container_12">
            
                


             <div class="grid_3">
                    <h2>Upcoming Events</h2>
                    <ul class="list">
                        @foreach($eventlist as $event)
                        <li>
                            <time datetime="2014-01-01"><?php $obj =DateTime::createFromFormat('Y-m-d',$event['start_date']); echo $obj->format('d');?><span><?php $obj =DateTime::createFromFormat('Y-m-d',$event['start_date']); echo $obj->format('M');?></span></time>
                            <div class="extra_wrapper">
                                <div class="title col2"><a href="{{URL::route('viewevent',$event['id'])}}" target="_blank">{{$event['title']}}</a></div>
                                <?php echo substr($event['description'],0,24).'...';?>
                    
                            </div>
                        </li>
                        @endforeach
                        
                        
                    </ul>
                    <blockquote class="bq1">
                        <div class="title">Testimonials</div>
                        <p>A fantastic bunch of like minded people working for a good cause.</p>
                        <div class="col2">Anonymous</div>
                    </blockquote>
                </div>


                <div class="grid_9">
                    <h2>Our Campaigns</h2>
                    <section>
                        <ul id="da-thumbs" class="da-thumbs">
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th1.jpg" alt="" />
                                <div><span>Helping Adults</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th2.jpg" alt="" />
                                <div><span>Helping Children</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th3.jpg" alt="" />
                                <div><span>Empowering Women</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th4.jpg" alt="" />
                                <div><span>Homes for Veterans</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th5.jpg" alt="" />
                                <div><span>Saving Lives</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th6.jpg" alt="" />
                                <div><span>Invest in Kids</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th7.jpg" alt="" />
                                <div><span>Healthy Nutrition</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th8.jpg" alt="" />
                                <div><span>Educated World</span></div>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::route('index3')}}">
                                <img src="images/th9.jpg" alt="" />
                                <div><span>Against Hunger</span></div>
                                </a>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>


@endsection

