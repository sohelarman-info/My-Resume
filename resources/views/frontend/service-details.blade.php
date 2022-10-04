@extends('frontend.master')
@section('title', $service->title)
  @section('frontend')
  <main id="main">

    <!-- ======= Portfolio Details ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8">
            <h2 class="portfolio-title">{{ $service->title }}</h2><hr>
            <p>{!! $service->post !!}</p>
          </div>
          <div class="col-lg-4 portfolio-info">
            <div class="icon m-b-10 text-center">
                <a href="{{ route('Homepage') }}"><span class="iclass"><i class="{{ $service->icon }}"></i></span></a>
            </div>
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
                    transition: 0.3s;
                    display: inline-block;
                }
                .summary{
                    margin-top: 20px;
                }
            </style>
            <div class="summary">
                <p>
                    {!! $service->summary !!}
                </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Portfolio Details -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/601ee5b3a9a34e36b9748130/1etsb2hh7';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
  @endsection
