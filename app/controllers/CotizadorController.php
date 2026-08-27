<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Cotizacion.php';

class CotizadorController extends Controller
{
    private array $preciosBase =[
        'landing' => 1800,
        'backend' => 4500,
        'sistema' => 9000,
    ];

    private array $preciosFeatures = [
        'panel_admin'  => 1200,
        'login'        => 800,
        'pdf'          => 900,
        'pagos'        => 1500,
        'animaciones'  => 600,
        'multi_idioma' => 1000,
        'api_rest'     => 1300,
    ];

    private int $precioPorPagina = 350;

    public function index(): void
{
    $this->view('cotizador/index', [
        'titulo' => 'Cotizar Proyecto | Jersx Programing',
        'preciosBase' => $this->preciosBase,
        'preciosFeatures' => $this->preciosFeatures,
        'precioPorPagina' => $this->precioPorPagina,
    ]);
}

    public function guardar(): void
    {
        header('Content-type: application/json');

        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $tipoProyecto = $_POST['tipo_proyecto'] ?? '';
        $paginas = (int) ($_POST['paginas'] ?? '');
        $features = $_POST['features'] ?? [];

        if ($nombre === '' || $email === '' || !isset($this->preciosBase[$tipoProyecto])){
            http_response_code(400);
            echo json_encode(['error' => 'Datos incompletos o inválidos.']);
            return;
        }

        $precio = $this->preciosBase[$tipoProyecto];

        $incluidas = ($tipoProyecto === 'landing') ? 1 : 5;
        $paginasExtra = max(0, $paginas - $incluidas);
        $precio += $paginasExtra * $this->precioPorPagina;

        $featuresValidas = [];
        foreach ($features as $feature){
            if (isset($this->preciosFeatures[$feature])){
                $precio += $this->preciosFeatures[$feature];
                $featuresValidas[] = $feature;
            }
        }

        $guardado = Cotizacion::guardar([
            'nombre' => $nombre,
            'email'  => $email,
            'telefono' => $telefono,
            'tipo_proyecto' => $tipoProyecto,
            'paginas_estimadas' => $paginas,
            'features' => implode(',', $featuresValidas),
            'precio_estimado' => $precio,
        ]);

        if($guardado) {
            echo json_encode(['success' => true, 'precio_final' => $precio]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'No se pudo guardar la cotización.']);
        }
    }
}