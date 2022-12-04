<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#categoria" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Categoria</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="categoria">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/categoria/criar') }}">Adicionar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/categoria') }}">Ver</a></li>
          </ul>
        </div>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#produto" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-plus-circle menu-icon"></i>
          <span class="menu-title">Imobiliario</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="produto">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/produto/criar') }}">Adicionar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/produto') }}">Ver</a></li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Usuarios</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users/criar')}}"> Adicionar</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users')}}"> Ver </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/sliders')}}">
          <i class="mdi mdi-view-carousel menu-icon"></i>
          <span class="menu-title">Home Slider</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/configuracao')}}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Configurações</span>
        </a>
      </li>

    </ul>
  </nav>