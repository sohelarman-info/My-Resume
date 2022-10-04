@extends('admin.master')
@section('title','Portfolio Project Edit')
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

            <form class="form-horizontal" action="{{ route('PpostUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $ppost->id }}">
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
                                <input type="text" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror" id="title" value="{{ $ppost->title }}" placeholder="{{ $ppost->title }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="link" class="col-sm-12 col-form-label">Link</label>
                                <div class="col-sm-12">
                                <input type="text" name="link" class="form-control form-control-lg @error('link') is-invalid @enderror" id="link" value="{{ $ppost->link }}" placeholder="https://www.example.com/page">
                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                            {{--  <div class="input-field">
                                <label class="active">Photos</label>
                                <div class="input-images-2" style="padding-top: .5rem;"></div>
                            </div>  --}}

                            <div class="form-group">
                                <label for="photo">Multiple Image</label>
                                <table class="table">
                                    @php
                                        $i =1;
                                    @endphp
                                    <tbody>
                                    @foreach ($ppost->ppost_images as $pimages)
                                      <tr>
                                        <td class="text-center py-0 align-middle">
                                            {{ $i++ }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <img height="70" width="100" class="" src="{{ asset('portfolio/images/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$pimages->images) }}" alt="{{ $ppost->thumbnail }}">
                                        </td>
                                        <td class="text-center py-0 align-middle">{{ $pimages->images }}</td>
                                        <td class="text-right py-0 align-middle">
                                          <div class="btn-group btn-group-sm">
                                            <a href="{{ asset('portfolio/images/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$pimages->images) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('MultipleImageDelete', $pimages->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                          </div>
                                        </td>
                                      </tr>
                                    @endforeach
                                    </tbody>
                                  </table>
                                <div class="input-images"></div>
                            </div>
                            <div class="form-group row">
                                <label for="post" class="col-sm-12 col-form-label">Post</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control my-editor form-control-lg @error('post') is-invalid @enderror" name="post" id="my-editor" placeholder="Place some text here"
                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $ppost->post }}</textarea>
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
                                        <option @if ($ppost->pcat_id == $pcat->id) selected @endif value="{{ $pcat->id }}">{{ $pcat->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pcat_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="company" class="col-sm-12 col-form-label">Company</label>
                                    <div class="col-sm-12">
                                    <input type="text" name="company" class="form-control form-control @error('company') is-invalid @enderror" id="company" value="{{ $ppost->company }}" placeholder="{{ $ppost->company }}">
                                    @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" class="form-control custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" onchange="LogoUpload(event)">
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

                                    <div class="col-md-12 text-center">
                                        <img class="img-thumbnail col-md-5" src="{{ asset('portfolio/Thumbnail/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$ppost->thumbnail) }}" alt="{{ $ppost->thumbnail }}">
                                        <span class="col-md-2 text-center"><i class="fas fa-exchange-alt"></i></span>
                                        <img class="img-thumbnail col-md-5" id="logo"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="client" class="col-sm-12 col-form-label">Client</label>
                                    <div class="col-sm-12">
                                    <input type="text" name="client" class="form-control form-control @error('client') is-invalid @enderror" id="client" value="{{ $ppost->client }}" placeholder="{{ $ppost->client }}">
                                    @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="form-control custom-file-input @error('photo') is-invalid @enderror" id="photo" onchange="loadFile(event)">
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

                                    <div class="col-md-12 text-center">
                                        <img class="img-thumbnail col-md-5" src="{{ asset('portfolio/photo/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$ppost->photo) }}" alt="{{ $ppost->photo }}">
                                        <span class="col-md-2 text-center"><i class="fas fa-exchange-alt"></i></span>
                                        <img class="img-thumbnail col-md-5" id="output"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="summary" class="col-sm-12 col-form-label">Summary</label>
                                        <textarea class="form-control form-control-lg @error('summary') is-invalid @enderror" name="summary" id="summary" placeholder="Type Summary"
                                        style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $ppost->summary }}</textarea>
                                    @error('summary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Project </button>
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
<script>
    let preloaded = [
    @foreach($ppost->ppost_images as $pimage)
    {id: {{ $pimage->id }}, src: '{{ asset('portfolio/images/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$pimage->images) }}'},
    @endforeach
    ];

    $('.input-images-2').imageUploader({
        preloaded: preloaded,
        imagesInputName: 'images',
    });
</script>

<script>
    $('.input-images').imageUploader();
 </script>
@endsection
