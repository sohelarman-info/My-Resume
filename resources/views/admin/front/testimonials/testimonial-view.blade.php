@extends('admin.master')
@section('title','Testimonials')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('testimonials_active','active')
@section('content')
    <!-- Main content Start -->
            <section class="content">
                {{--  Session Alerm start  --}}
                @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ session('success') }}
                </div>
                @endif
                {{--  Session Alerm End  --}}
                <!-- Default box -->
                <div class="row">
                    <div class="col-md-3">

                      <!-- Profile Image -->
                      <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{ asset('/testimonial/photo/'.$testimonial->created_at->format('Y/m/').$testimonial->id.'/'.$testimonial->photo) }}"
                                 alt="{{ $testimonial->photo }}">
                          </div>
                          <h3 class="profile-username text-center">{{ $testimonial->name }}</h3>

                          <p class="text-muted text-center">{{ $testimonial->title }}</p>

                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>{{ __('Designation') }}</b> <a class="float-right">{{ $testimonial->designation }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>{{ __('About') }}</b> <a class="float-right">{{ $testimonial->about }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>{{ __('Phone') }}</b> <a class="float-right">{{ $testimonial->phone }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>{{ __('Email') }}</b> <a class="float-right">{{ $testimonial->email }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>{{ __('Address') }}</b> <a class="float-right">{{ $testimonial->address }}</a>
                            </li>
                            <li class="list-group-item">
                              <b>{{ __('Status') }}</b>
                              <a class="float-right">
                                  @if ($testimonial->status == 1) Public @else Private @endif

                                </a>
                            </li>
                          </ul>
                          <strong><i class="fas fa-book mr-1"></i> {{ __('Quote') }}</strong>

                          <p class="text-muted">
                            {{ $testimonial->quote }}
                          </p>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                      <div class="card">
                        <div class="card-header p-2">
                          <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">{{ __('Testimonial') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">{{ __('Edit') }}</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                              <!-- Post -->
                              <div class="post">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="{{ asset('/testimonial/photo/'.$testimonial->created_at->format('Y/m/').$testimonial->id.'/'.$testimonial->photo) }}" alt="{{ $testimonial->photo }}">
                                  <span class="username">
                                    <a href="#">{{ $testimonial->name }}</a>
                                  </span>
                                  <span class="description">Shared @if ($testimonial->status == 1) publicly @else Private @endif - {{ $testimonial->created_at->format('h:s a') }} - {{ $testimonial->created_at->diffForHumans() }}</span>
                                </div>
                                <!-- /.user-block -->
                                <div>
                                    <p>
                                        {!! $testimonial->summary !!}
                                    </p>
                                </div>
                              </div>
                              <!-- /.post -->
                            </div>
                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ route('TestimonialUpdate') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $testimonial->id }}">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card card-outline card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Update Testimonials') }}</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body pad">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                                                    <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control form-control @error('name') is-invalid @enderror" id="name" placeholder="{{ $testimonial->name }}" value="{{ $testimonial->name }}">
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
                                                    <input type="text" name="title" class="form-control form-control @error('title') is-invalid @enderror" id="title" placeholder="{{ $testimonial->title }}" value="{{ $testimonial->title }}">
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
                                                    <input type="text" name="designation" class="form-control form-control @error('designation') is-invalid @enderror" id="designation" placeholder="{{ $testimonial->designation }}" value="{{ $testimonial->designation }}">
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
                                                    <input type="text" name="about" class="form-control form-control @error('about') is-invalid @enderror" id="about" placeholder="{{ $testimonial->about }}" value="{{ $testimonial->about }}">
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
                                                    <input type="text" name="address" class="form-control form-control @error('address') is-invalid @enderror" id="address" placeholder="{{ $testimonial->address }}" value="{{ $testimonial->address }}">
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
                                                    <input type="text" name="email" class="form-control form-control @error('email') is-invalid @enderror" id="email" placeholder="{{ $testimonial->email }}" value="{{ $testimonial->email }}">
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
                                                    <input type="text" name="phone" class="form-control form-control @error('phone') is-invalid @enderror" id="phone" placeholder="{{ $testimonial->phone }}" value="{{ $testimonial->phone }}">
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="summary" class="col-sm-12 col-form-label">{{ __('Summary') }}</label>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control my-editor form-control-lg @error('summary') is-invalid @enderror" name="summary" id="my-editor" placeholder="{{ $testimonial->summary }}"
                                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $testimonial->summary }}</textarea>
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
                                                                <input type="checkbox" name="status" value="1" @if ($testimonial->status == 1) checked @endif data-bootstrap-switch data-off-color="danger" data-on-color="success">
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
                                                        </div>
                                                        <img class="img-thumbnail" id="photos"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="quote" class="col-sm-12 col-form-label">{{ __('Quote') }}</label>
                                                            <textarea class="form-control form-control-lg @error('quote') is-invalid @enderror" name="quote" id="quote" placeholder="{{ $testimonial->quote }}"
                                                            style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $testimonial->quote }}</textarea>
                                                        @error('quote')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">{{ __('Update Testimonial') }}</button>
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
                            <!-- /.tab-pane -->
                          </div>
                          <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                      </div>
                      <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                  </div>
                <!-- /.card -->

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
<script>
    var photoFile = function(event) {
        var photos = document.getElementById('photos');
        photos.src = URL.createObjectURL(event.target.files[0]);
        photos.onload = function() {
          URL.PhotosrevokeObjectURL(photos.src) // free memory
        }
      };
</script>

{{--  Image upload preview  --}}
@endsection
