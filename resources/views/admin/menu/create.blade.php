@extends('layouts.admin')

@section('styles')
<style>
   .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}
 .picture {
  width: 800px;
  height: 400px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  /* border-radius: 50%; */
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
}
.picture:hover {
  border-color: #2ca8ff;
}
.picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.picture-src {
  width: 100%;
  height: 100%;
}
</style>
@endsection

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">

      <div class="picture-container">

          <div class="picture">

              <img src="" class="picture-src" id="wizardPicturePreview" height="200px" width="400px" title=""/>

              <input type="file" id="wizard-picture" name="cover" class="form-control {{$errors->first('cover') ? "is-invalid" : "" }} ">

              <div class="invalid-feedback">
                  {{ $errors->first('cover') }}    
              </div>  

          </div>

          <h6>Pilih Cover</h6>

      </div>

  </div>

    <div class="form-group ml-5">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-7">
          <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name')}}" id="name" placeholder="Coto Makassar">
          <div class="invalid-feedback">
            {{ $errors->first('name') }}    
        </div> 
        </div>
      </div>

      <div class="form-group ml-5">

        <label for="category" class="col-sm-2 col-form-label">Category</label>

        <div class="col-sm-7">

            <select name='category' class="form-control {{$errors->first('category') ? "is-invalid" : "" }} " id="category">
                <option disabled selected>Choose One!</option>
                @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                {{ $errors->first('category') }}    
            </div>   

        </div>

    </div>


    <div class="form-group ml-5">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-7">
          <input type="number" name='price' class="form-control {{$errors->first('price') ? "is-invalid" : "" }} " value="{{old('price')}}" id="price" placeholder="100000">
          <div class="invalid-feedback">
            {{ $errors->first('price') }}    
        </div> 
        </div>
      </div>

      <div class="form-group ml-5">
        <label for="ingredient" class="col-sm-2 col-form-label">Ingredients</label>
        <div class="col-sm-7">
          <textarea name="ingredient" id="ingredient" cols="30" rows="10" class="form-control {{$errors->first('ingredient') ? "is-invalid" : "" }} " id="summernote">{{old('ingredient')}}</textarea>
          <div class="invalid-feedback">
            {{ $errors->first('ingredient') }}    
        </div> 
        </div>
      
    </div>

    <div class="form-group ml-5">
        <label for="desc" class="col-sm-2 col-form-label">Desc</label>
        <div class="col-sm-7">
          <textarea name="desc" id="desc" cols="30" rows="10" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} " id="summernote">{{old('desc')}}</textarea>
          <div class="invalid-feedback">
            {{ $errors->first('desc') }}    
        </div> 
        </div>
      
    </div>
      
    <div class="form-group ml-5">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
  </form>
@endsection
@push('scripts')

<script>
    // Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
      readURL(this);
  });
  //Function to show image before upload
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
      }
      reader.readAsDataURL(input.files[0]);
  }
}
</script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endpush