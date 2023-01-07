@extends('academy.template.master')

@section('title')
    إضافة كورس
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
<!-- Quill Theme -->
<link type="text/css"
href="{{ URL::asset('assets/css/quill.css') }}"
rel="stylesheet">

<!-- Select2 -->
<link type="text/css"
href="{{ URL::asset('assets/vendor/select2/select2.min.css') }}"
rel="stylesheet">
<link type="text/css"
href="{{ URL::asset('assets/css/select2.css') }}"
rel="stylesheet">

<!-- Flatpickr -->
<link type="text/css"
href="{{ URL::asset('assets/css/flatpickr.css') }}"
rel="stylesheet">
<link type="text/css"
href="{{ URL::asset('assets/css/flatpickr-airbnb.css') }}"
rel="stylesheet">

<!-- DateRangePicker -->
<link type="text/css"
href="{{ URL::asset('assets/vendor/daterangepicker.css') }}"
rel="stylesheet">
@endsection

@section('content')
<div class="container page__container page-section">
<form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="page-separator">
        <div class="page-separator__text">إضافة كورس</div>
    </div>

    <div class="row">
        <div class="col-md-8">

            <div class="page-separator">
                <div class="page-separator__text">Basic information</div>
            </div>

            <label class="form-label">عنوان الكورس</label>
            <div class="form-group mb-24pt">
                <input type="text" name="title"
                       class="form-control form-control-lg"
                       placeholder="أدخل العنوان"
                       value="">
                {{-- <small class="form-text text-muted">Please see our <a href="">course title guideline</a></small> --}}
            </div>
            @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-32pt">
                <label class="form-label">الوصف</label>
               <textarea class="form-control" rows="3" placeholder="Course description" name="description"></textarea>

            </div>
            @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group m-0">
                <div class="custom-file">
                    <input type="file"
                           id="file"
                           name="photo"
                           class="custom-file-input">
                    <label for="file"
                           class="custom-file-label">اختر صورة</label>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label"
                       for="select02">المدرس</label>
                <select id="select02"
                        data-toggle="select"
                        data-minimum-results-for-search="-1"
                        class="form-control"
                        name="instructor_id">
                        @foreach ( $instructors as $instructor )
                        <option value="{{ $instructor->id }}" data-avatar-src="{{ URL::asset('images/instructors'). '/' .$instructor->photo }}">
                            {{ $instructor->first_name }} {{ $instructor->last_name }}
                        </option>
                        @endforeach
                </select>
            </div>
            @error('instructor_id')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label class="form-label">تاريخ البدء</label>
                <input id="flatpickrSample01"
                       type="hidden"
                       class="form-control flatpickr-input"
                       data-toggle="flatpickr"
                       value="today"
                       name="start_at">
            </div>
            @error('start_at')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label class="form-label">تاريخ الانتهاء</label>
                <input id="flatpickrSample01"
                       type="hidden"
                       class="form-control flatpickr-input"
                       data-toggle="flatpickr"
                       value="today"
                       name="end_at">
            </div>
            @error('end_at')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label class="form-label"
                    for="exampleInputPassword1">معدل الحضور</label>
                <input type="number"
                    step="5"
                    min="0"
                    max="100"
                    class="form-control"
                    id="exampleInputPassword1"
                    name="attendence_rate"
                    placeholder="">
            </div>


            <div class="form-group">
                <label class="form-label"
                    for="exampleInputPassword1">معدل النجاح</label>
                <input type="number"
                    step="5"
                    min="0"
                    max="100"
                    class="form-control"
                    id="exampleInputPassword1"
                    name="pass_rate"
                    placeholder="">
            </div>



            <div class="flex"
                style="max-width: 100%">

                <label class="form-label"
                        for="subscribe">تفعيل الكورس</label><br>
                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                    <input checked=""
                            type="checkbox"
                            id="subscribe"
                            class="custom-control-input"
                            name="published">
                    <label class="custom-control-label"
                            for="subscribe">نعم</label>
                </div>
                <label class="form-label mb-0"
                    for="subscribe">نعم</label>

            </div>
            @error('published')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- <div class="form-group mb-32pt">
                <label class="form-label">الوصف</label>
                <!-- <textarea class="form-control" rows="3" placeholder="Course description"></textarea> -->
                <div class="form-group mb-24pt">
                    <textarea name="description" rows="5"
                           class="form-control form-control-lg"
                           placeholder="وصف الكورس"
                           value=""></textarea>
                    <small class="form-text text-muted">Please see our <a href="">course title guideline</a></small>
                </div>
                <small class="form-text text-muted">Shortly describe this course.</small>
            </div> --}}

            {{-- <div class="page-separator">
                <div class="page-separator__text">Sections</div>
            </div>

            <div class="accordion js-accordion accordion--boxed mb-24pt"
                 id="parent">
                <div class="accordion__item">
                    <a href="#"
                       class="accordion__toggle collapsed"
                       data-toggle="collapse"
                       data-target="#course-toc-1"
                       data-parent="#parent">
                        <span class="flex">Course Overview</span>
                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                    </a>
                    <div class="accordion__menu collapse"
                         id="course-toc-1">
                        <div class="accordion__menu-link">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <a class="flex"
                               href="student-lesson.html">Watch Trailer</a>
                            <span class="text-muted">1m 10s</span>
                        </div>
                    </div>
                </div>
                <div class="accordion__item open">
                    <a href="#"
                       class="accordion__toggle"
                       data-toggle="collapse"
                       data-target="#course-toc-2"
                       data-parent="#parent">
                        <span class="flex">Getting Started with Angular</span>
                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                    </a>
                    <div class="accordion__menu collapse show"
                         id="course-toc-2">
                        <div class="accordion__menu-link">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <a class="flex"
                               href="student-lesson.html">Introduction</a>
                            <span class="text-muted">8m 42s</span>
                        </div>
                        <div class="accordion__menu-link active">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <a class="flex"
                               href="student-lesson.html">Introduction to TypeScript</a>
                            <span class="text-muted">50m 13s</span>
                        </div>
                        <div class="accordion__menu-link">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <a class="flex"
                               href="student-lesson.html">Comparing Angular to AngularJS</a>
                            <span class="text-muted">12m 10s</span>
                        </div>
                        <div class="accordion__menu-link">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <a class="flex"
                               href="student-take-quiz.html">Quiz: Getting Started With Angular</a>
                        </div>
                    </div>
                </div>
                <div class="accordion__item">
                    <a href="#"
                       class="accordion__toggle collapsed"
                       data-toggle="collapse"
                       data-target="#course-toc-3"
                       data-parent="#parent">
                        <span class="flex">Creating and Communicating Between Angular Components</span>
                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                    </a>
                    <div class="accordion__menu collapse"
                         id="course-toc-3">
                        <div class="accordion__menu-link">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <a class="flex"
                               href="student-lesson.html">Angular Components</a>
                            <span class="text-muted">04:23</span>
                        </div>
                    </div>
                </div>
                <div class="accordion__item">
                    <a href="#"
                       class="accordion__toggle collapsed"
                       data-toggle="collapse"
                       data-target="#course-toc-4"
                       data-parent="#parent">
                        <span class="flex">Exploring the Angular Template Syntax</span>
                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                    </a>
                    <div class="accordion__menu collapse"
                         id="course-toc-4">
                        <div class="accordion__menu-link">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <a class="flex"
                               href="student-lesson.html">Template Syntax</a>
                            <span class="text-muted">04:23</span>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#"
               class="btn btn-outline-secondary mb-24pt mb-sm-0">Add Section</a> --}}

        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-header text-center">
                    <button class="btn btn-accent" type="submit">حفظ</button>
                </div>
                {{-- <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex">
                        <a class="flex"
                           href="#"><strong>Save Draft</strong></a>
                        <i class="material-icons text-muted">check</i>
                    </div>
                    <div class="list-group-item">
                        <a href="#"
                           class="text-danger"><strong>Delete Course</strong></a>
                    </div>
                </div> --}}
            </div>
{{--
            <div class="page-separator">
                <div class="page-separator__text">Video</div>
            </div>

            <div class="card">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                            src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0"
                            allowfullscreen=""></iframe>
                </div>
                <div class="card-body">
                    <label class="form-label">URL</label>
                    <input type="text"
                           class="form-control"
                           value="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0"
                           placeholder="Enter Video URL">
                    <small class="form-text text-muted">Enter a valid video URL.</small>
                </div>
            </div> --}}

            <div class="page-separator">
                <div class="page-separator__text">Options</div>
            </div>

            <div class="card">
                <div class="card-body">

                    {{-- <div class="form-group">
                        <label class="form-label"
                               for="select01">المستوى</label>
                        <select id="select01" name="category_id"
                                data-toggle="select"
                                class="form-control">
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                        </select>
                        <small class="form-text text-muted">اختر تصنيف الكورس</small>
                    </div> --}}

                    <div class="form-group">
                        <label class="form-label"
                               for="select01">التصميف</label>
                        <select id="select01" name="category_id"
                                data-toggle="select"
                                class="form-control">
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                        </select>
                        <small class="form-text text-muted">اختر تصنيف الكورس</small>
                    </div>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    {{-- <div class="form-group">
                        <label class="form-label">التصميف</label>
                        <select name="category_id"
                                class="form-control custom-select">
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                        </select>
                        <small class="form-text text-muted">اختر تصنيف الكورس</small>
                    </div> --}}


                    <div class="form-group">
                        <label class="form-label">المسار</label>
                        <select name="path_id"
                                id="path_id"
                                class="form-control custom-select"
                                onchange="console.log($(this).val());">
                                <option value="" selected>اختر المسار</option>
                                @foreach ( $paths as $path )
                                    <option value="{{ $path->id }}">{{ $path->name }}</option>
                                @endforeach
                        </select>
                        <small class="form-text text-muted">اختر المسار الذي ينتمي له هذا الكورس</small>
                    </div>

                    @error('path_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                     @enderror

                    <div class="form-group">
                        <label class="form-label">التسلسل الأكاديمي</label>
                        <select name="course_id"
                                id="course_id"
                                class="form-control custom-select">

                        </select>
                        <small class="form-text text-muted">اختر تسلسل الكورس</small>
                    </div>

                    {{-- <div class="form-group mb-0">
                        <label class="form-label"
                               for="select03">Tags</label>
                        <select id="select03"
                                data-toggle="select"
                                multiple
                                class="form-control">
                            <option selected="">JavaScript</option>
                            <option selected="">Angular</option>
                            <option>Bootstrap</option>
                            <option>CSS</option>
                            <option>HTML</option>
                        </select>
                        <small class="form-text text-muted">Select one or more tags.</small>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>

</form>
</div>
@endsection

@section('js')
<!-- Perfect Scrollbar -->
<script src="{{ URL::asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ URL::asset('assets/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ URL::asset('assets/vendor/material-design-kit.js') }}"></script>

<!-- App JS -->
<script src="{{ URL::asset('assets/js/app.js') }}"></script>

<!-- Preloader -->
<script src="{{ URL::asset('assets/js/preloader.js') }}"></script>

<!-- Quill -->
<script src="{{ URL::asset('assets/vendor/quill.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/quill.js') }}"></script>

<!-- Flatpickr -->
<script src="{{ URL::asset('assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/flatpickr.js') }}"></script>

<!-- DateRangePicker -->
<script src="{{ URL::asset('assets/vendor/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/vendor/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/daterangepicker.js') }}"></script>

<!-- Select2 -->
<script src="{{ URL::asset('assets/vendor/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/select2.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#path_id').on('change', function () {
            var pathId = this.value;
            $('#course_id').html('');
            $.ajax({
                url: '{{ route('courses.get') }}?path_id='+pathId,
                type: 'get',
                success: function (res) {
                    $.each(res, function (key, value) {
                        $('#course_id').append('<option value="' + value
                            .id + '">' + value.title + '</option>');
                    });
                }
            });
        });
    });
</script>


@endsection
