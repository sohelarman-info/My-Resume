@extends('admin.master')
@section('title','Resume Section')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('resume_section_active','active')
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
                        @if ($resumes->count() == 0)
                        <form class="form-horizontal" action="{{ route('ResumeStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Resume Section') }}</h3>
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
                                        <label for="resume" class="col-sm-12 col-form-label">{{ __('Resume') }}</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control my-editor form-control-lg @error('resume') is-invalid @enderror" name="resume" id="my-editor" placeholder="Place some text here"
                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @error('resume')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add Resume</button>
                                </div>
                            </div>
                        </form>
                        @else
                        @foreach ($resumes as $resume)

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Resume Section') }} </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-header">
                                            <h3 class="card-title">{{ $resume->title }}</h3>
                                            <span class="float-right">
                                                <a class="btn-sm btn-secondary" href="{{ route('ResumeEdit', $resume->id) }}">Edit</a>
                                                <a class="btn-sm btn-danger" href="{{ route('ResumeDelete', $resume->id) }}">Clear</a>
                                            </span>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <p class="text-muted">
                                                    {!! $resume->resume !!}
                                                </p>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default">
                                            <div class="card-header">
                                            <h3 class="card-title">{{ __('Professional Experiences') }}</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <strong><a href="{{ route('AddSummary', $resume->id) }}"><i class="fas fa-plus"></i> Add Summary</a></strong>
                                                    </div>
                                                    <div class="col-md-10">
                                                        @foreach ($summaires as $summary)
                                                        <h3>{{ $summary->title }}
                                                            <span class="float-right">
                                                                <a class="btn-sm btn-secondary" href="{{ route('SummaryEdit', $summary->id) }}"><i class="far fa-edit"></i></a>
                                                                <a class="btn-sm btn-danger" href="{{ route('SummaryDelete', $summary->id) }}"><i class="far fa-trash-alt"></i></a>
                                                            </span>
                                                        </h3>
                                                        <br>
                                                        <p>{!! $summary->summary !!}</p>
                                                        <hr>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <strong><a href="{{ route('AddEducation', $resume->id) }}"><i class="fas fa-plus"></i> Add Education</a></strong>
                                                    </div>
                                                    <div class="col-md-10">
                                                        @foreach ($educations as $education)
                                                        <h3>{{ $education->title }}
                                                            <span class="float-right">
                                                                <a class="btn-sm btn-secondary" href="{{ route('EducationEdit', $education->id) }}"><i class="far fa-edit"></i></a>
                                                                <a class="btn-sm btn-danger" href="{{ route('EducationDelete', $education->id) }}"><i class="far fa-trash-alt"></i></a>
                                                            </span>
                                                        </h3>
                                                        <h4>{{ $education->name }} <span class="btn-sm btn-default" style="padding: 5px;float:right">{{ $education->start }} - {{ $education->end ?? 'Present' }}</span></h4>

                                                        <br>
                                                        <p>{!! $education->description !!}</p>
                                                        <hr>
                                                    @endforeach
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <strong><a href="{{ route('AddProfession', $resume->id) }}"><i class="fas fa-plus"></i> Add Profession</a></strong>
                                                    </div>
                                                    <div class="col-md-10">
                                                        @foreach ($professions as $profession)
                                                        <h3>{{ $profession->title }}
                                                            <span class="float-right">
                                                                <a class="btn-sm btn-secondary" href="{{ route('ProfessionEdit', $profession->id) }}"><i class="far fa-edit"></i></a>
                                                                <a class="btn-sm btn-danger" href="{{ route('ProfessionDelete', $profession->id) }}"><i class="far fa-trash-alt"></i></a>
                                                            </span>
                                                        </h3>
                                                        <h4>{{ $profession->name }} <span class="btn-sm btn-default" style="padding: 5px;float:right">{{ $profession->start }} - {{ $profession->end ?? 'Present' }}</span></h4>

                                                        <br>
                                                        <p>{!! $profession->description !!}</p>
                                                        <hr>
                                                    @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
