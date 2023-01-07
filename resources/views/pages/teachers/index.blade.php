@extends('template.master')

@section('title')
أكاديميتي | عرض المدرسين
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="container page__container page-section">
        <div class="page-section border-bottom-2">
            <div class="container page__container">
                <div class="page-separator">
                    <div class="page-separator__text">أبرز المدرسين</div>
                </div>

                <div class="row card-group-row">
                    @foreach ( $instructors as $instructor )
                    <div class="col-md-6 col-xl-4 card-group-row__col">
                        <div class="card card-group-row__card">
                            <div class="card-header d-flex align-items-center">
                                <a href="teacher-profile.html"
                                   class="card-title flex mr-12pt">{{ $instructor->first_name }} {{ $instructor->last_name }}</a>
                                {{-- <a href="teacher-profile.html"
                                   class="btn btn-light btn-sm"
                                   data-toggle="tooltip"
                                   data-title="Unfollow"
                                   data-placement="bottom">Following</a> --}}
                            </div>
                            <div class="card-body flex text-center d-flex flex-column align-items-center justify-content-center">
                                <a href="{{ route('teacher.show', $instructor->id) }}"
                                   class="avatar avatar-xl overlay js-overlay overlay--primary rounded-circle p-relative o-hidden mb-16pt">
                                    <img src="{{ URL::asset('images/instructors/' . $instructor->photo) }}"
                                         alt="{{ $instructor->first_name }}"
                                         class="avatar-img">
                                    <span class="overlay__content"><i class="overlay__action material-icons icon-40pt">face</i></span>
                                </a>
                                <div class="flex">
                                    {{-- <div class="d-inline-flex align-items-center mb-8pt">
                                        <div class="rating mr-8pt">

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star_border</span></span>

                                            <span class="rating__item"><span class="material-icons">star_border</span></span>

                                        </div>
                                        <small class="text-muted">3/5</small>
                                    </div> --}}

                                    <p class="text-70 measure-paragraph">{{ $instructor->about }}</p>

                                    <a href="javascript:void()"
                                       data-toggle="tooltip"
                                       data-title="Browse Topic"
                                       data-placement="bottom"
                                       class="chip chip-outline-secondary">{{ $instructor->specialization }}</a>
                                </div>
                            </div>
                            {{-- <div class="card-body flex-0">
                                <div class="d-flex align-items-center">
                                    <a href="student-course.html"
                                       class="avatar avatar-4by3 overlay overlay--primary mr-12pt">
                                        <img src="../../public/images/paths/angular_routing_200x168.png"
                                             alt="Angular Routing In-Depth"
                                             class="avatar-img rounded">
                                        <span class="overlay__content"></span>
                                    </a>
                                    <div class="flex">
                                        <a href="student-course.html"
                                           class="card-title">Angular Routing In-Depth</a>
                                    </div>
                                </div>
                            </div> --}}
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

