<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="{{ route('dashboard.index') }}" class="brand-link">
    <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>

<div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Usuários
                        </p>
                    </a>
            </li>
            <li class="nav-item">
                    <a href="{{ route('banks.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Bancos
                        </p>
                    </a>
            </li>
            <li class="nav-item">
                    <a href="{{ route('transactions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Lançamentos
                        </p>
                    </a>
            </li>
        </ul>
    </nav>

</div>

</aside>