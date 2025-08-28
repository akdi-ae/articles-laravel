
  @vite(['resources/js/app.js', 'resources/css/app.css'])
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ url('/admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('logo-qyzpu.jpg') }}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Админ панель</span>
    </a>


    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->getAvatarUrl() ?? asset('default-avatar.jpeg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

               <li class="nav-item">
                    <a href="{{ route('admin.stats') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Cтатистика</p>
                    </a>
                </li>
               @role('admin')
                <li class="nav-item">
                    <a href="{{ route('admin.adminList') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Статьи(Админ)</p>
                    </a>
                </li>
                @endrole

                 @role('editor')
                <li class="nav-item">
                    <a href="{{ route('admin.editorList') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Статьи (Редактор)</p>
                    </a>
                </li>
                @endrole

                 @role('reviewer')
                <li class="nav-item">
                    <a href="{{ route('admin.reviewerList') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Статьи (Рецензент)</p>
                    </a>
                </li>
                @endrole


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
