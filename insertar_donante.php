<?php
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

   
    $sql = "INSERT INTO DONANTE (nombre, email, direccion, telefono) 
            VALUES (:nombre, :email, :direccion, :telefono)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);

    if ($stmt->execute()) {
        echo "Donante registrado exitosamente";
    } else {
        echo "Error al registrar el donante";
    }
}
?>
