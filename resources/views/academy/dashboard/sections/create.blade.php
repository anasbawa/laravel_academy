@extends('academy.template.master')

@section('title')
    إضافة فصل
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
        <div class="page-separator__text">إضاقة فصل</div>
    </div>
    <form action="{{ route('sections.store') }}" method="POST">
        @csrf
        <div class="row mb-32pt">
            <div class="col-lg-4">
                <div class="page-separator">
                    <div class="page-separator__text">{{ $course_name }}</div>
                </div>

            </div>

            <div class="col-lg-8 d-flex align-items-center">
                <div class="flex"
                    style="max-width: 100%">

                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputEmail1">عنوان الفصل</label>
                        <input type="text"
                            class="form-control"
                            id="exampleInputEmail1"
                            name="title"
                            placeholder="اكتب عنوان الفصل">
                    </div>
                    @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputPassword1">ترتيب الفصل</label>
                        <input type="hidden"
                            class="form-control"
                            value="2"
                            id="exampleInputPassword1"
                            name="order"
                            placeholder="">
                    </div>
                    @error('order')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <input type="hidden"
                            class="form-control"
                            id="exampleInputPassword1"
                            name="course_id"
                            value="{{ $course_id }}"
                            placeholder="">
                    </div>
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
