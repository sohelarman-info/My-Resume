@extends('admin.master')
@section('title','Footer Social Edit '.$social->social_name)
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
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Social Media</h3>
                        </div>
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 10%">
                                            SL
                                        </th>
                                        <th class="text-center" style="width: 30%">
                                            icon
                                        </th>
                                        <th style="width: 30%">
                                            Name
                                        </th>
                                        <th style="width: 30%">
                                            Updated
                                        </th>
                                    </tr>
                                </thead>
                                    <tr>
                                        <td class="text-center">
                                            01
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
                                            </small>
                                            <br/>
                                            <small>
                                                Created: {{ $social->created_at->format('d-m-Y') }}
                                            </small>
                                        </td>
                                        <td>
                                            {{ $social->updated_at }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <form action="{{ route('SocialUpdate') }}" method="POST" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="id" value="{{ $social->section_id }}">
                          <div class="card-body">
                              <div class="form-group row">
                                  <label for="social_name" class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                                  <div class="col-sm-9">
                                      <input type="text" name="social_name" class="form-control form-control @error('social_name') is-invalid @enderror" id="social_name" placeholder="{{ $social->social_name }}" value="{{ $social->social_name }}">
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
                                      <input type="text" name="social_link" class="form-control form-control @error('social_link') is-invalid @enderror" id="social_link" placeholder="{{ $social->social_link }}" value="{{ $social->social_link }}">
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
                                      <input type="text" name="social_icon" class="form-control form-control @error('social_icon') is-invalid @enderror" id="social_icon" placeholder="{{ $social->social_icon }}" value="{{ $social->social_icon }}">
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
