<header class="box_nav">
    <img src="assets/img/img_3.png" alt="">
</header>

<nav class="menu_lateral" id="btn_exp">
    <div class="btn_expandir">
        <i class="bi bi-list"></i>
    </div>
    <ul>
        <li class="item_menu">
            <a href="Panel_De_Usuario">
                <span class="icon"><i class="bi bi-person-circle"></i></span>
                <span class="txt_link">{{ Auth::user()->name }}</span>
            </a>
        </li>
        <li class="item_menu">
            <a href="Nueva_Solicitud">
                <span class="icon"><i class="bi bi-search"></i></span>
                <span class="txt_link">Consulta</span>
            </a>
        </li>
        <li class="item_menu">
            <a  href={{ route('consultasRecientes') }}>
                <span class="icon"><i class="bi bi-back"></i></span>
                <span class="txt_link">Recientes</span>
            </a>
        </li>
        <li class="item_menu">
            <a href="reporte_caso_usuario">
                <span class="icon"><i class="bi bi-bar-chart-line"></i></span>
                <span class="txt_link">Estadisticas</span>
            </a>
        </li>
        <li class="item_menu">
            <a href="Escalar_Caso">
                <span class="icon"><i class="bi bi-clipboard-check"></i></span>
                <span class="txt_link">Escalar Caso</span>
            </a>
        </li>
        <li class="item_menu">
            <a href="">
                <span class="icon"><i class="bi bi-tools"></i></span>
                <span class="txt_link">Ayuda</span>
            </a>
        </li>
        <li class="item_menu">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                <span class="txt_link">Cerrar Sesión</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
