@extends('admin.master')
@section('title','Portfolio Project Add')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('portfolio_active','active')
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

            <form class="form-horizontal" action="{{ route('PpostStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Blog</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div class="form-group row">
                                <label for="title" class="col-sm-12 col-form-label">Title</label>
                                <div class="col-sm-12">
                                <input type="text" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror" id="title" value="{{ old('blog_category_name') }}" placeholder="Type your title here">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client" class="col-sm-12 col-form-label">Client Name</label>
                                <div class="col-sm-12">
                                <input type="text" name="client" class="form-control form-control-lg @error('client') is-invalid @enderror" id="client" value="{{ old('blog_category_name') }}" placeholder="John Jr">
                                @error('client')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company" class="col-sm-12 col-form-label">Company</label>
                                <div class="col-sm-12">
                                <input type="text" name="company" class="form-control form-control-lg @error('company') is-invalid @enderror" id="company" value="{{ old('blog_category_name') }}" placeholder="ABS ltd">
                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-sm-12 col-form-label">Link</label>
                                <div class="col-sm-12">
                                <input type="text" name="link" class="form-control form-control-lg @error('link') is-invalid @enderror" id="link" value="{{ old('blog_category_name') }}" placeholder="https://www.example.com/page">
                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post" class="col-sm-12 col-form-label">Post</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control my-editor form-control-lg @error('post') is-invalid @enderror" name="post" id="my-editor" placeholder="Place some text here"
                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                    <label for="pcat_id">Category</label>
                                    <select name="pcat_id" class="form-control category_id select2bs4 @error('pcat_id') is-invalid @enderror" id="pcat_id" for="pcat_id" style="width: 100%;">
                                        <option value>Select One</option>
                                        @foreach($pcats as $pcat)
                                        <option value="{{ $pcat->id }}">{{ $pcat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pcat_id')
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
                                    </div>
                                    @error('thumbnail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <img class="img-thumbnail" id="output"/>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Client</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="form-control custom-file-input @error('photo') is-invalid @enderror" id="photo" onchange="photoFile(event)">
                                            <label class="custom-file-label" for="photo">Choose file</label>
                                        </div>
                                        @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <img class="img-thumbnail" id="photos"/>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Multiple Image</label>
                                    <div class="input-images"></div>
                                </div>
                                <div class="form-group">
                                    <label for="summary" class="col-sm-12 col-form-label">Summary</label>
                                        <textarea class="form-control form-control-lg @error('summary') is-invalid @enderror" name="summary" id="summary" placeholder="Type Summary"
                                        style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add Project </button>
                            <button type="reset" class="btn btn-default float-right">Clear</button>
                            </div>
                            <!-- /.card-footer -->
                            {{-- <select id="source" name="source">
                                <option>MANUAL</option>
                                <option>ONLINE</option>
                            </select>
                            <select id="status" name="status">
                            </select> --}}
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
//Dropdown Dependency
<script>
    $(document).ready(function () {
    var option = document.getElementById("status").options;
    if (document.getElementById('source').value == "MANUAL") {
        $("#status").append('<option>OPEN</option>');
        $("#status").append('<option>DELIVERED</option>');
        }
    if (document.getElementById('source').value == "ONLINE") {
        $("#status").append('<option>OPEN</option>');
        $("#status").append('<option>DELIVERED</option>');
        $("#status").append('<option>SHIPPED</option>');
        }
    });
    </script>
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
        URL.PhotorevokeObjectURL(output.src) // free memory
      }
    };
 </script>
<script>
    var photoFile = function(event) {
      var photos = document.getElementById('photos');
      photos.src = URL.createObjectURL(event.target.files[0]);
      photos.onload = function() {
        URL.PhotosrevokeObjectURL(photos.src) // free memory
      }
    };
 </script>
 <script>
    $('.input-images').imageUploader();
 </script>
@endsection
