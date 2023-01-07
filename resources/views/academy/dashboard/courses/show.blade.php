@extends('academy.template.master')

@section('title')
{{ $course->title }}
@endsection

@section('page-title')
{{-- <div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Dashboard</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                    <li class="breadcrumb-item active">

                        Dashboard

                    </li>

                </ol>

            </div>
        </div>
    </div>
  </div> --}}
@endsection

@section('css')
<!-- Quill Theme -->
<link type="text/css"
href="{{ URL::asset('assets/css/quill.css') }}"
rel="stylesheet">

<!-- Select2 -->
<link type="text/css"
href="{{ URL::asset('assets/vendor/select2/select2.min.css') }}"
rel="stylesheet">
<link type="text/css"
href="{{ URL::asset('assets/css/select2.css') }}"
rel="stylesheet">

<!-- Flatpickr -->
<link type="text/css"
href="{{ URL::asset('assets/css/flatpickr.css') }}"
rel="stylesheet">
<link type="text/css"
href="{{ URL::asset('assets/css/flatpickr-airbnb.css') }}"
rel="stylesheet">

<!-- DateRangePicker -->
<link type="text/css"
href="{{ URL::asset('assets/vendor/daterangepicker.css') }}"
rel="stylesheet">
@endsection

@section('content')
<div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
    <div class="mdk-drawer-layout__content page-content">
        <!-- البطاقة التعريفية -->
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
                                        <a href="pricing.html"
                                        class="btn btn-white">Start your free trial</a>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>

        <!-- معلومات الكورس -->
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

        <!-- جدول المحتويات -->
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
                                <div class="accordion__item open">
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
                                                href="{{ route('lessons.show', $lesson->id) }}">{{ $lesson->title }}</a>
                                            <span class="text-muted">
                                                <div class="dropdown">
                                                    <a href="#"
                                                    data-toggle="dropdown"
                                                    data-caret="false"
                                                    class="text-muted"><i class="material-icons">more_horiz</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if ($lesson->status == 0)
                                                        <form action="{{ route('lesson.status') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="true">
                                                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                                            <button type="submit" class="dropdown-item text-secondary">تفعيل</button>
                                                        </form>
                                                        @endif
                                                        <a href="{{ route('lessons.edit', $lesson->id) }}"
                                                            class="dropdown-item">تعديل</a>
                                                        <div class="dropdown-divider"></div>
                                                        <form action="{{ route('lessons.delete', $lesson->id) }}" method="POST" id="delete">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                            class="dropdown-item text-danger">
                                                                حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                        @endforeach

                                        <div class="btn-group">
                                            <button type="button"
                                                    class="btn btn-sm btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">العمليات</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('sections.edit', $section->id) }}">تعديل</a>
                                                <form action="{{ route('sections.delete', $section->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item text-danger" type="submit">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <a href="{{ route('sections.create', $course->id) }}" type="button"
                                    class="btn btn-outline-secondary btn-rounded">إضافة فصل</a>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="page-section bg-white border-bottom-2">

            <div class="container page__container">
                <div class="row ">
                    <div class="col-md-7">
                        <div class="page-separator">
                            <div class="page-separator__text">About this course</div>
                        </div>
                        <p class="text-70">This course will teach you the fundamentals o*f working with Angular 2. You *will learn everything you need to know to create complete applications including: components, services, directives, pipes, routing, HTTP, and even testing.</p>
                        <p class="text-70 mb-0">This course will teach you the fundamentals o*f working with Angular 2. You *will learn everything you need to know to create complete applications including: components, services, directives, pipes, routing, HTTP, and even testing.</p>
                    </div>
                    <div class="col-md-5">
                        <div class="page-separator">
                            <div class="page-separator__text bg-white">What you’ll learn</div>
                        </div>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center">
                                <span class="material-icons text-50 mr-8pt">check</span>
                                <span class="text-70">Fundamentals of working with Angular</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="material-icons text-50 mr-8pt">check</span>
                                <span class="text-70">Create complete Angular applications</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="material-icons text-50 mr-8pt">check</span>
                                <span class="text-70">Working with the Angular CLI</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="material-icons text-50 mr-8pt">check</span>
                                <span class="text-70">Understanding Dependency Injection</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <span class="material-icons text-50 mr-8pt">check</span>
                                <span class="text-70">Testing with Angular</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="page-section bg-white border-bottom-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mb-24pt mb-md-0">
                        <h4>About the author</h4>
                        <p class="text-70 mb-24pt">Eddie Bryan is a software developer at LearnD*ash. With more than 20 years o*f software development experience, he has gained a passion for Agile software development -- especially Lean.</p>

                        <div class="page-separator">
                            <div class="page-separator__text bg-white">More from the author</div>
                        </div>

                        <div class="card card-sm mb-8pt">
                            <div class="card-body d-flex align-items-center">
                                <a href="course.html"
                                    class="avatar avatar-4by3 mr-12pt">
                                    <img src="public/images/paths/angular_routing_200x168.png"
                                            alt="Angular Routing In-Depth"
                                            class="avatar-img rounded">
                                </a>
                                <div class="flex">
                                    <a class="card-title mb-4pt"
                                        href="course.html">Angular Routing In-Depth</a>
                                    <div class="d-flex align-items-center">
                                        <div class="rating mr-8pt">

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star_border</span></span>

                                            <span class="rating__item"><span class="material-icons">star_border</span></span>

                                        </div>
                                        <small class="text-muted">3/5</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-sm mb-16pt">
                            <div class="card-body d-flex align-items-center">
                                <a href="course.html"
                                    class="avatar avatar-4by3 mr-12pt">
                                    <img src="public/images/paths/angular_testing_200x168.png"
                                            alt="Angular Unit Testing"
                                            class="avatar-img rounded">
                                </a>
                                <div class="flex">
                                    <a class="card-title mb-4pt"
                                        href="course.html">Angular Unit Testing</a>
                                    <div class="d-flex align-items-center">
                                        <div class="rating mr-8pt">

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star_border</span></span>

                                        </div>
                                        <small class="text-muted">4/5</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0">
                                <a href=""
                                    class="card-title mb-4pt">Angular Best Practices</a>
                                <p class="lh-1 mb-0">
                                    <small class="text-muted mr-8pt">6h 40m</small>
                                    <small class="text-muted mr-8pt">13,876 Views</small>
                                    <small class="text-muted">13 May 2018</small>
                                </p>
                            </div>
                            <div class="list-group-item px-0">
                                <a href=""
                                    class="card-title mb-4pt">Unit Testing in Angular</a>
                                <p class="lh-1 mb-0">
                                    <small class="text-muted mr-8pt">6h 40m</small>
                                    <small class="text-muted mr-8pt">13,876 Views</small>
                                    <small class="text-muted">13 May 2018</small>
                                </p>
                            </div>
                            <div class="list-group-item px-0">
                                <a href=""
                                    class="card-title mb-4pt">Migrating Applications from AngularJS to Angular</a>
                                <p class="lh-1 mb-0">
                                    <small class="text-muted mr-8pt">6h 40m</small>
                                    <small class="text-muted mr-8pt">13,876 Views</small>
                                    <small class="text-muted">13 May 2018</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 pt-sm-32pt pt-md-0 d-flex flex-column align-items-center justify-content-start">
                        <div class="text-center">
                            <p class="mb-16pt">
                                <img src="../../public/images/people/110/guy-6.jpg"
                                        alt="guy-6"
                                        class="rounded-circle"
                                        width="64">
                            </p>
                            <h4 class="m-0">Eddie Bryan</h4>
                            <p class="lh-1">
                                <small class="text-muted">Angular, Web Development</small>
                            </p>
                            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                                <a href="teacher-profile.html"
                                    class="btn btn-outline-primary mb-16pt mb-sm-0 mr-sm-16pt">Follow</a>
                                <a href="teacher-profile.html"
                                    class="btn btn-outline-secondary">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Perfect Scrollbar -->
<script src="{{ URL::asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ URL::asset('assets/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ URL::asset('assets/vendor/material-design-kit.js') }}"></script>

<!-- App JS -->
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

<!-- Preloader -->
<script src="{{ URL::asset('assets/js/preloader.js') }}"></script>

<!-- Quill -->
<script src="{{ URL::asset('assets/vendor/quill.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/quill.js') }}"></script>

<!-- Flatpickr -->
<script src="{{ URL::asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/flatpickr.js') }}"></script>

<!-- DateRangePicker -->
<script src="{{ URL::asset('assets/vendor/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/daterangepicker.js') }}"></script>

<!-- Select2 -->
<script src="{{ URL::asset('assets/vendor/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.js') }}"></script>


@endsection
