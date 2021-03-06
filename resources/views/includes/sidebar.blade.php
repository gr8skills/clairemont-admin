@php
    $route = \Route::currentRouteName();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('about')}}" class="brand-link">
        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
{{--                <li class="nav-item {{$route === 'about' || $route === 'academics' || $route === 'admission'--}}
{{--                        || $route === 'student-life' || $route === 'giving' || $route === 'parents' ? 'menu-open' : ''}}">--}}
                <li class="nav-item menu-open">
                    <a href="" class="nav-link {{$route === 'about' || $route === 'academics' || $route === 'admission'
                        || $route === 'student-life' || $route === 'giving' || $route === 'parents' || $route === 'index'
                        || $route === 'page-edit' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Pages
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('landing-page')}}" class="nav-link {{ $route === 'index' ? 'active' : '' }}">
                                <i class="fa fa-circle-notch nav-icon"></i>
                                <p>Landing Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link {{ $route === 'about' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('academics') }}"
                               class="nav-link {{ $route === 'academics' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Academics</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admission') }}"
                               class="nav-link {{ $route === 'admission' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('articles') }}" class="nav-link {{ $route === 'articles' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Faith</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student-life') }}"
                               class="nav-link {{ $route === 'student-life' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student Life</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('giving') }}"
                               class="nav-link {{ $route === 'giving' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Giving</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('parents') }}"
                               class="nav-link {{ $route === 'parents' ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Parents</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('news') }}"
                       class="nav-link {{ $route === 'news' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            News
                        </p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('article') }}"--}}
{{--                       class="nav-link {{ $route === 'article' ? 'active' : ''}}">--}}
{{--                        <i class="nav-icon fas fa-scroll"></i>--}}
{{--                        <p>Articles</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a href="{{ route('site-setting') }}"
                       class="nav-link {{ $route === 'site-setting' ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Site Settings</p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-copy"></i>--}}
{{--                        <p>--}}
{{--                            User Management--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>User List</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Roles</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
