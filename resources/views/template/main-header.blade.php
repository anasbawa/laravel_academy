 <!-- Header -->

 <div id="header"
 class="mdk-header js-mdk-header mb-0"
 data-fixed>
<div class="mdk-header__content">

    <div class="navbar navbar-expand navbar-light bg-white navbar-shadow"
         id="default-navbar"
         data-primary>

        <!-- Navbar toggler -->
        <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0"
                type="button"
                data-toggle="sidebar">
            <span class="material-icons">short_text</span>
        </button>

        <!-- Navbar Brand -->
        <a href="{{ route('home') }}"
           class="navbar-brand mr-16pt">
            <!-- <img class="navbar-brand-icon" src="../../public/images/logo/white-100@2x.png" width="30" alt="Luma"> -->

            <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">

                <span class="avatar-title rounded bg-primary"><img src="{{ URL::asset('assets/images/illustration/student/128/white.svg') }}"
                         alt="logo"
                         class="img-fluid" /></span>

            </span>

            <span class="d-none d-lg-block">أكاديمتي</span>
        </a>

        <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
            <li class="nav-item active">
                <a href="{{ route('home') }}"
                   class="nav-link">الرئيسية</a>
            </li>

            <li class="nav-item dropdown">
                <a href="{{ route('paths.all') }}"
                   class="nav-link dropdown-toggle"
                   data-toggle=""
                   data-caret="false">تصفح المسارات</a>

            </li>
            <li class="nav-item">
                <a href="{{ route('academies.show') }}"
                   class="nav-link">الأكاديميات</a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('teachers.all') }}"
                   class="nav-link dropdown-toggle"
                   data-toggle=""
                   data-caret="false">المدرسون</a>
                {{-- <div class="dropdown-menu">
                    <a href="instructor-dashboard.html"
                       class="dropdown-item">Instructor Dashboard</a>
                    <a href="instructor-courses.html"
                       class="dropdown-item">Manage Courses</a>
                    <a href="instructor-quizzes.html"
                       class="dropdown-item">Manage Quizzes</a>
                    <a href="instructor-earnings.html"
                       class="dropdown-item">Earnings</a>
                    <a href="instructor-statement.html"
                       class="dropdown-item">Statement</a>
                    <a href="instructor-edit-course.html"
                       class="dropdown-item">Edit Course</a>
                    <a href="instructor-edit-quiz.html"
                       class="dropdown-item">Edit Quiz</a>
                </div> --}}
            </li>

            @auth('web')
            <li class="nav-item dropdown"
                data-toggle="tooltip"
                data-title="{{ auth()->user()->name }}"
                data-placement="bottom"
                data-boundary="window">
                <a href="#"
                   class="nav-link dropdown-toggle text-primary"
                   data-toggle="dropdown"
                   data-caret="false">
                    <i class="material-icons">people_outline</i>
                </a>
                <div class="dropdown-menu">

                    <a href="{{ route('dashboard') }}"
                       class="dropdown-item">لوحة التحكم</a>
                    <a class="dropdown-item text-danger"
                       href="login.html" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" >تسجيل الخروج
                    </a>
                    <form method="POST" action="{{ route('logout') }}" id="logoutform">
                        @csrf
                    </form>

                </div>
            </li>
            @endauth
        </ul>





        <form class="search-form navbar-search d-none d-lg-flex mr-16pt"
              action="index.html"
              style="max-width: 230px">
            <button class="btn mr-20"
                    type="submit"><i class="material-icons">search</i></button>
            <input type="text"
                   class="form-control"
                   placeholder="Search ...">
        </form>

        <ul class="nav navbar-nav ml-auto mr-0">
            @guest('web')
            <li class="nav-item">
                <a href="{{ route('login') }}"
                   class="nav-link"
                   data-toggle="tooltip"
                   data-title="Login"
                   data-placement="bottom"
                   data-boundary="window"><i class="material-icons">lock_open</i></a>
            </li>
            @endguest

            @guest('web')
            <li class="nav-item">
                <a href="{{ route('register') }}"
                   class="btn btn-outline-dark">التسجيل</a>
            </li>
            @endguest
        </ul>
    </div>

</div>
</div>

<!-- // END Header -->

