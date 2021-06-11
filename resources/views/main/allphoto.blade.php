@extends('main.home_master')
@section('content')

<section class="single_section">           		
		<div class="container-fluid">						
			 <div class="row">
                 @foreach($photos as $photo)
				<div class="col-md-4 col-sm-4">
					<div class="photo">
						<a href="#"><img src="{{asset('image/photogallery/'.$photo->photo)}}" alt="" /></a>
						<div class="photo_title">{{$photo->title}} </div>
					</div>
				</div>
                @endforeach
				
			</div>			
			
			<!-- /.options -->  
		</div>
	</section>



@endsection