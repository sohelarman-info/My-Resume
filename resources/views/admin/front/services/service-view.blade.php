@extends('admin.master')
@section('title', $service->title)
@section('front_menu_open','menu-open')
@section('front_active','active')
@section('service_active','active')
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
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-primary card-outline">
                                  <div class="card-header">
                                      <div class="user-block">
                                          <img class="img-circle img-bordered-sm" src="{{ asset('img/icon/user.png') }}" alt="">
                                          <span class="username">
                                            <a target="_blank" href="">{{ $service->title }}</a>
                                          </span>
                                          <span class="description">{{ $service->created_at->format('d M, Y') }}</span>
                                        </div>
                                          <span style="font-size: 14px" class="description float-right">
                                            <i class="far fa-clock"></i> {{ $service->created_at->format('h:sa') }}
                                          </span>
                                        <!-- /.user-block -->
                                  </div><!-- /.card-header -->
                                  <div class="card-body">
                                      <div class="post">
                                          <p>
                                            </p><p>{!! $service->post !!}</p>
                                          <p></p>

                                          <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                              <a href="#" class="link-black text-sm">
                                                <i class="far fa-comments mr-1"></i> Comments (5)
                                              </a>
                                            </span>
                                          </p>

                                          <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                  </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                              </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header card-primary card-outline">
                                        <h3 class="card-title">Service Summary</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="post text-center">
                                            <span class="iclass"><i class="{{ $service->icon }}"></i></span>
                                            <style>
                                                .iclass{
                                                    color: {{ $service->icon_color }};
                                                    font-size: 100px;
                                                    background-color: {{ $service->bg_color }};
                                                    padding: 30px;
                                                    height: 200px;
                                                    width: 200px;
                                                    border-radius: 50%;
                                                    transition: 0.3s;
                                                    display: inline-block;
                                                }
                                                .iclass:hover{
                                                    color: {{ $service->icon_hover_color }};
                                                    font-size: 100px;
                                                    background-color: {{ $service->bg_hover_color }};
                                                    padding: 30px;
                                                    height: 200px;
                                                    width: 200px;
                                                    border-radius: 50%;
                                                }
                                            </style>
                                        </div>
                                          <!-- /.post -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="card">
                                    <div class="card-header card-primary card-outline">
                                        <h3 class="card-title">Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="post">
                                            <p>
                                                {!! $service->summary !!}
                                            </p>
                                          </div>
                                          <!-- /.post -->
                                    </div>
                                    <!-- /.card-body -->
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
