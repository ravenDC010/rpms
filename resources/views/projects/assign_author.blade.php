@extends('layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Assign Author</h1>
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
                <h3>Assign Author to {{$Course->course_name}}    
                    <a class="btn btn-success float-right btn-sm" href="{{url('/courses/view')}}"><i class="fa fa-list"></i>Course List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="/courses/view/{{$Course->id}}/author/store" method="POST">
                  @csrf

                  <div class="form-group row">
                    <label for="author_id" class="col-md-4 col-form-label text-md-right">{{ __('AUTHOR NAME') }}</label>

                    <div class="col-md-6">
                      

                        <select name="author_id" class="form-control @error('author_id') is-invalid @enderror" required autofocus>
                            @foreach ($Authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach

                        </select>

                        @error('author_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-6">
                          <button type="submit" class="btn btn-primary">
                              ASSIGN
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