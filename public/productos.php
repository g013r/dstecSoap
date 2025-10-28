<?php
// Punto de entrada para el módulo de productos
require_once $_SERVER['DOCUMENT_ROOT'] . '/dstecSoap/app/controllers/ProductosController.php';

// Iniciar sesión si es necesario
// session_start();

// Crear instancia del controlador
$controller = new ProductosController();

// Obtener la acción de la URL
$action = isset($_GET['action']) ? $_GET['action'] : 'listar';

// Enrutar a la acción correspondiente
switch ($action) {
    case 'crear':
        $controller->crear();
        break;
    
    case 'guardar':
        $controller->guardar();
        break;
    
    case 'listar':
        $controller->listar();
        break;
    
    default:
        $controller->listar();
        break;
}

