@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('testi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container">

        <div class="form-group ml-5">

            <label for="Photo" class="col-sm-2 col-form-label">Photo</label>

            <div class="col-sm-7">

                <input type="file" name='photo' class="form-control {{$errors->first('photo') ? "is-invalid" : "" }} " value="{{old('photo')}}" id="photo">

                <div class="invalid-feedback">
                    {{ $errors->first('photo') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="name" class="col-sm-2 col-form-label">Name</label>

            <div class="col-sm-7">

                <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name')}}" id="name">

                <div class="invalid-feedback">
                    {{ $errors->first('name') }}    
                </div>    

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="address" class="col-sm-2 col-form-label">Address</label>

            <div class="col-sm-7">

                <input type="text" name='address' class="form-control {{$errors->first('address') ? "is-invalid" : "" }} " value="{{old('address')}}" id="address">

                <div class="invalid-feedback">
                    {{ $errors->first('address') }}    
                </div>    

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="desc" class="col-sm-2 col-form-label">Testi</label>

            <div class="col-sm-7">

                <textarea name="desc" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} "  id="" cols="30" rows="10">{{old('desc')}}</textarea>
                <div class="invalid-feedback">
                    {{ $errors->first('desc') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="star" class="col-sm-2 col-form-label">Star</label>

            <div class="col-sm-7">

                <select name='star' class="form-control {{$errors->first('star') ? "is-invalid" : "" }} " id="star">

                    <option value="" selected disabled>Choose One!</option>

                    <option value="1">1</option>

                    <option value="2">2</option>

                    <option value="3">3</option>

                    <option value="4">4</option>

                    <option value="5">5</option>

                </select>

                <div class="invalid-feedback">
                    {{ $errors->first('star') }}    
                </div>    

            </div>

        </div>

       
        <div class="form-group ml-5">

            <label for="from" class="col-sm-2 col-form-label">From</label>

            <div class="col-sm-7">

                <select name='from' class="form-control {{$errors->first('from') ? "is-invalid" : "" }} " id="from">

                    <option value="" selected disabled>Choose One!</option>

                    <option value="Whatsapp">Whatsapp</option>

                    <option value="Whatsapp">Instagram</option>

                    <option value="Whatsapp">Telegram</option>

                    <option value="Whatsapp">Facebook</option>

                    <option value="Whatsapp">Google Form</option>

                    <option value="Whatsapp">Other</option>

                </select>

                <div class="invalid-feedback">
                    {{ $errors->first('profession') }}    
                </div>    

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="status" class="col-sm-2 col-form-label">Status</label>

            <div class="col-sm-7">

                <select name='status' class="form-control {{$errors->first('status') ? "is-invalid" : "" }} " id="status">

                    <option value="" selected disabled>Choose One!</option>

                    <option value="PUBLISH">PUBLISH</option>

                    <option value="DRAFT">DRAFT</option>
                    
                </select>

                <div class="invalid-feedback">
                    {{ $errors->first('status') }}    
                </div>    

            </div>

        </div>
   
        <div class="form-group ml-5">
   
            <div class="col-sm-3">
   
                <button type="submit" class="btn btn-primary">Create</button>
   
            </div>
   
        </div>

    </div>      

  </form>
@endsection