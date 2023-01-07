@extends('academy.template.master')

@section('title')
   المسارات الأكاديمية
@endsection

@section('page-title')
<div class="pt-32pt">
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
</div>
@endsection

@section('css')

@endsection

@section('content')
<div class="container page__container page-section">

    <div class="page-separator">
        <div class="page-separator__text">المسارات الأكاديمية</div>
    </div>
    <div class="row card-group-row mb-lg-8pt">
        @foreach ( $paths as $path )
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
                                            <img src="{{ URL::asset('images/paths'). '/' .$path->photo }}"
                                                width="40"
                                                height="40"
                                                alt="Angular"
                                                class="rounded">
                                            <span class="overlay__content overlay__content-transparent">
                                                <span class="overlay__action d-flex flex-column text-center lh-1">
                                                    <small class="h6 small text-white mb-0"
                                                        style="font-weight: 500;">عرض</small>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title"><a href="{{ route('path.show', $path->id) }}">{{ $path->name }}</a></div>
                                        <p class="flex text-50 lh-1 mb-0"><small> عدد الكورسات: {{ $path->courses()->count() }} </small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a href="#"
                                   data-toggle="dropdown"
                                   data-caret="false"
                                   class="text-muted"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('paths.edit', $path->id) }}"
                                       class="dropdown-item">تعديل</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('paths.delete', $path->id) }}" method="POST" id="delete">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="dropdown-item text-danger">
                                        حذف
                                    </button>
                                    </form>
                                    {{-- <a href="javascript:void(0)"
                                       class="dropdown-item text-danger">حذف التنخصص</a> --}}
                                </div>
                            </div>

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
@endsection

@section('js')

@endsection
