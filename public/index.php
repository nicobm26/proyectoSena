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
$router->get("/productos", [PaginasController::class, 'productos']);

$router->get("/contactanos", [PaginasController::class, 'contactanos']);
$router->post("/contactanos", [PaginasController::class, 'contactanos']);



//Panel administracion
// $router->get("/admin", [::class, 'contactanos']);
// $router->post("/contactanos", [PaginasController::class, 'contactanos']);




//Login y Autenticacion
$router->get("/login", [LoginController::class, 'login']);
$router->post("/login", [LoginController::class, 'login']);
$router->get("/registrar", [LoginController::class, 'registrar']);
$router->post("/registrar", [LoginController::class, 'registrar']);
$router->get("/logout", [LoginController::class, 'logout']);

//Login admin
$router->get("/loginAdmin", [LoginController::class, 'loginAdministrador']);
$router->post("/loginAdmin", [LoginController::class, 'loginAdministrador']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

?>