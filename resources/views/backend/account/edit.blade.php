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


        <div class="row" >
        <div class="col-md-10">

   

            <form method="POST" action="{{route('update.profile',$user->id)}}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
            <img id="showimage" src="{{asset('image/profileimage/'.$user->image)}}" style="width:250px;height:250px">
            </div>
            <div class="mb-3">
            <label for="formFile" class="form-label">Profile Image:</label>
            <input class="form-control" type="file" name="image" id="image">
            </div>
            

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name:</label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name">
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Email:</label>
                <input type="email" class="form-control" value="{{$user->email}}" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Mobile:</label>
                <input type="text" class="form-control" value="{{$user->mobile}}" name="mobile" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Address:</label>
                <input type="text" class="form-control" value="{{$user->address}}" name="address" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                      <label for="exampleFormControlSelect2">User Gender</label>
                      <select class="form-control" name="gender" id="exampleFormControlSelect2">
                        <option class disabled="" selected="">Select Gender</option>
                  
                        <option value="Male">Male </option>
                        <option value="Female">FeMale </option>
                        <option value="Others">Others</option>
                     
                       
                    </select>
                    
                    </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Position:</label>
                <input type="text" class="form-control" value="{{$user->position}}" name="position" aria-describedby="emailHelp">
            </div>


           





            
            
            <button type="submit" class="btn btn-primary">Update</button>
            </form>

            </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#image').change(function(e){
                        var reader=new FileReader();
                        reader.onload=function(e){
                            $('#showimage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);

                });

            });


            </script>



            <script>

            </script>




            @endsection



