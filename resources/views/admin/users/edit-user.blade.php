@extends('admin.master')
@section('title','Blog Category')
@section('role_management_menu_open','menu-open')
@section('role_management_active','active')
@section('users_active','active')
@section('content')
    <!-- Main content Start -->
	<section class="content">
        <!-- /.container-fluid -->
		<div class="container-fluid">
            {{--  Session Alerm start  --}}
            @if (session('add_blog_category'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('add_blog_category') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			<!-- Counter boxes (Start box) -->
            <div class="row">
                <div class="col-md-6">
                    <!-- Horizontal Form -->
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="{{ route('UserUpdate') }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">User Name</label>
                            <div class="col-sm-12">
                              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name inputName" placeholder="{{ $user->name }}" value="{{ $user->name }}">
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">User Email</label>
                            <div class="col-sm-12">
                              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email inputName" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="reset" class="btn btn-default">Clear</button>
                          <button type="submit" class="btn btn-primary float-right">User Update</button>
                        </div>
                        <!-- /.card-footer -->
                      </form>
                    </div>
                    <!-- /.card -->
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h3 class="card-title">User Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                              <tbody>
                              <tr>
                                <td><i class="far fa-user"></i></td>
                                <td>User Name</td>
                                <td>{{ $user->name }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-clock"></td>
                                <td>Created Time</td>
                                <td>{{ $user->created_at->format('d M Y') }} {{ __('at ').$user->created_at->format('h:sa') }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-clock"></td>
                                <td>Upadated Time</td>
                                <td>{{ $user->updated_at->format('d M Y') }} {{ __('at ').$user->updated_at->format('h:sa') }}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
			<!-- Counter boxes (End box) -->
		</div>
        <!-- /.container-fluid -->
	</section>
    <!-- Main content End -->
@endsection
