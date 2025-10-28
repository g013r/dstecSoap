<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <i class="bi bi-shop-window"></i>
            <span>DSTEC Soap</span>
        </div>
        <button class="btn-toggle" id="sidebarToggle">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <ul class="sidebar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link active" data-page="dashboard" data-title="Dashboard">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" data-bs-toggle="collapse" data-bs-target="#categoriasMenu" class="nav-link">
                <i class="bi bi-folder"></i>
                <span>Categorías</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse submenu" id="categoriasMenu">
                <li>
                    <a href="#" data-page="views/categorias/listar.php" data-title="Ver Categorías">Ver Categorías</a>
                </li>
                <li>
                    <a href="#" data-page="views/categorias/crear.php" data-title="Nueva Categoría">Nueva Categoría</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" data-bs-toggle="collapse" data-bs-target="#productosMenu" class="nav-link">
                <i class="bi bi-box-seam"></i>
                <span>Productos</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse submenu" id="productosMenu">
                <li>
                    <a href="#" data-page="views/productos/listar.php" data-title="Ver Productos">Ver Productos</a>
                </li>
                <li>
                    <a href="#" data-page="views/productos/crear.php" data-title="Nuevo Producto">Nuevo Producto</a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" data-bs-toggle="collapse" data-bs-target="#serviciosMenu" class="nav-link">
                <i class="bi bi-tools"></i>
                <span>Servicios</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="collapse submenu" id="serviciosMenu">
                <li>
                    <a href="#" data-page="views/Servicios/servicios_ver.php" data-title="Ver Servicios">Ver Servicios</a>
                </li>
                <li>
                    <a href="#" data-page="views/Servicios/servicios_nuevo.php" data-title="Nuevo Servicio">Nuevo Servicio</a>
                </li>
                <li>
                    <a href="#" data-page="views/Servicios/servicios_detalles.php" data-title="Detalles">Detalles</a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<nav class="topbar d-flex align-items-center justify-content-end">
    <button class="btn btn-outline-primary btn-sm btn-user-info d-flex align-items-center gap-2">
        <i class="bi bi-person-circle"></i>
        <span class="user-info-name">Admin</span>
    </button>
</nav>