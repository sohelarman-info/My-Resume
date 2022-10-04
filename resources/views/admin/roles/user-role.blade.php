@extends('admin.master')
@section('title',' User Role')
@section('role_management_menu_open','menu-open')
@section('role_management_active','active')
@section('user_role_active','active')
@section('content')
    <!-- Main content Start -->
	<section class="content">
        <!-- /.container-fluid -->
		<div class="container-fluid">
            {{--  Session Alerm start  --}}
            @if (session('AddRoleToUser'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('AddRoleToUser') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			<!-- Counter boxes (Start box) -->
            <div class="row">
                <div class="col-md-6">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title ">User Permissions</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 5%" class="text-center">Serial</th>
                            <th style="width: 25%">User Name</th>
                            <th style="width: 25%">Role Name</th>
                            <th style="width: 25%">Permissions</th>
                            <th style="width: 20%" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $key => $user)
                          <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @foreach ($user->getRoleNames() as $user_role)
                                    <li>{{ $user_role }}</li>
                                @endforeach
                            </td>
                            <td>
                              @foreach ($user->getAllPermissions() as $permission)
                                <li>{{ $permission->name }}</li>
                              @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{ route('UserPermissions', $user->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
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
                        <h3 class="card-title">Add Roles To User</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="{{ route('AddRoleToUser') }}" method="POST">
                          @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">User Name</label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-control select2">
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Role Name Name</label>
                                <div class="col-sm-10">
                                    <select name="user_role" class="form-control select2">
                                        @foreach($roles as $role)
                                        <option>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Add Role To User</button>
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
