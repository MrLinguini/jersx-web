<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../config/database.php';

class AdminController extends Controller
{
    public function login(): void
    {
        if(isset($_SESSION['admin_id'])){
            header('Location: /jersx-web/public/admin/cotizaciones');
            exit;
        }

        $this->view('admin/login', [
            'titulo' => 'Admin | Jersx Programing',
            'error' => $_SESSION['login_error'] ?? null,
        ]);

        unset($_SESSION['login_error']);
    }

    public function autenticar(): void
{
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    $db = Database::getConnection();
    $stmt = $db->prepare("SELECT * FROM usuarios_admin WHERE usuario = :usuario");
    $stmt->execute([':usuario' => $usuario]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_usuario'] = $admin['usuario'];
        header('Location: /jersx-web/public/admin/cotizaciones');
        exit;
    }

    $_SESSION['login_error'] = 'Usuario o contraseña incorrectos.';
    header('Location: /jersx-web/public/admin');
    exit;
}

    public function logout(): void
    {
        session_destroy();
        header('Location: /jersx-web/public/admin');
        exit;
    }

    public function cotizaciones(): void
    {
        $this->requiereLogin();

        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM cotizaciones ORDER BY created_at DESC");
        $cotizaciones = $stmt->fetchAll();

        $this->view('admin/cotizaciones', [
            'titulo' => 'Cotizaciones | Admin',
            'cotizaciones' => $cotizaciones,
        ]);
    }

    public function cambiarEstado(): void
    {
        $this->requiereLogin();

        header('Content-Type: application/json');

        $id = (int) ($_POST['id'] ?? 0);
        $nuevoEstado = $_POST['estado'] ?? '';

        $estadosValidos = ['nuevo', 'contactado', 'cerrado'];
        if (!$id || !in_array($nuevoEstado, $estadosValidos)) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos inválidos.']);
            return;
        }

        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE cotizaciones SET estado = :estado WHERE id = :id");
        $ok = $stmt->execute([':estado' => $nuevoEstado, ':id' => $id]);

        echo json_encode(['success' => $ok]);
    }

    private function requiereLogin(): void
    {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /jersx-web/public/admin');
            exit;
        }
    }
}