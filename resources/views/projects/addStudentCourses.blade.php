@extends('layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Students</h1>
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
                <h3>View Students of courses    
                    <a class="btn btn-success float-right btn-sm" href="/courses/view/{{$course->id}}"><i class="fa fa-list"></i>Course List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif


                <form action="/courses/store/{{$course->id}}" method="POST">
                  @csrf
                  <div class="row">
                    <!-- <input type="hidden" name="course_id" value="{{$course->id}}"> -->
                  @foreach($students as $student)
                          <div class="form-check col-md-3">
                            <input name="student[]" class="form-check-input" type="checkbox" value="{{$student->id}}" id="{{$student->id}}">
                            <label class="form-check-label" for="{{$student->id}}">
                              {{$student->name}}
                            </label>
                          </div>
                  @endforeach
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