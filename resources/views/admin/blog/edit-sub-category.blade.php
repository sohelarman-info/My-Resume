@extends('admin.master')
@section('title','Blog Category')
@section('blog_menu_open','menu-open')
@section('blog_open_active','active')
@section('blog_sub_category_active','active')
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
                        <h3 class="card-title">Edit Sub Category</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="{{ route('UpdateSubCategory') }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $sub_category->id }}">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Blog Category Name</label>
                                <div class="col-sm-12">
                                    <select name="blog_category_id" class="form-control select2">
                                        @foreach($blog_category as $blog_category)
                                        <option @if ($blog_category->id == $sub_category->category_id) selected @endif value="{{ $sub_category->category_id }}">{{ $blog_category->blog_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sub_category_name" class="col-sm-12 col-form-label">Sub Category Name</label>
                                <div class="col-sm-12">
                                  <input type="text" name="sub_category_name" class="form-control @error('sub_category_name') is-invalid @enderror" id="sub_category_name" value="{{ $sub_category->sub_category_name }}" placeholder="{{ $sub_category->sub_category_name }}">
                                  @error('sub_category_name')
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
                          <button type="submit" class="btn btn-primary float-right">Change Sub Category</button>
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
                                <td><i class="far fa-folder-open"></i></td>
                                <td>Sub Category Name</td>
                                <td>{{ $sub_category->sub_category_name }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-folder"></i></td>
                                <td>Blog Category Name</td>
                                <td>{{ $sub_category->blog_category->blog_category_name }}</td>
                              </tr>
                              <tr>
                                <td><i class="fas fa-link"></i></td>
                                <td>Blog Category slug</td>
                                <td>{{ $sub_category->slug }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-user"></td>
                                <td>Added User</td>
                                <td>{{ $sub_category->user->name }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-clock"></td>
                                <td>Created Time</td>
                                <td>{{ $sub_category->created_at->format('d M Y') }} {{ __('at ').$sub_category->created_at->format('h:sa') }}</td>
                              </tr>
                              <tr>
                                <td><i class="far fa-clock"></td>
                                <td>Upadated Time</td>
                                <td>{{ $sub_category->updated_at->format('d M Y') }} {{ __('at ').$sub_category->updated_at->format('h:sa') }}</td>
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
