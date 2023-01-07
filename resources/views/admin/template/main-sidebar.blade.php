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

                                <span class="avatar-title rounded bg-primary"><img src="{{ URL::asset('assets/images/people/110/guy-1.jpg') }}"
                                         class="img-fluid"
                                         alt="logo" /></span>

                            </span>

                            <span>{{ auth('admin')->user()->name }}</span>
                        </a>

                        <div class="sidebar-heading">مسؤول</div>
                        <ul class="sidebar-menu">
                            <li class="sidebar-menu-item">
                              <a class="sidebar-menu-button"
                                 data-toggle="collapse"
                                 href="#category_menu">
                                  <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">tune</span>
                                  التصنيفات
                                  <span class="ml-auto sidebar-menu-toggle-icon"></span>
                              </a>
                              <ul class="sidebar-submenu collapse sm-indent"
                                  id="category_menu">

                                  <li class="sidebar-menu-item">
                                      <a class="sidebar-menu-button"
                                         href="{{ route('category.index') }}">
                                          <span class="sidebar-menu-text">عرض</span>
                                      </a>
                                  </li>
                                  <li class="sidebar-menu-item">
                                      <a class="sidebar-menu-button"
                                         href="{{ route('category.create') }}">
                                          <span class="sidebar-menu-text">إضافة</span>
                                      </a>
                                  </li>
                              </ul>
                            </li>
                        </ul>

                        <!-- // END Sidebar Content -->

                    </div>
                </div>
            </div>
