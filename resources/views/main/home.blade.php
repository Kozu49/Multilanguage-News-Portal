@extends('main.home_master')

@section('content')

@php
		$firstsectionbig=DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
		$firstsections=DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(8)->get();


	@endphp

<!-- 1st-news-section-start -->	        
<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
	 <div class="service-img"><a href="#"><img src="{{asset('image/postimg/'.$firstsectionbig->image)}}" width="800px" alt="Notebook"></a></div>
								<div class="content">
		 <h4 class="lead-heading-01"><a href="#">
		 @if(session()->get('lang')=='english')
				{{$firstsectionbig->title_eng}}
				@else
				{{$firstsectionbig->title_nep}}
				@endif
		 </a> </h4>
								</div>
							</div>
						</div>
						
					</div>
						<div class="row">
						@foreach($firstsections as $firstsection)

								<div class="col-md-3 col-sm-3">
									<div class="top-news">
										<a href="#"><img src="{{asset('image/postimg/'.$firstsection->image)}}" alt="Notebook"></a>
										<h4 class="heading-02"><a href="#">
										@if(session()->get('lang')=='english')
										{{$firstsection->title_eng}}
										@else
										{{$firstsection->title_nep}}
										@endif
										</a> </h4>
									</div>
									
								</div>
								@endforeach
								
							</div>
					
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->	
					
					<!-- news-start -->
						@php
							$fastcategory=DB::table('categories')->first();
							$fastcatpostbig=DB::table('posts')->where('category_id',$fastcategory->id)->where('bigthumbnail',1)->first();
							$fastcatpostsmalls=DB::table('posts')->where('category_id',$fastcategory->id)->where('bigthumbnail',Null)->limit(3)->get();

						@endphp

					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title"><a href="#">
										@if(session()->get('lang')=='english')
										{{$fastcategory->category_eng}}
										@else
										{{$fastcategory->category_nep}}
										@endif
								 <span>
								 @if(session()->get('lang')=='english')
										More
										@else
										अधिक
										@endif
								 <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">

									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="#"><img src="{{asset('image/postimg/'.$fastcatpostbig->image)}}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="#">
											@if(session()->get('lang')=='english')
											{{$fastcatpostbig->title_eng}}
											@else
											{{$fastcatpostbig->title_nep}}
											@endif
											</a> </h4>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
									@foreach($fastcatpostsmalls as $fastcatpostsmall)
									<div class="image-title">
											<a href="#"><img src="{{asset('image/postimg/'.$fastcatpostsmall->image)}}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="#">
											@if(session()->get('lang')=='english')
											{{$fastcatpostsmall->title_eng}}
											@else
											{{$fastcatpostsmall->title_nep}}
											@endif
											</a> </h4>
										</div>
									@endforeach
									</div>
									
									
								</div>
							</div>
						</div>

							@php

							$secondcategory=DB::table('categories')->skip(1)->first();
							$secondcatpostbig=DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',1)->first();
							$secondcatpostsmalls=DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',Null)->limit(3)->get();

							@endphp

						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title"><a href="#">
								@if(session()->get('lang')=='english')
								{{$secondcategory->category_eng}}
								@else
								{{$secondcategory->category_nep}}
								@endif
								<span>
								@if(session()->get('lang')=='english')
										More
										@else
										अधिक
										@endif
								<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="#"><img src="{{asset('image/postimg/'.$secondcatpostbig->image)}}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="#">
											@if(session()->get('lang')=='english')
											{{$secondcatpostbig->title_eng}}
											@else
											{{$secondcatpostbig->title_nep}}
											@endif
											</a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
									@foreach($secondcatpostsmalls as $secondcatpostsmall)
										<div class="image-title">
											<a href="#"><img src="{{asset('image/postimg/'.$secondcatpostsmall->image)}}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="#">
											@if(session()->get('lang')=='english')
											{{$secondcatpostsmall->title_eng}}
											@else
											{{$secondcatpostsmall->title_nep}}
											@endif
											</a> </h4>
										</div>
										
									@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->	
					

                    @php
                    $live=DB::table('live_tvs')->first();
                    @endphp

                    @if($live->status==1)
					<!-- youtube-live-start -->	
					<div class="cetagory-title-03">Live TV</div>
					<div class="photo">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/dsxbJtMD650" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                                       {!! $live->embed_code !!}             
						
                        </div>
					</div><!-- /.youtube-live-close -->	
                    @endif
                    


					<!-- facebook-page-start -->
					<div class="cetagory-title-03">Facebook </div>
					<div class="fb-root">
						facebook page here
					</div><!-- /.facebook-page-close -->	
					
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->	
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->

	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">International <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Armenia, Azerbaijan accused of breaking truce</a> </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">Politics <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>All News  </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">BNP introduced culture of impunity: Quader</a> </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ******* -->
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">Biz-Econ<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Israel sends treaty delegation to Bahrain with Trump aides</a> </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- add-start -->	
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="add"><img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" /></div>
				</div>
			</div><!-- /.add-close -->	
			
		</div>
	</section><!-- /.2nd-news-section-close -->
                                                        
	<!-- 3rd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
					
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="top-news">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
					</div>
					<!-- ******* -->
					<br />
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="#"><img src="{{asset('frontend/assets/img/news.jpg')}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->	


				</div>
				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">Latest</a></li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">Popular</a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">Popular1</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab22">
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
								</div>                                          
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab23">	
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">Both education and life must be saved</a> </h4>
									</div>
								</div>						                                          
							</div>
						</div>
					</div>
					
                    
                    <!-- Namaj Times -->
						@php
							$prayer=DB::table('prayers')->first();
						@endphp
						

					<div class="cetagory-title-03">
					@if(session()->get('lang')=='english')
					Prayer Time
					@else
					प्रार्थना समय
					@endif
					 </div>

							<table class="table">

							<tr>
							<th>
							@if(session()->get('lang')=='english')
							Fajr
							@else
							फजोर
							@endif
							</th>	
							<th>{{$prayer->fajr}}</th>
							</tr>

							<tr>
							<th>
							@if(session()->get('lang')=='english')
							Johor
							@else
							जोहोर
							@endif
							</th>	
							<th>{{$prayer->johor}}</th>
							</tr>

							<tr>
							<th>
							@if(session()->get('lang')=='english')
							Asor
							@else
							असोर
							@endif
							</th>	
							<th>{{$prayer->asor}}</th>
							</tr>

							<tr>
							<th>
							@if(session()->get('lang')=='english')
							Magrib
							@else
							मगरिब
							@endif
							</th>	
							<th>{{$prayer->magrib}}</th>
							</tr>

							<tr>
							<th>
							@if(session()->get('lang')=='english')
							Eaha
							@else
							हाँ
							@endif
							</th>	
							<th>{{$prayer->eaha}}</th>
							</tr>

							<tr>
							<th>
							@if(session()->get('lang')=='english')
							Jummah
							@else
							जुम्मा
							@endif
							</th>	
							<th>{{$prayer->jummah}}</th>
							</tr>
							
							
							</table>
					<!-- Namaj Times -->


					<div class="cetagory-title-03">Old News  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="search ">
						</div>
				   </form>
				   <!-- news -->
				   <br><br><br><br><br>

				  		 @php
							$websites=DB::table('websites')->get();
						@endphp


				   <div class="cetagory-title-04">
				   			@if(session()->get('lang')=='english')
							Important Websites
							@else
							महत्त्वपूर्ण वेबसाइटहरू
							@endif
				   </div>
				   <div class="">
				   	<div class="news-title-02">
					   @foreach($websites as $website)
				   		<h4 class="heading-03"><a href="{{$website->website_link}}"><i class="fa fa-check" aria-hidden="true"></i> {{$website->website_name}}  </a> </h4>
						@endforeach
					   </div>
				   	
				   </div>

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->
	


	


	


	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> Photo Gallery </div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
	                            
	                            <div class="photo_img photo_border active">
	                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{asset('frontend/assets/img/news.jpg')}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                   Casting of Israeli actress as Cleopatra sparks anger
	                                </div>
	                            </div>

	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> photo Gallery </div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/AWM8164ksVY?list=RDAWM8164ksVY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="gallery_sec owl-carousel">

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                           Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                       Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                          Kumar Sanu tests positive for coronavirus  
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset('frontend/assets/img/news.jpg')}}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                           Kumar Sanu tests positive for coronavirus
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->

@endsection