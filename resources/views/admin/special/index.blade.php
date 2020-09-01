@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Special</h1>
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
           <a href="{{ route('special.create') }}" class="btn btn-primary btn-md">Tambah Special</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>subject</th>
                    <th>desc</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($special as $special)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$special->cover) }}" alt="" height="200px" width="250px">
                    </td>
                    <td>{{ $special->title }}</td>
                    <td>{{ $special->subject }}</td>
                    <td>{{Str::limit( strip_tags( $special->desc ), 100 )}}</td>
                    <td>
                        <a href="{{route('special.edit', [$special->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                        <form method="POST" action="{{route('special.destroy', [$special->id])}}" class="d-inline" onsubmit="return confirm('Delete this special permanently?')">
            
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