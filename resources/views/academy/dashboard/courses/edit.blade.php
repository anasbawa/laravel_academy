@extends('academy.template.master')

@section('title')
تعديل | {{ $course->title }}
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
<form method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
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
                       value="{{ $course->title }}">
                {{-- <small class="form-text text-muted">Please see our <a href="">course title guideline</a></small> --}}
            </div>
            @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-32pt">
                <label class="form-label">الوصف</label>
               <textarea class="form-control" rows="3" placeholder="Course description" name="description">{{ $course->description }}</textarea>

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
                        <option value="{{ $course->instructor->id }}" data-avatar-src="{{ URL::asset('images/instructors'). '/' .$course->instructor->photo }}">
                            {{ $course->instructor->first_name }} {{ $course->instructor->last_name }}
                        </option>
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
                       value="{{ $course->start_at }}"
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
                       value="{{ $course->end_at }}"
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
                    value="{{ $course->attendence_rate }}"
                    class="form-control"
                    id="exampleInputPassword1"
                    name="attendence_rate"
                    placeholder="">
            </div>
            @error('start_at')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label class="form-label"
                    for="exampleInputPassword1">معدل النجاح</label>
                <input type="number"
                    step="5"
                    min="0"
                    max="100"
                    value="{{ $course->pass_rate }}"
                    class="form-control"
                    id="exampleInputPassword1"
                    name="pass_rate"
                    placeholder="">
            </div>
            @error('start_at')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


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





        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-header text-center">
                    <button class="btn btn-accent" type="submit">حفظ</button>
                </div>

            </div>


            <div class="page-separator">
                <div class="page-separator__text">الخيارات</div>
            </div>

            <div class="card">
                <div class="card-body">


                    <div class="form-group">
                        <label class="form-label"
                               for="select01">التصميف</label>
                        <select id="select01" name="category_id"
                                data-toggle="select"
                                class="form-control">
                                <option value="{{ $course->category->id }}">{{ $course->category->title }}</option>
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
                                <option value="{{ $course->path->id }}">{{ $course->path->name }}</option>
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
                                {{-- <option value="{{ $course->before_id }}">{{ $course->path->name }}</option> --}}

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
