@extends('layouts.admin')

@section('content')
      <!-- Begin Page Content -->
      <div class="container-fluid">
         <!-- Page Heading -->
         <h1 class="h3 mb-2 text-gray-800">Data Menu</h1>
         @if (session('success'))
         <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
           <a href="{{ route('menu.create') }}" class="btn btn-primary btn-md">Tambah Menu</a>
          </div>
          <div class="card-body col-md-7">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=0;
                    @endphp            
                @foreach ($menu as $menu)
                  <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->category->name }}</td>
                    <td>{{ $menu->price }}</td>
                    <td>
                        @if($menu->status == 'AKTIF')
                        <a href="#" class="btn btn-success btn-sm">{{ $menu->status }}</a>
                        @else
                        <a href="#" class="btn btn-danger btn-sm">{{ $menu->status }}</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('menu.edit', [$menu->id])}}" class="btn btn-info btn-sm"> Edit </a>
                
                        <form method="POST" action="{{route('menu.destroy', [$menu->id])}}" class="d-inline" onsubmit="return confirm('Delete this menu permanently?')">
            
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