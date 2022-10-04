@extends('admin.master')
@section('title','Service Page')
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
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    @if ($services->count() == 0)
                        <form class="form-horizontal" action="{{ route('ServiceStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Add Services') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="input-group">
                                        <label for="title" class="col-sm-12 col-form-label">{{ __('Title') }}</label>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        </div>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="service" class="col-sm-12 col-form-label">{{ __('Services') }}</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control my-editor form-control-lg @error('service') is-invalid @enderror" name="service" id="my-editor" placeholder="Place some text here"
                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @error('service')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add Service</button>
                                </div>
                            </div>
                        </form>
                        @else
                        @foreach ($services as $service)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                    <h3 class="card-title">{{ $service->title }}</h3>
                                    <span class="float-right">
                                        <a class="btn-sm btn-secondary" href="{{ route('ServiceEdit', $service->slug) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <a class="btn-sm btn-danger" href="{{ route('ServiceDelete', $service->slug) }}"><i class="fas fa-trash"></i> Clear</a>
                                    </span>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <p class="text-muted">
                                            {!! $service->service !!}
                                        </p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Default box -->
                                <div class="card">
                                    <div class="card-header">
                                    <h3 class="card-title">Projects</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                        <a href="{{ route('ServiceAdd', $service->id) }}" class="btn-sm btn-success"><i class="fas fa-plus"></i></button></a>
                                    </div>
                                    </div>
                                    <div class="card-body p-0">
                                    @if ($service_post->count() == 0)
                                        <p class="text-center">Your have no services</p>
                                    @else
                                    <table class="table table-striped projects">
                                        <thead>
                                            <tr>
                                                <th style="width: 1%">
                                                    SL
                                                </th>
                                                <th style="width: 20%">
                                                    Project Name
                                                </th>
                                                <th style="width: 30%">
                                                    Icon
                                                </th>
                                                <th class="project-actions text-center" style="width: 20%">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ($service_post as $post)
                                            <tr>
                                                <td>
                                                    {{ $i++ }}
                                                </td>
                                                <td>
                                                    <a>
                                                        {{ $post->title }}
                                                    </a>
                                                    <br/>
                                                    <small>
                                                        Created {{ $post->created_at->format('d-m-Y') }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <h1 style="color: #007BFF"><i class="{{ $post->icon }}"></i></h1>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td class="project-actions text-center">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('ServiceView', $post->slug) }}">
                                                        <i class="fas fa-folder"></i>
                                                        {{ __('View') }}
                                                    </a>
                                                    <a class="btn btn-info btn-sm" href="{{ route('EditService', $post->slug) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        {{ __('Edit') }}
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="{{ route('DeleteService', $post->slug) }}">
                                                        <i class="fas fa-trash"></i>
                                                        {{ __('Delete') }}
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                              <!-- /.nav-tabs-custom -->
                            </div>
                        @endif
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
