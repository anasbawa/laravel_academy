@extends('template.master')

@section('title')
أكاديميتي | الرئيسية
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">



    <!-- Header Layout Content -->
    <div class="mdk-header-layout__content">

        <!-- Drawer Layout -->
        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">

            <!-- Drawer Layout Content -->
            <div class="mdk-drawer-layout__content page-content">

                <div class="mdk-box mdk-box--bg-primary bg-dark js-mdk-box mb-0"
                     data-effects="parallax-background blend-background">
                    <div class="mdk-box__bg">
                        <div class="mdk-box__bg-front"
                             style="background-image: url(../../public/images/photodune-4161018-group-of-students-m.jpg);"></div>
                    </div>
                    <div class="mdk-box__content justify-content-center">
                        <div class="hero container page__container text-center py-112pt text-md-left">
                            <h1 class="text-white text-shadow">نرسم لك طريقك</h1>
                            <p class="lead measure-hero-lead mx-auto mx-md-0 text-white text-shadow mb-48pt">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. ل</p>

                            <a href="courses.html"
                               class="btn btn-lg btn-white btn--raised mb-16pt">تصفح الدورات </a>

                            <p class="mb-0"><a href=""
                                   class="text-white text-shadow"><strong>هل أنت مؤسسة تعليمية</strong></a></p>

                        </div>
                    </div>
                </div>
                <!-- إحصائيات -->
                <div class="border-bottom-2 py-16pt navbar-light bg-white border-bottom-2">
                    <div class="container page__container">
                        <div class="row align-items-center">
                            <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                                <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                    <i class="material-icons text-white">subscriptions</i>
                                </div>
                                <div class="flex">
                                    <div class="card-title mb-4pt">+ {{ $numCourses }} كورس</div>
                                    <p class="card-subtitle text-70">طور مهاراتك بالدورات المختلفة</p>
                                </div>
                            </div>
                            <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                                <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                    <i class="material-icons text-white">verified_user</i>
                                </div>
                                <div class="flex">
                                    <div class="card-title mb-4pt">مدرسين مختصين</div>
                                    <p class="card-subtitle text-70">متابعة واهتمام وإشراف أبرز المدرسين المختصين</p>
                                </div>
                            </div>
                            <div class="d-flex col-md align-items-center">
                                <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                    <i class="material-icons text-white">update</i>
                                </div>
                                <div class="flex">
                                    <div class="card-title mb-4pt">تسلسل أكاديمي</div>
                                    <p class="card-subtitle text-70">كن على المسار الصحيح وتجاوز التشتت في التعليم</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- بعض الأكاديميات -->
                <div class="page-section border-bottom-2">
                    <div class="container page__container">

                        <div class="page-separator">
                            <div class="page-separator__text">أبرز الأكاديميات التعليمية</div>
                        </div>

                        <div class="row card-group-row">
                            @foreach ( $academies as $academy )
                                @if ($loop->iteration < 4)
                                <div class="col-md-6 col-lg-4 card-group-row__col">

                                    <div class="card posts-card">
                                        <div class="posts-card__content d-flex align-items-center flex-wrap">
                                            <div class="avatar avatar-lg mr-3">
                                                <a href=""><img src="{{ URL::asset('images/academies/OIP (1).jfif') }}"
                                                        alt="avatar"
                                                        class="avatar-img rounded"></a>
                                            </div>
                                            <div class="posts-card__title flex d-flex flex-column">
                                                <a href="/academies/{{  $academy->id }}/{{ $academy->name }}"
                                                class="card-title mr-3">{{ $academy->name }}</a>
                                                <small class="text-50">{{ $academy->email }}</small>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                @endif
                            @endforeach


                        </div>



                    </div>
                </div>

                <!-- بعض المسارات -->
                <div class="page-section border-bottom-2">
                    <div class="container page__container">
                        <div class="page-separator">
                            <div class="page-separator__text">المسارات التعليمية</div>
                        </div>

                        <div class="row card-group-row">
                            @foreach ( $paths as $path )
                            <div class="col-sm-4 card-group-row__col">

                                <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                                    data-toggle="popover"
                                    data-trigger="click">

                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <div class="flex">
                                                <div class="d-flex align-items-center">
                                                    <div class="rounded mr-12pt z-0 o-hidden">
                                                        <div class="overlay">
                                                            <img src="{{ URL::asset('images/paths'). '/' .$path->photo }}"
                                                                width="40"
                                                                height="40"
                                                                alt="Angular"
                                                                class="rounded">
                                                            <span class="overlay__content overlay__content-transparent">
                                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                                    <small class="h6 small text-white mb-0"
                                                                        style="font-weight: 500;">80%</small>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="card-title">{{ $path->name }}</div>
                                                        <p class="flex text-50 lh-1 mb-0"><small> عدد الكورسات: {{ $path->courses()->count() }} </small></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="student-path.html"
                                            data-toggle="tooltip"
                                            data-title="Add Favorite"
                                            data-placement="top"
                                            data-boundary="window"
                                            class="ml-4pt material-icons text-20 card-course__icon-favorite">favorite_border</a>

                                        </div>

                                    </div>
                                </div>

                                <div class="popoverContainer d-none">
                                    <div class="media">
                                        <div class="media-left mr-12pt">
                                            <img src="../../public/images/paths/react_40x40@2x.png"
                                                width="40"
                                                height="40"
                                                alt="Angular"
                                                class="rounded">
                                        </div>
                                        <div class="media-body">
                                            <div class="card-title">React Native</div>
                                            <p class="text-50 d-flex lh-1 mb-0 small">18 courses</p>
                                        </div>
                                    </div>

                                    <p class="mt-16pt text-70">Learn the fundamentals of working with React Native and how to create basic applications.</p>

                                    <div class="my-32pt">
                                        <div class="d-flex align-items-center mb-8pt justify-content-center">
                                            <div class="d-flex align-items-center mr-8pt">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>50 minutes left</small></p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">play_circle_outline</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>12 lessons</small></p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="student-path.html"
                                            class="btn btn-primary mr-8pt">Resume</a>
                                            <a href="student-path.html"
                                            class="btn btn-outline-secondary ml-0">Start over</a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <small class="text-50 mr-8pt">Your rating</small>
                                        <div class="rating mr-8pt">
                                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                            <span class="rating__item"><span class="material-icons text-primary">star</span></span>
                                            <span class="rating__item"><span class="material-icons text-primary">star_border</span></span>
                                        </div>
                                        <small class="text-50">4/5</small>
                                    </div>
                                </div>

                            </div>
                            @endforeach


                        </div>

                    </div>
                </div>

                <!-- بعض الدورات -->
                <div class="page-section border-bottom-2">
                    <div class="container page__container">
                        <div class="page-separator">
                            <div class="page-separator__text">أبرز الدورات التعليمية</div>
                        </div>

                        <div class="row card-group-row">
                            @foreach ( $courses as $course )
                            <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">

                                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card"
                                     data-toggle="popover"
                                     data-trigger="click">

                                    <a href="student-course.html"
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
                                                {{-- <small class="text-50 font-weight-bold mb-4pt">{{ $course->instructor->first_name }} {{ $course->instructor->last_name }}</small> --}}
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
                                        {{-- <div class="d-flex">
                                            <div class="rating flex">
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star</span></span>
                                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                                            </div>
                                            <!-- <small class="text-50">6 hours</small> -->
                                        </div> --}}
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-between">
                                            <div class="col-auto d-flex align-items-center">
                                                <span class="material-icons icon-16pt text-50 mr-4pt">access_time</span>
                                                <p class="flex text-50 lh-1 mb-0"><small>6 hours</small></p>
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

                <!-- المدرسين -->
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
                                        <a href="teacher-profile.html"
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
                <!-- الكاتيغوري -->

                <!-- تعليقات الطلاب -->
                <div class="page-section">
                    <div class="container page__container">
                        <div class="page-headline text-center">
                            <h2>تعليقات الطلاب</h2>
                            <p class="lead measure-lead mx-auto text-70">ما يقوله الطلاب الآخرون الذين تحولوا إلى محترفين عنا بعد التعلم معنا والوصول إلى أهدافهم.</p>
                        </div>
                        @foreach ($comments as $comment )


                        <div class="position-relative carousel-card p-0 mx-auto">
                            <div class="row d-block js-mdk-carousel"
                                 id="carousel-feedback">
                                <a class="carousel-control-next js-mdk-carousel-control mt-n24pt"
                                   href="#carousel-feedback"
                                   role="button"
                                   data-slide="next">
                                    <span class="carousel-control-icon material-icons"
                                          aria-hidden="true">keyboard_arrow_right</span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <div class="mdk-carousel__content">

                                    <div class="col-12 col-md-6">

                                        <div class="card card-feedback card-body">
                                            <blockquote class="blockquote mb-0">
                                                <p class="text-70 small mb-0">{{ $comment->text }}</p></blockquote>
                                        </div>
                                        <div class="media ml-12pt">
                                            <div class="media-left mr-12pt">
                                                <a href="student-profile.html"
                                                   class="avatar avatar-sm">
                                                   <img src="{{ URL::asset('images/students/' . $comment->user->photo) }}" width="40" alt="avatar" class="rounded-circle">
                                                    <span class="avatar-title rounded-circle">{{ $comment->user->email }}</span>
                                                </a>
                                            </div>
                                            <div class="media-body media-middle">
                                                <a href="student-profile.html"
                                                   class="card-title">{{ $comment->user->name }} </a>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>


            </div>
            <!-- // END drawer-layout__content -->

            <!-- Drawer -->

            {{-- <div class="mdk-drawer js-mdk-drawer"
                 id="default-drawer">
                <div class="mdk-drawer__content top-navbar">
                    <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left sidebar-p-t"
                         data-perfect-scrollbar>

                        <!-- Sidebar Content -->


                    </div>
                </div>
            </div> --}}

            <!-- // END Drawer -->

        </div>
        <!-- // END drawer-layout -->

    </div>
    <!-- // END Header Layout Content -->

</div>

@endsection

@section('js')

@endsection
