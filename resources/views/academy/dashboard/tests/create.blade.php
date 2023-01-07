@extends('academy.template.master')

@section('title')
    إضافة اختبار
@endsection

@section('page-title')
<div class="pt-32pt">
  <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
      <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

          <div class="mb-24pt mb-sm-0 mr-sm-24pt">
              <h2 class="mb-0"></h2>

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

    <div class="page-separator">
        <div class="page-separator__text">إضاقة اختبار</div>
    </div>
    <form action="{{ route('test.store') }}" method="POST">
        @csrf
        <div class="row mb-32pt">

            <div class="col-lg-8 d-flex align-items-center">
                <div class="flex"
                    style="max-width: 100%">

                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputName">عنوان الاختبار</label>
                        <input type="text"
                            class="form-control"
                            id="exampleInputName"
                            name="name"
                            placeholder="اكتب عنوان الاختبار">
                    </div>
                    @error('name')
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
                    <button type="submit"
                            class="btn btn-primary">تأكيد</button>

                </div>
            </div>

        </div>
    </form>

</div>
@endsection

@section('js')

@endsection
