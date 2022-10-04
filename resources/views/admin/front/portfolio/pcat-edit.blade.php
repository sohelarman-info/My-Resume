@extends('admin.master')
@section('title','Portfolio Category Edit')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('portfolio_active','active')
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
                        <h3 class="card-title">Edit Category</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="{{ route('PcatUpdate') }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $pcat->id }}">
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Category Name</label>
                            <div class="col-sm-12">
                              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name inputName" placeholder="{{ $pcat->name }}" value="{{ $pcat->name }}">
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
                          <button type="submit" class="btn btn-primary float-right">Change Category</button>
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
                          <h3 class="card-title">This category Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                              <tbody>
                              <tr>
                                <td><i class="far fa-folder"></i></td>
                                <td>Category Name</td>
                                <td>{{ $pcat->name }}</td>
                              </tr>
                              <tr>
                                <td><i class="fas fa-link"></i></td>
                                <td>Category slug</td>
                                <td>{{ $pcat->slug }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-user"></td>
                                <td>Added User</td>
                                <td>{{ $pcat->user->name }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-clock"></td>
                                <td>Created Time</td>
                                <td>{{ $pcat->created_at->format('d M Y') }} {{ __('at ').$pcat->created_at->format('h:sa') }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-clock"></td>
                                <td>Upadated Time</td>
                                <td>{{ $pcat->updated_at->format('d M Y') }} {{ __('at ').$pcat->updated_at->format('h:sa') }}</td>
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
