@extends('student.template.master')

@section('title')
المسارات | {{ $path->name }}
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="container page__container page-section">

        <div class="page-separator">
            <div class="page-separator__text">{{ $path->name }}</div>
        </div>

        <div class="row card-group-row mb-lg-8pt">

            @foreach ( $courses as $course )
            <div class="col-sm-4 card-group-row__col">

                <div class="card overlay--show card-lg overlay--primary-dodger-blue stack stack--1 card-group-row__card">

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <div class="flex">
                                <div class="d-flex align-items-center">
                                    <div class="rounded mr-12pt z-0 o-hidden">
                                        <div class="overlay">
                                            <img src="{{ URL::asset('images/courses/'. $course->photo) }}"
                                                 width="40"
                                                 height="40"
                                                 alt="Angular"
                                                 class="rounded">
                                            {{-- <span class="overlay__content overlay__content-transparent">
                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                    <small class="h6 small text-white mb-0"
                                                           style="font-weight: 500;">80%</small>
                                                </span>
                                            </span> --}}
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title">{{ $course->title }}</div>
                                        <p class="flex text-50 lh-1 mb-0"><small> عدد الأقسام: {{ $course->sections()->count() }} </small></p>
                                    </div>
                                </div>
                            </div>



                        </div>



                        <p class="mt-16pt text-70 flex">{{ $course->description }}</p>

                        <div class="mb-16pt d-none">
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Fundamentals of working with Angular</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Create complete Angular applications</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Working with the Angular CLI</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Understanding Dependency Injection</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-8pt">check</span>
                                <p class="flex text-50 lh-1 mb-0"><small>Testing with Angular</small></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                            <div class="d-flex align-items-center mr-8pt">
                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                <p class="flex text-50 lh-1 mb-0"><small>300 دقيقة متبقية</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                <p class="flex text-50 lh-1 mb-0"><small>{{ $course->lessons()->count() }}</small></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center">
                            <a href="{{ route('student.course.show', $course->id) }}"
                               class="btn btn-primary">استئناف</a>
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

