<?php

require_once __DIR__ . '/../config/database.php';

$usuario = 'JeremiAdmin';
$passwordPlano = '**071102..Jsop'; // <-- escribila y ANOTALA en algún lado seguro

$passwordHasheada = password_hash($passwordPlano, PASSWORD_DEFAULT);

$db = Database::getConnection();
$stmt = $db->prepare("INSERT INTO usuarios_admin (usuario, password) VALUES (:usuario, :password)");
$stmt->execute([
    ':usuario' => $usuario,
    ':password' => $passwordHasheada,
]);

echo "Usuario admin creado con hash: " . $passwordHasheada;