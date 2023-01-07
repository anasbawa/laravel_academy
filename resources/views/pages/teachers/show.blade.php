@extends('template.master')

@section('title')
أكاديميتي | {{ $instructor->first_name }} {{ $instructor->last_name }}
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <!-- بطاقة التعريف -->
    <div class="page-section bg-primary">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="{{ URL::asset('images/instructors/' . $instructor->photo) }}"
                 width="104"
                 class="mr-md-32pt mb-32pt mb-md-0"
                 alt="instructor">
            <div class="flex mb-32pt mb-md-0">
                <h2 class="text-white mb-0">{{ $instructor->first_name }} {{ $instructor->last_name }}</h2>
                <p class="lead text-white-50 d-flex align-items-center"> مدرس <span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt"></i> {{ $instructor->academy->name }}</span></p>
            </div>


        </div>
    </div>

    <!-- عرض الكورسات -->
    <div class="container page__container page-section">
        <div class="mb-lg-8pt">
            <div class="position-relative carousel-card">
                <div class="js-mdk-carousel row d-block"
                    id="carousel-courses1">
                    <div class="mdk-carousel__content">
                        @foreach ($instructor->courses as $course )

                            <div class="col-sm-6 col-md-4">
                                <div class="card posts-card-popular">
                                    <img src="{{ URL::asset('images/courses/'. $course->photo) }}"
                                            alt=""
                                            class="card-img">
                                    <div class="posts-card-popular__content">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="avatar-group flex">
                                                <div class="avatar avatar-xs"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="{{ $course->instructor->first_name }}">
                                                    <a href=""><img src="{{ URL::asset('images/instructors/' . $course->instructor->photo) }}"
                                                                alt="Avatar"
                                                                class="avatar-img rounded-circle"></a>
                                                </div>
                                            </div>
                                            <a style="text-decoration: none;"
                                                class="d-flex align-items-center"
                                                href=""><i class="material-icons mr-1"
                                                    style="font-size: inherit;">remove_red_eye</i> <small></small></a>
                                        </div>
                                        <div class="posts-card-popular__title card-body">
                                            <small class="text-muted text-uppercase">{{ $course->path->name }}</small>
                                            <h4 class="card-title m-0"><a href="">{{ $course->title }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection

