// Función global para cargar contenido dinámicamente
function loadContent(page, title) {
    const mainContent = document.getElementById('mainContent');
    const pageTitle = document.getElementById('pageTitle');
    
    // Actualizar título
    if (pageTitle && title) {
        pageTitle.textContent = title;
    }

    // Cargar contenido vía AJAX
    fetch(page)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar la página');
            }
            return response.text();
        })
        .then(html => {
            mainContent.innerHTML = html;
        })
        .catch(error => {
            mainContent.innerHTML = `
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i>
                    Error al cargar el contenido: ${error.message}
                </div>
            `;
        });
}

// Toggle Sidebar en móvil
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const menuToggle = document.getElementById('menuToggle');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mainContent = document.getElementById('mainContent');
    const pageTitle = document.getElementById('pageTitle');

    // Abrir sidebar
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            sidebar.classList.add('active');
            sidebarOverlay.classList.add('active');
        });
    }

    // Cerrar sidebar
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });
    }

    // Cerrar al hacer clic en overlay
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            sidebarOverlay.classList.remove('active');
        });
    }

    // Manejar clics en enlaces del sidebar
    const sidebarLinks = document.querySelectorAll('.sidebar-nav a[data-page]');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const page = this.getAttribute('data-page');
            const title = this.getAttribute('data-title');

            // Remover clase active de todos los enlaces
            document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => {
                l.classList.remove('active');
            });

            // Agregar clase active al enlace actual
            this.classList.add('active');

            // Cargar contenido
            loadContent(page, title);

            // Cerrar sidebar en móvil
            if (window.innerWidth < 992) {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            }
        });
    });

    // También manejar clics en enlaces del submenu
    const submenuLinks = document.querySelectorAll('.submenu a[data-page]');
    submenuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const page = this.getAttribute('data-page');
            const title = this.getAttribute('data-title');

            // Cargar contenido
            loadContent(page, title);

            // Cerrar sidebar en móvil
            if (window.innerWidth < 992) {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            }
        });
    });
});

