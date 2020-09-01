@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Event</h1>
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
           <a href="{{ route('event.create') }}" class="btn btn-primary btn-md">Tambah Event</a>
          </div>
          <div class="card-body col-md-7">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($event as $event)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$event->cover) }}" alt="" height="200px" width="250px">
                    </td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->price }}</td>
                    <td>
                        @if($event->status == 'AKTIF')
                        <a href="#" class="btn btn-success btn-sm">{{ $event->status }}</a>
                        @else
                        <a href="#" class="btn btn-danger btn-sm">{{ $event->status }}</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('event.edit', [$event->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                        <form method="POST" action="{{route('event.destroy', [$event->id])}}" class="d-inline" onsubmit="return confirm('Delete this event permanently?')">
            
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