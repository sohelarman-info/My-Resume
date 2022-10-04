@extends('admin.master')
@section('title','Testimonials Add')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('testimonials_active','active')
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

            <form class="form-horizontal" action="{{ route('TestimonialStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Add Testimonials') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pad">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                                <div class="col-sm-9">
                                <input type="text" name="name" class="form-control form-control @error('name') is-invalid @enderror" id="name" placeholder="Ex: John Due">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">{{ __('Title') }}</label>
                                <div class="col-sm-9">
                                <input type="text" name="title" class="form-control form-control @error('title') is-invalid @enderror" id="title" placeholder="Type your title here">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="designation" class="col-sm-3 col-form-label">{{ __('Designation') }}</label>
                                <div class="col-sm-9">
                                <input type="text" name="designation" class="form-control form-control @error('designation') is-invalid @enderror" id="designation" placeholder="EX: CEO">
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="about" class="col-sm-3 col-form-label">{{ __('About') }}</label>
                                <div class="col-sm-9">
                                <input type="text" name="about" class="form-control form-control @error('about') is-invalid @enderror" id="about" placeholder="Ex: Web Designer">
                                @error('about')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-sm-3 col-form-label">{{ __('Address') }}</label>
                                <div class="col-sm-9">
                                <input type="text" name="address" class="form-control form-control @error('address') is-invalid @enderror" id="address" placeholder="Ex: Web Designer">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-9">
                                <input type="text" name="email" class="form-control form-control @error('email') is-invalid @enderror" id="email" placeholder="example@email.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">{{ __('Phone') }}</label>
                                <div class="col-sm-9">
                                <input type="text" name="phone" class="form-control form-control @error('phone') is-invalid @enderror" id="phone" placeholder="+880 1234-567 890">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="summary" class="col-sm-3 col-form-label">{{ __('Summary') }}</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control my-editor form-control-lg @error('summary') is-invalid @enderror" name="summary" id="my-editor" placeholder="Place some text here"
                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                @error('summary')
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
                                <div class="form-group row">
                                    <label for="quote" class="col-md-3 col-form-label">{{ __('Status') }}</label>
                                    <div class="col-md-9">
                                        <div class="float-right">
                                            <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo">{{ __('Photo') }}</label>
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
                                    <label for="quote" class="col-sm-12 col-form-label">{{ __('Quote') }}</label>
                                        <textarea class="form-control form-control-lg @error('quote') is-invalid @enderror" name="quote" id="quote" placeholder="Type quote"
                                        style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    @error('quote')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Add Testimonial') }}</button>
                                <button type="reset" class="btn btn-default float-right">Clear</button>
                            </div>
                            <!-- /.card-footer -->
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
