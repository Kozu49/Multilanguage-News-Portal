@extends('main.home_master')
@section('content')


<!-- archive_page-start -->
<section class="single_page">						
		<div class="container-fluid">											
		<div class="row">
			<div class="col-md-12">
				<div class="single_info">
					<span>
						<a href="#"><i class="fa fa-home" aria-hidden="true"></i> /
						</a>  Category		
					</span>				    
				</div>
			</div>

			<div class="col-md-9 col-sm-8">				
								
					
				@foreach($catposts as $catpost)
				<div class="archive_post_sec_again">
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="archive_img_again">
								<a href="#"><img src="{{asset('image/postimg/'.$catpost->image)}}" alt="Notebook"></a>
							</div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="archive_padding_again">
								<div class="archive_heading_01">
									<a href="#">
									@if(session()->get('lang')=='english')
									{{$catpost->title_eng}}
									@else
									{{$catpost->title_nep}}
									@endif
									</a>
								</div>
								<div class="archive_dtails">
								@if(session()->get('lang')=='english')
									{!! Str::limit($catpost->details_eng,200) !!}
									
									@else

									{!! Str::limit($catpost->details_nep,200) !!}
								@endif

									
									
								</div>
								<div class="dtails_btn"><a href="{{route('view.post',$catpost->id)}}">
								@if(session()->get('lang')=='english')
									Read More..
									@else
									थप पढ्नुहोस्..
									@endif
								</a>
								</div>
							</div>
						</div>
					</div>
				</div>	
				@endforeach		

				{{$catposts->links('pagination-link')}}
				

			</div>

			<div class="col-md-3 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{asset('frontend/assets/img/add_01.jpg')}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
				<div class="tab-header">
					<!-- Nav tabs -->

					@php

					$latests=DB::table('posts')->orderBy('id','desc')->limit(8)->get();
					$populars=DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(8)->get();
					$highests=DB::table('posts')->orderBy('id','asc')->inRandomOrder()->limit(8)->get();

				@endphp

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
							<div class="sidebar-add"><img src="assets/img/add_01.jpg" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
			</div>			
		</div>
	</div>
</section>

@endsection