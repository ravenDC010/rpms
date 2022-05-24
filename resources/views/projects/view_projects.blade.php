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
                <h3>Project List
                    <a class="btn btn-success float-right btn-sm" href="{{url('/projects/add')}}"><i class="fa fa-plus-circle"></i>Add Projects</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Project Name</th>
                      <th>Description</th>
                      <th>View Project</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($projects as $key => $project)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$project->project_name}}</td>
                            <td>{{$project->description}}</td>
                            <td><a class="btn btn-success" href="/projects/view/{{$project->id}}">View</td>
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
