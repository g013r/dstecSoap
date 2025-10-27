<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSTEC - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- Sidebar -->
    <?php include 'views/layouts/nav.php'; ?>
    
    <!-- Mobile Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <nav class="topbar">
            <button class="btn-menu" id="menuToggle">
                <i class="bi bi-list"></i>
            </button>
            <h5 class="mb-0" id="pageTitle">Dashboard</h5>
            <div class="ms-auto d-flex align-items-center gap-3">
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-bell"></i>
                </button>
                <div class="user-info">
                    <i class="bi bi-person-circle"></i>
                    <span>Admin</span>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="content-wrapper" id="mainContent">
            <!-- Aquí se carga el contenido dinámicamente -->
            <div class="page-header">
                <h1>Bienvenido a DSTEC</h1>
                <p>Selecciona una opción del menú lateral</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>