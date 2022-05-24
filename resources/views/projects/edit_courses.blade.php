@extends('layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Course Details</h1>
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
                <h3>Edit Courses    
                    <a class="btn btn-success float-right btn-sm" href="{{url('/courses/view')}}"><i class="fa fa-list"></i>Course List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <form action="/courses/store" method="POST">
                  @csrf

                  <div class="form-group row">
                      <label for="course_code" class="col-md-4 col-form-label text-md-right">{{ __('COURSE CODE') }}</label>

                      <div class="col-md-6">
                          <input id="course_code" type="text" class="form-control @error('course_code') is-invalid @enderror" name="course_code" value="{{$editData->course_code}}" required autocomplete="course_code" autofocus>

                          @error('course_code')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="course_name" class="col-md-4 col-form-label text-md-right">{{ __('COURSE NAME') }}</label>

                    <div class="col-md-6">
                        <input id="course_name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{$editData->course_name}}" required autocomplete="course_name" autofocus>

                        @error('course_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                    <label for="p_name" class="col-12 col-md-4 col-form-label text-right">{{ __('NUMBER OF INSTRUCTORS') }}</label>

                    <div class="col-md-6">
                        <select name="p_name" class="form-select @error('p_name') is-invalid @enderror" required autofocus>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        
                        @error('p_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div> -->
                  <div>
                  <!-- <input id="p_name" type="hidden" class="form-check-input @error('p_name') is-invalid @enderror" name="p_name" value="not assigned" required autofocus> -->
                  </div>

                  <!-- <div class="form-group row">
                    <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('START DATE') }}</label>

                    <div class="col-md-6">
                        <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{$editData->start_date}}" required autocomplete="start_date" autofocus>

                        @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div> -->

                  <div class="form-group row">
                    <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('END DATE') }}</label>

                    <div class="col-md-6">
                        <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{$editData->end_date}}"required autocomplete="end_date" autofocus>

                        @error('end_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                    <label for="feature" class="col-md-4 col-form-label text-md-right">{{ __('FEATURE COURSE IN SCHOOL HOMEPAGE?') }}</label>
                    <div class="col-md-6">
                        <div class="form-check form-check-inline"> -->
                            <!-- <input id="yes" type="radio" class="form-check-input @error('feature') is-invalid @enderror" name="feature" value="0" required autofocus> -->
                            <!-- <label class="form-check-label" for="yes">YES</label>
                        </div>
                        <div class="form-check form-check-inline"> -->
                            <!-- <input id="no" type="hidden" class="form-check-input @error('feature') is-invalid @enderror" name="feature" value="0" required autofocus> -->
                            <!-- <label class="form-check-label" for="no">NO</label>
                        </div>

                        @error('feature')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div> -->

                   <!-- <div class="form-group row">
                    <label for="public" class="col-md-4 col-form-label text-md-right">{{ __('ALLOW PUBLIC TO VIEW COURSE CURRICULUM?') }}</label>
                    <div class="col-md-6">
                        <div class="form-check form-check-inline"> -->
                            <!-- <input id="yes" type="hidden" class="form-check-input @error('public') is-invalid @enderror" name="public" value="0" required autofocus> -->
                            <!-- <label class="form-check-label" for="yes">YES</label>
                         </div>
                        <div class="form-check form-check-inline"> -->
                            <!-- <input id="no" type="hidden" class="form-check-input @error('public') is-invalid @enderror" name="public" value="0" required autofocus> -->
                            <!-- <label class="form-check-label" for="no">NO</label>
                        </div> -->

                        <!-- @error('public')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
                    <!-- </div>
                  </div> -->

                  <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('COURSE DESCRIPTION') }}</label>

                    <div class="col-md-6">
                        <textarea id="description" rows="3" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{$editData->description}}</textarea>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="coach" class="col-md-4 col-form-label text-md-right">{{ __('COACH NAME') }}</label>

                    <div class="col-md-6">
                        <!-- <input id="coach" type="text" class="form-control @error('coach') is-invalid @enderror" name="coach" value="{{$editData->course_name}}" required autocomplete="coach" autofocus> -->

                        <select name="coach" class="form-select @error('coach') is-invalid @enderror" required autofocus>
                        <option selected>Select Coach</option>
                            @foreach ($Coaches as $coach)
                            <option value="{{$coach->id}}">{{$coach->name}}</option>
                            @endforeach

                        </select>

                        @error('coach_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-6">
                          <button type="submit" class="btn btn-primary">
                              UPDATE
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