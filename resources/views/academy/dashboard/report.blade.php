@extends('academy.template.master')

@section('title')
    التقارير
@endsection

@section('page-title')

@endsection

@section('css')

@endsection

@section('content')
<div class="container page__container page-section">

    <div class="page-separator">
        <div class="page-separator__text">التقارير</div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-1 border-left-3 border-left-accent text-center mb-lg-0">
                        <div class="card-body">
                            <h4 class="h2 mb-0">{{ $academy->specializations()->count() }}</h4>
                            <div>تخصصا أكاديميا</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center mb-lg-0">
                        <div class="card-body">
                            <h4 class="h2 mb-0">{{ $academy->paths()->count() }}</h4>
                            <div>مسارا تعليميا</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center mb-lg-0">
                        <div class="card-body">
                            <h4 class="h2 mb-0">{{ $academy->instructors()->count() }}</h4>
                            <div>مدرسا مختصا</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center mb-lg-0">
                        <div class="card-body">
                            <h4 class="h2 mb-0">{{ $academy->students()->count() }}</h4>
                            <div>طالبا مستفيدا</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-center mb-lg-0">
                        <div class="card-body">
                            <h4 class="h2 mb-0">5</h4>
                            <div>دورات تعليمية</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

  </div>
@endsection

@section('js')

@endsection
