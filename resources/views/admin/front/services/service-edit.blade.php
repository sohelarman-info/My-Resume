@extends('admin.master')
@section('title','Edit Service')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('service_active','active')
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
            <form class="form-horizontal" action="{{ route('EditServiceUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->service_id }}">
                <input type="hidden" name="id" value="{{ $service->id }}">
            <div class="row">
                <div class="col-md-8">
                    <!-- Horizontal Form -->
                    <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Service Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-12 col-form-label">{{ __('Title') }}</label>
                                    <div class="col-sm-12">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputName" placeholder="{{ $service->title }}" value="{{ $service->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="summary" class="col-sm-12 col-form-label">{{ __('Summary') }}</label>
                                    <div class="col-sm-12">
                                        <textarea id="summary" class="form-control my-editor form-control-lg @error('summary') is-invalid @enderror" name="summary" placeholder="Place some text here"
                                        style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $service->summary }}</textarea>
                                        @error('summary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="post" class="col-sm-12 col-form-label">{{ __('Services') }}</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control my-editor form-control-lg @error('post') is-invalid @enderror" name="post" id="my-editor" placeholder="Place some text here"
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $service->post }}</textarea>
                                        @error('post')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.card -->
                <!-- /.card -->
                </div>
                <div class="col-md-4">
                    <!-- Horizontal Form -->
                    <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('CSS') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="icon" class="col-sm-12 col-form-label">{{ __('Icon Name') }} <a class="float-right" target="_blank" href="https://fontawesome.com/icons?d=gallery">({{ __('Icon') }})</a></label>
                            <div class="col-sm-12">
                                <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon" placeholder="{{ $service->icon }}" value="{{ $service->icon }}">
                                @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">{{ __('Icon Color') }}</label>
                            <div class="col-sm-12">
                                <div class="input-group my-colorpicker1 colorpicker-element" data-colorpicker-id="2">
                                    <input type="text" name="icon_color" class="form-control @error('icon_color') is-invalid @enderror" data-original-title="" title="{{ $service->icon_color }}" id="inputName" value="{{ $service->icon_color }}">
                                    <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square" style="color: {{ $service->icon_color }};"></i></span>
                                    </div>
                                </div>
                            @error('icon_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Icon Hover Color</label>
                            <div class="col-sm-12">
                                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                    <input type="text" name="icon_hover_color" class="form-control @error('icon_hover_color') is-invalid @enderror" data-original-title="" title="{{ $service->icon_hover_color }}" value="{{ $service->icon_hover_color }}">
                                    <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square" style="color: {{ $service->icon_hover_color }}"></i></span>
                                    </div>
                                </div>
                            @error('icon_hover_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Background Color</label>
                            <div class="col-sm-12">
                                <div class="input-group my-colorpicker3 colorpicker-element" data-colorpicker-id="2">
                                    <input type="text" name="bg_color" class="form-control @error('bg_color') is-invalid @enderror" data-original-title="" title="{{ $service->bg_color }}" value="{{ $service->bg_color }}">
                                    <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square" style="color: {{ $service->bg_color }}"></i></span>
                                    </div>
                                </div>
                            @error('bg_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-12 col-form-label">Background Hover Color</label>
                            <div class="col-sm-12">
                                <div class="input-group my-colorpicker4 colorpicker-element" data-colorpicker-id="2">
                                    <input type="text" name="bg_hover_color" class="form-control @error('bg_hover_color') is-invalid @enderror" data-original-title="" title="{{ $service->bg_hover_color }}" value="{{ $service->bg_hover_color }}">
                                    <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square" style="color: {{ $service->bg_hover_color }}"></i></span>
                                    </div>
                                </div>
                            @error('bg_hover_color')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="reset" class="btn btn-default">Clear</button>
                        <button type="submit" class="btn btn-primary float-right"><i class="far fa-share-square"></i> Update Service</button>
                        </div>
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
<!-- Page script -->
@endsection
