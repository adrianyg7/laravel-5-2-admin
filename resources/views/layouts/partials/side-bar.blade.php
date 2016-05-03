<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview {{ active_if('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Inicio</span>
                </a>
            </li>

            @if (
                auth()->user()->can('admin.users.index') or
                auth()->user()->can('admin.roles.index') or
                auth()->user()->can('admin.permissions.index')
            )
            <li
                class="treeview 
                {{ active_if(
                    ['admin.users.index', '*'], 
                    ['admin.roles.index', '*'],
                    ['admin.permissions.index', '*']
                ) }}"
            >
                <a href="#">
                    <i class="fa fa-unlock"></i>
                    <span>Accesos</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                    @can ('admin.users.index')
                    <li class="{{ active_if(['admin.users.index', '*']) }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            Usuarios
                        </a>
                    </li>
                    @endcan

                    @can ('admin.roles.index')
                    <li class="{{ active_if(['admin.roles.index', '*']) }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-users"></i>
                            Roles
                        </a>
                    </li>
                    @endcan

                    @can ('admin.permissions.index')
                    <li class="{{ active_if(['admin.permissions.index', '*']) }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-key"></i>
                            Permisos
                        </a>
                    </li>
                    @endcan
                    
                </ul>
            </li>
            @endif

        </ul>
    </section>
</aside>
