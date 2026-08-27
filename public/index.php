<?php

session_start();

require_once __DIR__ . '/../core/Router.php';

$router = new Router();

$router->get('/', 'HomeController', 'index');
$router->get('/servicios', 'ServiciosController', 'index');
$router->get('/portafolio', 'PortafolioController', 'index');
$router->get('/cotizar', 'CotizadorController', 'index');
$router->post('/cotizar', 'CotizadorController', 'guardar');
$router->get('/admin', 'AdminController', 'login');
$router->post('/admin', 'AdminController', 'autenticar');
$router->get('/admin/logout', 'AdminController', 'logout');
$router->get('/admin/cotizaciones', 'AdminController', 'cotizaciones');
$router->post('/admin/cotizaciones/estado', 'AdminController', 'cambiarEstado');
$router->get('/contacto', 'ContactoController', 'index');

$router->resolve();