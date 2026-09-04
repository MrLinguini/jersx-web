<?php

require_once __DIR__ . '/../../core/Controller.php';

class PortafolioController extends Controller
{
    public function index(): void
    {
        $proyectos = [
            [
                'nombre' => 'Inventario Pro',
                'descripcion' => 'Sistema de gestión de inventario con control de stock, alertas de reabastecimiento, roles de usuario y reportes en PDF. Incluye transacciones a nivel de base de datos para garantizar integridad en los movimientos de stock.',
                'tecnologias' => ['PHP', 'MySQL', 'mPDF'],
                'github' => 'https://github.com/MrLinguini/inventario-pro',
                'demo' => '#',
            ],
            [
                'nombre' => 'Tareas API',
                'descripcion' => 'API REST en PHP puro con autenticación por token (Bearer), y un cliente frontend 100% JavaScript vanilla — tablero Kanban con drag & drop, sin frameworks ni librerías externas.',
                'tecnologias' => ['PHP', 'REST API', 'JavaScript'],
                'github' => 'https://github.com/MrLinguini/tareas-api',
                'demo' => '#',
            ],
            [
                'nombre' => 'Proyecto 3',
                'descripcion' => 'Descripcion pendiente - proximamente.',
                'tecnologias' => ['PHP', 'API REST'],
                'github' => '#',
                'demo' => '#',
            ],
        ];

        $this->view('portafolio/index', [
            'titulo' => 'Portafolio | Jersx Programing',
            'proyectos' => $proyectos,
        ]);
    }
}