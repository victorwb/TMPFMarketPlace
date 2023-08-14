@extends('admin.layouts.main')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manufacturer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manufacturers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Sub content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Items</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Manufacturers</li>
            </ol>
          </div> -->
          <a href="{{route('manufacturer.create')}}" class="btn btn-info mb-1">Add new</a>
          <!-- Row -->
</div>
          <div class="row">
          
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        
                        <th>Description</th>
                        <th>Icon</th>
                        
                        <th colspan='2'>action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                      <th>Name</th>
                        
                        <th>Description</th>
                        <th>Icon</th>
                        
                        <th colspan="2">action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @if(count($manufacturers)>0)
                      @foreach($manufacturers as $item)
                      <tr>
                        <td>{{$item->name}}</td>
                        
                        <td>{{$item->description}}</td>
                        
                        <td><img src="{{Storage::url($item->image)}}" width='100'/></td>
                        
                        <th><a href="{{route('manufacturer.edit',[$item->id])}}" class="btn btn-secondary mb-1">edit</a></th>
                        <th><form action="{{route('manufacturer.destroy',[$item->id])}}" method="POST"
                        onsubmit="return confirmDelete()">@csrf
                        {{method_field('DELETE')}}
                          <!--because of resourceful routing -->
                          
                          <button class="btn btn-danger mb-1" type="submit">delete</button>
                        </form></th>
                      </tr>
                      @endforeach
                      @else
                      <td>No manufacturers yet</td>
                      @endif
                                        
                    </tbody>
                  </table>
                  </div>
              </div>
            </div>
            </div>

          
        </div>
        <!---Container Fluid-->
      </div>
      </section>
    <!-- /.content -->
  </div>
  @endsection('content')
      <!-- Footer -->
      @include('admin.layouts.footer')
      
      <!-- Footer -->
   