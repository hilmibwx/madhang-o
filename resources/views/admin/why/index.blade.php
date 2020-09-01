@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Why Choose Us</h1>
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
          </div>
          <div class="card-body">
            <div class="table-responsive col-md-6">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Desc</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($why as $why)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $why->title }}</td>
                    <td>{{ $why->desc }}</td>
                    <td>
                        <a href="{{route('why.edit', [$why->id])}}" class="btn btn-info btn-sm"> Edit </a>
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