@extends('admin.master')
@section('title','About Section')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('about_section_active','active')
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

            @if ($abouts->count() == 0)
            <form class="form-horizontal" action="{{ route('AboutStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-8">
                    <!-- Horizontal Form -->
                    <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('About Section') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Icon Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="icon_name" class="form-control @error('icon_name') is-invalid @enderror" id="name inputName" placeholder="" value="">
                                    @error('icon_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title inputName" placeholder="" value="">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name inputName" placeholder="" value="">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="about" class="col-sm-2 col-form-label">About</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control my-editor form-control-lg @error('about') is-invalid @enderror" name="about" id="" placeholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="summary" class="col-sm-2 col-form-label">Summary</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control my-editor form-control-lg @error('summary') is-invalid @enderror" name="summary" id="" placeholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control my-editor form-control-lg @error('description') is-invalid @enderror" name="description" id="my-editor" placeholder="Place some text here"
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    @error('description')
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
                        <h3 class="card-title">Image Part</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="thumbnail">Photo</label>
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
                                    <img class="img-thumbnail col-md-12" id="output"/>
                                </div>
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="reset" class="btn btn-default">Clear</button>
                        <button type="submit" class="btn btn-primary float-right"><i class="far fa-share-square"></i> Save Change</button>
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
        @else

      <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{ __('About Section') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                    @foreach ($abouts as $about)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Icon Name</label>
                                    <div class="col-sm-8">
                                        {{ $about->icon_name ?? 'Null' }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-12 col-form-label">About</label>
                                    <div class="col-sm-12">
                                        {{ $about->about ?? 'Null' }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-12 col-form-label">Summary</label>
                                    <div class="col-sm-12">
                                        {{ $about->summary ?? 'Null' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                        {{ $about->title ?? 'Null' }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-12 col-form-label">Description</label>
                                    <div class="col-sm-12">
                                      {!! $about->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                     {{ $about->name ?? 'Null' }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <img width="100%" class="img-thumbnail" src="{{ asset('about-section/photos/'. $about->created_at->format('Y/m/').$about->id .'/'.$about->thumbnail) }}" alt="{{ $about->thumbnail }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-right">
                                <a href="{{ route('AboutEdit', $about->slug) }}" class=" btn btn-secondary"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('AboutDelete', $about->slug) }}" class=" btn btn-danger"> <i class="far fa-trash-alt"></i> Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
            <!-- /.card -->
        <!-- /.card -->
        </div>
      </div>
        @endif
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
