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

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit SubCategory</h4>
                    <form method="POST" action="{{route('update.subcategory',$subcategory->id)}}" class="forms-sample">
                    @csrf  
                    <div class="form-group">
                        <label for="exampleInputUsername1">SubCategory English</label>
                        <input type="text" class="form-control" name="subcategory_eng" value="{{$subcategory->subcategory_eng}}">
                        @error('subcategory_eng')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">SubCategory Nepali</label>
                        <input type="text" class="form-control" name="subcategory_nep" value="{{$subcategory->subcategory_nep}}">
                        @error('subcategory_nep')
                            <span class="text-danger">{{$message}}</span>
                        @enderror  
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect2">Select Category</label>
                      <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                        <option class disabled="" selected="">--Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"
                        
                        <?php if($category->id==$subcategory->category_id) echo "selected" ; ?>

                        >{{$category->category_eng}} | {{$category->category_nep}} </option>
                        @endforeach
                       
                    </select>
                    
                    </div>
                    
                      
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>






@endsection