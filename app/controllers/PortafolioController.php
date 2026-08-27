<?php

require_once __DIR__ . '/../../core/Controller.php';

class PortafolioController extends Controller
{
    public function index(): void
    {
        $proyectos = [
            [
                'nombre' => 'Proyecto 1',
                'descripcion' => 'Descripcion pendiente - proximamente.',
                'tecnologias' => ['PHP', 'MySQL'],
                'github' => '#',
                'demo' => '#',
            ],
            [
                'nombre' => 'Proyecto 2',
                'descripcion' => 'Descripcion pendiente - proximamente.',
                'tecnologias' => ['JavaScript'],
                'github' => '#',
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