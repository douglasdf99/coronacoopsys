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
          <li class="nav-item {{ Request::is('admin/coops*') ? 'active' : '' }}">
            <a href="{!! route('coops.index') !!}">
              <i class="feather icon-grid"></i>
              <span class="menu-title" data-i18n="nav.page_user_profile">Cooperativas</span>
            </a>
          </li>
            {{-- Foreach menu item starts --}}
            @foreach($menuData[0]->menu as $menu)
                @if(isset($menu->navheader))
                    <li class="navigation-header">
                        <span>{{ $menu->navheader }}</span>
                    </li>
                @else
                  {{-- Add Custom Class with nav-item --}}
                  @php
                    $custom_classes = "";
                    if(isset($menu->classlist)) {
                      $custom_classes = $menu->classlist;
                    }
                    $translation = "";
                    if(isset($menu->i18n)){
                        $translation = $menu->i18n;
                    }
                  @endphp
                  <li class="nav-item {{ (request()->is($menu->url)) ? 'active' : '' }} {{ $custom_classes }}">
                        <a href="{{ $menu->url }}">
                            <i class="{{ $menu->icon }}"></i>
                            <span class="menu-title" data-i18n="{{ $translation }}">{{ $menu->name }}</span>
                            @if (isset($menu->badge))
                                <?php $badgeClasses = "badge badge-pill badge-primary float-right" ?>
                                <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass.' test' : $badgeClasses.' notTest' }} ">{{$menu->badge}}</span>
                            @endif
                        </a>
                        @if(isset($menu->submenu))
                            @include('panels/submenu', ['menu' => $menu->submenu])
                        @endif
                    </li>
                @endif
            @endforeach
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
