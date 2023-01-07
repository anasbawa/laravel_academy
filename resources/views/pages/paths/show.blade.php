@extends('template.master')

@section('title')
أكاديميتي | {{ $path->name }}
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="container page__container page-section">

        <div class="page-section border-bottom-2">
            <div class="container page__container">
                <div class="page-separator">
                    <div class="page-separator__text">أبرز الدورات التعليمية</div>
                </div>

                <div class="row card-group-row">
                    @foreach ( $path->courses as $course )
                    <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">

                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                             data-toggle="popover"
                             data-trigger="">

                            <a
                               class="card-img-top js-image"
                               data-position=""
                               data-height="140">
                                <img src="{{ URL::asset('images/courses/'. $course->photo) }}"
                                     alt="course">
                                <span class="overlay__content">
                                    <span class="overlay__action d-flex flex-column text-center">
                                        <i class="material-icons icon-32pt">play_circle_outline</i>
                                        <span class="card-title text-white">Preview</span>
                                    </span>
                                </span>
                            </a>

                            <div class="card-body flex">
                                <div class="d-flex">
                                    <div class="flex">
                                        <a class="card-title"
                                           href="student-course.html">{{ $course->title }}</a>
                                        <small class="text-50 font-weight-bold mb-4pt">{{ $course->path->name }}</small>
                                    </div>
                                    <div class="avatar avatar-xs"
                                                         data-toggle="tooltip"
                                                         data-placement="top"
                                                         title="{{ $course->instructor->first_name }}">
                                                        <img src="{{ URL::asset('images/instructors/' . $course->instructor->photo) }}"
                                                             alt="Avatar"
                                                             class="avatar-img rounded-circle">
                                                    </div>
                                </div>

                            </div>
                            <?php
                            $date1 = new DateTime($course->start_at);
                            $date2 = new DateTime($course->end_at);
                            $intereval = $date1->diff($date2);
                            $days = $intereval->format('%a');
                            ?>
                            <div class="card-footer">
                                <div class="row justify-content-between">
                                    <div class="col-auto d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                        <p class="flex text-50 lh-1 mb-0"><small>{{ $days }} يوم</small></p>
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                        <p class="flex text-50 lh-1 mb-0"><small> {{ $course->lessons()->count(). ' ' . 'درس ' }} </small></p>
                                    </div>
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

@endsection

@section('js')

@endsection

