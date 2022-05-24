@extends('layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Projects</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Add Projects
                    <a class="btn btn-success float-right btn-sm" href="{{url('/projects/view')}}"><i class="fa fa-list"></i>Projects List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <form action="/projects/store" method="POST">
                  @csrf

                  <div class="form-group row">
                    <label for="project_name" class="col-md-4 col-form-label text-md-right">{{ __('PROJECT NAME') }}</label>

                    <div class="col-md-6">
                        <input id="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror" name="project_name" value="{{ old('project_name') }}" required autocomplete="project_name" autofocus>

                        @error('project_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('PROJECT DESCRIPTION') }}</label>

                    <div class="col-md-6">
                        <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-6">
                          <button type="submit" class="btn btn-primary">
                              ADD
                          </button>
                      </div>
                  </div>
                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->



          </section>


        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
