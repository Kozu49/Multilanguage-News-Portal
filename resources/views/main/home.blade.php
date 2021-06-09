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
		 <h4 class="lead-heading-01">
		 <a href="{{route('view.post',$firstsectionbig->id)}}">
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
										<h4 class="heading-02"><a href="{{route('view.post',$firstsection->id)}}">
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
											<h4 class="heading-02"><a href="{{route('view.post',$fastcatpostbig->id)}}">
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
											<h4 class="heading-03"><a href="{{route('view.post',$fastcatpostsmall->id)}}">
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
											<h4 class="heading-02"><a href="{{route('view.post',$secondcatpostbig->id)}}">
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
											<h4 class="heading-03"><a href="{{route('view.post',$secondcatpostsmall->id)}}">
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
						<iframe width="560" height="315" src="https://www.youtube.com/embed/-AzY7xqR6tg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>						
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


	@php

$threecategory=DB::table('categories')->skip(2)->first();
$threecatpostbig=DB::table('posts')->where('category_id',$threecategory->id)->where('bigthumbnail',1)->first();
$threecatpostsmalls=DB::table('posts')->where('category_id',$threecategory->id)->where('bigthumbnail',Null)->limit(3)->get();

@endphp
	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
						@if(session()->get('lang')=='english')
								{{$threecategory->category_eng}}
								@else
								{{$threecategory->category_nep}}
								@endif
						 <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
						 @if(session()->get('lang')=='english')
										+ All News
										@else
									 	+ सबै समाचार:
										@endif
						 </span></a></div>
						
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{asset('image/postimg/'.$threecatpostbig->image)}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{route('view.post',$threecatpostbig->id)}}"></a> 
									@if(session()->get('lang')=='english')
									{{$threecatpostbig->title_eng}}
									@else
									{{$threecatpostbig->title_nep}}
									@endif
									</h4>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
							@foreach($threecatpostsmalls as $threecatpostsmall)
								<div class="image-title">
									<a href="#"><img src="{{asset('image/postimg/'.$threecatpostsmall->image)}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{route('view.post',$threecatpostsmall->id)}}">
									@if(session()->get('lang')=='english')
									{{$threecatpostsmall->title_eng}}
									@else
									{{$threecatpostbig->title_nep}}
									@endif
									</a> </h4>
								</div>
								@endforeach
							</div>
							
						</div>
					</div>
				</div>
				@php
				$fourcategory=DB::table('categories')->skip(3)->first();
				$fourcatpostbig=DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',1)->first();
				$fourcatpostsmalls=DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',Null)->limit(3)->get();
				@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
						@if(session()->get('lang')=='english')
						{{$fourcategory->category_eng}}
						@else
						{{$fourcategory->category_nep}}
						@endif
						<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
						@if(session()->get('lang')=='english')
						+ All News
						@else
						+ सबै समाचार:
						@endif
						</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{asset('image/postimg/'.$fourcatpostbig->image)}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{route('view.post',$fourcatpostbig->id)}}">
									@if(session()->get('lang')=='english')
									{{$fourcatpostbig->title_eng}}
									@else
									{{$fourcatpostbig->title_nep}}
									@endif
									</a> </h4>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
							@foreach($fourcatpostsmalls as $fourcatpostsmall)
								<div class="image-title">
									<a href="#"><img src="{{asset('image/postimg/'.$fourcatpostsmall->image)}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{route('view.post',$fourcatpostsmall->id)}}">
									@if(session()->get('lang')=='english')
									{{$fourcatpostsmall->title_eng}}
									@else
									{{$fourcatpostsmall->title_nep}}
									@endif
									</a> </h4>
								</div>
								@endforeach
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- ******* -->

			@php
				$fifthcategory=DB::table('categories')->skip(4)->first();
				$fifthcatpostbig=DB::table('posts')->where('category_id',$fifthcategory->id)->where('bigthumbnail',1)->first();
				$fifthcatpostsmalls=DB::table('posts')->where('category_id',$fifthcategory->id)->where('bigthumbnail',Null)->limit(3)->get();
			@endphp
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
						@if(session()->get('lang')=='english')
						{{$fifthcategory->category_eng}}
						@else
						{{$fifthcategory->category_nep}}
						@endif
						<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
						@if(session()->get('lang')=='english')
						+ All News
						@else
						+ सबै समाचार:
						@endif
						</span></a></div>

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{asset('image/postimg/'.$fifthcatpostbig->image)}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{route('view.post',$fifthcatpostbig->id)}}">
									@if(session()->get('lang')=='english')
									{{$fifthcatpostbig->title_eng}}
									@else
									{{$fifthcatpostbig->title_nep}}
									@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach ($fifthcatpostsmalls as $fifthcatpostsmall)
								<div class="image-title">
									<a href="#"><img src="{{asset('image/postimg/'.$fifthcatpostsmall->image)}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{route('view.post',$fifthcatpostsmall->id)}}">
									@if(session()->get('lang')=='english')
									{{$fifthcatpostsmall->title_eng}}
									@else
									{{$fifthcatpostsmall->title_nep}}
									@endif
									</a> </h4>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>

				@php
				$sixthcategory=DB::table('categories')->skip(5)->first();
				$sixthcatpostbig=DB::table('posts')->where('category_id',$sixthcategory->id)->where('bigthumbnail',1)->first();
				$sixthcatpostsmalls=DB::table('posts')->where('category_id',$sixthcategory->id)->where('bigthumbnail',Null)->limit(3)->get();
				@endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
									@if(session()->get('lang')=='english')
									{{$sixthcategory->category_eng}}
									@else
									{{$sixthcategory->category_nep}}
									@endif
						<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> 
						@if(session()->get('lang')=='english')
						+ All News
						@else
						+ सबै समाचार:
						@endif
						 </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{asset('image/postimg/'.$sixthcatpostbig->image)}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="{{route('view.post',$sixthcatpostbig->id)}}">
									@if(session()->get('lang')=='english')
									{{$sixthcatpostbig->title_eng}}
									@else
									{{$sixthcatpostbig->title_nep}}
									@endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
							@foreach($sixthcatpostsmalls as $sixthcatpostsmall)
								<div class="image-title">
									<a href="#"><img src="{{asset('image/postimg/'.$sixthcatpostsmall->image)}}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="{{route('view.post',$sixthcatpostsmall->id)}}">
									@if(session()->get('lang')=='english')
									{{$sixthcatpostsmall->title_eng}}
									@else
									{{$sixthcatpostsmall->title_nep}}
									@endif
									</a> </h4>
								</div>
							@endforeach
								
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
							<br><br>
					@php

							$districts=DB::table('districts')->get();
					@endphp

					<div class="row">
						<div class="cetagory-title-02"><a href="#">
						@if(session()->get('lang')=='english')
							Search By District
							@else
							जिल्ला द्वारा खोजी गर्नुहोस्

							@endif	
						<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
				
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


						<form action="{{route('search.district')}}" method="get">
							@csrf						
							<div class="row">
								<div class=col-lg-4>
								<select class="form-control" name="district_id" id="exampleSelectGender">
								<option disabled="" selected="">--Select District--</option>
								@foreach($districts as $district)
								<option value="{{$district->id}}">{{$district->district_eng}} | {{$district->district_nep}}</option>
								@endforeach
								</select>
								</div>
								

								<div class=col-lg-4>
								<select class="form-control" name="subdistrict_id" id="subdistrict_id">
                				<option disabled="" selected="">--Select SubDistrict--</option>
                  
                				</select>
								</div>

								<div class=col-lg-4>
									<button class="btn btn-success btn-block">Search</button>
								</div>
								
							</div>

						</form>
						
					</div>

					<br><br>

					
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{asset('frontend/assets/img/top-ad.jpg')}}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->	


				@php

					$latests=DB::table('posts')->orderBy('id','desc')->limit(5)->get();
					$populars=DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(5)->get();
					$highests=DB::table('posts')->orderBy('id','asc')->inRandomOrder()->limit(5)->get();

				@endphp

				</div>
				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
							@if(session()->get('lang')=='english')
							Latest
							@else
							पछिल्लो
							@endif
							</a></li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
							@if(session()->get('lang')=='english')
							Popular
							@else
							लोकप्रिय
							@endif
							</a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
							@if(session()->get('lang')=='english')
							Highest
							@else
							उच्च
							@endif
							</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">

								<div class="news-titletab">
								@foreach($latests as $latest)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="{{route('view.post',$latest->id)}}">
										@if(session()->get('lang')=='english')
										{{$latest->title_eng}}
										@else
										{{$latest->title_nep}}
										@endif
										</a> </h4>
									</div>
								@endforeach
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab22">
								<div class="news-titletab">
								@foreach($populars as $popular)

									<div class="news-title-02">
										<h4 class="heading-03"><a href="{{route('view.post',$popular->id)}}">
										@if(session()->get('lang')=='english')
										{{$popular->title_eng}}
										@else
										{{$popular->title_nep}}
										@endif
										</a> </h4>
									</div>
								@endforeach
								</div>                                          
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab23">	
								<div class="news-titletab">
								@foreach($highests as $highest)
									<div class="news-title-02">
										<h4 class="heading-03"><a href="{{route('view.post',$highest->id)}}">
										@if(session()->get('lang')=='english')
										{{$highest->title_eng}}
										@else
										{{$highest->title_nep}}
										@endif
										</a> </h4>
									</div>
								@endforeach
									
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
	


	

				@php
				$photobig=DB::table('photos')->where('type',1)->orderBy('id','desc')->first();				
				$photosmalls=DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(5)->get();				

				@endphp
	
	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> 
					@if(session()->get('lang')=='english')
							Photo Gallery
							@else
							तस्बिर पुस्तिका
							@endif
					 </div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
								
                                      <img src="{{asset('image/photogallery/'.$photobig->photo)}}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
						
	                        <div class="photo_list_bg">
							@foreach($photosmalls as $photosmall)
	                            
	                            <div class="photo_img photo_border active">
	                                <img src="{{asset('image/photogallery/'.$photosmall->photo)}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
									
									{{$photosmall->title}}
									
	                                </div>
	                            </div>

	                            

	                            @endforeach
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


				@php
				$videobig=DB::table('videos')->where('type',1)->orderBy('id','desc')->first();				
				$videosmalls=DB::table('videos')->where('type',0)->orderBy('id','desc')->limit(3)->get();				

				@endphp

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> 
					@if(session()->get('lang')=='english')
							Video Gallery
							@else
							भिडियो ग्यालरी
							@endif
					 </div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$videobig->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
						
                        
                            <div class="gallery_sec owl-carousel">
							@foreach($videosmalls as $videosmall)
							
								<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$videosmall->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div> 							
							@endforeach                        
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


	<!-- This is for subcategory ajax -->

	<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             if(district_id) {
                 $.ajax({
                     url: "{{  url('/get/subdistrict') }}/"+district_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subdistrict_id").empty();
                              $.each(data,function(key,value){
                                  $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_eng+'</option>');
                              });
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>

@endsection