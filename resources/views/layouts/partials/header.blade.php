<header class="main-header">
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <span class="logo-mini">
            <img src="{{ asset('img/logo-xs.png') }}" />
        </span>
        <span class="logo-lg">
            <img src="{{ asset('img/logo-sm.png') }}" />
        </span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('img/logo-xs.png') }}" class="user-image" alt="User Image" />
                        <span class="hidden-xs">
                            {{ auth()->user()->present()->full_name }}
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('img/logo-lg.png') }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ auth()->user()->present()->full_name }}
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.users.show', auth()->user()) }}" class="btn btn-default btn-flat">
                                    <i class="fa fa-user"></i>
                                    Perfil
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat">
                                    <i class="fa fa-sign-out"></i>
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
