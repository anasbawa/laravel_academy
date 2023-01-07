@extends('academy.template.master')

@section('title')
    تعديل مسار أكاديمي
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

    <form method="POST" action="{{ route('paths.update', $path->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mb-32pt">
            <div class="col-lg-4">
                <div class="page-separator">
                    <div class="page-separator__text">تعديل مسار أكاديمي </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-center">
                <div class="flex"
                    style="max-width: 100%">
                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputName">اسم المسار</label>
                        <input type="text"
                                name="name"
                                value="{{ $path->name }}"
                            class="form-control"
                            id="exampleInputName"
                            placeholder="">
                    </div>
                    @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label class="form-label"
                               for="custom-select">اختر التخصص التعليمي</label>
                        <select id="custom-select"
                                class="form-control custom-select" name="specialization_id">
                                <option selected value="{{ $path->specialization->id }}">{{ $path->specialization->name }}</option>
                                @foreach ( $specializations as $specialization )
                                    <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('specialization_id')
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
                    @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

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
