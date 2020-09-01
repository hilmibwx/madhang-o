@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('why.update',$why->id) }}" method="POST">
    @csrf
      <div class="form-group ml-5">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-7">
            <input type="text" name='title' class="form-control {{$errors->first('title') ? "is-invalid" : "" }} " value="{{old('title') ? old('title') : $why->title}}" id="title" placeholder="Title">
            <div class="invalid-feedback">
                {{ $errors->first('title') }}    
            </div>   
        </div>
    </div>

    <div class="form-group ml-5">
        <label for="desc" class="col-sm-2 col-form-label">Desc</label>
        <div class="col-sm-7">
          <textarea name="desc" id="desc" cols="30" rows="10" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} ">{{old('desc') ? old('desc') : $why->desc}}</textarea>
          <div class="invalid-feedback">
            {{ $errors->first('desc') }}    
        </div> 
        </div>
      
    </div>
      
    <div class="form-group ml-5">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
  </form>
@endsection