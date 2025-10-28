<?php
// Redirigir al archivo en la carpeta public
header('Location: public/productos.php' . (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : ''));
exit;

