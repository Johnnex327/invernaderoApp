<?php 

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;

$router = new Router();

$router->get('/', [PaginasController::class, 'monitoreo']);
$router->get('/login', [PaginasController::class, 'login']);
$router->post('/login', [PaginasController::class, 'login']);
$router->post('/configuracion', [PaginasController::class, 'configuracion']);
$router->get('/configuracion', [PaginasController::class, 'configuracion']);
$router->get('/reportes', [PaginasController::class, 'reportes']);
$router->post('/reportes', [PaginasController::class, 'reportes']);
$router->get('/logout', [PaginasController::class, 'logout']);
$router->get('/setData', [PaginasController::class, 'setData']);
$router->post('/setData', [PaginasController::class, 'setData']);
$router->get('/getData', [PaginasController::class, 'getData']);
$router->post('/getData', [PaginasController::class, 'getData']);






// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();