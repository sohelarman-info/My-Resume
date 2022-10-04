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
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('success') }}
            </div>
            @endif
            @if (session('danger'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('danger') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			<!-- Counter boxes (Start box) -->
            <div class="row">
                <div class="col-md-8">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title ">Sub Category List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                     @if ($BlogSubcategory->count() == 0)
                         <div class="text-center">Have no Sub Category</div>
                         @else
                         <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 5%" class="text-center">Serial</th>
                                <th style="width: 15%">Sub Category Name</th>
                                <th style="width: 15%">Category Name</th>
                                <th style="width: 15%">User Name</th>
                                <th style="width: 15%">Created</th>
                                <th style="width: 15%">Updated</th>
                                <th style="width: 15%" class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($BlogSubcategory as $key => $sub_category)
                              <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $sub_category->sub_category_name }}</td>
                                <td>{{ $sub_category->blog_category->blog_category_name }}</td>
                                <td>{{ $sub_category->user->name }}</td>
                                <td>{{ $sub_category->created_at }}</td>
                                <td>{{ $sub_category->updated_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('EditSubCategory', $sub_category->slug) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('DeleteSubCategory', $sub_category->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                     @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      {{-- {{ $users->links() }} --}}
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Add Sub Category</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="{{ route('AddSubCategory') }}" method="POST">
                          @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Blog Category Name</label>
                                <div class="col-sm-12">
                                    <select name="blog_category_id" class="form-control select2 @error('blog_category_id') is-invalid @enderror" id="blog_category_id">
                                        @foreach($BlogCategory as $blog_category)
                                        <option value="{{ $blog_category->id }}">{{ $blog_category->blog_category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                          <div class="form-group row">
                            <label for="sub_category_name" class="col-sm-12 col-form-label">Sub Category Name</label>
                            <div class="col-sm-12">
                              <input type="text" name="sub_category_name" class="form-control @error('sub_category_name') is-invalid @enderror" id="sub_category_name" value="{{ old('blog_category_name') }}" placeholder="Sub Category">
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
                          <button type="submit" class="btn btn-primary">Add Sub Category</button>
                          <button type="reset" class="btn btn-default float-right">Clear</button>
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
