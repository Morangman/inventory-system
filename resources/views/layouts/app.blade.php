<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
            <div class="container">
                @guest
                @else
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::route('login') }}">{{ Lang::get('common.navbar.login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->getAttribute('first_name') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ URL::route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ Lang::get('common.navbar.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ URL::route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <ul class="navbar-nav">
                        @guest
                        @else
                        <li>
                            <a class="navbar-nav-link" href="{{ URL::route('profile.setlocale', 'en') }}">En</a>
                        </li>
                        <li>
                            <a class="navbar-nav-link" href="{{ URL::route('profile.setlocale', 'ru') }}">Ru</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-content">
        @guest
        @else
            <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

                <div class="sidebar-mobile-toggler text-center">
                    <a href="#" class="sidebar-mobile-main-toggle">
                        <i class="icon-arrow-left8"></i>
                    </a>
                    <a href="#" class="sidebar-mobile-expand">
                        <i class="icon-screen-full"></i>
                        <i class="icon-screen-normal"></i>
                    </a>
                </div>

                <div class="sidebar-content">
                    <div class="card card-sidebar-mobile">
                        <ul class="nav nav-sidebar" data-nav-type="accordion">
                            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs"></div> <i class="icon-menu" title="Main"></i></li>
                            <li class="nav-item">
                                <a href="{{ URL::route('index') }}" class="nav-link">
                                    <i class="icon-home4"></i>
                                    <span>
                                        {{ Lang::get('common.sidebar.dashboard') }}
                                    </span>
                                </a>
                            </li>
                            @include('user.link')
                            <li class="nav-item">
                                <a href="{{ URL::route('history.index') }}" class="nav-link">
                                    <i class="icon-book"></i>
                                    <span>
                                        {{ Lang::get('common.sidebar.history') }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-drawer"></i> <span>{{ Lang::get('common.sidebar.category') }}</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="{{ Lang::get('common.sidebar.category') }}">
                                    <li class="nav-item"><a href="{{ URL::route('category.create') }}" class="nav-link">{{ Lang::get('general.word.add') }}</a></li>
                                    <li class="nav-item"><a href="{{ URL::route('category.index') }}" class="nav-link">{{ Lang::get('general.word.edit') }}</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-checkmark"></i> <span>{{ Lang::get('common.sidebar.status') }}</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="{{ Lang::get('common.sidebar.status') }}">
                                    <li class="nav-item"><a href="{{ URL::route('status.create') }}" class="nav-link">{{ Lang::get('general.word.add') }}</a></li>
                                    <li class="nav-item"><a href="{{ URL::route('status.index') }}" class="nav-link">{{ Lang::get('general.word.edit') }}</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-location4"></i> <span>{{ Lang::get('common.sidebar.placement') }}</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="{{ Lang::get('common.sidebar.placement') }}">
                                    <li class="nav-item"><a href="{{ URL::route('placement.create') }}" class="nav-link">{{ Lang::get('general.word.add') }}</a></li>
                                    <li class="nav-item"><a href="{{ URL::route('placement.index') }}" class="nav-link">{{ Lang::get('general.word.edit') }}</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-pencil3"></i> <span>{{ Lang::get('common.sidebar.inventory_items') }}</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="{{ Lang::get('common.sidebar.inventory_items') }}">
                                    <li class="nav-item"><a href="{{ URL::route('item.create') }}" class="nav-link">{{ Lang::get('general.word.add') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endguest
            <div class="content-wrapper overflow-hide">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="{{ URL::asset('assets/js/vendor.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
</body>
</html>
