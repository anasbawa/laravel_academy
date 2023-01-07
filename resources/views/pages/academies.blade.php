@extends('template.master')

@section('title')
أكاديميتي | عرض الأكاديميات
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="container page__container page-section">
        <div class="page-section border-bottom-2">
            <div class="container page__container">

                <div class="page-separator">
                    <div class="page-separator__text">أبرز الأكاديميات التعليمية</div>
                </div>

                <div class="row card-group-row">
                    @foreach ( $academies as $academy )

                        <div class="col-md-6 col-lg-4 card-group-row__col">

                            <div class="card posts-card">
                                <div class="posts-card__content d-flex align-items-center flex-wrap">
                                    <div class="avatar avatar-lg mr-3">
                                        <a href=""><img src="{{ URL::asset('images/academies/' . $academy->photo) }}"
                                                alt="avatar"
                                                class="avatar-img rounded"></a>
                                    </div>
                                    <div class="posts-card__title flex d-flex flex-column">
                                        <a href="/academies/{{  $academy->id }}/{{ $academy->name }}"
                                        class="card-title mr-3">{{ $academy->name }}</a>
                                        <small class="text-50">{{ $academy->email }}</small>
                                    </div>

                                </div>
                            </div>

                        </div>

                    @endforeach


                </div>



            </div>
        </div>

    </div>
</div>

@endsection

@section('js')

@endsection

