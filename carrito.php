<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proyecto = htmlspecialchars($_POST['proyecto']);
    $monto = htmlspecialchars($_POST['monto']);

    // Añadir la donación al carrito de la sesión
    $_SESSION['carrito'][] = [
        'proyecto' => $proyecto,
        'monto' => $monto
    ];
}

// Mostrar las donaciones en el carrito
echo "<h2>Donaciones en tu Carrito:</h2>";
if (!empty($_SESSION['carrito'])) {
    echo "<ul>";
    foreach ($_SESSION['carrito'] as $donacion) {
        echo "<li>Proyecto: " . $donacion['proyecto'] . " - Monto: $" . $donacion['monto'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No has añadido ninguna donación aún.</p>";
}
?>
