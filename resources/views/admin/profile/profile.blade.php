@extends('admin.master')
@section('title','My Profile')
@section('admin_menu_open','menu-open')
@section('admin_active','active')
@section('profile_active','active')
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
                @if ($profile_count->count() == 0)
                <form class="form-horizontal" action="{{ route('AddProfile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Add Profile') }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pad">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name" class="col-sm-12 col-form-label">{{ __('First Name') }}</label>
                                            <div class="col-sm-12">
                                            <input type="text" name="first_name" class="form-control form-control @error('first_name') is-invalid @enderror" id="first_name">
                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="middle_name" class="col-sm-12 col-form-label">{{ __('Middle Name') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="middle_name" class="form-control form-control @error('middle_name') is-invalid @enderror" id="middle_name">
                                        @error('middle_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="last_name" class="col-sm-12 col-form-label">{{ __('Last Name') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="last_name" class="form-control form-control @error('last_name') is-invalid @enderror" id="last_name">
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="col-sm-12 col-form-label">{{ __('Username') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="name" class="form-control form-control @error('name') is-invalid @enderror" id="name" value="{{ $users->name }}" placeholder="{{ $users->name }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="col-sm-12 col-form-label">{{ __('Email') }}</label>
                                        <div class="col-sm-12">
                                        <input type="email" name="email" class="form-control form-control @error('email') is-invalid @enderror" id="email" value="{{ $users->email }}" placeholder="{{ $users->email }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title" class="col-sm-12 col-form-label">{{ __('Title') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="title" class="form-control form-control @error('title') is-invalid @enderror" id="title">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="designation" class="col-sm-12 col-form-label">{{ __('Designation') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="designation" class="form-control form-control @error('designation') is-invalid @enderror" id="designation">
                                        @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="region" class="col-sm-12 col-form-label">{{ __('Region') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="region" class="form-control form-control @error('region') is-invalid @enderror" id="region">
                                        @error('region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-12 col-form-label">Gender</label>
                                        <div class="col-sm-12">
                                            <select name="gender" class="form-control select2">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nid" class="col-sm-12 col-form-label">{{ __('NID') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="nid" class="form-control form-control @error('nid') is-invalid @enderror" id="nid">
                                        @error('nid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="birthday" class="col-sm-12 col-form-label">{{ __('Date Of Birth') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                            @error('birthday')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="address1" class="col-sm-12 col-form-label">{{ __('Address 1') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="address1" class="form-control form-control @error('address1') is-invalid @enderror" id="address1">
                                        @error('address1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address2" class="col-sm-12 col-form-label">{{ __('Address 2') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="address2" class="form-control form-control @error('address2') is-invalid @enderror" id="address2">
                                        @error('address2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="city" class="col-sm-12 col-form-label">{{ __('City') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="city" class="form-control form-control @error('city') is-invalid @enderror" id="city">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="state" class="col-sm-12 col-form-label">{{ __('State') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="state" class="form-control form-control @error('state') is-invalid @enderror" id="state">
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="zip" class="col-sm-12 col-form-label">{{ __('ZIP') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="zip" class="form-control form-control @error('zip') is-invalid @enderror" id="zip">
                                        @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="col-sm-12 col-form-label">{{ __('Country') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="country" class="form-control form-control @error('country') is-invalid @enderror" id="country">
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="phone" class="col-sm-12 col-form-label">{{ __('Phone') }}</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="phone" class="form-control form-control @error('phone') is-invalid @enderror" id="phone">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="col-md-12 col-form-label">{{ __('Status') }}</label>
                                        <div class="col-md-12">
                                            <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="about" class="col-sm-12 col-form-label">{{ __('About') }}</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control my-editor form-control-lg @error('about') is-invalid @enderror" name="about" id="my-editor" placeholder="Place some text here"
                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
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
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                        <img class="img-thumbnail" id="photos"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="cover">{{ __('Cover Photo') }}</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="cover" class="form-control custom-file-input @error('coverError') is-invalid @enderror" id="cover" onchange="coversFile(event)">
                                                <label class="custom-file-label" for="cover">Choose file</label>
                                            </div>
                                            @error('coverError')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                        <img class="img-thumbnail" id="covers"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="summary" class="col-sm-12 col-form-label">{{ __('Summary') }}</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control form-control-lg @error('summary') is-invalid @enderror" name="summary" id="my-editor" placeholder="Place some text here"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @error('summary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="description" class="col-sm-12 col-form-label">{{ __('Description') }}</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control form-control-lg @error('description') is-invalid @enderror" name="description" id="my-editor" placeholder="Place some text here"
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('Add Profile') }}</button>
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
                @else
                <div class="row">
                    <div class="col-md-3">

                      <!-- Profile Image -->
                      <div class="card card-primary card-outline">
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header text-white" style="background: url('{{ asset('user/cover/'.$profiles->created_at->format('Y/m/').Auth::user()->id.'/'.$profiles->cover) }}') center center;">
                            <h2 class="widget-user-username text-right"><strong>{{ Auth::user()->name }}</strong></h2>
                            <h6 class="widget-user-desc text-right">{{ $profiles->title }}</h6>
                            </div>
                            <div class="widget-user-image">
                            <img class="img-circle" src="{{ asset('user/photo/'.$profiles->created_at->format('Y/m/').Auth::user()->id.'/'.$profiles->photo) }}" alt="{{ $profiles->photo }}">
                            </div>
                            <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $blog->count() }}</h5>
                                    <span class="description-text">BLOG</span>
                                </div>
                                <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $skill->count() }}</h5>
                                    <span class="description-text">SKILL</span>
                                </div>
                                <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">{{ $portfolio->count() }}</h5>
                                    <span class="description-text">PORTFOLIO</span>
                                </div>
                                <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            </div>
                        </div>
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                    <b>Full Name</b> <a class="float-right">{{ $profiles->first_name.' '. $profiles->middle_name.' '. $profiles->last_name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Username</b> <a class="float-right">{{ $profiles->user->name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $profiles->user->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Title</b> <a class="float-right">{{ $profiles->title }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Designation</b> <a class="float-right">{{ $profiles->designation }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Gender</b> <a class="float-right">{{ $profiles->gender }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Region</b> <a class="float-right">{{ $profiles->region }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Birthday</b> <a class="float-right">{{ $profiles->birthday }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>NID</b> <a class="float-right">{{ $profiles->nid }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Address1</b> <a class="float-right">{{ $profiles->address1 }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>Address2</b> <a class="float-right">{{ $profiles->address2 }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>City</b> <a class="float-right">{{ $profiles->city }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>{{ __('Country') }}</b> <a class="float-right">{{ $profiles->country }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>{{ __('ZIP') }}</b> <a class="float-right">{{ $profiles->zip }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>{{ __('Phone') }}</b> <a class="float-right">{{ $profiles->phone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>{{ __('Join') }}</b> <a title="{{ $profiles->user->created_at->format('d M Y') }}" class="float-right">{{ $profiles->user->created_at->diffForHumans() }}</a>
                                    </li>
                                    <li class="list-group-item">
                                    <b>{{ __('Status') }}</b> <a class="float-right"><input type="checkbox" name="status" value="1" @if ($profiles->status == 1)
                                        checked
                                    @endif data-bootstrap-switch data-off-color="danger" data-on-color="success" ></a>
                                    </li>
                                </ul>
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
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                          </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                              <!-- Post -->
                              <div class="post">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                  <span class="username">
                                    <a href="#">Jonathan Burke Jr.</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                  </span>
                                  <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                  Lorem ipsum represents a long-held tradition for designers,
                                  typographers and the like. Some people hate it and argue for
                                  its demise, but others ignore the hate as they create awesome
                                  tools to help create filler text for everyone from bacon lovers
                                  to Charlie Sheen fans.
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

                              <!-- Post -->
                              <div class="post clearfix">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                  <span class="username">
                                    <a href="#">Sarah Ross</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                  </span>
                                  <span class="description">Sent you a message - 3 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                  Lorem ipsum represents a long-held tradition for designers,
                                  typographers and the like. Some people hate it and argue for
                                  its demise, but others ignore the hate as they create awesome
                                  tools to help create filler text for everyone from bacon lovers
                                  to Charlie Sheen fans.
                                </p>

                                <form class="form-horizontal">
                                  <div class="input-group input-group-sm mb-0">
                                    <input class="form-control form-control-sm" placeholder="Response">
                                    <div class="input-group-append">
                                      <button type="submit" class="btn btn-danger">Send</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- /.post -->

                              <!-- Post -->
                              <div class="post">
                                <div class="user-block">
                                  <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                  <span class="username">
                                    <a href="#">Adam Jones</a>
                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                  </span>
                                  <span class="description">Posted 5 photos - 5 days ago</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="row mb-3">
                                  <div class="col-sm-6">
                                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-6">
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                        <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                      </div>
                                      <!-- /.col -->
                                      <div class="col-sm-6">
                                        <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                        <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                      </div>
                                      <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->

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
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                              <!-- The timeline -->
                              <div class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <div class="time-label">
                                  <span class="bg-danger">
                                    10 Feb. 2014
                                  </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-envelope bg-primary"></i>

                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                    <div class="timeline-body">
                                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                      quora plaxo ideeli hulu weebly balihoo...
                                    </div>
                                    <div class="timeline-footer">
                                      <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-user bg-info"></i>

                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                    </h3>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-comments bg-warning"></i>

                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                    <div class="timeline-body">
                                      Take me to your leader!
                                      Switzerland is small and neutral!
                                      We are more like Germany, ambitious and misunderstood!
                                    </div>
                                    <div class="timeline-footer">
                                      <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                    </div>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <div class="time-label">
                                  <span class="bg-success">
                                    3 Jan. 2014
                                  </span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                  <i class="fas fa-camera bg-purple"></i>

                                  <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                    <div class="timeline-body">
                                      <img src="http://placehold.it/150x100" alt="...">
                                      <img src="http://placehold.it/150x100" alt="...">
                                      <img src="http://placehold.it/150x100" alt="...">
                                      <img src="http://placehold.it/150x100" alt="...">
                                    </div>
                                  </div>
                                </div>
                                <!-- END timeline item -->
                                <div>
                                  <i class="far fa-clock bg-gray"></i>
                                </div>
                              </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="{{ route('UpdateProfile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" id="{{ $profiles->id }}" value="{{ $profiles->id }}">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">{{ __('Update Profile') }}</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body pad">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="first_name" class="col-sm-12 col-form-label">{{ __('First Name') }}</label>
                                                            <div class="col-sm-12">
                                                            <input type="text" name="first_name" class="form-control form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="{{ $profiles->first_name }}" value="{{ $profiles->first_name }}">
                                                            @error('first_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="middle_name" class="col-sm-12 col-form-label">{{ __('Middle Name') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="middle_name" class="form-control form-control @error('middle_name') is-invalid @enderror" id="middle_name" placeholder="{{ $profiles->middle_name }}" value="{{ $profiles->middle_name }}">
                                                        @error('middle_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="last_name" class="col-sm-12 col-form-label">{{ __('Last Name') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="last_name" class="form-control form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="{{ $profiles->last_name }}" value="{{ $profiles->last_name }}">
                                                        @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="name" class="col-sm-12 col-form-label">{{ __('Username') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="name" class="form-control form-control @error('name') is-invalid @enderror" id="name" value="{{ $users->name }}" placeholder="{{ $users->name }}">
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="email" class="col-sm-12 col-form-label">{{ __('Email') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="email" name="email" class="form-control form-control @error('email') is-invalid @enderror" id="email" value="{{ $users->email }}" placeholder="{{ $users->email }}">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="title" class="col-sm-12 col-form-label">{{ __('Title') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="title" class="form-control form-control @error('title') is-invalid @enderror" id="title" placeholder="{{ $profiles->title }}" value="{{ $profiles->title }}">
                                                        @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="designation" class="col-sm-12 col-form-label">{{ __('Designation') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="designation" class="form-control form-control @error('designation') is-invalid @enderror" id="designation" placeholder="{{ $profiles->designation }}" value="{{ $profiles->designation }}">
                                                        @error('designation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="region" class="col-sm-12 col-form-label">{{ __('Region') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="region" class="form-control form-control @error('region') is-invalid @enderror" id="region" placeholder="{{ $profiles->region }}" value="{{ $profiles->region }}">
                                                        @error('region')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-sm-12 col-form-label">Gender</label>
                                                        <div class="col-sm-12">
                                                            <select name="gender" class="form-control select2">
                                                                <option @if ($profiles->gender == 'Male')
                                                                    selected
                                                                @endif value="Male">Male</option>
                                                                <option @if ($profiles->gender == 'Female')
                                                                    selected
                                                                @endif value="Female">Female</option>
                                                                <option @if ($profiles->gender == 'Other')
                                                                    selected
                                                                @endif value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="nid" class="col-sm-12 col-form-label">{{ __('NID') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="nid" class="form-control form-control @error('nid') is-invalid @enderror" id="nid" placeholder="{{ $profiles->nid }}" value="{{ $profiles->nid }}">
                                                        @error('nid')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="birthday" class="col-sm-12 col-form-label">{{ __('Date Of Birth') }}</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" name="birthday" id="birthday" class="form-control @error('birthday') is-invalid @enderror" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false">
                                                            @error('birthday')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="address1" class="col-sm-12 col-form-label">{{ __('Address 1') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="address1" class="form-control form-control @error('address1') is-invalid @enderror" id="address1" placeholder="{{ $profiles->address1 }}" value="{{ $profiles->address1 }}">
                                                        @error('address1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="address2" class="col-sm-12 col-form-label">{{ __('Address 2') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="address2" class="form-control form-control @error('address2') is-invalid @enderror" id="address2" placeholder="{{ $profiles->address2 }}" value="{{ $profiles->address2 }}">
                                                        @error('address2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="city" class="col-sm-12 col-form-label">{{ __('City') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="city" class="form-control form-control @error('city') is-invalid @enderror" id="city" placeholder="{{ $profiles->city }}" value="{{ $profiles->city }}">
                                                        @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="state" class="col-sm-12 col-form-label">{{ __('State') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="state" class="form-control form-control @error('state') is-invalid @enderror" id="state" placeholder="{{ $profiles->state }}" value="{{ $profiles->state }}">
                                                        @error('state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="zip" class="col-sm-12 col-form-label">{{ __('ZIP') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="zip" class="form-control form-control @error('zip') is-invalid @enderror" id="zip" placeholder="{{ $profiles->zip }}" value="{{ $profiles->zip }}">
                                                        @error('zip')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="country" class="col-sm-12 col-form-label">{{ __('Country') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="country" class="form-control form-control @error('country') is-invalid @enderror" id="country" placeholder="{{ $profiles->country }}" value="{{ $profiles->country }}">
                                                        @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="phone" class="col-sm-12 col-form-label">{{ __('Phone') }}</label>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="phone" class="form-control form-control @error('phone') is-invalid @enderror" id="phone" placeholder="{{ $profiles->phone }}" value="{{ $profiles->phone }}">
                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="status" class="col-md-12 col-form-label">{{ __('Status') }}</label>
                                                        <div class="col-md-12">
                                                            <input type="checkbox" name="status" value="1" @if ($profiles->status == 1)
                                                                checked
                                                            @endif data-bootstrap-switch data-off-color="danger" data-on-color="success" >
                                                        </div>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="about" class="col-sm-12 col-form-label">{{ __('About') }}</label>
                                                        <div class="col-sm-12">
                                                            <textarea class="form-control my-editor form-control-lg @error('about') is-invalid @enderror" name="about" id="my-editor" placeholder="{{ $profiles->about }}"
                                                            style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $profiles->about }}</textarea>
                                                        @error('about')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <!-- Horizontal Form -->
                                            <div class="card card-default">
                                            <div class="card-header">
                                                <h3 class="card-title">Other Options</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                                <div class="card-body">
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
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="">Upload</span>
                                                            </div>
                                                        </div>
                                                        <img class="img-thumbnail" id="photos"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cover">{{ __('Cover Photo') }}</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="cover" class="form-control custom-file-input @error('coverError') is-invalid @enderror" id="cover" onchange="coversFile(event)">
                                                                <label class="custom-file-label" for="cover">Choose file</label>
                                                            </div>
                                                            @error('coverError')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            <div class="input-group-append">
                                                                <span class="input-group-text" id="">Upload</span>
                                                            </div>
                                                        </div>
                                                        <img class="img-thumbnail" id="covers"/>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="summary" class="col-sm-12 col-form-label">{{ __('Summary') }}</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control form-control-lg @error('summary') is-invalid @enderror" name="summary" id="my-editor" placeholder="{{ $profiles->summary }}"
                                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $profiles->summary }}</textarea>
                                                            @error('summary')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="description" class="col-sm-12 col-form-label">{{ __('Description') }}</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control form-control-lg @error('description') is-invalid @enderror" name="description" id="my-editor" placeholder="{{ $profiles->description }}"
                                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $profiles->description }}</textarea>
                                                            @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
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
                @endif


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
<script>
    var coversFile = function(event) {
        var covers = document.getElementById('covers');
        covers.src = URL.createObjectURL(event.target.files[0]);
        covers.onload = function() {
          URL.CoversrevokeObjectURL(covers.src) // free memory
        }
      };
</script>

{{--  Image upload preview  --}}
@endsection
