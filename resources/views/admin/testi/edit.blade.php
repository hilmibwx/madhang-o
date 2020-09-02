@extends('layouts.admin')

@section('content')

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('testi.update', $testi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container">

        <div class="form-group ml-5">

            <label for="Photo" class="col-sm-2 col-form-label">Photo</label>

            <div class="col-sm-7">

                <input type="file" name='photo' class="form-control {{$errors->first('photo') ? "is-invalid" : "" }} " value="{{old('photo') ? old('photo') : $testi->photo}}" id="photo">

                <div class="invalid-feedback">
                    {{ $errors->first('photo') }}    
                </div>   

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="name" class="col-sm-2 col-form-label">Name</label>

            <div class="col-sm-7">

                <input type="text" name='name' class="form-control {{$errors->first('name') ? "is-invalid" : "" }} " value="{{old('name') ? old('name') : $testi->name}}" id="name">

                <div class="invalid-feedback">
                    {{ $errors->first('name') }}    
                </div>    

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="address" class="col-sm-2 col-form-label">Address</label>

            <div class="col-sm-7">

                <input type="text" name='address' class="form-control {{$errors->first('address') ? "is-invalid" : "" }} " value="{{old('address') ? old('address') : $testi->address}}" id="address">

                <div class="invalid-feedback">
                    {{ $errors->first('address') }}    
                </div>    

            </div>

        </div>

        <div class="form-group ml-5">

            <label for="desc" class="col-sm-2 col-form-label">Testi</label>

            <div class="col-sm-7">

                <textarea name="desc" class="form-control {{$errors->first('desc') ? "is-invalid" : "" }} "  id="" cols="30" rows="10">{{old('desc') ? old('desc') : $testi->desc}}</textarea>
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

                    <option {{$testi->star == '1' ? 'selected' : ''}} value="1">1</option>

                    <option {{$testi->star == '2' ? 'selected' : ''}} value="2">2</option>

                    <option {{$testi->star == '3' ? 'selected' : ''}} value="3">3</option>

                    <option {{$testi->star == '4' ? 'selected' : ''}} value="4">4</option>

                    <option {{$testi->star == '5' ? 'selected' : ''}} value="5">5</option>

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

                    <option {{$testi->from == 'Whatsapp' ? 'selected' : ''}}  value="Whatsapp">Whatsapp</option>

                    <option {{$testi->from == 'Instagram' ? 'selected' : ''}} value="Instagram">Instagram</option>

                    <option {{$testi->from == 'Telegram' ? 'selected' : ''}} value="Telegram">Telegram</option>

                    <option {{$testi->from == 'Facebook' ? 'selected' : ''}} value="Facebook">Facebook</option>

                    <option {{$testi->from == 'GoogleForm' ? 'selected' : ''}} value="GoogleForm">Google Form</option>

                    <option {{$testi->from == 'Other' ? 'selected' : ''}} value="Other">Other</option>

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

                    <option {{$testi->status == 'PUBLISH' ? 'selected' : ''}} value="PUBLISH">PUBLISH</option>
 
                    <option {{$testi->status == 'DRAFT' ? 'selected' : ''}} value="DRAFT">DRAFT</option>
                    
                </select>

                <div class="invalid-feedback">
                    {{ $errors->first('status') }}    
                </div>    

            </div>

        </div>
   
        <div class="form-group ml-5">
   
            <div class="col-sm-3">
   
                <button type="submit" class="btn btn-primary">Update</button>
   
            </div>
   
        </div>

    </div>      

  </form>
@endsection