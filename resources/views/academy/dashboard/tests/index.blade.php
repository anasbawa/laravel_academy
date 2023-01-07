@extends('academy.template.master')

@section('title')
    عرض الاختبارات
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
        <div class="page-separator__text">جميع الاختبارات</div>
    </div>

    <div class="row mb-32pt">

        <div class="col-lg-12 d-flex align-items-center">
            <div class="flex"
                 style="max-width: 100%">

                <div class="card m-0">

                    <div class="table-responsive"
                         data-toggle="lists"
                         data-lists-sort-by="js-lists-values-employee-name"
                         data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

                        <div class="card-header">
                            <div class="search-form">
                                <input type="text"
                                       class="form-control search"
                                       placeholder="Search ...">
                                <button class="btn"
                                        type="button"><i class="material-icons">search</i></button>
                            </div>
                        </div>

                        <table class="table mb-0 thead-border-top-0 table-nowrap">
                            <thead>
                                <tr>

                                    <th>
                                        <a href="javascript:void(0)"
                                           class="sort"
                                           data-sort="js-lists-values-employee-name">اسم الاختبار</a>
                                    </th>

                                    <th style="width: 37px;">الكورس</th>

                                    {{-- <th style="width: 120px;">
                                        <a href="javascript:void(0)"
                                           class="sort"
                                           data-sort="js-lists-values-activity">تاريخ البدء</a>
                                    </th> --}}
                                    <th style="width: 37px;">العمليات</th>
                                    <th style="width: 24px;"
                                        class="pl-0"></th>
                                </tr>
                            </thead>
                            <tbody class="list"
                                   id="search">
                                @foreach ( $tests as $test )
                                    <tr>
                                        <td>

                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong class="js-lists-values-employee-name"><a href="">{{ $test->name }}</strong></p>
                                                {{-- <small class="js-lists-values-employee-email text-50">{{ $course->level }}</small> --}}
                                            </div>

                                        </td>

                                        <td>

                                            <a href=""
                                            class="chip chip-outline-secondary">{{ $test->course->title }}</a>

                                        </td>

                                        {{-- <td class="text-50 js-lists-values-activity small">{{ $course->start_at  }}</td> --}}
                                        <td class="js-lists-values-earnings small">
                                            <div class="dropdown">
                                                <a href="#"
                                                   data-toggle="dropdown"
                                                   data-caret="false"
                                                   class="text-muted"><i class="material-icons">more_horiz</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @if ($test->active == 0)
                                                    <form action="{{ route('test.active') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="test_id" value="{{ $test->id }}">
                                                        <input type="hidden" name="active" value="1">
                                                        <button type="submit" class="dropdown-item text-secondary">تفعيل</button>
                                                    </form>
                                                    @elseif ($test->active == 1)
                                                    <form action="{{ route('test.inactive') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="test_id" value="{{ $test->id }}">
                                                        <input type="hidden" name="active" value="0">
                                                        <button type="submit" class="dropdown-item text-secondary">إالغاء تفعيل</button>
                                                    </form>
                                                    @endif
                                                    <a href="{{ route('topic.create', $test->id) }}"
                                                       class="dropdown-item">إضافة عنوان</a>


                                                    <div class="dropdown-divider"></div>
                                                    <form action="" method="POST" id="delete">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                        class="dropdown-item text-danger">
                                                            حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>

  </div>
@endsection

@section('js')

@endsection
