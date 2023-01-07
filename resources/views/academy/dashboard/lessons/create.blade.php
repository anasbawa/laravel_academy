@extends('academy.template.master')

@section('title')
    إضافة درس
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
        <div class="page-separator__text">إضافة درس</div>
    </div>

    <div class="row mb-32pt">
        <div class="col-lg-8 d-flex align-items-center">
            <div class="flex"
                style="max-width: 100%">
            <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label class="form-label"
                        for="exampleInputEmail1">العنوان</label>
                    <input type="text"
                        class="form-control"
                        id="exampleInputEmail1"
                        name="title"
                        placeholder="اكتب عنوان الدرس">
                </div>
                @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="form-label"
                        for="exampleInputPassword1">الوصف</label>
                    <input type="text"
                        class="form-control"
                        id="exampleInputPassword1"
                        name="description"
                        placeholder="اكتب وصف الدرس">
                </div>
                @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="form-label"
                        for="exampleInputPassword1">ضع رابط الجلسة</label>
                    <input type="url"
                        name="video"
                        class="form-control"
                        id="exampleInputPassword1"
                        placeholder="الرابط">
                </div>
                @error('video')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="flex"
                style="max-width: 100%">

                {{-- <label class="form-label"
                        for="subscribe">الحالة</label><br>
                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1 mb-10">
                    <input checked=""
                            type="checkbox"
                            id="subscribe"
                            class="custom-control-input"
                            name="status">
                    <label class="custom-control-label"
                            for="subscribe">نعم</label>
                </div>
                <label class="form-label mb-0 mt-10"
                    for="subscribe">نعم</label> --}}

                <div class="form-group mt-10">
                    <label class="form-label"
                        for="dateInput">موعدالجلسة</label>
                    <input type="date"
                        name="start_at"
                        class="form-control"
                        id="dateInput"
                        placeholder="">
                </div>
                @error('start_at')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="form-label"
                           for="select01">اختر الكورس</label>
                    <select id="course_id"
                            name="course_id"
                            data-toggle="select"
                            class="form-control">
                            <option value="">اختر الكورس</option>
                            @foreach ( $courses as $course )
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                    </select>
                </div>
                @error('course_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label class="form-label">اختر الفصل</label>
                    <select name="section_id"
                            id="section_id"
                            class="form-control custom-select">

                    </select>
                    <small class="form-text text-muted">اختر الفصل الي ينتمي إليه هذا الدرس</small>
                </div>
                @error('section_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                        <div class="custom-file">
                            <input type="file"
                                id="file"
                                name="file"
                                accept=".pdf"
                                class="custom-file-input" multiple>
                            <label for="file"
                                class="custom-file-label">اختر المرفقات</label>
                        </div>
                        <small class="form-text text-muted">يجب أن تكون المرفقات بصيغة .pdf</small>
                </div>
                @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                        <button type="submit"
                                class="btn btn-primary">حفظ</button>

                    </div>
            </form>
            </div>

        </div>
    </div>


</div>
@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function () {
        $('#course_id').on('change', function () {
            var courseId = this.value;
            $('#section_id').html('');
            $.ajax({
                url: '{{ route('sections.get') }}?course_id='+courseId,
                type: 'get',
                success: function (res) {
                    $.each(res, function (key, value) {
                        $('#section_id').append('<option value="' + value
                            .id + '">' + value.title + '</option>');
                    });
                }
            });
        });
    });
</script>

@endsection
