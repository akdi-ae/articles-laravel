
  @vite(['resources/js/app.js', 'resources/css/app.css'])
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ url('/admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('logo-qyzpu.jpg') }}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
       @role('admin')
        <span class="brand-text font-weight-light">Админ панель</span>
        @endrole
        @role('editor')
        <span class="brand-text font-weight-light">Редактор панель</span>
        @endrole
        @role('reviewer')
        <span class="brand-text font-weight-light">Рецензент панель</span>
        @endrole
    </a>
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
 @role('admin')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

               <li class="nav-item">
                    <a href="{{ route('admin.staff') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Пользователи</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('editorials.admin') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Статьи(Админ)</p>
                    </a>
                </li>
                @endrole

                 @role('editor')
                 <li class="nav-item">
                    <a href="{{ route('editor.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('editorials.admin') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Статьи (Редактор)</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profiles') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Профиль</p>
                    </a>
                </li>
                @endrole

                 @role('reviewer')
                <li class="nav-item">
                    <a href="{{ route('editorials.admin') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Статьи (Рецензент)</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profiles') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Профиль</p>
                    </a>
                </li>
                @endrole
@role('admin')

                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Настройки</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Профиль</p>
                    </a>
                </li>
@endrole
                <li class="nav-item">
                    <a href="#" class="nav-link"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Выйти</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>

</aside>
