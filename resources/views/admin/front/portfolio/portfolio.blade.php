@extends('admin.master')
@section('title','Portfolio Section')
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('portfolio_active','active')
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
                        @if ($portfolios->count() == 0)
                        <form class="form-horizontal" action="{{ route('PortfolioStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Add Portfolio') }}</h3>
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
                                        <label for="portfolio" class="col-sm-12 col-form-label">{{ __('Portfolio') }}</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control my-editor form-control-lg @error('portfolio') is-invalid @enderror" name="portfolio" id="my-editor" placeholder="Place some text here"
                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @error('portfolio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add Portfolio</button>
                                </div>
                            </div>
                        </form>
                        @else
                        @foreach ($portfolios as $portfolio)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                    <h3 class="card-title">{{ $portfolio->title }}</h3>
                                    <span class="float-right">
                                        <a class="btn-sm btn-secondary" href="{{ route('PortfolioEdit', $portfolio->id) }}">Edit</a>
                                        <a class="btn-sm btn-danger" href="{{ route('PortfolioDelete', $portfolio->id) }}">Clear</a>
                                    </span>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <p class="text-muted">
                                            {!! $portfolio->portfolio !!}
                                        </p>
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
                                        <h3 class="card-title">Project</h3><span class="float-right text-success">
                                            <strong>
                                                <a href="{{ route('AddPpost') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                                            </strong>
                                        </span>
                                    </div>
                                    @if($pposts->count() == 0)
                                        <div class="default text-center">{{ __("You haven't any project") }}</div>
                                        @else
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%" class="text-center">
                                                        {{ __('SL') }}
                                                    </th>
                                                    <th style="width: 15%" class="text-center">
                                                        {{ __('Thumbanil') }}
                                                    </th>
                                                    <th style="width: 30%" class="text-center>
                                                        {{ __('Title') }}
                                                    </th>
                                                    <th style="width: 20%" class="text-center>
                                                        {{ __('Title') }}
                                                    </th>
                                                    <th style="width: 30%" class="text-center">
                                                        {{ __('Action') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pposts as $key => $ppost)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $pposts->firstItem() + $key }}
                                                    </td>
                                                    <td class="text-center">
                                                        <img alt="Avatar" class="img-thumbnail" src="{{ asset('portfolio/thumbnail/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$ppost->thumbnail) }}">
                                                    </td>
                                                    <td>
                                                        <a>
                                                            {{ $ppost->title }}
                                                        </a>
                                                        <br>
                                                        <small>
                                                            Created {{ $ppost->created_at->format('d.m.y') }}
                                                        </small>
                                                    </td>
                                                    <td>
                                                        @foreach ($ppost->ppost_images as $pimage)
                                                        <img width="50px" src="{{ asset('portfolio/images/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$pimage->images) }}" alt="">
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-primary btn-sm" href="{{ route('PpostView', $ppost->slug) }}">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            View
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="{{ route('PpostEdit', $ppost->slug) }}">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="{{ route('PpostDelete', $ppost->id) }}">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                    <div class="card-footer float-right">
                                        <ul class="pagination pagination-sm float-right">
                                            {{ $pposts->links() }}
                                        </ul>
                                    </div>
                                </div>
                              <!-- /.nav-tabs-custom -->
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-primary card-outline">
                                      <h3 class="card-title">Add Category</h3>
                                      <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                          <i class="fas fa-times"></i></button>
                                      </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route('PcatAdd') }}" method="POST" class="form-horizontal">
                                        @csrf
                                      <div class="card-body">
                                        <div class="form-group row">
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputEmail3" placeholder="Ex: Web">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                      </div>
                                      <!-- /.card-body -->
                                      <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </div>
                                      <!-- /.card-footer -->
                                    </form>
                                  </div>
                                    <div class="card">
                                        <div class="card-header card-primary card-outline">
                                          <h3 class="card-title">Portfolio Category</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                          @if ($pcats->count() == 0)
                                              <p class="text-center"> You have not any category</p>
                                              @else
                                              <table class="table">
                                                <tbody>
                                                    <?php $i = 1?>
                                                  @foreach ($pcats as $pcat)
                                                  <tr>
                                                    <td width="10%" class="text-center">{{ $i++ }}</td>
                                                    <td width="60%"><a href="#"><strong>{{ $pcat->name }}</strong></a></td>
                                                    <td width="30%" class="text-center">
                                                        <a class="btn-sm btn-secondary" href="{{ route('PcatEdit', $pcat->slug) }}">Edit</a>
                                                        <a class="btn-sm btn-danger" href="{{ route('PcatDelete', $pcat->slug) }}">Delete</a>
                                                    </td>
                                                  </tr>
                                                  @endforeach
                                                </tbody>
                                              </table>
                                          @endif
                                        </div>
                                        <!-- /.card-body -->
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
