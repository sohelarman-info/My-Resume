@extends('errors::minimal')

@section('title', __('403 | Forbidden'))
@section('code')
<section class="wrapper">

    <div class="container">

        <div id="scene" class="scene" data-hover-only="false">


            <div class="circle" data-depth="1.2"></div>

            <div class="one" data-depth="0.9">
                <div class="content">
                    <span class="piece"></span>
                    <span class="piece"></span>
                    <span class="piece"></span>
                </div>
            </div>

            <div class="two" data-depth="0.60">
                <div class="content">
                    <span class="piece"></span>
                    <span class="piece"></span>
                    <span class="piece"></span>
                </div>
            </div>

            <div class="three" data-depth="0.40">
                <div class="content">
                    <span class="piece"></span>
                    <span class="piece"></span>
                    <span class="piece"></span>
                </div>
            </div>

            <p class="p404" data-depth="0.50">403</p>
            <p class="p404" data-depth="0.10">403</p>

        </div>

        <div class="text">
            <article>
                <p>403 Forbidden. <br>Go back to the homepage if you dare!</p>
                <a href="{{ route('Homepage') }}"><button>i dare!</button></a>
            </article>
        </div>

    </div>
</section>
@endsection
