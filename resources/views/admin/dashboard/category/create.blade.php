@extends('admin.template.master')

@section('title')
الإدارة | التصنيفات
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text">إضاقة صنف</div>
        </div>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="row mb-32pt">
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex"
                        style="max-width: 100%">

                        <div class="form-group">
                            <label class="form-label"
                                for="exampleInputText"></label>
                            <input type="text"
                                class="form-control"
                                id="exampleInputText"
                                name="title"
                                placeholder="" required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary">تأكيد</button>

                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

@section('js')

@endsection

