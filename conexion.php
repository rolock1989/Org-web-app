<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'ORGANIZACION';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
