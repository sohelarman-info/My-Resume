@extends('admin.master')
@section('title','Permission')
@section('role_management_menu_open','menu-open')
@section('role_management_active','active')
@section('role_permissions_active','active')
@section('content')
    <!-- Main content Start -->
	<section class="content">
        <!-- /.container-fluid -->
		<div class="container-fluid">
            {{--  Session Alerm start  --}}
            @if (session('RoleAddToPermission'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('RoleAddToPermission') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			<!-- Counter boxes (Start box) -->
            <div class="row">
                <div class="col-md-6">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title ">Permissionst</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 5%" class="text-center">Serial</th>
                            <th style="width: 40%">Roles</th>
                            <th style="width: 40%">Permissions</th>
                            <th style="width: 15%" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($roles as $key => $role)
                          <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                              @foreach ($role->getPermissionNames() as $permission)
                                <li>{{ $permission }}</li>
                              @endforeach
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                      <form class="form-horizontal" action="{{ route('RoleAddToPermission') }}" method="POST">
                          @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Role Name</label>
                                <div class="col-sm-10">
                                    <select name="role_name" class="form-control select2">
                                        @foreach($roles as $role)
                                        <option>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Permission Name</label>
                                <div class="col-sm-10">
                                    <select name="permission_name" class="form-control select2">
                                        @foreach($permissions as $permission)
                                        <option>{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Add Role Permission</button>
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
