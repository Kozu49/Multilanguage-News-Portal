@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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

            <div class="row" style="padding: 20px;">
            <div class="col-md-4">
        <h3>Change Password</h3>
        

                <form method="POST" action="{{route('password.update',$user->id)}}" >
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Current Password</label>
                    <input type="password"  class="form-control" name="oldpassword" id="current_password" >
                    @error('oldpassword')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                </div>

                
                <button type="submit" class="btn btn-primary">Update</button>
                </form>

                </div>
                </div>

                        




@endsection