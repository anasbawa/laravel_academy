@extends('admin.template.master')

@section('title')
الإدارة | التصنيفات
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text">عرض الكل</div>
        </div>
        <div class="row align-items-center mb-8pt">
            @foreach ($categories as $category )


            <div class="col-sm-6 col-md-4 col-xl-3">

                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay mdk-reveal js-mdk-reveal "
                     data-partial-height="44"
                     data-toggle="popover"
                     data-trigger="click">

                    <a href=""
                       class="js-image"
                       data-position="">
                        <img src="public/images/paths/sketch_430x168.png"
                             alt="course">
                        <span class="overlay__content align-items-start justify-content-start">
                            <span class="overlay__action card-body d-flex align-items-center">
                                <i class="material-icons mr-4pt">play_circle_outline</i>
                                <span class="card-title text-white">Preview</span>
                            </span>
                        </span>
                    </a>

                    <div class="mdk-reveal__content">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title"
                                       href="">{{ $category->title }}</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>


            </div>

            @endforeach

        </div>
    </div>
</div>

@endsection

@section('js')

@endsection

