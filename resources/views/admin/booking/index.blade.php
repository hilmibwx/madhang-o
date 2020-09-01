@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Booking</h1>
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th># of people</th>
                    <th>Time</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($booking as $booking)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $booking->name }}</td>
                    <td>{{ $booking->people }}</td>
                    <td>{{ $booking->date }}  {{ $booking->time }}</td>
                    <td><a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a> </td>
                    <td>{{ $booking->phone }}</td>
                    <td>
                        <a href="https://wa.me/62{{ $booking->phone }}" class="btn btn-success btn-sm"> Whatsapp </a>
                
                        <form method="POST" action="{{route('booking.destroy', [$booking->id])}}" class="d-inline" onsubmit="return confirm('Delete this booking permanently?')">
            
                            @csrf
            
                            <input type="hidden" name="_method" value="DELETE">
            
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            
                        </form>
                    </td>
                  </tr>
                  @endforeach                 
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection