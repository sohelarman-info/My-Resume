@extends('admin.master')
@section('dashboard_menu_open','menu-open')
@section('dashboard_active','active')
@section('content')
<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Counter boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3>150</h3>
							<p>My Questions</p>
						</div>
						<div class="icon">
							<i class="fa fa-question"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3>53</h3>

							<p>My Answer</p>
						</div>
						<div class="icon">
							<i class="fa fa-comments"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3>44</h3>
							<p>Friends</p>
						</div>
						<div class="icon">
							<i class="fa fa-users"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3>65</h3>
							<p>Activity</p>
						</div>
						<div class="icon">
							<i class="fa fa-eye"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
                @foreach($abouts as $about)
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                @if ($about->thumbnail == '')
                                <img src="{{ asset('admin/dist/img/avatar.png') }}" alt="Avatar">
                                @else
                                <img width="100%" src="{{ asset('about-section/photos/'.$about->created_at->format('Y/m/').$about->id.'/'.$about->thumbnail) }}" alt="Avatar">
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p>{!! $about->description !!}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                @endforeach
		</div>
	</section>
@endsection
