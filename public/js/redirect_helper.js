// Helper para manejar redirecciones después de guardar
function redirectToIndexAndLoad(page, title, successMessage) {
    if (successMessage) {
        alert(successMessage);
    }
    
    // Redirigir al index
    window.location.href = '/dstecSoap/public/index.php';
    
    // Guardar en localStorage qué página cargar
    localStorage.setItem('autoLoadPage', page);
    localStorage.setItem('autoLoadTitle', title);
}

// Al cargar el index, verificar si hay que cargar una página automáticamente
document.addEventListener('DOMContentLoaded', function() {
    const autoLoadPage = localStorage.getItem('autoLoadPage');
    const autoLoadTitle = localStorage.getItem('autoLoadTitle');
    
    if (autoLoadPage && typeof loadContent === 'function') {
        // Limpiar el storage
        localStorage.removeItem('autoLoadPage');
        localStorage.removeItem('autoLoadTitle');
        
        // Cargar la página
        setTimeout(function() {
            loadContent(autoLoadPage, autoLoadTitle);
        }, 500);
    }
});

