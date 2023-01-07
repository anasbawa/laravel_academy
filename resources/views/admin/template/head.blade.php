<title>@yield('title')</title>

<!-- Prevent the demo from appearing in search engines -->
<meta name="robots"
content="noindex">
<!-- Favicon -->
{{-- <link rel="shortcut icon" href="{{ URL::asset('assets/admin/images/favicon.ico') }}" /> --}}

<link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

<!-- Preloader -->
{{-- <link type="text/css"
href="{{ URL::asset('assets/vendor/spinkit.css') }}"
rel="stylesheet"> --}}

<!-- Perfect Scrollbar -->
<link type="text/css"
href="{{ URL::asset('assets/vendor/perfect-scrollbar.css') }}"
rel="stylesheet">

<!-- Material Design Icons -->
<link type="text/css"
href="{{ URL::asset('assets/css/material-icons.css') }}"
rel="stylesheet">

<!-- Font Awesome Icons -->
<link type="text/css"
href="{{ URL::asset('assets/css/fontawesome.css') }}"
rel="stylesheet">

<!-- Preloader -->
<link type="text/css"
href="{{ URL::asset('assets/css/preloader.css') }}"
rel="stylesheet">

<!-- App CSS -->
<link type="text/css"
href="{{ URL::asset('assets/css/app.css') }}"
rel="stylesheet">

<!-- yeild css -->
@yield('css')