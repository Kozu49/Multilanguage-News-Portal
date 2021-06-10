@extends('main.home_master')
@section('content')
<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="#"><i class="fa fa-home"></i></a></li>					   
						<li><a href="#">
                        @if(session()->get('lang')=='english')
                        {{$post->category->category_eng}}
                        @else
                        {{$post->category->category_nep}}
                        @endif

                        </a></li>
						<li><a href="#">
                        @if(session()->get('lang')=='english')
                        {{$post->subcategory->subcategory_eng}}
                        @else
                        {{$post->subcategory->subcategory_nep}}
                        @endif
                        </a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
                        @if(session()->get('lang')=='english')
                        {{$post->title_eng}}
                        @else
                        {{$post->title_nep}}
                        @endif

                        </h1>
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">
						 
						 
						 <li>{{$post->users->name}} </li>     <li><i class="fa fa-clock-o"></i> {{$post->post_date}}</li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						


						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">
					<img src="{{asset('image/postimg/'.$post->image)}}" alt="" />
					<br><br>
					<div class="sharethis-inline-share-buttons"></div>

					<h4 class="caption"> 
                        @if(session()->get('lang')=='english')
                        {{$post->title_eng}}
                        @else
                        {{$post->title_nep}}
                        @endif

                    </h4>
					<p>
                    @if(session()->get('lang')=='english')
                        {!! $post->details_eng !!}
                        @else
                        {!! $post->details_nep !!}
                        @endif
                    </p>
				</div>

				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="i2lNYFso"></script>
				<div class="fb-comments" data-href="{{Request::url()}}" data-width="600" data-numposts="8"></div>


                @php
                $mores=DB::table('posts')->where('category_id',$post->category_id)->orderBy('id','desc')->limit(6)->get();
				@endphp
                <!-- ********* -->
				<div class="row">
					<div class="col-md-12"><h2 class="heading">
                    @if(session()->get('lang')=='english')
                        Related News
                        @else
                        सम्बन्धित समाचार
                        @endif
                    </h2></div>
                    @foreach($mores as $more)
					<div class="col-md-4 col-sm-4" style="height:250px;">
						<div class="top-news sng-border-btm">
							<a href="#"><img src="{{asset('image/postimg/'.$more->image)}}" alt="Notebook"></a>
							<h4 class="heading-02"><a href="{{route('view.post',$more->id)}}">
                            @if(session()->get('lang')=='english')
                            {{$more->title_eng}}
                            @else
                            {{$more->title_nep}}
                            @endif
                            </a> </h4>
						</div>
					</div>
                    @endforeach
					
				</div>
 

				<!-- <div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="top-news">
							<a href="#"><img src="assets/img/news.jpg" alt="Notebook"></a>
							<h4 class="heading-02"><a href="#">e-CAB shows how to help people during crisis</a> </h4>
						</div>
					</div>
					
				</div> -->
			</div>
			<div class="col-md-4 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
				<div class="tab-header">

                @php

					$latests=DB::table('posts')->orderBy('id','desc')->limit(8)->get();
					$populars=DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(8)->get();
					$highests=DB::table('posts')->orderBy('id','asc')->inRandomOrder()->limit(8)->get();

				@endphp
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
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
			</div>
		  </div>
		</div>
	</section>



@endsection