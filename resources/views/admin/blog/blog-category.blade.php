@extends('admin.master')
@section('title','Blog Category')
@section('blog_menu_open','menu-open')
@section('blog_open_active','active')
@section('blog_category_active','active')
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

            @if (Session::has('success'))
                <script>
                    swal("Good job!", "Code added", "success");
                </script>
            @endif
            {{--  Session Alerm End  --}}
			<!-- Counter boxes (Start box) -->
            <div class="row">
                <div class="col-md-8">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title ">Category List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @if ($BlogCategory->count() == 0)
                          <div class="text-center">Have no Category</div>
                          @else
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 5%" class="text-center">Serial</th>
                                <th style="width: 20%">Category Name</th>
                                <th style="width: 20%">User Name</th>
                                <th style="width: 20%">Created</th>
                                <th style="width: 20%">Updated</th>
                                <th style="width: 15%" class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($BlogCategory as $key => $blog_category)
                              <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td>{{ $blog_category->blog_category_name }}</td>
                                <td>{{ $blog_category->user->name }}</td>
                                <td>{{ $blog_category->created_at }}</td>
                                <td>{{ $blog_category->updated_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('EditBlogCategory', $blog_category->slug) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('DeleteBlogCategory', $blog_category->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
                        <h3 class="card-title">Add Category</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form class="form-horizontal" action="{{ route('AddBlogCategory') }}" method="POST">
                          @csrf
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="blog_category_name" class="col-sm-12 col-form-label">Category Name</label>
                            <div class="col-sm-12">
                              <input type="text" name="blog_category_name" class="form-control @error('blog_category_name') is-invalid @enderror" id="blog_category_name" value="{{ old('blog_category_name') }}" placeholder="Category">
                              @error('blog_category_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Add Category</button>
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
