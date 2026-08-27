<?php

require_once __DIR__ . '/../../config/database.php';

class Cotizacion
{
    public static function guardar(array $datos) : bool
    {
        $db = database::getConnection();

        $sql = "INSERT INTO cotizaciones
        (nombre, email, telefono, tipo_proyecto, paginas_estimadas, features, precio_estimado)
        VALUES
        (:nombre, :email, :telefono, :tipo_proyecto, :paginas_estimadas, :features, :precio_estimado)";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nombre'               => $datos['nombre'],
            ':email'                => $datos['email'],
            ':telefono'             => $datos['telefono'],
            ':tipo_proyecto'        => $datos['tipo_proyecto'],
            ':paginas_estimadas'    => $datos['paginas_estimadas'],
            ':features'             => $datos['features'],
            ':precio_estimado'      => $datos['precio_estimado'],
        ]);
    }
}