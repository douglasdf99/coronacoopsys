@php
    $configData = Helper::applClasses();
@endphp
{{--<div class="main-menu menu-fixed {{($configData['theme'] === 'light') ? "menu-light" : "menu-dark"}} menu-accordion menu-shadow" data-scroll-to-active="true">--}}
<div class="main-menu menu-fixed {{($configData['theme'] === 'light') ? "menu-dark" : "menu-dark"}} menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
              <a class="navbar-brand" href="dashboard-analytics">
{{--                    <div class="brand-logo"></div>--}}
                <img src="{{asset('images/logo-coop-enc.svg')}}" height="28px">
                <img src="{{asset('images/logo-coop.svg')}}" class="brand-text" height="28px">
{{--                    <h2 class="brand-text mb-0">Coopera Brasil</h2>--}}
                </a></li>
            <li class="nav-item nav-toggle">
              <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i
                ><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary collapse-toggle-icon" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
            <a href="{!! route('inicio') !!}">
              <i class="feather icon-grid"></i>
              <span class="menu-title" data-i18n="nav.page_user_profile">Início</span>
            </a>
          </li>
          <li class="navigation-header">
            <span>Confgurações</span>
          </li>

          <li class="nav-item {{ Request::is('admin/usuarios*') ? 'active' : '' }}">
            <a href="{!! route('usuarios.index') !!}">
              <i class="feather icon-user"></i>
              <span class="menu-title" data-i18n="nav.page_user_profile">Usuários</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/ramos*') ? 'active' : '' }}">
            <a href="{!! route('ramos.index') !!}">
              <i class="feather icon-grid"></i>
              <span class="menu-title" data-i18n="nav.page_user_profile">Ramos</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/produtos*') ? 'active' : '' }}">
            <a href="{!! route('produtos.index') !!}">
              <i class="feather icon-grid"></i>
              <span class="menu-title" data-i18n="nav.page_user_profile">Produtos</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/canais*') ? 'active' : '' }}">
            <a href="{!! route('canais.index') !!}">
              <i class="feather icon-grid"></i>
              <span class="menu-title" data-i18n="nav.page_user_profile">Canais</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/coop*') ? 'active' : '' }}">
            <a href="javascript:void(0)">
              <i class="feather icon-grid"></i>
              <span class="menu-title" data-i18n="nav.page_user_profile">Cooperativas</span>
            </a>
            <ul class="menu-content">
                <li class="{{ Request::is('admin/coops*') ? 'active' : '' }}">
                  <a href="{!! route('coops.index') !!}">
                    <i class="feather icon-list"></i>

                    <span class="menu-title" >Todas</span>
                  </a>
                </li>
                <li class="{{ Request::is('admin/coop-*') ? 'active' : '' }}">
                  <a href="{!! route('coops.inativas') !!}">
                    <i class="feather icon-eye-off"></i>

                    <span class="menu-title" >Inativas</span>
                  </a>
                </li>
            </ul>
          </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
