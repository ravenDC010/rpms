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
            <a class="btn btn-secondary" href="/users/edit/{{Auth::user()->id}}">Edit Profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @if (Auth::user()->role == 'teacher')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <h3>My Projects</h3>
        </div>
        <div class="row">
          @foreach($works as $work)
          <div class="col-md-4">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-center" style="height: 5em">
                <h4 class="text-center">
                  {{$work->project_name}}<br>
                  <a class="btn btn-success btn-sm" href="/projects/view/{{$work->id}}">View Project</a>
                </h4>
              </div>
              {{-- <div class="card-body">
                <p>Current Level: {{$course->number}}</p>
                <p>{{$course->level_name}}</p>
              </div>   --}}
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif
  </div>

  @endsection
