@extends('academy.template.master')

@section('title')
طلبات التسجيل
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
        <div class="page-separator__text"> قائمة الطلاب</div>
    </div>
    <div class="card mb-32pt">

        <div class="table-responsive"
             data-toggle="lists"
             data-lists-sort-by="js-lists-values-date"
             data-lists-sort-desc="true"
             data-lists-values='["js-lists-values-name", "js-lists-values-department", "js-lists-values-status", "js-lists-values-type", "js-lists-values-phone", "js-lists-values-date"]'>

            <table class="table mb-0 thead-border-top-0 table-nowrap">
                <thead>
                    <tr>
                        <th style="width: 18px;"
                            class="pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       class="custom-control-input js-toggle-check-all"
                                       data-target="#employees"
                                       id="customCheckAllemployees">
                                <label class="custom-control-label"
                                       for="customCheckAllemployees"><span class="text-hide">Toggle all</span></label>
                            </div>
                        </th>

                        <th>
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-name">الاسم</a>
                        </th>

                        <th style="width: 150px;">
                            <a href="javascript:void(0)"
                               class="sort"
                               data-sort="js-lists-values-department">التاريخ</a>
                        </th>

                        <th style="width: 24px;"></th>
                    </tr>
                </thead>
                <tbody class="list"
                       id="employees">
                    @foreach ( $students as $student )
                    <tr>

                        <td class="pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       class="custom-control-input js-check-selected-row"
                                       id="customCheck1_employees2">
                                <label class="custom-control-label"
                                       for="customCheck1_employees2"><span class="text-hide">Check</span></label>
                            </div>
                        </td>

                        <td>

                            <div class="media flex-nowrap align-items-center"
                                 style="white-space: nowrap;">
                                 <div class="avatar avatar-sm mr-8pt">

                                    <img src="{{ URL::asset('assets/images/people/50/guy-4.jpg') }}"
                                         alt="طالب"
                                         class="avatar-img rounded-circle">

                                </div>
                                <div class="media-body">

                                    <div class="d-flex align-items-center">
                                        <div class="flex d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-name"></strong>{{ $student->name }}</p>
                                            <small class="js-lists-values-email text-50"></small>
                                        </div>

                                        {{-- <div class="d-flex align-items-center ml-24pt">
                                            <i class="material-icons text-20 icon-16pt">comment</i>
                                            <small class="ml-4pt"><strong class="text-50">1</strong></small>
                                        </div> --}}

                                    </div>

                                </div>
                            </div>

                        </td>

                        <td>

                            <div class="media flex-nowrap align-items-center"
                                 style="white-space: nowrap;">
                                <div class="avatar avatar-sm mr-8pt">
                                    <span class="avatar-title rounded bg-light text-black-100"></span>
                                </div>
                                <div class="media-body">
                                    <div class="d-flex flex-column">
                                        <small class="js-lists-values-department"><strong>{{ $student->created_at->diffForHumans() }}</strong></small>
                                        <small class="js-lists-values-location text-50"></small>
                                    </div>
                                </div>
                            </div>

                        </td>

                        <td class="text-right">
                            <div class="dropdown">
                                <a href="#"
                                   data-toggle="dropdown"
                                   data-caret="false"
                                   class="text-muted"><i class="material-icons">more_horiz</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <form action="{{ route('student.accept') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                        <button type="submit"
                                            class="dropdown-item">قبول</button>
                                    </form>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('student.reject', $student->id) }}" method="POST" id="delete">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="dropdown-item text-danger">
                                            رفض
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

        <div class="card-footer p-8pt">

            <ul class="pagination justify-content-start pagination-xsm m-0">
                <li class="page-item disabled">
                    <a class="page-link"
                       href="#"
                       aria-label="Previous">
                        <span aria-hidden="true"
                              class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Page 1">
                        <span>1</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Page 2">
                        <span>2</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true"
                              class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- <div class="card-body bordet-top text-right">
        15 <span class="text-50">of 1,430</span> <a href="#" class="text-50"><i class="material-icons ml-1">arrow_forward</i></a>
        </div> -->

    </div>

</div>
@endsection

@section('js')

@endsection
