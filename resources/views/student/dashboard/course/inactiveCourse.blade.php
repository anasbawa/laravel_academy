@extends('student.template.master')

@section('title')
أكاديميتي | {{ $course->title }}
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

                                    <p class="lead text-white-50 measure-lead-max mb-0">للأسف .. لا يمكن حضور هذا الكورس</p>
                                    <h1 class="text-white mb-24pt">يجب النجاح في الكورس: {{ $before_course->title }} أولا</h1>
                                    <a href="{{ route('student.course.show', $before_course->id) }}"
                                        class="btn btn-outline-white">عودة للكورس</a>

                            </div>
                        </div>
                    </div>
    </div>
</div>

@endsection

@section('js')

@endsection

