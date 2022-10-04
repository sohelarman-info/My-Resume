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
            @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('success') }}
            </div>
            @endif
            @if (session('danger'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('danger') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			{{-- blog section start --}}
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Latest Post') }}</h3>
                            <span class="float-right text-success">
                                <strong>
                                    <a href="{{ route('Blog.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                                </strong>
                            </span>
                          </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- The time line -->
                                    @if ($blogs->count() == 0)
                                        <div class="text-center">You have no any blog</div>
                                    @else

                                    <div class="timeline">
                                        <!-- timeline item -->
                                        @foreach($blogs as $key => $blog)
                                        <div>
                                            <i class="fas fa-user bg-blue"></i>
                                            <div class="timeline-item">
                                                <span class="time"><i class="fas fa-clock"></i> {{ $blog->created_at->format('d M, Y'). ' ('.$blog->created_at->format('h:sa').')' }}</span>
                                                <h3 class="timeline-header">
                                                    <a href="http://localhost/sohelarman.info/pages/examples/profile.html">{{ $blog->user->name }}</a> Posted</h3>
                                                <div class="timeline-body">
                                                    <div class="row">
                                                        <div class="col-md-2"><a href="{{ route('Post', $blog->slug) }}"><img class="img-thumbnail" width="100%" height="200px" src="{{ asset('images/thumbnail/'.$blog->created_at->format('Y/m')).'/'.$blog->id.'/'. $blog->thumbnail }}" alt="{{ $blog->thumbnail }}"></a></div>
                                                        <div class="col-md-8">
                                                            <div class="card-body p-2">
                                                                <span class="float-right text-success">
                                                                </span>
                                                                <h5 class="card-title text-primary"><a href="{{ route('Post', $blog->slug) }}"><strong>{{ $blog->title }}</strong></a></h5>
                                                                <p class="card-text">{!! Str::limit($blog->summary, 300) !!}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-right">
                                                            <a href="{{ route('BlogEdit', $blog->slug) }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                                            <a href="{{ route('BlogDelete', $blog->id) }}" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- END timeline item -->
                                        <div>
                                        <i class="fas fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                    @endif
                                    <nav aria-label="Page navigation example float-center">
                                        <ul class="pagination justify-content-center">
                                            {{ $blogs->links() }}
                                        </ul>
                                      </nav>
                                </div>
                                    <!-- /.col -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                          <h3 class="card-title">Folders</h3>

                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                              <!-- Add icons to the links using the .nav-icon class
                                   with font-awesome or any other icon font library -->
                              @foreach ($categories as $category)
                              <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                  <i class="nav-icon far fa-folder"></i>
                                  <p>
                                    {{ $category->blog_category_name }}
                                    <i class="fas fa-angle-left right"></i>
                                  </p>
                                </a>
                                <ul class="nav nav-treeview">
                                      @foreach ($subcategories as $scategory)
                                      @if ($category->id == $scategory->category_id)
                                    <li class="nav-item has-treeview">
                                        <a href="{{ route('CatBlog', $scategory->id) }}" class="nav-link">
                                            <p><i class="far fa-circle nav-icon"></i> {{ $scategory->sub_category_name }}</p>
                                        </a>
                                    </li>
                                      @endif
                                      @endforeach
                                </ul>
                              </li>
                              @endforeach
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
