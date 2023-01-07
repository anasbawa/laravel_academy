@extends('template.master')

@section('title')
أكاديميتي | {{ $academy->name }}
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <!-- بطاقة التعريف -->
    <div class="page-section bg-primary">
        <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="{{ URL::asset('assets/images/illustration/teacher/128/white.svg') }}"
                 width="104"
                 class="mr-md-32pt mb-32pt mb-md-0"
                 alt="instructor">
            <div class="flex mb-32pt mb-md-0">
                <h2 class="text-white mb-0">{{ $academy->name }}</h2>
                <p class="lead text-white-50 d-flex align-items-center">جامعة حكومية <span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">opacity</i>RANK 2,300 </span></p>
            </div>
            @auth('web')
            <form action="{{ route('student.register') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="academy_id" value="{{ $academy->id }}">
                <button type="submit" class="btn btn-outline-white">سجل الآن</button>
            </form>
            @endauth
            @guest('web')
                <span class="text-danger">أنشئ حسابا لتتمكن من التسجيل على الأكاديمية</span>
            @endguest
        </div>
    </div>

    <!-- الإحصائيات-->
    <div class="page-section border-bottom-2">
        <div class="container page__container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-1 border-left-3 border-left-accent text-center mb-lg-0">
                        <div class="card-body">
                            <h4 class="h2 mb-0">{{ $academy->specializations()->count() }}</h4>
                            <div>تخصصا أكاديميا</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center mb-lg-0">
                        <div class="card-body">
                            <h4 class="h2 mb-0">{{ $academy->paths()->count() }}</h4>
                            <div>مسارا تعليميا</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center mb-lg-0">
                        <div class="card-body">
                            <h4 class="h2 mb-0">{{ $academy->instructors()->count() }}</h4>
                            <div>مدرسا مختصا</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- معلومات عامة -->
    <div class="page-section bg-white border-bottom-2">
        <div class="container page__container">
            <div class="row">
                <div class="col-md-6">
                    <h4>نبذة عنا</h4>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموق</p>
                </div>
                <div class="col-md-6">
                    <h4>التواصل</h4>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إ</p>
                    <div class="d-flex align-items-center">
                        <a href=""
                           class="text-accent fab fa-facebook-square font-size-24pt mr-8pt"></a>
                        <a href=""
                           class="text-accent fab fa-twitter-square font-size-24pt"></a>
                    </div>
                </div>
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
                @foreach ( $academy->instructors as $instructor )
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

    <!-- التخصصات -->
    <div class="container page__container page-section">

        <div class="page-headline text-center">
            <h2>طور مستواك في مختلف الاختصاصات  </h2>
            <p class="lead text-70 col-lg-8 mx-auto"></p>
        </div>

        <div class="row card-group-row mb-lg-8pt">
            @foreach ( $specializations as $specialization )
                <div class="col-sm-4 card-group-row__col">

                    <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                        data-toggle="popover"
                        data-trigger="">

                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded mr-12pt z-0 o-hidden">
                                            <div class="overlay">
                                                <img src="{{ URL::asset('images/specializations'). '/' .$specialization->photo }}"
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
                                            <a href="/{{ $academy->id }}/{{ $specialization->id }}/paths"><div class="card-title">{{ $specialization->name }}</div></a>
                                            <p class="flex text-50 lh-1 mb-0"><small> عدد المسارات: {{ $specialization->paths()->count() }} </small></p>
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
        <div class="card-footer p-8pt">
            <ul class="pagination justify-content-start pagination-xsm m-0">
                <li class="page-item disabled">
                    <a class="page-link"
                       href="{{$paths->previousPageUrl()}}"
                       aria-label="Previous">
                        <span aria-hidden="true"
                              class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
                @for($i=0;$i<=$paths->lastPage();$i++)
                <li class="page-item">
                    <a class="page-link"
                       href="{{$paths->url($i)}}"
                       aria-label="Page 1">
                        <span>{{$i}}</span>
                    </a>
                </li>
                @endfor
                <li class="page-item">
                    <a class="page-link"
                       href="{{$paths->nextPageUrl()}}"
                       aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true"
                              class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>

</div>

@endsection

@section('js')

@endsection
