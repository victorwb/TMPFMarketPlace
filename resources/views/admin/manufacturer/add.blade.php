@extends('admin.layouts.main')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Manufacturer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Manufacturers</a></li>
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Sub content -->
    <section class="content">

        <div class="container-fluid" id="container-wrapper">
       
          <div class="row">
            <div class="col-lg-9">
              @if(Session::has('message'))
              <div>
                {{Session::get('message')}}
              </div>
              @endif
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Add a Manufacturer</h6>
                </div>
                <div class="card-body">
                  <form action="{{route('manufacturer.store')}}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputText1" aria-describedby="emailHelp"
                        placeholder="Enter name of sub" name="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="desc">Description</label>
                      <input type="text" class="form-control @error('description') is-invalid @enderror" id="desc"
                        placeholder="Enter a description of the item" name="description">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <label class="custom-file-label" for="customFile">Choose icon</label>
                      </div>
                    </div>

                   
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                      </div> -->
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                  </form>
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
   