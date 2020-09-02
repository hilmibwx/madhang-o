@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Inbox</h1>
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
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Email</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($inbox as $inbox)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $inbox->name }}</td>
                    <td>{{ $inbox->subject }}</td>
                    <td>{{ $inbox->message }}</td>
                    <td><a href="mailto:{{ $inbox->email }}" class="btn btn-danger btn-sm">{{ $inbox->email }}</a></td>
                    <td>
                        <form method="POST" action="{{route('inbox.destroy', [$inbox->id])}}" class="d-inline" onsubmit="return confirm('Delete this inbox permanently?')">
            
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