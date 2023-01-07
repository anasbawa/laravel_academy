<!DOCTYPE html>
<html lang="en"
      dir="rtl">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">



        @include('student.template.head')

    </head>

    <body class="layout-app ">

        {{-- <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>

            <!-- <div class="sk-bounce">
                <div class="sk-bounce-dot"></div>
                <div class="sk-bounce-dot"></div>
            </div> -->

            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
        </div> --}}

        <!-- Drawer Layout -->

        <div class="mdk-drawer-layout js-mdk-drawer-layout"
             data-push
             data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page-content">

                <!-- Header -->

                @include('academy.template.main-header')

                <!-- // END Header -->

                <!-- BEFORE Page Content -->

                @yield('page-title')

                <!-- // END BEFORE Page Content -->

                <!-- Page Content -->


                @yield('content')


                <!-- // END Page Content -->

                <!-- Footer -->

                @include('academy.template.footer')

                <!-- // END Footer -->

            </div>

            <!-- // END drawer-layout__content -->

            <!-- Drawer -->
            @include('academy.template.main-sidebar')


            <!-- // END Drawer -->

        </div>

        <!-- // END Drawer Layout -->

        @include('academy.template.scripts')



    </body>

</html>