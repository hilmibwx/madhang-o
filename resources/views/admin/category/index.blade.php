@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Category</h1>
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
           {{ session('error') }}
       </div>
       @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
           <form class="form-inline" action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
              <label for="name" class="sr-only">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tambah Category</button>
          </form>
          </div>
          <div class="card-body col-md-4">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($category as $category)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{route('category.edit', [$category->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                        <form method="POST" action="{{route('category.destroy', [$category->id])}}" class="d-inline" onsubmit="return confirm('Delete this category permanently?')">
            
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