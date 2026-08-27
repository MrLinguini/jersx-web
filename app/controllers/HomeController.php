<?php

require_once __DIR__ . '/../../core/Controller.php';

class HomeController extends Controller
{
    public function index(): void
    {
        $destacados = [
            [
                'icono' => '🖥️',
                'titulo' => 'Desarrollo Web a Medida',
                'descripcion' => 'Aplicaciones construidas desde cero, adaptadas a tu negocio.',
            ],
            [
                'icono' => '📊',
                'titulo' => 'Sistemas de Gestión',
                'descripcion' => 'Paneles con login, roles y reportes.',
            ],
            [
                'icono' => '⚙️',
                'titulo' => 'Automatización',
                'descripcion' => 'Eliminamos tareas manuales repetitivas.',
            ],
        ];

        $this->view('home/index', [
            'titulo' => 'Jersx Programing — Desarrollo Web',
            'destacados' => $destacados,
        ]);
    }
}