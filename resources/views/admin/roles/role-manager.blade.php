@extends('admin.master')
@section('title','User Roles')
@section('role_management_menu_open','menu-open')
@section('role_management_active','active')
@section('role_manager_active','active')
@section('content')
    <!-- Main content Start -->
	<section class="content">
        <!-- /.container-fluid -->
		<div class="container-fluid">
            {{--  Session Alerm start  --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('success') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			<!-- Counter boxes (Start box) -->
            <div class="row">
                <div class="col-md-6">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title ">Role List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 5%" class="text-center">Serial</th>
                            <th style="width: 25%">Roles</th>
                            <th style="width: 25%">Guard</th>
                            <th style="width: 25%" class="text-center">Progress</th>
                            <th style="width: 5%" class="text-center">Label</th>
                            <th style="width: 15%" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($roles as $key => $role)
                          <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>
                              <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                              </div>
                            </td>
                            <td class="text-center"><span class="badge bg-danger">55%</span></td>
                            <td class="text-center">
                                <a href="{{ route('RoleEdit', $role->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('RoleDelete', $role->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- Horizontal Form -->
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Add Roles</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="{{ route('RolesAdd') }}" method="POST">
                          @csrf
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Roles Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="role_name" class="form-control @error('role_name') is-invalid @enderror id="inputName" placeholder="Role Name">
                              @error('role_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Add Role</button>
                          <button type="submit" class="btn btn-default float-right">Cancel</button>
                        </div>
                        <!-- /.card-footer -->
                      </form>
                    </div>
                    <!-- /.card -->
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
