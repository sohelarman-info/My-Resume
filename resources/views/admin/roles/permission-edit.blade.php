@extends('admin.master')
@section('title','Permission Edit')
@section('role_management_menu_open','menu-open')
@section('role_management_active','active')
@section('role_permission_add_active','active')
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
                        <h3 class="card-title">Edit Permission</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="{{ route('PermissionUpdate') }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $permissions->id }}">
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Permission Name</label>
                            <div class="col-sm-12">
                              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name inputName" placeholder="{{ $permissions->name }}" value="{{ $permissions->name }}">
                              @error('name')
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
                          <button type="submit" class="btn btn-primary float-right">Change Permission</button>
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
                          <h3 class="card-title">Permission Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                              <tbody>
                              <tr>
                                <td><i class="far fa-folder"></i></td>
                                <td>Permission Name</td>
                                <td>{{ $permissions->name }}</td>
                              </tr>
                              <tr>
                                <td><i class="fas fa-link"></i></td>
                                <td>Guard</td>
                                <td>{{ $permissions->guard_name }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-clock"></td>
                                <td>Created Time</td>
                                <td>{{ $permissions->created_at->format('d M Y') }} {{ __('at ').$permissions->created_at->format('h:sa') }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-clock"></td>
                                <td>Upadated Time</td>
                                <td>{{ $permissions->updated_at->format('d M Y') }} {{ __('at ').$permissions->updated_at->format('h:sa') }}</td>
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
