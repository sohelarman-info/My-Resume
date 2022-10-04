@extends('frontend.master')
@section('title', 'Sohel Arman')
@section('ogtitle') {{ __('Sohel Arman | Professional Web Developer') }} @endsection
@section('ogimg')
@foreach($abouts as $about)
{{ asset('about-section/photos/'. $about->created_at->format('Y/m/').$about->id .'/'.$about->thumbnail) }}
@endforeach @endsection
@section('ogdes') {{ __('You can see my resume here. You can easily contact me if you need, My work skills and my qualifications are beautifully documented here') }} @endsection
@section('frontend')
<!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#about"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li><a href="#portfolio"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
          <li><a href="#services"><i class="bx bx-server"></i> <span>Services</span></a></li>
          <li><a href="#testimonials"><i class="far fa-edit"></i> <span>Testimonials</span></a></li>
          <li><a href="#contact"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
            @if (Route::has('login'))
                @auth
                @role('admin') <li><a href="{{ route('home') }}"><i class='bx bx-category-alt'></i> <span>Dashboard</span></a></li> @endrole
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> <span>Sign Out</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li><a href="{{ route('login') }}"><i class="bx bx-lock"></i> <span>Login</span></a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}"><i class="bx bx-user"></i> <span>Register</span></a></li>
                @endif
                @endauth
            @endif

        </ul>
      </nav><!-- .nav-menu -->

    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    @foreach($homes as $home)
    <style>
        #hero{
            background: url({{ asset('about-section/thumbnail/'. $home->created_at->format('Y/m/').$home->id .'/'.$home->thumbnail) }}) top right no-repeat; background-size: auto;
        }
    </style>
    <section id="hero" class="d-flex flex-column justify-content-center">
      <div class="container" data-aos="zoom-in" data-aos-delay="100">
        <h1 style="text-transform: uppercase; color: {{ $home->title_color }}">{{ $home->title }}</h1>
        <p>{{ $home->tagline }} <span style="color: {{ $home->designation_color }}" class="typed" data-typed-items="{{ $home->title }}, {{ $home->designation }}"></span></p>
        <a href="{{ $home->site_url }}">{{ $home->site_name }}</a>
        <div class="social-links">
            @foreach ($socials as $social)
            <a href="{{ $social->social_link }}" class="twitter"><i class="{{ $social->social_icon }}"></i></a>
            @endforeach
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ session('success') }}
        </div>
        @endif
      </div>
    </section><!-- End Hero -->
    @endforeach

    <main id="main">

      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            @foreach ($abouts as $about)

          <div class="section-title">
            <h2>{{ $about->icon_name }}</h2>
            <p>{{ $about->about }}</p>
          </div>

              <h3 class="text-center">{{ $about->title }}</h3>
          <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid"  src="{{ asset('about-section/photos/'. $about->created_at->format('Y/m/').$about->id .'/'.$about->thumbnail) }}" alt="{{ $about->thumbnail }}">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <p class="font-italic">
                {{ $about->summary }}
              </p>
              <div class="row">
                <div class="col-lg-6">
                  @can('subscriber')
                  <ul>
                    <li><i class="icofont-rounded-right"></i> <strong>Birthday:</strong> 17 January 1999</li>
                    <li><i class="icofont-rounded-right"></i> <strong>Website:</strong> www.sohelarman.info</li>
                    <li><i class="icofont-rounded-right"></i> <strong>Phone:</strong> +09638801928</li>
                    <li><i class="icofont-rounded-right"></i> <strong>City:</strong> Gazipur, Dhaka, Bangladesh</li>
                  </ul>
                  @endcan
                </div>
                <div class="col-lg-6">
                  @can('Subscriber')
                  <ul>
                    <li><i class="icofont-rounded-right"></i> <strong>Age:</strong>
                        @php
                            $bday   = new DateTime('17.1.1999'); // Your date of birth
                            $today  = new Datetime(date('m.d.y'));
                            $diff   = $today->diff($bday);
                            printf('%d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
                            printf("\n");
                        @endphp
                    </li>
                    <li><i class="icofont-rounded-right"></i> <strong>Degree:</strong> BSS</li>
                    <li><i class="icofont-rounded-right"></i> <strong>Email:</strong> mail@sohelarman.info</li>
                    <li><i class="icofont-rounded-right"></i> <strong>Freelance:</strong> Available</li>
                  </ul>
                  @endcan
                </div>
              </div>
              <p>
                {!! $about->description !!}
              </p>
            </div>
          </div>
            @endforeach

        </div>
      </section><!-- End About Section -->

      <!-- ======= Facts Section ======= -->
      <section id="facts" class="facts">
        @foreach ($facts as $fact)
        <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>{{ $fact->title }}</h2>
              <p>{!! $fact->fact !!}</p>
            </div>

            <div class="row">

              <div class="col-lg-3 col-md-6">
                <div class="count-box">
                  <i class="icofont-simple-smile"></i>
                  <span data-toggle="counter-up">{{ $fact->client }}</span>
                  <p>Happy Clients</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div class="count-box">
                  <i class="icofont-document-folder"></i>
                  <span data-toggle="counter-up">{{ $fact->project }}</span>
                  <p>Projects</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                  <i class="icofont-live-support"></i>
                  <span data-toggle="counter-up">
                    @php
                        $bday   = new DateTime($fact->support); // Your date of birth
                        $today  = new Datetime(date('m.d.y'));
                        $diff   = $today->diff($bday);
                        printf('%d', $diff->y * 365 + ($diff->m * 60)+$diff->d, ($diff->m * 60)+$diff->d, $diff->d);
                        printf("\n");
                    @endphp
                  </span>
                  <p>Hours Of Support</p>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                  <i class="icofont-users-alt-5"></i>
                  <span data-toggle="counter-up">{{ $fact->worker }}</span>
                  <p>Hard Workers</p>
                </div>
              </div>

            </div>

          </div>
        @endforeach
      </section><!-- End Facts Section -->

      <!-- ======= Skills Section ======= -->
      @foreach ($skills as $skill)
      <section id="skills" class="skills section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{ $skill->title }}</h2>
            <p>{!! $skill->skill !!}</p>
          </div>

          <div class="row skills-content">

            <div class="col-lg-6">

              <div class="progress">
                <span class="skill">{{ __('HTML ') }}<i class="val">{{ $skill->html }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->html }}" aria-valuemin="0" aria-valuemax="{{ $skill->html }}"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">{{ __('CSS') }} <i class="val">{{ $skill->css }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->css }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">{{ __('BOOTSTRAP') }} <i class="val">{{ $skill->bootstrap }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->bootstrap }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">{{ __('javascript') }} <i class="val">{{ $skill->javascript }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->javascript }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">{{ __('jquery') }} <i class="val">{{ $skill->jquery }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->jquery }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>

            <div class="col-lg-6">

              <div class="progress">
                <span class="skill">{{ __('php') }} <i class="val">{{ $skill->php }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->php }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">{{ __('laravel') }} <i class="val">{{ $skill->laravel }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->laravel }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">{{ __('wordpress/cms') }} <i class="val">{{ $skill->wordpress }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->wordpress }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">{{ __('photoshop') }} <i class="val">{{ $skill->photoshop }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->photoshop }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">{{ __('editing') }} <i class="val">{{ $skill->editing }}%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->editing }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>

          </div>

        </div>
      </section>
      @endforeach
      <!-- End Skills Section -->

      <!-- ======= Resume Section ======= -->
      @foreach ($resumes as $resume)
      <section id="resume" class="resume">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{ $resume->title }}</h2>
            <p>{!! $resume->resume !!}</p>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <h3 class="resume-title">{{ __('Summary') }}</h3>
              @foreach ($summaries as $summary)
              <div class="resume-item pb-0">
                <h4>{{ $summary->title }}</h4>
                <p><em>{!! $summary->summary !!}</em></p>
              </div>
              @endforeach

              <h3 class="resume-title">Education</h3>
              @foreach ($educations as $education)
              <div class="resume-item">
                <h4>{{ $education->title }}</h4>
                <h5>{{ substr($education->start, -4) }} - @if ($education->end == '') Present @else {{ substr($education->end, -4) }} @endif</h5>
                <p><em>{{ $education->name }}</em></p>
                <p>{!! $education->description !!}</p>
              </div>
              @endforeach
            </div>
            <div class="col-lg-6">
              <h3 class="resume-title">{{ __('Professional Experience') }}</h3>
              @foreach ($professions as $profession)
              <div class="resume-item">
                <h4>{{ $profession->title }}</h4>
                <h5>{{ substr($profession->start, -4) }} - @if ($profession->end == '') Present @else {{ substr($profession->end, -4) }} @endif</h5>
                <p><em>{{ $profession->name }}</em></p>
                <p>{!! $profession->description !!}</p>
              </div>
              @endforeach
            </div>
          </div>

        </div>
      </section>
      @endforeach
      <!-- End Resume Section -->

      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Portfolio</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                @foreach ($pcats as $pcat)
                <li data-filter=".filter-{{ $pcat->name }}">{{ $pcat->name }}</li>
                @endforeach
              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($pposts as $ppost)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $ppost->pcat->name }}">
                <div class="portfolio-wrap">
                  <img src="{{ asset('portfolio/thumbnail/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$ppost->thumbnail) }}" class="img-fluid" alt="{{ $ppost->title }}">
                  <div class="portfolio-info">
                    <h4>{{ $ppost->title }}</h4>
                    <p>{{ $ppost->summary }}</p>
                    <div class="portfolio-links">
                      <a href="{{ asset('portfolio/thumbnail/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$ppost->thumbnail) }}" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                      <a href="{{ route('PortfolioDetails', $ppost->slug) }}" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

        </div>
      </section><!-- End Portfolio Section -->

      <!-- ======= Services Section ======= -->
      @foreach ($service_main as $ser)
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>{{ $ser->title }}</h2>
            <p>{!! $ser->service !!}</p>
          </div>

            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-red">
                        <div class="icon">
                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                        </svg>
                        <i class="{{ $service->icon }}"></i>
                        </div>
                        <h4><a href="{{ route('ServiceDetails', $service->slug) }}">{{ $service->title }}</a></h4>
                        <p>{{ $service->summary }}</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
      </section>
      @endforeach
      <!-- End Services Section -->

      <!-- ======= Testimonials Section ======= -->
      @if ($testimonials->count() == 0)
          @else
          <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>{{ __('Testimonials') }}</h2>
              </div>

              <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">
                  @foreach ($testimonials as $testimonial)
                  <div class="testimonial-item">
                    <img src="@if($testimonial->photo == '')
                    {{ asset('/dist/img/user1-128x128.jpg') }}
                    @else
                    {{ asset('/testimonial/photo/'.$testimonial->created_at->format('Y/m/').$testimonial->id.'/'.$testimonial->photo) }}
                    @endif" class="testimonial-img" alt="{{ $testimonial->photo }}">
                    <h3>{{ $testimonial->name }}</h3>
                    <h4>{{ $testimonial->title }}</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                        {{ $testimonial->quote }}
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    </div>
                  @endforeach
              </div>

            </div>
          </section>
      @endif
      <!-- End Testimonials Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Contact</h2>
          </div>

          <div class="row mt-1">
            <div class="col-lg-12 mt-5 mt-lg-0">
                <form class="form-horizontal" action="{{ route('send') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-12 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-12">
                        <input type="text" name="name" class="form-control form-control @error('name') is-invalid @enderror" id="name" placeholder="Ex: John Due">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-12 col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-12">
                        <input type="text" name="email" class="form-control form-control @error('email') is-invalid @enderror" id="email" placeholder="example@email.com">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subject" class="col-sm-12 col-form-label">{{ __('Subject') }}</label>
                        <div class="col-sm-12">
                        <input type="text" name="subject" class="form-control form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Contact us">
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-sm-12 col-form-label">{{ __('Messages') }}</label>
                        <div class="col-sm-12">
                            <textarea class="form-control my-editor form-control-lg @error('message') is-invalid @enderror" name="message" placeholder="What's on your mind?"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary float-right"><i class="far fa-share-square"></i> {{ __('Send') }}</button>
                </form>
            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @if ($footers->count() == 0)
    <footer id="footer">
        <div class="container">
          <h3>Sohel Arman</h3>
          <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
          <div class="social-links">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div>
          <div class="copyright">
            &copy; Copyright <strong><span>Sohel Arman</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="https://sohelarman.info/">Sohel Arman</a>
          </div>
        </div>
      </footer>
      @else
      @foreach ($footers as $footer)
      <footer id="footer">
        <div class="container">
          <h3>{{ $footer->name }}</h3>
          <p>{{ $footer->summary }}</p>
          <div class="social-links">
            @foreach ($socials as $social)
            @if ($footer->id == $social->section_id)
            <a href="{{ $social->social_link }}" class=""><i class="{{ $social->social_icon }}"></i></a>
            @endif
            @endforeach
          </div>
          <div class="copyright">
            {!! $footer->copyright !!}
          </div>
        </div>
      </footer>
      @endforeach
    @endif
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>

    <!--Start of Tawk.to Script-->
    <!--<script type="text/javascript">-->
    <!--var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();-->
    <!--(function(){-->
    <!--var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];-->
    <!--s1.async=true;-->
    <!--s1.src='https://embed.tawk.to/601ee5b3a9a34e36b9748130/1etsb2hh7';-->
    <!--s1.charset='UTF-8';-->
    <!--s1.setAttribute('crossorigin','*');-->
    <!--s0.parentNode.insertBefore(s1,s0);-->
    <!--})();-->
    <!--</script>-->
    <!--End of Tawk.to Script-->
@endsection
