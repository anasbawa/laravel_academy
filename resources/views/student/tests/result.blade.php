@extends('template.master')

@section('title')
أكاديميتي | النتيجة
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">
    <div class="mdk-box bg-primary mdk-box--bg-gradient-primary2 js-mdk-box mb-0"
                     data-effects="blend-background">
                    <div class="mdk-box__content">
                        <div class="py-64pt text-center text-sm-left">
                            <div class="container d-flex flex-column justify-content-center align-items-center">
                                @if ($status)
                                    <p class="lead text-white-50 measure-lead-max mb-0">لقد اجتزت الاختبار بنجاح</p>
                                    <h1 class="text-white mb-24pt">الدرجة: {{ $result }} / {{ $total }}</h1>
                                    <a href="{{ route('student.paths.index') }}"
                                        class="btn btn-outline-white">متابعة الدراسة</a>
                                @elseif ($status == false)
                                    <p class="lead text-white-50 measure-lead-max mb-0">للأسف .. لم تتمكن من اجتياز الاختبار</p>
                                    <h1 class="text-white mb-24pt">الدرجة: {{ $result }} / {{ $total }}</h1>
                                    <a href="student-take-quiz.html"
                                        class="btn btn-outline-white">Restart quiz</a>
                                @endif

                            </div>
                        </div>
                    </div>
    </div>


</div>
<div class="container page__container page-section">

    <div class="row mb-32pt">
        <div class="col-lg-4">
            <div class="page-separator">
                <div class="page-separator__text">اترك انطباعك عن الكورس</div>
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
            <div class="flex"
                style="max-width: 100%">
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label"
                        for="exampleInputText">التعليق</label>
                    <input type="text"
                        class="form-control"
                        id="exampleInputText"
                        name="text"
                        placeholder="اترك تعليقا .." required>
                    <input type="hidden" name="course_id" value="{{ $test->course->id }}">
                </div>

                <button type="submit"
                        class="btn btn-primary">حفظ</button>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection
