@extends('admin.master')
@section('title','Footer Section')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('email_active','active')
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
                <div class="col-md-4">
                    <div class="card">
                        <img width="100%" height="475px" src="https://stokeanaesthesia.org.uk/wp-content/uploads/2015/09/email-man.jpg" alt="Send Mail">
                    </div>
                </div>
                <div class="col-md-8">
                    <form class="form-horizontal" action="{{ route('send') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Contact') }}</h3>
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
                                    <label for="email" class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control form-control @error('email') is-invalid @enderror" id="email" placeholder="Type your email here">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="subject" class="col-sm-3 col-form-label">{{ __('Subject') }}</label>
                                    <div class="col-sm-9">
                                    <input type="text" name="subject" class="form-control form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Type your subject here">
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="message" class="col-sm-3 col-form-label">{{ __('Messages') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control my-editor form-control-lg @error('message') is-invalid @enderror" name="message" placeholder="Place some text here"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button type="submit" name="send" class="btn btn-info float-right"><i class="far fa-share-square"></i> {{ __('Send') }}</button>
                            </div>
                        </div>
                    </form>
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
