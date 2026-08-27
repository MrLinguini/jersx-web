<?php

require_once __DIR__ . '/../../core/Controller.php';

class ServiciosController extends Controller
{
    public function index(): void
    {
        $servicios = [
            [
                'titulo' => 'Desarrollo Web a Medida',
                'descripcion' => 'Aplicaciones web construidas desde cero, adaptadas a las necesidades específicas de tu negocio.',
                'icono' => '🖥️',
            ],
            [
                'titulo' => 'Automatización de Procesos',
                'descripcion' => 'Scripts y herramientas que eliminan tareas manuales repetitivas: reportes, consolidación de datos, generación de documentos.',
                'icono' => '⚙️',
            ],
            [
                'titulo' => 'Sistemas de Gestión',
                'descripcion' => 'Paneles administrativos con autenticación, permisos por rol, y generación de reportes en PDF.',
                'icono' => '📊',
            ],
            [
                'titulo' => 'Mantenimiento y Soporte',
                'descripcion' => 'Corrección de errores, mejoras de seguridad y optimización de aplicaciones ya existentes.',
                'icono' => '🔧',
            ],
        ];

        $this->view('servicios/index', [
            'titulo' => 'Servicios | Jersx Programing',
            'servicios' => $servicios,
        ]);
    }
}