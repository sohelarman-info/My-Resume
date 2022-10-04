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
                <div class="card card-outline card-primary">
                    <div class="card-header">
                    <h3 class="card-title">{{ __('Testimonials') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                            <a href="{{ route('TestimonialAdd') }}" class="btn-sm btn-success"><i class="fas fa-plus"></i></button></a>
                        </div>
                    </div>
                  <div class="card-body pb-0">
                    @if ($testimonials->count() == 0)
                        <p class="text-center">{{ __('You have no any testimonials') }}</p>
                        @else
                        <div class="row d-flex align-items-stretch">
                            @foreach ($testimonials as $testimonial)
                            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch">
                              <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                  {{ $testimonial->designation }}
                                </div>
                                <div class="card-body pt-0">
                                  <div class="row">
                                    <div class="col-7">
                                      <h2 class="lead"><b>{{ $testimonial->name }}</b></h2>
                                      <p class="text-muted text-sm"><b>{{ __('About:') }} </b> {{ $testimonial->about }} </p>
                                      <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{ __('Address:') }} {{ $testimonial->address }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> {{ __('Phone:') }} {{ $testimonial->phone }}</li>
                                      </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                      <img src="
                                      @if($testimonial->photo == '')
                                      {{ asset('/dist/img/user1-128x128.jpg') }}
                                      @else
                                      {{ asset('/testimonial/photo/'.$testimonial->created_at->format('Y/m/').$testimonial->id.'/'.$testimonial->photo) }}
                                      @endif
                                      " alt="{{ $testimonial->photo }}" class="img-circle img-fluid">
                                    </div>
                                  </div>
                                </div>
                                <div class="card-footer">
                                  <div class="text-right">
                                    @if ($testimonial->status == 1)
                                    <a href="{{ route('TestimonialView', $testimonial->slug) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> View
                                      </a>
                                      @else
                                      <a href="{{ route('TestimonialView', $testimonial->slug) }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye"></i> View
                                      </a>
                                    @endif
                                    <a href="{{ route('TestimonialDelete', $testimonial->slug) }}" class="btn btn-sm bg-danger">
                                        <i class="far fa-trash-alt"></i> Delete
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                    @endif
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                      <ul class="pagination justify-content-center m-0">
                        {{ $testimonials->links() }}
                      </ul>
                    </nav>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->

            </section>
    <!-- Main content End -->
@endsection
@section('footer_js')

@endsection
