<?php
require_once __DIR__ . '/../config/database.php';

try {
    $db = Database::getConnection();
    echo "✅ Conexión exitosa a la base de datos.";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}