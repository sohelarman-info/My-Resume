@extends('admin.master')
@section('title','Footer Section')
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
                    <!-- Horizontal Form -->
                    @if ($footers->count() == 0)
                        <form class="form-horizontal" action="{{ route('AddFooter') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Footer Section') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
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
                                        <label for="summary" class="col-sm-3 col-form-label">{{ __('Summary') }}</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control my-editor form-control-lg @error('summary') is-invalid @enderror" name="summary" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                            <textarea class="form-control my-editor form-control-lg @error('copyright') is-invalid @enderror" name="copyright" id="my-editor" placeholder="Place some text here"
                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @error('copyright')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> {{ __('Add Footer') }}</button>
                                </div>
                            </div>
                        </form>
                        @else
                        @foreach ($footers as $footer)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                    <h3 class="card-title">{{ $footer->title }}</h3>
                                    <span class="float-right">
                                        <a class="btn-sm btn-secondary" href="{{ route('FooterEdit', $footer->id) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <a class="btn-sm btn-danger" href="{{ route('DeleteFooter', $footer->id) }}"><i class="fas fa-trash"></i> Clear</a>
                                    </span>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <p class="text-muted">
                                                    {!! $footer->summary !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <p class="text-muted">
                                                    {!! $footer->copyright !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">Social Media</h3>
                                    </div>
                                    @if($socials->count() == 0)
                                        <div class="default text-center">{{ __("You haven't any social link") }}</div>
                                        @else
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 1%">
                                                        SL
                                                    </th>
                                                    <th class="text-center" style="width: 20%">
                                                        icon
                                                    </th>
                                                    <th class="text-center" style="width: 30%">
                                                        Name
                                                    </th>
                                                    <th class="text-center" class="project-actions text-center" style="width: 20%">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            @php
                                                $i = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($socials as $social)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $i++ }}
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <h1 style="color: #007BFF"><i class="{{ $social->social_icon }}"></i></h1>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <a href="{{ $social->social_link }}">{{ $social->social_name }}</a>
                                                        <br/>
                                                        <small>
                                                            {{ $social->social_link }}
                                                        </small><br>
                                                        <small>
                                                            Created: {{ $social->created_at->format('d-m-Y') }}
                                                        </small>
                                                    </td>
                                                    <td class="project-actions text-center">
                                                        <a class="btn btn-info btn-sm" href="{{ route('SocialEdit', $social->id) }}">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            {{ __('Edit') }}
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="{{ route('SocialDelete', $social->id) }}">
                                                            <i class="fas fa-trash"></i>
                                                            {{ __('Delete') }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                    <div class="card-footer float-right">
                                        <ul class="pagination pagination-sm float-right">
                                            {{--  {{ $pposts->links() }}  --}}
                                        </ul>
                                    </div>
                                </div>
                              <!-- /.nav-tabs-custom -->
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-primary card-outline">
                                      <h3 class="card-title">Add Social</h3>
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                          <i class="fas fa-times"></i></button>
                                      </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('AddSocial') }}" method="POST" class="form-horizontal">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $footer->id }}">
                                      <div class="card-body">
                                          <div class="form-group row">
                                              <label for="social_name" class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                                              <div class="col-sm-9">
                                                  <input type="text" name="social_name" class="form-control form-control @error('social_name') is-invalid @enderror" id="social_name" placeholder="Facebook">
                                                  @error('social_name')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                                </div>
                                           </div>
                                          <div class="form-group row">
                                              <label for="social_link" class="col-sm-3 col-form-label">{{ __('Link') }}</label>
                                              <div class="col-sm-9">
                                                  <input type="text" name="social_link" class="form-control form-control @error('social_link') is-invalid @enderror" id="social_link" placeholder="https://www.facebook.com/username">
                                                  @error('social_link')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                                </div>
                                           </div>
                                          <div class="form-group row">
                                              <label for="social_icon" class="col-sm-3 col-form-label">{{ __('Icon') }}</label>
                                              <div class="col-sm-9">
                                                  <input type="text" name="social_icon" class="form-control form-control @error('social_icon') is-invalid @enderror" id="social_icon" placeholder="fab fa-facebook-f">
                                                  @error('social_icon')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                                </div>
                                           </div>
                                        </div>
                                      <!-- /.card-body -->
                                      <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                      <!-- /.card-footer -->
                                    </form>
                                  </div>
                                </div>
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
