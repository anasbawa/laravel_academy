<title>@yield('title')</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@600&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="{{ URL::asset('assets/vendor/spinkit.css') }}"
              rel="stylesheet">

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

@yield('css')
