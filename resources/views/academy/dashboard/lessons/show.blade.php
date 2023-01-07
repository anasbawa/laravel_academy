@extends('academy.template.master')

@section('title')
{{ $lesson->title }}
@endsection

@section('page-title')

@endsection

@section('css')

@endsection

@section('content')
<div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
    <div class="mdk-drawer-layout__content page-content">
        <div class="navbar navbar-light border-0 navbar-expand-sm"
                     style="white-space: nowrap;">
                    <div class="container page__container flex-column flex-sm-row">
                        <nav class="nav navbar-nav">
                            <div class="nav-item py-16pt py-sm-0">
                                <div class="media flex-nowrap">
                                    <div class="media-left mr-16pt">
                                        <a href="student-take-course.html"><img src="{{ URL::asset('assets/images/icon/prototype.svg') }}"
                                                 width="40"
                                                 alt="Angular"
                                                 class="rounded"></a>
                                    </div>
                                    <div class="media-body d-flex flex-column">
                                        <a href="{{ route('courses.show', $lesson->course->id) }}"
                                           class="card-title">{{ $lesson->course->title }}</a>
                                        <div class="d-flex">
                                            {{-- <span class="text-50 small font-weight-bold mr-8pt">{{ $lesson->course->instructor->first_name }}</span> --}}
                                            <span class="text-50 small">{{ $lesson->section->title }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                        {{-- <ul class="nav navbar-nav ml-sm-auto align-items-center align-items-sm-end d-none d-lg-flex">
                            <li class="nav-item active ml-sm-16pt">
                                <a href=""
                                   class="nav-link">Video</a>
                            </li>
                            <li class="nav-item">
                                <a href=""
                                   class="nav-link">Downloads</a>
                            </li>
                            <li class="nav-item">
                                <a href=""
                                   class="nav-link">Notes</a>
                            </li>
                            <li class="nav-item">
                                <a href=""
                                   class="nav-link">Discussions</a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
        <div class="bg-primary pb-lg-64pt py-32pt">
            <div class="container page__container">
                {{-- <nav class="course-nav">
                    <a data-toggle="tooltip"
                    data-placement="bottom"
                    data-title="Getting Started with Angular: Introduction"
                    href=""><span class="material-icons">check_circle</span></a>
                    <a data-toggle="tooltip"
                    data-placement="bottom"
                    data-title="Getting Started with Angular: Introduction to TypeScript"
                    href=""><span class="material-icons text-primary">account_circle</span></a>
                    <a data-toggle="tooltip"
                    data-placement="bottom"
                    data-title="Getting Started with Angular: Comparing Angular to AngularJS"
                    href=""><span class="material-icons">play_circle_outline</span></a>
                    <a data-toggle="tooltip"
                    data-placement="bottom"
                    data-title="Quiz: Getting Started with Angular"
                    href="student-take-quiz.html"><span class="material-icons">hourglass_empty</span></a>
                </nav> --}}

                <div class="js-player bg-primary embed-responsive embed-responsive-16by9 mb-32pt">
                    <div class="player embed-responsive-item">
                        <div class="player__content">
                            <div class="player__image"
                                style="--player-image: url(public/images/illustration/player.svg)"></div>
                            <a href=""
                            class="player__play bg-primary">
                                <span class="material-icons">play_arrow</span>
                            </a>
                        </div>
                        <div class="player__embed d-none">
                            <iframe width="420" height="315"
                                    src="{{ $lesson->video }}">
                                    </iframe>
                            <!-- <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/watch?v=yNm4Fe6m8yw"
                                    allowfullscreen=""></iframe> -->
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap align-items-end mb-16pt">
                    <h1 class="text-white flex m-0">{{ $lesson->title }}</h1>
                    <p class="h1 text-white-50 font-weight-light m-0">50:13</p>
                </div>

                <p class="hero__lead measure-hero-lead text-white-50 mb-24pt">{{ $lesson->description }}</p>

                {{-- <a href=""
                class="btn btn-white"></a> --}}
            </div>
        </div>
        <div class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
            <div class="container page__container">
                @foreach ($lesson->attachements as $attach )
                <ul class="nav navbar-nav flex align-items-sm-center">
                    <li class="nav-item navbar-list__item">
                        <div class="media align-items-center">
                            <span class="media-left mr-16pt">
                                <img src="{{ URL::asset('images/download_icon.png') }}"
                                    width="40"
                                    alt="avatar"
                                    class="rounded-circle">
                            </span>
                            <div class="media-body">
                                <a class="card-title m-0"
                                href="teacher-profile.html">{{ $attach->name }}</a>
                                {{-- <p class="text-50 lh-1 mb-0">Instructor</p> --}}
                            </div>
                        </div>
                    </li>
                    {{-- <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">schedule</i>
                        2h 46m
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">assessment</i>
                        Beginner
                    </li> --}}
                    <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
                        <button type="button"
                                            class="btn btn-outline-dark">تحميل</button>
                    </li>
                </ul>
                @endforeach

            </div>
        </div>

        <div class="page-section">
            <div class="container page__container">

                <div class="d-flex align-items-center mb-heading">
                    <h4 class="m-0">امسح لأخذ الحضور</h4>
                    <a href="discussions-ask.html"
                    class="text-underline ml-auto">Ask a Question</a>
                </div>

                <img src="{{ URL::asset('QRcode/' . $lesson->code) }}" alt="QR Code">

                {{-- <form action="{{ route('lesson.attendence') }}" method="POST">
                    @csrf
                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                    <input type="hidden" name="course_id" value="{{ $lesson->course->id }}">
                    <input type="hidden" name="user_id" value="1">
                    <button type="submit" class="btn btn-outline-dark">حضور</button>
                </form> --}}

            </div>

        </div>


    </div>
</div>
@endsection

@section('js')


@endsection
