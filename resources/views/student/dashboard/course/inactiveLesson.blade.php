@extends('student.template.master')

@section('title')
أكاديميتي | {{ $lesson->title }}
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="mdk-box bg-primary mdk-box--bg-gradient-primary2 js-mdk-box mb-0"
                     data-effects="blend-background">
                    <div class="mdk-box__content">
                        <div class="py-64pt text-center text-sm-left">
                            <div class="container d-flex flex-column justify-content-center align-items-center">

                                    <p class="lead text-white-50 measure-lead-max mb-0">للأسف .. الجلسة غير متاحة بعد</p>
                                    <h1 class="text-white mb-24pt">موعد الجلسة: {{ $lesson->start_at }}</h1>
                                    <a href="{{ route('student.course.show', $lesson->course->id) }}"
                                        class="btn btn-outline-white">عودة للكورس</a>

                            </div>
                        </div>
                    </div>
    </div>
</div>

@endsection

@section('js')

@endsection

