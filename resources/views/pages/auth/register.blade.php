@extends('template.master')

@section('title')
أكاديميتي | إنشاء حساب
@endsection

@section('css')

@endsection

@section('content')

<div class="mdk-header-layout js-mdk-header-layout">

    <div class="page-section container page__container">
        <div class="col-lg-10 p-0 mx-auto">
            <div class="row">
                <div class="col-md-6 mb-24pt mb-md-0">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label"
                                for="name">Your first and last name:</label>
                            <input id="name"
                                type="text"
                                name="name"
                                class="form-control"
                                placeholder="Your first and last name ...">
                        </div>
                        <div class="form-group">
                            <label class="form-label"
                                for="email">Your email:</label>
                            <input id="email"
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Your email address ...">
                        </div>
                        <div class="form-group mb-24pt">
                            <label class="form-label"
                                for="password">Password:</label>
                            <input id="password"
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Your password ..." required autocomplete="new-password">
                        </div>
                        <div class="form-group mb-24pt">
                            <label class="form-label"
                                for="password-confirm">Confirm Password:</label>
                            <input id="password-confirm"
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm Password ..." required>
                        </div>
                        <button class="btn btn-primary" type="submit">Create account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="page-separator justify-content-center m-0">
        <div class="page-separator__text">or sign-in with</div>
    </div>
    <div class="page-section text-center">
        <div class="container page__container">
            <a href="signup-payment.html"
               class="btn btn-secondary btn-block-xs">Facebook</a>
            <a href="signup-payment.html"
               class="btn btn-secondary btn-block-xs">Twitter</a>
            <a href="signup-payment.html"
               class="btn btn-secondary btn-block-xs">Google+</a>
        </div>
    </div>

</div>

@endsection

@section('js')

@endsection
