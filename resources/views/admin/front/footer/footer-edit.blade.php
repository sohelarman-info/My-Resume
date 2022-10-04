@extends('admin.master')
@section('title','Footer Section Edit')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('footer_active','active')
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
                <div class="col-md-12">
                    <form class="form-horizontal" action="{{ route('FooterUpdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $footer->id }}">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Footer Edit') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control form-control @error('name') is-invalid @enderror" id="name" placeholder="{{ $footer->name }}" value="{{ $footer->name }}">
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
                                    <input type="text" name="title" class="form-control form-control @error('title') is-invalid @enderror" id="title" placeholder="{{ $footer->title }}" value="{{ $footer->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="summary" class="col-sm-3 col-form-label">{{ __('Summary') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control my-editor form-control-lg @error('summary') is-invalid @enderror" name="summary" placeholder="{{ $footer->summary }}"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $footer->summary }}</textarea>
                                        @error('summary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="copyright" class="col-sm-3 col-form-label">{{ __('Copyright') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control my-editor form-control-lg @error('copyright') is-invalid @enderror" name="copyright" id="my-editor" placeholder="{{ $footer->copyright }}"
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $footer->copyright }}</textarea>
                                        @error('copyright')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> {{ __('Footer Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- Counter boxes (End box) -->
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
    var LogoUpload = function(event) {
      var logo = document.getElementById('logo');
      logo.src = URL.createObjectURL(event.target.files[0]);
      logo.onload = function() {
        URL.logorevokeObjectURL(logo.src) // free memory
      }
    };
  </script>
<script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
<!-- Page script -->
@endsection
