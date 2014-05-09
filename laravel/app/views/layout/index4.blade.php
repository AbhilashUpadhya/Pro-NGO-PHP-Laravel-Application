@extends('layout.main')
@section('title')
Contact Us
@endsection

@section('content')

<div class="content"><div class="ic">March 24, 2014!</div>
			<div class="container_12">
				<br>
				<h2 style="text-align:center; padding:0px; margin:0px;"> FIND US </h2>
				<div class="grid_12">
					
					<div class="map">
						<figure class="">
							<iframe src="{{asset('map/mapview.blade.php')}}" style="width:550px;margin-left:20%;border : 2px solid black;"></iframe>
						</figure>
						<br><hr>
						<div class="grid_4 alpha">
							<h2>Address:</h2>
							<address>
								<span class="fa fa-home"></span>
								138 Org <br>
								Bangalore South <br>
								Karnataka India. 
							</address>
						</div>
						<div class="grid_4">
							<h2>Phones:</h2>
							<div class="m_phone">
								<div class="fa fa-phone"></div>
								+91 9916816008
							</div>
							<div class="m_phone">
								<div class="fa fa-print"></div>
								+1 504 889 9898138
							</div>
						</div>
						<div class="grid_4 omega">
							<h2>Email:</h2>
							<a href="#"><span class="fa fa-envelope-o"></span> abhilashupadhya94@gmail.com</a>
						</div>
						<div class="clear"></div>
					</div>
					
					
				</div>
			</div>
		</div>

		@stop