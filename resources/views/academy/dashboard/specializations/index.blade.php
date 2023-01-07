@extends('academy.template.master')

@section('title')
  التخصصات
@endsection

@section('page-title')
<div class="pt-32pt">
  <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
      <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

          <div class="mb-24pt mb-sm-0 mr-sm-24pt">
              <h2 class="mb-0">التخصصات</h2>

              <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="index.html"></a></li>

                  <li class="breadcrumb-item active">

                      

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
    <div class="card stack">
        <div class="list-group list-group-flush">
            @foreach ($specializations as $specialization )
            <div class="list-group-item d-flex flex-column flex-sm-row align-items-sm-center px-12pt">
                <div class="flex d-flex align-items-center mr-sm-16pt mb-8pt mb-sm-0">
                    <a href="instructor-edit-quiz.html"
                       class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                        <img src="{{ URL::asset('images/specializations'). '/' .$specialization->photo }}"
                             alt="{{ $specialization->name }}"
                             class="avatar-img rounded">
                        <span class="overlay__content"></span>
                    </a>
                    <div class="flex">
                        <a class="card-title mb-4pt"
                           href="instructor-edit-quiz.html">{{ $specialization->name }}</a>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="flex text-center d-flex align-items-center mr-16pt">
                        <span class="text-50 text-headings text-uppercase mr-12pt">عدد المسارات</span>
                        <span class="badge badge-dark badge-notifications">{{ $specialization->paths()->count() }}</span>
                    </div>

                    <div class="dropdown">
                        <a href="#"
                           data-toggle="dropdown"
                           data-caret="false"
                           class="text-muted"><i class="material-icons">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('specializations.show', $specialization->id) }}"
                               class="dropdown-item">عرض التخصص</a>
                            <a href="{{ route('specializations.edit', $specialization->id) }}"
                               class="dropdown-item">تعديل</a>
                            <div class="dropdown-divider"></div>
                            <form action="/academy/specializations/{{ $specialization->id }}" method="POST" id="delete">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="dropdown-item text-danger">
                                حذف التخصص
                            </button>
                            </form>
                            {{-- <a href="javascript:void(0)"
                               class="dropdown-item text-danger">حذف التنخصص</a> --}}
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="row align-items-center mb-8pt">
        @foreach ($specializations as $specialization )
            <div class="col-sm-6 col-md-4 col-xl-3">

                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay mdk-reveal js-mdk-reveal "
                    data-partial-height="44"
                    data-toggle="popover"
                    data-trigger="click">

                    <a href="student-course.html"
                    class="js-image"
                    data-position="">
                        <img src="public/images/paths/sketch_430x168.png"
                            alt="courses">
                        <span class="overlay__content align-items-start justify-content-start ">
                            <span class="overlay__action card-body d-flex align-items-center">
                                <i class="material-icons mr-4pt" >play_circle_outline</i>
                                <span class="card-title text-white">Preview</span>
                            </span>
                        </span>
                    </a>

                    <div class="mdk-reveal__content">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title"
                                    href="student-course.html">{{ $specialization->name }}</a>
                                </div>
                                <form action="/academy/specializations/{{ $specialization->id }}" method="POST" id="delete">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="btn btn-accent">
                                    <i class="material-icons">close</i>
                                </button>
                                </form>
                            </div>
                            <div class="d-flex">
                                <div class="rating flex">
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star</span></span>
                                    <span class="rating__item"><span class="material-icons">star_border</span></span>
                                </div>
                                <small class="text-50">6 hours</small>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        @endforeach




    </div> --}}
</div>
@endsection

@section('js')

@endsection
