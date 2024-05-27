<header class="box_nav">
    <img src="assets/img/img_3.png" alt="">
</header>

<nav class="menu_lateral" id="btn_exp">

    <div class="btn_expandir">
        <i class="bi bi-list"></i>
    </div>

    <ul>
        <li class="item_menu">
            <a href="Panel_De_Usuario_Coordinador">
                <span class="icon"><i class="bi bi-person-circle"></i></span>
                <span class="txt_link">{{ Auth::user()->name }}</span>
            </a>
        </li>
        <li class="item_menu">
            <a href="Reporte_Caso">
                <span class="icon"><i class="bi bi-search"></i></span>
                <span class="txt_link">Reportes</span>
            </a>
        </li>
        <li class="item_menu">
            <a href="casos_escalados">
                <span class="icon"><i class="bi bi-clipboard-check"></i></span>
                <span class="txt_link">Casos escalados</span>
            </a>
        </li>
        <li class="item_menu">
            <a href="productos">
                <span class="icon"><i class="bi bi-back"></i></span>
                <span class="txt_link">Productos</span>
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
