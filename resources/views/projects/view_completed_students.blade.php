@extends('layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administration</h1>
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
                  <h3>Course: {{$course->course_name}}</h3>
                  <h3>Student List
                    <a class="btn btn-success float-right btn-sm mr-5" href="/courses/view/{{$course->id}}"><i class="fa fa-list"></i>View {{$course->course_name}}</a>
                  </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($students as $key=>$student)
                    <tr>
                      <td>{{$key + 1}}</td>
                      <td>{{$student->name}}</td>
                      <td>{{$student->email}}</td>
                      <td><a class="btn btn-success btn-sm" href="/courses/view/{{$course->id}}/grade/{{$student->student_id}}">View Grade</a></td>  
                      </tr>
                  @endforeach

                  </tbody>
                </table>
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