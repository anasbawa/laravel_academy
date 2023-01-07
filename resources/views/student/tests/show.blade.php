@extends('template.master')

@section('title')
أكاديميتي | الاختبار
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="navbar navbar-list navbar-light bg-white border-bottom-2 border-bottom navbar-expand-sm"
                     style="white-space: nowrap;">
                    <div class="container page__container">
                        <nav class="nav navbar-nav">
                            <div class="nav-item navbar-list__item">
                                <a href="{{ route('courses.show', $test->course->id) }}"
                                   class="nav-link h-auto"><i class="material-icons icon--left">keyboard_backspace</i> العودة للكورس</a>
                            </div>
                            <div class="nav-item navbar-list__item">
                                <div class="d-flex align-items-center flex-nowrap">
                                    <div class="mr-16pt">
                                        <a href="student-take-course.html"><img src="{{ URL::asset('images/courses/' . $test->course->photo) }}"
                                                 width="40"
                                                 alt="Angular"
                                                 class="rounded"></a>
                                    </div>
                                    <div class="flex">
                                        <a href="student-take-course.html"
                                           class="card-title text-body mb-0">{{ $test->course->title }}</a>
                                        <p class="lh-1 d-flex align-items-center mb-0">
                                            <span class="text-50 small font-weight-bold mr-8pt">{{ $test->course->instructor->first_name }}</span>
                                            <span class="text-50 small"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class="bg-primary pb-lg-64pt py-32pt">
                    <div class="container page__container">

                        <div class="d-flex flex-wrap align-items-end justify-content-end mb-16pt">
                            <h1 class="text-white flex m-0">{{ $test->name }}</h1>
                        </div>

                        <p class="hero__lead measure-hero-lead text-white-50">{{ $test->expiration_at }} متاح إلى: </p>
                    </div>
                </div>
                <form action="{{ route('student.test.store') }}" method="POST">
                    @csrf
                @foreach ($test->topics as $topic )
                    @if ($topic->questions()->count() != 0)
                        <div class="navbar navbar-expand-md navbar-list navbar-light bg-white border-bottom-2 "
                            style="white-space: nowrap;">
                            <div class="container page__container">
                                <ul class="nav navbar-nav flex navbar-list__item">
                                    <li class="nav-item">
                                        <i class="material-icons text-50 mr-8pt">tune</i>
                                        {{ $topic->name }}
                                    </li>
                                </ul>

                            </div>
                        </div>
                        @foreach ($topic->questions as $question )
                            @if ($question->options()->count() != 0)
                                <div class="container page__container">
                                    <div class="page-section">
                                        <div class="page-separator">
                                            <div class="page-separator__text">{{ $question->question_text }}</div>
                                        </div>
                                        @foreach ($question->options as $option )
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input id="option-{{ $option->id }}"
                                                            type="radio"
                                                            name="questions[{{ $question->id }}]"
                                                            value="{{ $option->id }}" @if(old("questions.$question->id") == $option->id) checked @endif
                                                            class="custom-control-input">
                                                    <label for="option-{{ $option->id }}"
                                                            class="custom-control-label"> {{ $option->option_text }}</label>
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <input type="hidden" name="test_id" value="{{ $test->id }}">
                <input type="hidden" name="course_id" value="{{ $test->course->id }}">
                <button type="submit">سلم الاختبار</button>
                </form>


</div>

@endsection

@section('js')

@endsection

