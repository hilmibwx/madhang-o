@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Testi</h1>
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
           <a href="{{ route('testi.create') }}" class="btn btn-primary btn-md">Tambah testi</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Star</th>
                    <th>Desc</th>
                    <th>Status</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($testi as $testi)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$testi->photo) }}" alt="" height="200px" width="250px">
                    </td>
                    <td>{{ $testi->name }}</td>
                    <td>{{ $testi->star }}</td>
                    <td>{{Str::limit( strip_tags( $testi->desc ), 100 )}}</td>
                    <td>
                        @if($testi->status == 'PUBLISH')
                        <a href="#" class="btn btn-success btn-sm">{{ $testi->status }}</a>
                        @else
                        <a href="#" class="btn btn-danger btn-sm">{{ $testi->status }}</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('testi.edit', [$testi->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                        <form method="POST" action="{{route('testi.destroy', [$testi->id])}}" class="d-inline" onsubmit="return confirm('Delete this testi permanently?')">
            
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