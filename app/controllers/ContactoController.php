<?php

require_once __DIR__ . '/../../core/Controller.php';

class ContactoController extends Controller
{
    public function index(): void
    {
        $this->view('contacto/index', [
            'titulo' => 'Contacto | Jersx Programing',
        ]);
    }
}