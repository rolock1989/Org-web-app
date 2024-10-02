<?php
include 'eventos.php';

// Recuperar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $lugar = htmlspecialchars($_POST['lugar']);
    $fecha = htmlspecialchars($_POST['fecha']);
    $hora = htmlspecialchars($_POST['hora']);

    // Crear una nueva instancia de Evento
    $nuevoEvento = new Evento($descripcion, $tipo, $lugar, $fecha, $hora);

    // Simular la adición del evento a una base de datos o lista
    // Aquí solo se muestra la información en pantalla
    echo "<h1>Evento Registrado</h1>";
    echo $nuevoEvento->mostrarInfo();
}
?>
