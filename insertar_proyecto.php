<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $presupuesto = $_POST['presupuesto'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

   
    $sql = "INSERT INTO PROYECTO (nombre, descripcion, presupuesto, fecha_inicio, fecha_fin) 
            VALUES (:nombre, :descripcion, :presupuesto, :fecha_inicio, :fecha_fin)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':presupuesto', $presupuesto);
    $stmt->bindParam(':fecha_inicio', $fecha_inicio);
    $stmt->bindParam(':fecha_fin', $fecha_fin);

    if ($stmt->execute()) {
        echo "Proyecto registrado exitosamente";
    } else {
        echo "Error al registrar el proyecto";
    }
}
?>
