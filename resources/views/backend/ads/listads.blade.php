@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{asset('backend/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome to khwopa News..</h4>
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
                          <a href="{{route('home')}}" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Visit Frontend ?</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Advertisements</h4>
                    
                    <div class="template-demo">
                    <a href="{{route('add.ads')}}"><button type="button" class="btn btn-primary btn-fw" style="float:right;">Add Ads</button></a>
                    </div>
                    
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> SN </th>
                            <th> Link </th>
                            <th> Ads Image </th>
                            <th> Type        </th>
                            <th> Actions    </th>
                          </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($adss as $ads)
                          <tr>
                          <td> {{$i++}} </td>
                            <td> {{$ads->link}} </td>
                            <td><img src="{{asset('image/ads/'.$ads->ads)}}" style="width:100px; height:100px;"></td>
                            <td> 
                            @if($ads->type==2)
                                <span class="badge badge-success">Horizontal</span>
                                @else
                                <span class="badge badge-info">Vertical</span>
                                @endif
                             </td>     
                            
                            
                            <td>  
                                <a href="{{route('edit.ads',$ads->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('delete.ads',$ads->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                            </td>                           
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{$adss->links('pagination-link')}}
                    </div>
                  </div>
                </div>
              </div>

              


@endsection