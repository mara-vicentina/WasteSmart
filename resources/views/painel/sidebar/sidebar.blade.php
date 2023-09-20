<div class="row flex-nowrap">
  <div class="bg-sec-color min-vh-100 d-flex flex-column justify-content-between">
    <div class="bg-sec-color p-3">
      <a class="d-flex align-items-center text-decoration-none mt-4 bg-body-tertiary py-2 rounded-pill">
        <img class="img-sidebar" src="{{ asset('public/img/logo-connected.png') }}" alt="">
        <!-- <span class="d-none fs-3 d-sm-inline custom-title-sidebar ms-3 text-white">Connected City</span> -->
      </a>
      <div class="align-items-left mt-5">
        <p class="text-white fs-5">MENU DO PAINEL</p>
      </div>
      <ul class="nav nav-pills flex-column mt-3">
        <li class="nav-item py-3 py-sm-0 mt-3">
          <a href="{{ Auth::user()->type === 'admin' ? url('painel/dashboard/admin') : url('painel/dashboard') }}" class="nav-link rounded-pill text-white {{ $currentPage == 'dashboard' ? 'active-sidebar' : '' }}">
            <i data-feather="bar-chart"></i>
            <span class="fs-5 ms-3 d-none d-sm-inline custom-title-sidebar">Dashboard</span>
          </a>
        </li>
        <li class="nav-item py-3 py-sm-0 mt-3">
          <a href="{{ Auth::user()->type === 'admin' ? url('painel/public-lighting/admin') : url('painel/public-lighting') }}" class="nav-link rounded-pill text-white {{ $currentPage == 'public-lighting' ? 'active-sidebar' : '' }}">
            <i data-feather="sun"></i>
            <span class="fs-5 ms-3 d-none d-sm-inline custom-title-sidebar">Iluminação Pública</span>
          </a>
        </li>
        <li class="nav-item py-3 py-sm-0 mt-3">
          <a href="{{ Auth::user()->type === 'admin' ? url('painel/infraestructure/admin') : url('painel/infraestructure') }}" class="nav-link rounded-pill text-white {{ $currentPage == 'infraestructure' ? 'active-sidebar' : '' }}">
            <i data-feather="columns"></i>
            <span class="fs-5 ms-3 d-none d-sm-inline custom-title-sidebar">Infraestrutura</span>
          </a>
        </li>
        <li class="nav-item py-3 py-sm-0 mt-3">
          <a href="{{ Auth::user()->type === 'admin' ? url('painel/accessibility/admin') : url('painel/accessibility') }}" class="nav-link rounded-pill text-white {{ $currentPage == 'accessibility' ? 'active-sidebar' : '' }}">
            <i data-feather="users"></i>
            <span class="fs-5 ms-3 d-none d-sm-inline custom-title-sidebar">Acessibilidade</span>
          </a>
        </li>
        <li class="nav-item py-3 py-sm-0 mt-3">
          <a href="{{ Auth::user()->type === 'admin' ? url('painel/traffic-security/admin') : url('painel/traffic-security') }}" class="nav-link rounded-pill text-white {{ $currentPage == 'traffic-security' ? 'active-sidebar' : '' }}">
            <i data-feather="disc"></i>
            <span class="fs-5 ms-3 d-none d-sm-inline custom-title-sidebar">Trânsito e Segurança</span>
          </a>
        </li>
        <li class="nav-item py-3 py-sm-0 mt-3">
          <a href="{{ url('/logout') }}" class="nav-link rounded-pill text-white">
            <i data-feather="power"></i>
            <span class="fs-5 ms-3 d-none d-sm-inline custom-title-sidebar">Sair da Conta</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>