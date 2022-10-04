@extends('admin.master')
@section('title','Blog Page')
@section('blog_menu_open','menu-open')
@section('blog_active','active')
@section('blog_open_active','active')
@section('content')
    <!-- Main content Start -->
	<section class="content">
        <!-- /.container-fluid -->
		<div class="container-fluid">
            {{--  Session Alerm start  --}}
            @if (session('PermissionAdd'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('PermissionAdd') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			{{-- blog section start --}}
            <div class="row">
                <div class="col-md-8">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="{{ asset('admin/dist/img/user1-128x128.jpg') }}" alt="user image">
                            <span class="username">
                              <a href="{{ route('Post', $blog->slug) }}">{{ $blog->title }}</a>
                            </span>
                            <span class="description">{{ $blog->user->name }} - {{ $blog->created_at->format('d M, Y') }} ({{ $blog->created_at->format('h:sa') }})</span>
                          </div>
                            <span style="font-size: 14px" class="description float-right">
                              <i class="fas fa-folder"></i> {{ $blog->category->blog_category_name }} <br>
                              <i class="far fa-folder"></i> {{ $blog->sub_category->sub_category_name }}
                            </span>
                          <!-- /.user-block -->
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="post">
                            <p>
                              {!! $blog->post !!}
                            </p>

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
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="post">
                                <p>
                                    {!! $blog->summary !!}
                                </p>
                              </div>
                              <!-- /.post -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Folders</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body p-0">
                          <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                              <a href="#" class="nav-link">
                                <i class="far fa-folder"></i> Inbox
                                <span class="badge bg-primary float-right">12</span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="far fa-envelope"></i> Sent
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="far fa-file-alt"></i> Drafts
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="fas fa-filter"></i> Junk
                                <span class="badge bg-warning float-right">65</span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="#" class="nav-link">
                                <i class="far fa-trash-alt"></i> Trash
                              </a>
                            </li>
                          </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
			{{-- blog section end --}}
		</div>
        <!-- /.container-fluid -->
	</section>
    <!-- Main content End -->
@endsection
