<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LEMA - Learning Management Admin Template</title>

    <!-- Prevent the demo from appearing in search engines -->
    <meta name="robots" content="noindex">

    <!-- Perfect Scrollbar -->
    <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css')}}" rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css" href="{{asset('assets/css/vendor-material-icons.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/vendor-material-icons.rtl.css')}}" rel="stylesheet">

    <!-- Font Awesome FREE Icons -->
    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/vendor-fontawesome-free.rtl.css')}}" rel="stylesheet">

    <!-- ion Range Slider -->
    <link type="text/css" href="{{asset('assets/css/vendor-ion-rangeslider.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/css/vendor-ion-rangeslider.rtl.css')}}" rel="stylesheet">

<style media="screen">
.mdk-header-layout__content {
  min-height: 50vh;
}
</style>



</head>
<body class="layout-fluid layout-sticky-subnav">
    <div class="preloader"></div>
    <div class="mdk-header-layout js-mdk-header-layout">

        <!-- Header -->
        <div id="header" class="mdk-header bg-dark js-mdk-header m-0" data-fixed>
            <div class="mdk-header__content">
                <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pr-0 pl-md-0 pr-0" id="navbar" data-primary>
                    <div class="container-fluid pr-0 ">
                        <!-- Navbar toggler -->
                        <button class="navbar-toggler navbar-toggler-custom d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                            <span class="material-icons">short_text</span>
                        </button>
                        <div class="d-flex sidebar-account flex-shrink-0 mr-auto mr-lg-0">
                            <a href="fluid-index.html" class="flex d-flex align-items-center text-underline-0">
                                <span class="flex d-flex flex-column text-white">
                                    <strong class="sidebar-brand">PEF</strong>
                                </span>
                            </a>
                        </div>
                        @auth
                          <div class="dropdown">
                              <a href="#account_menu" class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar" data-toggle="dropdown">
                                  <span class="ml-1 d-flex-inline">
                                      <span class="text-light">{{ Auth::user()->name }}</span>
                                  </span>
                              </a>
                              <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
                                  <div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">
                                      <span class="flex d-flex flex-column">
                                          <strong class="h5 m-0">{{ Auth::user()->name }}</strong>
                                      </span>

                                  </div>
                                  <div class="dropdown-divider"></div>
                                  <div>
                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          <span class="material-icons mr-2">exit_to_app</span> Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                  </div>
                              </div>
                          </div>
                        @else
                          <li class="nav-item" style="color: white !important;"><a href="{{ route('login')}}" class="nav-link">Connexion</a></li>
                          <li class="nav-item"><a href="{{ route('register')}}" class="nav-link">Inscription</a></li>
                        @endauth

                    </div>
                </div>

            </div>
        </div>

        <div class="mdk-header-layout__content page">


            <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">



            <div class="page__header page__header-nav mb-0">
                <div class="container-fluid page__container">
                    <div class="navbar navbar-secondary navbar-light navbar-expand-sm p-0 d-none d-md-flex" id="secondaryNavbar">
                        <ul class="nav navbar-nav">
                            <li class="nav-item active">
                                <a href="fluid-index.html" class="nav-link active">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Student</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="fluid-student-dashboard.html">Dashboard</a>
                                    <a class="dropdown-item" href="fluid-student-series.html">Series</a>
                                    <a class="dropdown-item" href="fluid-student-courses.html">Courses</a>
                                    <a class="dropdown-item" href="fluid-student-course.html">Course Lessons</a>
                                    <a class="dropdown-item" href="fluid-student-take-course.html">Take Course</a>
                                    <a class="dropdown-item" href="fluid-student-take-quiz.html">Take Quiz</a>
                                    <a class="dropdown-item" href="fluid-student-billing.html">Billing</a>
                                    <a class="dropdown-item" href="fluid-student-edit-account.html">Edit Account</a>
                                    <a class="dropdown-item" href="fluid-student-profile.html">Student Profile</a>
                                    <a class="dropdown-item" href="login.html">Login</a>
                                    <a class="dropdown-item" href="sign-up.html">Sign Up</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Instructor</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="fluid-instructor-dashboard.html">Dashboard</a>
                                    <a class="dropdown-item" href="fluid-instructor-courses.html">My Courses</a>
                                    <a class="dropdown-item" href="fluid-instructor-course-edit.html">Edit Course</a>
                                    <a class="dropdown-item" href="fluid-instructor-lesson-edit.html">Edit Lesson</a>
                                    <a class="dropdown-item" href="fluid-instructor-create-quiz.html">Create Quiz</a>
                                    <a class="dropdown-item" href="fluid-instructor-earnings.html">Earnings</a>
                                    <a class="dropdown-item" href="fluid-instructor-profile.html">Profile</a>
                                    <a class="dropdown-item" href="fluid-instructor-payout.html">Payout</a> </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">UI Components</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="fluid-ui-buttons.html">Buttons</a>
                                    <a class="dropdown-item" href="fluid-ui-alerts.html">Alerts</a>
                                    <a class="dropdown-item" href="fluid-ui-avatars.html">Avatars</a>
                                    <a class="dropdown-item" href="fluid-ui-modals.html">Modals</a>
                                    <a class="dropdown-item" href="fluid-ui-charts.html">Charts</a>
                                    <a class="dropdown-item" href="fluid-ui-icons.html">Icons</a>
                                    <a class="dropdown-item" href="fluid-ui-forms.html">Forms</a>
                                    <a class="dropdown-item" href="fluid-ui-range-sliders.html">Range Sliders</a>
                                    <a class="dropdown-item" href="fluid-ui-datetime.html">Time &amp; Date</a>
                                    <a class="dropdown-item" href="fluid-ui-tables.html">Tables</a>
                                    <a class="dropdown-item" href="fluid-ui-tabs.html">Tabs</a>
                                    <a class="dropdown-item" href="fluid-ui-loaders.html">Loaders</a>
                                    <a class="dropdown-item" href="fluid-ui-drag.html">Drag &amp; Drop</a>
                                    <a class="dropdown-item" href="fluid-ui-pagination.html">Pagination</a>
                                    <a class="dropdown-item" href="fluid-ui-vector-maps.html">Vector Maps</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Layouts</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.html">Admin</a>
                                    <a class="dropdown-item active" href="fluid-index.html">Full Width</a>
                                    <a class="dropdown-item" href="fixed-index.html">Fixed</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>





            <div class="mdk-header-layout__content">
              <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                  <div class="mdk-drawer-layout__content page">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 ">
                          @yield('content')
                        </div>
                      </div>
                    </div>
                  </div>
            </div>


            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

            <script>
                AOS.init();
            </script>



            <div class="bg-dark text-white" id="footer">
                <div class="container-fluid page__container">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="" class="brand d-flex align-items-center mb-4">
                                <span class="mr-2">
                                    <!-- LOGO -->
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 40 40" width="24" height="24">
                                        <g transform="matrix(1.6666666666666667,0,0,1.6666666666666667,0,0)">
                                            <path d="M12.177,7.4c-0.23,0-0.416,0.186-0.417,0.416v1.17c-0.011,0.23,0.166,0.426,0.396,0.437s0.426-0.166,0.437-0.396 c0.001-0.014,0.001-0.027,0-0.041V7.819c0.001-0.23-0.185-0.418-0.415-0.419C12.178,7.4,12.177,7.4,12.177,7.4z M7.51,18.486 c-0.23,0-0.416,0.186-0.416,0.416l0,0v0.585c-0.011,0.23,0.166,0.426,0.396,0.437s0.426-0.166,0.437-0.396 c0.001-0.014,0.001-0.027,0-0.041V18.9C7.925,18.671,7.739,18.487,7.51,18.486z M20.15,4.04c-0.232-0.047-0.4-0.252-0.4-0.489V2 c0-1.105-0.895-2-2-2H5.25c-1.637,0-2.972,1.311-3,2.948c0,0.017,0,18.052,0,18.052c0,1.657,1.343,3,3,3h14.5c1.105,0,2-0.895,2-2 V6C21.75,5.049,21.081,4.23,20.15,4.04z M4.25,3c0-0.552,0.448-1,1-1h12c0.276,0,0.5,0.224,0.5,0.5v1c0,0.276-0.224,0.5-0.5,0.5 h-12C4.698,4,4.25,3.552,4.25,3z M9.427,16.569c0,0.423-0.141,0.833-0.4,1.167c0.259,0.334,0.4,0.744,0.4,1.167v0.583 c-0.003,1.057-0.86,1.912-1.917,1.914H6.344c-0.414,0-0.75-0.336-0.75-0.75v-5.831c0-0.414,0.336-0.75,0.75-0.75H7.51 c1.058,0.002,1.915,0.859,1.917,1.917V16.569z M14.093,12.486c0,0.414-0.336,0.75-0.75,0.75s-0.75-0.336-0.75-0.75v-1.167 c-0.011-0.23-0.207-0.407-0.437-0.396c-0.214,0.011-0.386,0.182-0.396,0.396v1.167c0,0.414-0.336,0.75-0.75,0.75 s-0.75-0.336-0.75-0.75V7.819c0.024-1.058,0.902-1.897,1.96-1.873c1.024,0.023,1.849,0.848,1.873,1.873V12.486z M18.01,19.9 c0.414,0,0.75,0.336,0.75,0.75s-0.336,0.75-0.75,0.75c-1.702-0.002-3.081-1.382-3.083-3.084v-1.163 c0.002-1.702,1.381-3.082,3.083-3.084c0.414,0,0.75,0.336,0.75,0.75s-0.336,0.75-0.75,0.75c-0.874,0.001-1.582,0.71-1.583,1.584 v1.166C16.429,19.192,17.137,19.899,18.01,19.9z M7.51,15.569c-0.23,0-0.416,0.186-0.416,0.416l0,0v0.585 C7.083,16.8,7.26,16.996,7.49,17.007s0.426-0.166,0.437-0.396c0.001-0.014,0.001-0.027,0-0.041v-0.583 C7.927,15.757,7.74,15.57,7.51,15.569z" stroke="none" fill="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </span>
                                LEMA
                            </a>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <h5>Student</h5>
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="">
                                            <a href="#">Courses</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Take Course</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Profile</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Edit Account</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Instructor</h5>
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="">
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Edit Course</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Instructor Profile</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Quizzes</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Account</h5>
                                    <ul class="list-group list-group-flush mb-3">
                                        <li class="">
                                            <a href="#">Login</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Sign up</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Edit Account</a>
                                        </li>
                                        <li class="">
                                            <a href="#">Payout</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <h5>Contact us</h5>
                                    <div class="d-flex ">

                                        <a href="" class="btn btn-facebook btn-rounded-social d-flex align-items-center justify-content-center mr-2"><i class="fab fa-facebook"></i></a>
                                        <a href="" class="btn btn-twitter btn-rounded-social d-flex align-items-center justify-content-center mr-2"><i class="fab fa-twitter"></i></a>
                                        <a href="" class="btn btn-secondary btn-rounded-social d-flex align-items-center justify-content-center mr-2"><i class="fab fa-github"></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/vendor/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/dom-factory.js')}}"></script>
    <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>
    <script src="{{ asset('assets/vendor/ion.rangeSlider.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/ion.rangeSlider.min.js')}}"></script>
    <script src="{{ asset('assets/js/toggle-check-all.js')}}"></script>
    <script src="{{ asset('assets/js/check-selected-row.js')}}"></script>
    <script src="{{ asset('assets/js/dropdown.js')}}"></script>
    <script src="{{ asset('assets/js/sidebar-mini.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>

</body>

</html>
