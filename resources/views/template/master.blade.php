<!DOCTYPE html>
<html lang="en"
      dir="rtl">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @include('template.head')
    </head>

    <body class="layout-sticky layout-sticky-subnav ">

        {{-- <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>

        </div> --}}

        <!-- Header Layout -->
        @include('template.main-header')


        @yield('content')


        <!-- // END Header Layout -->
        @include('template.footer')
       @include('template.script')
    </body>

</html>
