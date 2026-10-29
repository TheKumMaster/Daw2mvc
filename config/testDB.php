<?php
// Incluye el archivo donde tienes definida la clase DataBase
require_once 'dataBase.php'; 

echo "<h2>Probando conexión a MySQL...</h2>";

try {
    // Intentamos realizar la conexión
    $conexion = DataBase::connect();
    
    echo "<p style='color: green; font-weight: bold;'>¡Conexión exitosa a la base de datos!</p>";
    
    // Consulta simple para verificar la versión del servidor MySQL
    $resultado = $conexion->query("SELECT VERSION() AS version");
    $fila = $resultado->fetch_assoc();
    
    echo "<p><strong>Versión de MySQL:</strong> " . $fila['version'] . "</p>";

    // Cierra la conexión
    $conexion->close();

} catch (Throwable $e) {
    echo "<p style='color: red; font-weight: bold;'>Falló la conexión:</p>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}