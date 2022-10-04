@extends('frontend.master')
@section('ogurl') {{ $ppost->slug }} @endsection
@section('ogtitle') {{ $ppost->title }} @endsection
@section('ogdes') {{ $ppost->client }} @endsection
@section('ogimg') @foreach ($ppost->ppost_images as $pimage)
                        <img src="{{ asset('portfolio/images/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$pimage->images) }}" class="img-fluid" alt="{{ $pimage->images }}">
                @endforeach @endsection
  @section('frontend')
  <main id="main">

    <!-- ======= Portfolio Details ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8">
            <h2 class="portfolio-title">{{ $ppost->title }}</h2>
            <div class="owl-carousel portfolio-details-carousel">
                @if ($ppost->ppost_images->count() == 0)
                <img src="{{ asset('img/images/no-images.png') }}" alt="No Image">
                @else
                @foreach ($ppost->ppost_images as $pimage)
                        <img src="{{ asset('portfolio/images/'.$ppost->created_at->format('Y/m/').$ppost->id.'/'.$pimage->images) }}" class="img-fluid" alt="{{ $pimage->images }}">
                @endforeach
                @endif
            </div>
          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: {{ $ppost->pcat->name }}</li>
              <li><strong>Client</strong>: {{ $ppost->client }}</li>
              <li><strong>Project date</strong>: {{ $ppost->created_at->format('d M, Y') }}</li>
              <li><strong>Project URL</strong>: <a href="{{ $ppost->link }}">{{ $ppost->link }}</a></li>
            </ul>

            <p>
              {!! $ppost->post !!}
            </p>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details -->

  </main><!-- End #main -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  @endsection
