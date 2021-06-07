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

           
    <div class="card">
      <div class="card-body">
            <h4 class="card-title">New Posts Insert</h4>
            <p class="card-description"> Basic form elements </p>
          <form class="forms-sample" method="POST" action="{{route('store.post')}}" enctype="multipart/form-data">
          @csrf
            <div class="row">

              <div class="form-group col-md-6" >
                <label for="exampleInputName1">Title English</label>
                <input type="text" class="form-control" name="title_eng" id="exampleInputName1" >
              </div>
              
              <div class="form-group col-md-6" >
                <label for="exampleInputName1">Title Nepali</label>
                <input type="text" class="form-control" name="title_nep" id="exampleInputName1" >
              </div>

            </div> 

            <div class="row">

              <div class="form-group col-md-6">
              <label for="exampleSelectGender">Category</label>
                <select class="form-control" name="category_id" id="exampleSelectGender">
                  <option disabled="" selected="">--Select Category--</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->category_eng}} | {{$category->category_nep}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
              <label for="exampleSelectGender">SubCategory</label>
                <select class="form-control" name="subcategory_id" id="subcategory_id">
                  <option disabled="" selected="">--Select SubCategory--</option>
                </select>
              </div>
                      
            </div> 

            <div class="row">

              <div class="form-group col-md-6">
              <label for="exampleSelectGender">District</label>
                <select class="form-control" name="district_id" id="exampleSelectGender">
                  <option disabled="" selected="">--Select District--</option>
                  @foreach($districts as $district)
                  <option value="{{$district->id}}">{{$district->district_eng}} | {{$district->district_nep}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-md-6">
              <label for="exampleSelectGender">SubDistrict</label>
                <select class="form-control" name="subdistrict_id" id="subdistrict_id">
                <option disabled="" selected="">--Select SubDistrict--</option>
                  
                </select>
              </div>
                      
            </div> 

            <div class="form-group">
                    <label for="abcde">News Image Upload</label>
                    <input type="file" name="image" class="form-control" id="image">
            </div>

            <div class="row">

            <div class="form-group col-md-6" >
              <label for="exampleInputName1">Tags English</label>
              <input type="text" class="form-control" name="tags_eng" id="exampleInputName1" >
            </div>

            <div class="form-group col-md-6" >
              <label for="exampleInputName1">Tags Nepali</label>
              <input type="text" class="form-control" name="tags_nep" id="exampleInputName1" >
            </div>

            </div> 

            <div class="form-group">
              <label for="exampleTextarea1">Details English</label>
              <textarea class="form-control" name="details_eng" id="summernote"></textarea>
            </div>

            <div class="form-group">
              <label for="exampleTextarea1">Details Nepali</label>
              <textarea class="form-control" name="details_nep" id="summernote1"></textarea>
            </div>

            <hr>
            <h4 class="text-center">--Extra Options--</h4>
            <br>
            <div class="row">
                <label class="form-check-label col-md-3">
                <input type="checkbox" name="headline" value="1" class="form-check-input"> Headline <i class="input-helper"></i></label>
            
                <label class="form-check-label col-md-3">
                <input type="checkbox" name="bigthumbnail" value="1" class="form-check-input"> General Big Thumbnail <i class="input-helper"></i></label>

                <label class="form-check-label col-md-3">
                <input type="checkbox" name="first_section" value="1" class="form-check-input"> First Section <i class="input-helper"></i></label>

                <label class="form-check-label col-md-3">
                <input type="checkbox" name="first_section_thumbnail" value="1" class="form-check-input"> First Section Big Thumbnail <i class="input-helper"></i></label>
            
            </div> 
            <br><br>
                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
      </div>
  </div>

  <!-- This is for category ajax -->

  <script type="text/javascript">
   $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('/get/subcategory/') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subcategory_id").empty();
                              $.each(data,function(key,value){
                                  $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_eng+'</option>');
                              });
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>

<!-- This is for categorDistricty ajax -->

<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             if(district_id) {
                 $.ajax({
                     url: "{{  url('/get/subdistrict/') }}/"+district_id,
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