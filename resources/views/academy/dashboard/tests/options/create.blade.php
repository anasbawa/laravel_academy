@extends('academy.template.master')

@section('title')
    إضافة اختيار
@endsection

@section('page-title')
<div class="pt-32pt">
  <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
      <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

          <div class="mb-24pt mb-sm-0 mr-sm-24pt">
              <h2 class="mb-0"></h2>

              <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="index.html"></a></li>

                  <li class="breadcrumb-item active">



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
        <div class="page-separator__text">إضاقة اختيار</div>
    </div>
    <form action="{{ route('option.store') }}" method="POST">
        @csrf
        <div class="row mb-32pt">

            <div class="col-lg-8 d-flex align-items-center">
                <div class="flex"
                    style="max-width: 100%">

                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputName"> نص الاختيار</label>
                        <input type="text"
                            class="form-control"
                            id="exampleInputName"
                            name="option_text"
                            placeholder="">
                    </div>
                    @error('option_text')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label class="form-label"
                            for="exampleInputNumber"> الدرجة </label>
                        <input type="number"
                            max="100"
                            min="0"
                            step="5"
                            value="0"
                            class="form-control"
                            id="exampleInputNumber"
                            name="points"
                            placeholder="">
                    </div>
                    @error('points')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                    <input type="hidden" name="test_id" value="{{ $question->topic->test->id }}">
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
