@extends('student.template.master')

@section('title')
أكاديميتي | {{ $course->title }}
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
    <div class="mdk-drawer-layout__content page-content">

        <div class="mdk-box bg-primary js-mdk-box mb-0"
        data-effects="blend-background">
        <div class="mdk-box__content">
            <div class="hero py-64pt text-center text-sm-left">
                <div class="container page__container">
                    <h1 class="text-white">{{ $course->title }}</h1>
                    <p class="lead text-white-50 measure-hero-lead">{{ $course->description }}</p>
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                        <a href="student-lesson.html"
                        class="btn btn-outline-white mb-16pt mb-sm-0 mr-sm-16pt">Watch trailer <i class="material-icons icon--right">play_circle_outline</i></a>
                        @if ($status && ($course->test->active == 1))
                            <a href="{{ route('student.test.show', $course->test->id) }}"
                            class="btn btn-white">الدخول للامتحان</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
</div>

<div class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
<div class="container page__container">
<ul class="nav navbar-nav flex align-items-sm-center">
    <li class="nav-item navbar-list__item">
        <div class="media align-items-center">
            <span class="media-left mr-16pt">
                <img src="{{ URL::asset('images/instructors'). '/' .$course->instructor->photo }}"
                        width="40"
                        alt="avatar"
                        class="rounded-circle">
            </span>
            <div class="media-body">
                <a class="card-title m-0"
                    href="teacher-profile.html">{{ $course->instructor->first_name }} {{ $course->instructor->last_name }}</a>
                <p class="text-50 lh-1 mb-0">المدرس</p>
            </div>
        </div>
    </li>
    <li class="nav-item navbar-list__item">
        <i class="material-icons text-muted icon--left">schedule</i>
        2h 46m
    </li>
    <li class="nav-item navbar-list__item">
        <i class="material-icons text-muted icon--left">assessment</i>
        {{ $course->level }}
    </li>
    <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
        <div class="rating rating-24">
            <div class="rating__item"><i class="material-icons">star</i></div>
            <div class="rating__item"><i class="material-icons">star</i></div>
            <div class="rating__item"><i class="material-icons">star</i></div>
            <div class="rating__item"><i class="material-icons">star</i></div>
            <div class="rating__item"><i class="material-icons">star_border</i></div>
        </div>
        <p class="lh-1 mb-0"><small class="text-muted">20 تقييم</small></p>
    </li>
</ul>
</div>
</div>

<div class="page-section border-bottom-2">
<div class="container page__container">

<div class="page-separator">
    <div class="page-separator__text">جدول المحتويات</div>
</div>

<div class="row mb-0">
    <div class="col-lg-7">

        <div class="accordion js-accordion accordion--boxed list-group-flush"
                id="parent">
                @foreach ($course->sections as $section )
                <div class="accordion__item">
                    <a href="#"
                        class="accordion__toggle"
                        data-toggle="collapse"
                        data-target="#section{{ $section->id }}"
                        data-parent="#parent">
                        <span class="flex">{{ $section->title }}</span>
                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                    </a>
                    <div class="accordion__menu collapse show"
                            id="section{{ $section->id }}">
                        @foreach ( $section->lessons as $lesson )
                            <div class="accordion__menu-link">
                            <span class="icon-holder icon-holder--small icon-holder--dark rounded-circle d-inline-flex icon--left">
                                <i class="material-icons icon-16pt">check_circle</i>
                            </span>
                            <a class="flex"
                                href="{{ route('student.lesson.show', $lesson->id) }}">{{ $lesson->title }}</a>

                        </div>
                        @endforeach


                    </div>
                </div>
                @endforeach



        </div>

    </div>
</div>
</div>
</div>


    </div>
</div>

@endsection

@section('js')

@endsection

