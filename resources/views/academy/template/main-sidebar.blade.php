<div class="mdk-drawer js-mdk-drawer"
                 id="default-drawer">
                <div class="mdk-drawer__content">
                    <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left"
                         data-perfect-scrollbar>

                        <!-- Sidebar Content -->

                        <div class="d-flex align-items-center navbar-height">
                            <form action="index.html"
                                  class="search-form search-form--black mx-16pt pr-0 pl-16pt">
                                <input type="text"
                                       class="form-control pl-0"
                                       placeholder="Search">
                                <button class="btn"
                                        type="submit"><i class="material-icons">search</i></button>
                            </form>
                        </div>

                        <a href="index.html"
                           class="sidebar-brand ">
                            <!-- <img class="sidebar-brand-icon" src="../../public/images/illustration/teacher/128/white.svg" alt="Luma"> -->

                            <span class="avatar avatar-xl sidebar-brand-icon h-auto">

                                <span class="avatar-title rounded bg-primary"><img src="{{ URL::asset('images/academies/'. auth()->user()->photo) }}"
                                         class="img-fluid"
                                         alt="logo" /></span>

                            </span>

                            <span>{{Auth::user()->name}}</span>
                        </a>

                        <div class="sidebar-heading">مؤسسة تعليمية</div>
                        <ul class="sidebar-menu">

                            <li class="sidebar-menu-item active">
                                <a class="sidebar-menu-button"
                                   href="{{ route('academy.report') }}">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">school</span>
                                    <span class="sidebar-menu-text">الإحصائيات</span>
                                </a>
                            </li>
                            {{-- <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="instructor-courses.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">import_contacts</span>
                                    <span class="sidebar-menu-text">Manage Courses</span>
                                </a>
                            </li> --}}

                            {{-- Start Instuctor --}}
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#instructor_menu">
                                   <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">trending_up</span>
                                    المدرسون
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="instructor_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('instructors.index') }}">
                                            <span class="sidebar-menu-text">عرض المدرسين</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('instructors.create') }}">
                                            <span class="sidebar-menu-text">إضافة</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- End Instructor --}}

                            {{-- Start Specializations --}}
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#specializations_menu">
                                   <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">receipt</span>
                                    التخصصات
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="specializations_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('specializations.index') }}">
                                            <span class="sidebar-menu-text">عرض التخصصات</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('specializations.create') }}">
                                            <span class="sidebar-menu-text">إضافة</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- End Specializations --}}

                            {{-- Start Paths --}}
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#paths_menu">
                                   <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">post_add</span>
                                    المسارات الأكاديمية
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="paths_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('paths.index') }}">
                                            <span class="sidebar-menu-text">عرض المسارت</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('paths.create') }}">
                                            <span class="sidebar-menu-text">إضافة</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- End Paths --}}

                            {{-- Start Course --}}
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#course_menu">
                                   <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
                                    الكورسات
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="course_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('courses.index') }}">
                                            <span class="sidebar-menu-text">عرض الكورسات</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('courses.create') }}">
                                            <span class="sidebar-menu-text">إضافة</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- End Course --}}

                            {{-- Start Lesson --}}
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#lesson_menu">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                                    الدروس
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="lesson_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('lessons.index') }}">
                                            <span class="sidebar-menu-text">عرص الكورسات</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('lessons.create') }}">
                                            <span class="sidebar-menu-text">إضاقة</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- End Lesson --}}

                            {{-- Start Students --}}
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#student_menu">
                                   <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">help</span>
                                    الطلاب
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="student_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('students.show') }}">
                                            <span class="sidebar-menu-text">عرص الطلاب</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('students.show') }}">
                                            <span class="sidebar-menu-text">قائمة التسجيل</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- End Students --}}

                            {{-- Start Test --}}
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#test_menu">
                                   <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">trending_up</span>
                                   الاختبارات
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="test_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('tests.index') }}">
                                            <span class="sidebar-menu-text">عرض الاختبارات</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('test.create') }}">
                                            <span class="sidebar-menu-text">إضافة اختبار</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="{{ route('topics.index') }}">
                                            <span class="sidebar-menu-text"> العناوين</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            {{-- End Tests --}}

                            {{-- <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="instructor-earnings.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">trending_up</span>
                                    <span class="sidebar-menu-text">Earnings</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="instructor-statement.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">receipt</span>
                                    <span class="sidebar-menu-text">Statement</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="instructor-edit-course.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">post_add</span>
                                    <span class="sidebar-menu-text">Edit Course</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="instructor-edit-quiz.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">format_shapes</span>
                                    <span class="sidebar-menu-text">Edit Quiz</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button js-sidebar-collapse"
                                   data-toggle="collapse"
                                   href="#enterprise_menu">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">donut_large</span>
                                    Enterprise
                                    <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                </a>
                                <ul class="sidebar-submenu collapse sm-indent"
                                    id="enterprise_menu">
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="staff.html">
                                            <span class="sidebar-menu-text">Staff</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           href="leaves.html">
                                            <span class="sidebar-menu-text">Leaves</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button disabled"
                                           href="departments.html">
                                            <span class="sidebar-menu-text">Departments</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                        </ul>

                        <!-- // END Sidebar Content -->

                    </div>
                </div>
            </div>
