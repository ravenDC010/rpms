@extends('layouts.master')
@section('content')

<div class="content-wrapper">
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-md-8">
           <h1><b>{{Auth::user()->name}}</b></h1>
           <h4><i>{{Auth::user()->role}}</i></h4>
           <h4>{{Auth::user()->email}}</h4>
         </div>
         <div class="col-md-4 text-right">
           <a class="btn btn-primary" href="/profile">Profile</a>
         </div>
       </div>
     </div>
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
              <div class="card-body text-center">
                <h4>Course: {{$certificate->course_name}}</h4>
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