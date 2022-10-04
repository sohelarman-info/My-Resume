@extends('admin.master')
@section('title','Fact Section')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('fact_section_active','active')
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
                    @if ($facts->count() == 0)
                        <form class="form-horizontal" action="{{ route('FactStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Fact Section') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-6 col-sm-12">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                            <h3>0</h3>

                                            <p>{{ __('Happy Clients') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="far fa-smile"></i>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-smile"></i></span>
                                            </div>
                                            <input type="text" name="client" class="form-control @error('client') is-invalid @enderror">
                                            @error('client')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6 col-sm-12">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                            <h3>0</h3>

                                            <p>{{ __('Projects') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                            </div>
                                            <input type="text" name="project" class="form-control @error('project') is-invalid @enderror">
                                            @error('project')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6 col-sm-12">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                            <h3>0</h3>

                                            <p>{{ __('Days Of Support') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-headset"></i>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" name="support" class="form-control @error('support') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy" data-mask="" im-insert="false">
                                            @error('support')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6 col-sm-12">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                            <h3>0</h3>

                                            <p>{{ __('Pertner') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            </div>
                                            <input type="text" name="worker" class="form-control @error('worker') is-invalid @enderror">
                                            @error('worker')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                    <div class="input-group">
                                        <label for="fact" class="col-sm-12 col-form-label">{{ __('Title') }}</label>
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                                        </div>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label for="fact" class="col-sm-12 col-form-label">{{ __('Facts') }}</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control my-editor form-control-lg @error('fact') is-invalid @enderror" name="fact" id="my-editor" placeholder="Place some text here"
                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @error('fact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
                                </div>
                            </div>
                        </form>
                    @else
                    @foreach ($facts as $fact)
                    <form class="form-horizontal" action="{{ route('FactUpdate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $fact->id }}">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Fact Section') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6 col-sm-12">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                        <h3>{{ $fact->client }}</h3>

                                        <p>{{ __('Happy Clients') }}</p>
                                        </div>
                                        <div class="icon">
                                            <i class="far fa-smile"></i>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-smile"></i></span>
                                        </div>
                                        <input type="text" name="client" class="form-control @error('client') is-invalid @enderror" value="{{ $fact->client }}" placeholder="{{ $fact->client }}">
                                        @error('client')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6 col-sm-12">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                        <h3>{{ $fact->project }}</h3>

                                        <p>{{ __('Projects') }}</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                        </div>
                                        <input type="text" name="project" class="form-control @error('project') is-invalid @enderror" value="{{ $fact->project }}">
                                        @error('project')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6 col-sm-12">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                        <h3>
                                            @php
                                                $bday   = new DateTime($fact->support); // Your date of birth
                                                $today  = new Datetime(date('m.d.y'));
                                                $diff   = $today->diff($bday);
                                                printf('%d', $diff->y * 365 + ($diff->m * 60)+$diff->d, ($diff->m * 60)+$diff->d, $diff->d);
                                                printf("\n");
                                            @endphp
                                        </h3>

                                        <p>{{ __('Days Of Support') }}</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-headset"></i>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="support" class="form-control @error('support') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy" data-mask="" im-insert="false" value="{{ $fact->support }}">
                                        @error('support')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6 col-sm-12">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                        <h3>{{ $fact->worker }}</h3>

                                        <p>{{ __('Pertner') }}</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        </div>
                                        <input type="text" name="worker" class="form-control @error('worker') is-invalid @enderror" value="{{ $fact->worker }}">
                                        @error('worker')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <div class="input-group">
                                    <label for="fact" class="col-sm-12 col-form-label">{{ __('Title') }}</label>
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                                    </div>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $fact->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="fact" class="col-sm-12 col-form-label">{{ __('Facts') }}</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control my-editor form-control-lg @error('fact') is-invalid @enderror" name="fact" id="my-editor" placeholder="Place some text here"
                                        style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $fact->fact }}</textarea>
                                        @error('fact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-info float-right"><i class="far fa-edit"></i> Update Fact</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    @endif


                    <!-- /.card -->
                <!-- /.card -->
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
