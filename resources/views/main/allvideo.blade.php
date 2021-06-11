@extends('main.home_master')
@section('content')

<section class="single_section">		
            <div class="container-fluid">			                
                 <div class="row">			
                     @foreach($videos as $video)		
					<div class="col-md-4 col-sm-4">
                        <div class="photo">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
								<iframe width="729" height="410" src="https://www.youtube.com/embed/{{$video->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
                            </div>
                            <div class="photo_title">{{$video->title}}</div>
                        </div>
                    </div>
                    @endforeach
					
					
                </div>
				
				<!-- /.options -->  

				

            </div>
        </section>




@endsection