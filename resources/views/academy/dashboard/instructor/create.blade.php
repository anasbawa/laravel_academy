@extends('academy.template.master')

@section('title')
    Add new instructor
@endsection

@section('page-title')
<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">إضافة مدرس</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item active">

                        إضافة

                    </li>

                    <li class="breadcrumb-item"><a href="index.html">المدرسين</a></li>


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
    <form method="POST" action="{{ route('instructors.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-32pt">
            <div class="col-lg-4">
                <div class="page-separator">
                    <div class="page-separator__text">المعلومات الشخصية</div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-center">
                <div class="flex"
                    style="max-width: 100%">
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label"
                                for="validationSample01">الاسم الأول</label>
                            <input type="text"
                                name="first_name"
                                class="form-control"
                                id="validationSample01"
                                placeholder="الاسم الأول"
                                required="">
                            <div class="invalid-feedback">Please provide a first name.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-12 col-md-6 mb-3">
                            <label class="form-label"
                                for="validationSample02">الاسم الأخير</label>
                            <input type="text"
                                name="last_name"
                                class="form-control"
                                id="validationSample02"
                                placeholder="الاسم الأخير"
                                required="">
                            <div class="invalid-feedback">Please provide a last name.</div>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputEmail1">البريد الإلكتروني:</label>
                        <input type="email"
                                name="email"
                            class="form-control"
                            id="exampleInputEmail1"
                            placeholder="أدخل البريد الإلكتروني">
                    </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputAbout">الوصف: </label>
                        <input type="text"
                                name="about"
                            class="form-control"
                            id="exampleInputAbout"
                            placeholder="اكتب الوصف">
                    </div>
                    @error('about')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label class="form-label"
                               for="select01">اختر التخصص</label>
                        <select id="specialization"
                                name="specialization_id"
                                data-toggle="select"
                                class="form-control">
                                <option value="">اختر التخصص</option>
                                @foreach ( $specializations as $specialization )
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('specialization_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="form-group mb-3">
                        <label class="form-label"
                            for="exampleInputEmail1">الاختصاص</label>
                        <input type="text"
                                name="specialization"
                            class="form-control"
                            id="exampleInputEmail1"
                            placeholder="الاختصاص">
                    </div>
                    @error('specialization')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file"
                                id="file"
                                name="photo"
                                class="custom-file-input">
                            <label for="file"
                                class="custom-file-label">اختر صورة</label>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row mb-32pt">
            <div class="col-lg-4">
                <div class="page-separator">
                    <div class="page-separator__text">التواصل الاجتماعي</div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-center">
                <div class="flex"
                    style="max-width: 100%">
                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputEmail1">فيسبوك</label>
                        <input type="text"
                                name="facebook"
                            class="form-control"
                            id="exampleInputEmail1"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputEmail1">تويتر</label>
                        <input type="text"
                                name="twitter"
                            class="form-control"
                            id="exampleInputEmail1"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputEmail1">غيت هاب</label>
                        <input type="text"
                                name="github"
                            class="form-control"
                            id="exampleInputEmail1"
                            placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit"
        class="btn btn-primary">تأكيد</button>
    </form>
</div>

@endsection

@section('js')

@endsection

{{-- <div class="page-separator">
    <div class="page-separator__text">Earnings</div>
</div>
<div class="card card-body mb-32pt">
    fff
</div>
</div> --}}
