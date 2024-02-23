<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PaginasController;

$router = new Router();

// Zona publica
//Paginas publicas de los visitantes
$router->get("/", [PaginasController::class, 'index']); //dominio (/)
$router->get("/nosotros", [PaginasController::class, 'nosotros']);




//Login y Autenticacion
$router->get("/login", [LoginController::class, 'login']);
$router->post("/login", [LoginController::class, 'login']);
$router->get("/registrar", [LoginController::class, 'registrar']);
$router->post("/registrar", [LoginController::class, 'registrar']);
$router->get("/logout", [LoginController::class, 'logout']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

?>