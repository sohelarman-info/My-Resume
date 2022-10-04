@extends('admin.master')
@section('title','Home Section')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('skill_section_active','active')
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
                        @if ($skills->count() == 0)
                        <form class="form-horizontal" action="{{ route('SkillStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Skill Section') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('HTML') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="html" class="form-control @error('html') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('html')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('CSS') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="css" class="form-control @error('css') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('css')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('BOOTSTRAP') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="bootstrap" class="form-control @error('bootstrap') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('bootstrap')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('JAVASCRIPT') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="javascript" class="form-control @error('javascript') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('javascript')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('JQUERY') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="jquery" class="form-control @error('jquery') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('jquery')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('PHP') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="php" class="form-control @error('php') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('php')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('LARAVEL') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="laravel" class="form-control @error('laravel') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('laravel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('WORDPRESS') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="wordpress" class="form-control @error('wordpress') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('wordpress')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('PHOTOSHOP') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="photoshop" class="form-control @error('photoshop') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('photoshop')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('EDITING') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="editing" class="form-control @error('editing') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('editing')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <label for="fact" class="col-form-label">{{ __('OTHERS') }}</label>
                                        </div>
                                        <div class="col-lg-7 col-md-4 col-sm-12">
                                            <div class="progress-group">
                                                Rating
                                                <span class="float-right"><b>0</b>/100%</span>
                                                <div class="progress progress-lg">
                                                  <div class="progress-bar bg-primary" style="width: 0%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="input-group mb-3">
                                                <input type="text" name="others" class="form-control @error('others') is-invalid @enderror">
                                                <div class="input-group-append">
                                                  <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                </div>
                                                @error('others')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label for="title" class="col-sm-12 col-form-label">{{ __('Title') }}</label>
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
                                        <label for="skill" class="col-sm-12 col-form-label">{{ __('Skills') }}</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control my-editor form-control-lg @error('skill') is-invalid @enderror" name="skill" id="my-editor" placeholder="Place some text here"
                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @error('skill')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add Skill</button>
                                </div>
                            </div>
                        </form>
                        @else
                            @foreach($skills as $skill)
                            <form class="form-horizontal" action="{{ route('SkillUpdate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $skill->id }}">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ __('Skill Section') }}</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('HTML') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->html }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->html }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="html" class="form-control @error('html') is-invalid @enderror" value="{{ $skill->html }}" placeholder="{{ $skill->html }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('html')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('CSS') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->css }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->css }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="css" class="form-control @error('css') is-invalid @enderror" value="{{ $skill->css }}" placeholder="{{ $skill->css }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('css')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('BOOTSTRAP') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->bootstrap }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->bootstrap }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="bootstrap" class="form-control @error('bootstrap') is-invalid @enderror" value="{{ $skill->bootstrap }}" placeholder="{{ $skill->bootstrap }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('bootstrap')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('JAVASCRIPT') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->javascript }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->javascript }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="javascript" class="form-control @error('javascript') is-invalid @enderror" value="{{ $skill->javascript }}" placeholder="{{ $skill->javascript }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('javascript')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('JQUERY') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->jquery }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->jquery }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="jquery" class="form-control @error('jquery') is-invalid @enderror" value="{{ $skill->jquery }}" placeholder="{{ $skill->jquery }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('jquery')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('PHP') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->php }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->php }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="php" class="form-control @error('php') is-invalid @enderror" value="{{ $skill->php }}" placeholder="{{ $skill->php }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('php')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('LARAVEL') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->laravel }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->laravel }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="laravel" class="form-control @error('laravel') is-invalid @enderror" value="{{ $skill->laravel }}" placeholder="{{ $skill->laravel }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('laravel')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('WORDPRESS') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->wordpress }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->wordpress }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="wordpress" class="form-control @error('wordpress') is-invalid @enderror" value="{{ $skill->wordpress }}" placeholder="{{ $skill->wordpress }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('wordpress')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('PHOTOSHOP') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->photoshop }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->photoshop }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="photoshop" class="form-control @error('photoshop') is-invalid @enderror" value="{{ $skill->photoshop }}" placeholder="{{ $skill->photoshop }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('photoshop')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('EDITING') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->editing }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->editing }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="editing" class="form-control @error('editing') is-invalid @enderror" value="{{ $skill->editing }}" placeholder="{{ $skill->editing }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('editing')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-12">
                                                <label for="fact" class="col-form-label">{{ __('OTHERS') }}</label>
                                            </div>
                                            <div class="col-lg-7 col-md-4 col-sm-12">
                                                <div class="progress-group">
                                                    Rating
                                                    <span class="float-right"><b>{{ $skill->others }}</b>/100%</span>
                                                    <div class="progress progress-lg">
                                                      <div class="progress-bar bg-primary" style="width: {{ $skill->others }}%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="others" class="form-control @error('others') is-invalid @enderror" value="{{ $skill->others }}" placeholder="{{ $skill->others }}">
                                                    <div class="input-group-append">
                                                      <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                    </div>
                                                    @error('others')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <label for="title" class="col-sm-12 col-form-label">{{ __('Title') }}</label>
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-pen-nib"></i></span>
                                            </div>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $skill->title }}">
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="skill" class="col-sm-12 col-form-label">{{ __('Skills') }}</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control my-editor form-control-lg @error('skill') is-invalid @enderror" name="skill" id="my-editor" placeholder="Place some text here"
                                                style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $skill->skill }}</textarea>
                                                @error('skill')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer clearfix">
                                        <a href="{{ route('SkillDelete', $skill->id) }}" class="btn btn-default">Clear</a>
                                        <button type="submit" class="btn btn-info float-right">Skill Update</button>
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
