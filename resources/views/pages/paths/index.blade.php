@extends('template.master')

@section('title')
أكاديميتي | عرض المسارات
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="container page__container page-section">
        <div class="page-section border-bottom-2">
            <div class="container page__container">
                <div class="page-separator">
                    <div class="page-separator__text">المسارات التعليمية</div>
                </div>

                <div class="row card-group-row">
                    @foreach ( $paths as $path )
                    <div class="col-sm-4 card-group-row__col">

                        <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card"
                            data-toggle=""
                            data-trigger="">

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <div class="flex">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded mr-12pt z-0 o-hidden">
                                                <div class="overlay">
                                                    <img src="{{ URL::asset('images/paths'). '/' .$path->photo }}"
                                                        width="40"
                                                        height="40"
                                                        alt="Angular"
                                                        class="rounded">
                                                    <span class="overlay__content overlay__content-transparent">
                                                        <span class="overlay__action d-flex flex-column text-center lh-1">
                                                            <small class="h6 small text-white mb-0"
                                                                style="font-weight: 500;"></small>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="card-title"><a href="{{ route('home.path.show', $path->id) }}">{{ $path->name }}</a></div>
                                                <p class="flex text-50 lh-1 mb-0"><small> عدد الكورسات: {{ $path->courses()->count() }} </small></p>
                                            </div>
                                        </div>
                                    </div>

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

