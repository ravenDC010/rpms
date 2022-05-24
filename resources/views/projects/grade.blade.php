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
            
            <div class="card">
              <div class="card-header">
                <h3>Course: {{$course->course_name}}
                  <a class="btn btn-success float-right btn-sm" href="/courses/view/{{$course->id}}"><i class="fa fa-list"></i>View {{$course->course_name}}</a>
                  <a class="btn btn-success float-right btn-sm mr-5" href="/courses/view/{{$course->id}}/completedStudents">View Students Completed</a>
                </h3>
              </div>
              <div class="card-body text-center">
                  <h4>Name: {{$certificate->name}}</h4>
                  <h4>Marks Received: {{$certificate->marks}}</h4>
                  <h4>Total Marks: {{$certificate->total}}</h4>
                  <h4>Percentage: {{round((100* $certificate->marks / $certificate->total),2)}}</h4>
              </div>
            </div>
            
          </section>
          
          
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection