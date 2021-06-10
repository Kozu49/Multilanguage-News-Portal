<!-- top-footer-start -->
<section>
		<div class="container-fluid">
			<div class="top-footer">        
				<div class="row">
					<div class="col-md-3 col-sm-4">
						<div class="foot-logo">
							<img src="{{asset('frontend/assets/img/demofooter.png')}}" style="height: 50px;" />
						</div>
					</div>
					<div class="col-md-6 col-sm-4">
						 <div class="social">
                            <ul>
                                <li><a href="" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                                <li><a href="" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                                <li><a href="" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                                <li><a href="" target="_blank" class="android"> <i class="fa fa-android"></i></a></li>
                                <li><a href="" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                                <li><a href="" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
					</div>
					<div class="col-md-3 col-sm-4">
						<div class="apps-img">
							<ul>
								<li><a href="#"><img src="{{asset('frontend/assets/img/apps-01.png')}}" alt="" /></a></li>
								<li><a href="#"><img src="{{asset('frontend/assets/img/apps-02.png')}}" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.top-footer-close -->
	

	@php
	$webset=DB::table('website_settings')->first();


	@endphp
	<!-- middle-footer-start -->	
	<section class="middle-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="editor-one">
					@if(session()->get('lang')=='english')
					Company Address:
					@else
					कम्पनीको ठेगाना:
					@endif

					<br>
					@if(session()->get('lang')=='english')
					{!! $webset->address_eng !!}
					@else
					{!! $webset->address_nep !!}					
					@endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-one">
					@if(session()->get('lang')=='english')
					Company Phone:
					@else
					कम्पनी फोन:					
					@endif

					<br>
					@if(session()->get('lang')=='english')
					{{ $webset->phone_eng }}
					@else
					{{ $webset->phone_nep }}
					@endif
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="editor-three">
					@if(session()->get('lang')=='english')
					Company Email:
					@else
					कम्पनी ईमेल:					
					@endif

					<br>
					
					{{ $webset->email }}
					
					</div>
				</div>
			</div>
		</div>
	</section><!-- /.middle-footer-close -->
	
	<!-- bottom-footer-start -->	
	<section class="bottom-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="copyright">						
						All rights reserved © 2020 EasyLearning
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="btm-foot-menu">
						<ul>
							<li><a href="#">About US</a></li>
							<li><a href="#">Contact US</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>