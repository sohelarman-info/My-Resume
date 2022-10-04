@extends('admin.master')
@section('title','Edit Blog')
@section('blog_menu_open','menu-open')
@section('blog_active','active')
@section('blog_open_active','active')
@section('content')
    <!-- Main content Start -->
	<section class="content">
        <!-- /.container-fluid -->
		<div class="container-fluid">
            {{--  Session Alerm start  --}}
            @if (session('UserAdd'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('UserAdd') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			<!-- Counter boxes (Start box) -->

            <form class="form-horizontal" action="{{ route('BlogUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Blog</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div class="form-group row">
                                <label for="title" class="col-sm-12 col-form-label">Title</label>
                                <div class="col-sm-12">
                                <input type="text" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror" id="title" value="{{ $blog->title }}" placeholder="{{ $blog->title }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post" class="col-sm-12 col-form-label">Post</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control my-editor form-control-lg @error('post') is-invalid @enderror" name="post" id="my-editor" placeholder="{{ $blog->post }}"
                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $blog->post }}</textarea>
                                @error('post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <!-- Horizontal Form -->
                        <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Add Other Options</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="blog_category">Change Category</label>
                                    <select name="blog_category" class="form-control category_id select2bs4 @error('blog_category') is-invalid @enderror" id="blog_category" for="blog_category" style="width: 100%;">
                                        <option value>Select One</option>
                                        @foreach($blog_category as $category)
                                        <option @if ($category->id == $blog->category_id) selected @endif value="{{ $category->id }}">{{ $category->blog_category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sub_category">Change Sub Category</label>
                                    <select name="sub_category" class="form-control select2bs4 @error('sub_category') is-invalid @enderror" id="sub_category" style="width: 100%;">
                                        <option value>Select One</option>
                                        @foreach($sub_category as $sub_category)
                                        <option @if ($sub_category->id == $blog->subcategory_id) selected @endif value="{{ $sub_category->id }}">{{ $sub_category->sub_category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" class="form-control custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" onchange="loadFile(event)">
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                        @error('thumbnail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <img class="img-thumbnail" id="output"/>
                                </div>
                                <div class="form-group">
                                    <label for="summary" class="col-sm-12 col-form-label">Summary</label>
                                        <textarea class="form-control form-control-lg @error('summary') is-invalid @enderror" name="summary" id="summary" placeholder="{{ $blog->summary }}"
                                        style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $blog->summary }}</textarea>

                                    @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- //dropdown dependency --}}

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                            <button type="reset" class="btn btn-default float-right">Clear</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->

                </div>

                <!-- Counter boxes (End box) -->

            </form>
		</div>
        <!-- /.container-fluid -->
	</section>
    <!-- Main content End -->
@endsection
@section('footer_js')
{{-- CK Editor  --}}
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  CKEDITOR.replace('my-editor', options);
</script>

{{--  Image upload preview  --}}
<script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
@endsection
