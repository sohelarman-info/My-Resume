@extends('admin.master')
@section('title','Home Section')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('home_section_active','active')
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

            @if ($homes->count() == 0)
            <form class="form-horizontal" action="{{ route('HomeStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-8">
                    <!-- Horizontal Form -->
                    <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Home Section</h3>
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
                                    <label for="inputName" class="col-sm-2 col-form-label">Title Color</label>
                                    <div class="col-sm-10">
                                        <div class="input-group my-colorpicker1 colorpicker-element" data-colorpicker-id="2">
                                            <input type="text" name="title_color" class="form-control @error('title_color') is-invalid @enderror" data-original-title="" title="">
                                            <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square" style="color: rgb(55, 8, 8);"></i></span>
                                            </div>
                                        </div>
                                    @error('title_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Title Font</label>
                                    <div class="col-sm-10">
                                        <select name="user_role" class="form-control select2">
                                            <option>Family</option>
                                            <option>Sens Sarif</option>
                                            <option>Arial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">TagLine</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="tagline" class="form-control @error('tagline') is-invalid @enderror" id="tagline inputName" placeholder="" value="">
                                    @error('tagline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation inputName" placeholder="" value="">
                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Designation Color</label>
                                    <div class="col-sm-10">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <input type="text" name="designation_color" class="form-control @error('designation_color') is-invalid @enderror" data-original-title="" title="">
                                            <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square" style="color: rgb(55, 8, 8);"></i></span>
                                            </div>
                                        </div>
                                    @error('designation_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Designation Font</label>
                                    <div class="col-sm-10">
                                        <select name="designation_font" class="form-control select2">
                                            <option>Family</option>
                                            <option>Sens Sarif</option>
                                            <option>Arial</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Site Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror" id="site_name inputName" placeholder="" value="">
                                    @error('site_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Site Url</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="site_url" class="form-control @error('site_url') is-invalid @enderror" id="site_url inputName" placeholder="" value="">
                                    @error('site_url')
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
                                    <label for="thumbnail">Logo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="form-control custom-file-input @error('logo') is-invalid @enderror" id="thumbnail" onchange="LogoUpload(event)">
                                            <label class="custom-file-label" for="logo">Choose file</label>
                                        </div>
                                        @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <img class="img-thumbnail col-md-12" id="logo"/>
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
                <h3 class="card-title">Home Section</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                    @foreach ($homes as $home)
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Icon Name</label>
                            <div class="col-sm-8">
                                {{ $home->icon_name ?? 'Null' }}
                            </div>
                            <div class="col-sm-2 float-right">
                                <a href="{{ route('HomeEdit', $home->slug) }}" class=" btn btn-secondary"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('HomeDelete', $home->slug) }}" class=" btn btn-danger"> <i class="far fa-trash-alt"></i> Clear</a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                {{ $home->title ?? 'Null' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Title Color</label>
                            <div class="col-sm-10">
                                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                    <div class="input-group-append">
                                        <i class="fas fa-square" style="color: {{ $home->title_color }};"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title Font</label>
                            <div class="col-sm-10">
                                {{ $home->title_font ?? 'Null' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">TagLine</label>
                            <div class="col-sm-10">
                                {{ $home->tagline ?? 'Null' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Designation</label>
                            <div class="col-sm-10">
                                {{ $home->designation ?? 'Null' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Designation Color</label>
                            <div class="col-sm-10">
                                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                    <i class="fas fa-square" style="color:{{ $home->designation_color }};"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Designation Font</label>
                            <div class="col-sm-10">
                                {{ $home->designation_font ?? 'Null' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Site Name</label>
                            <div class="col-sm-10">
                                {{ $home->site_name ?? 'Null' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Site Url</label>
                            <div class="col-sm-10">
                                {{ $home->site_url ?? 'Null' }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Logo</label>
                            <div class="col-sm-4">
                                <img class="img-thumbnail" src="{{ asset('about-section/logo/'. $home->created_at->format('Y/m/').$home->id .'/'.$home->logo) }}" alt="{{ $home->logo }}">
                            </div>
                            <label for="inputName" class="col-sm-2 col-form-label">Thumbnail</label>
                            <div class="col-sm-4">
                                <img class="img-thumbnail" src="{{ asset('about-section/thumbnail/'. $home->created_at->format('Y/m/').$home->id .'/'.$home->thumbnail) }}" alt="{{ $home->thumbnail }}">
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
