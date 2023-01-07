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

                                <span class="avatar-title rounded bg-primary"><img src="{{ URL::asset('images/students/' . auth('web')->user()->photo) }}"
                                         class="img-fluid"
                                         alt="logo" /></span>

                            </span>

                            <span>{{ auth()->user()->name }}</span>
                        </a>

                        <div class="sidebar-heading">طالب</div>
                        <ul class="sidebar-menu">

                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="index.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                                    <span class="sidebar-menu-text">الرئيسية</span>
                                </a>
                            </li>

                            <!-- الأكاديميات -->
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('academies.index') }}">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">local_library</span>
                                    <span class="sidebar-menu-text">الأكاديميات</span>
                                </a>
                            </li>

                            <!-- المسارات -->
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="{{ route('student.paths.index') }}">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">style</span>
                                    <span class="sidebar-menu-text">تصفح المسارات</span>
                                </a>
                            </li>

                            {{-- <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-dashboard.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">account_box</span>
                                    <span class="sidebar-menu-text">Student Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-my-courses.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">search</span>
                                    <span class="sidebar-menu-text">My Courses</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-paths.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">timeline</span>
                                    <span class="sidebar-menu-text">My Paths</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-path.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">change_history</span>
                                    <span class="sidebar-menu-text">Path Details</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-course.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">face</span>
                                    <span class="sidebar-menu-text">Course Preview</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-lesson.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">panorama_fish_eye</span>
                                    <span class="sidebar-menu-text">Lesson Preview</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-take-course.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">class</span>
                                    <span class="sidebar-menu-text">Take Course</span>
                                    <span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto">PRO</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-take-lesson.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">import_contacts</span>
                                    <span class="sidebar-menu-text">Take Lesson</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-take-quiz.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dvr</span>
                                    <span class="sidebar-menu-text">Take Quiz</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-quiz-results.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">poll</span>
                                    <span class="sidebar-menu-text">My Quizzes</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-quiz-result-details.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">live_help</span>
                                    <span class="sidebar-menu-text">Quiz Result</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-path-assessment.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">layers</span>
                                    <span class="sidebar-menu-text">Skill Assessment</span>
                                </a>
                            </li>
                            <li class="sidebar-menu-item">
                                <a class="sidebar-menu-button"
                                   href="student-path-assessment-result.html">
                                    <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">assignment_turned_in</span>
                                    <span class="sidebar-menu-text">Skill Result</span>
                                </a>
                            </li> --}}

                        </ul>

                        <!-- // END Sidebar Content -->

                    </div>
                </div>
            </div>
