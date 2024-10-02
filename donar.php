<?php
// Simulación de donaciones
function procesarDonacion($nombre, $monto, $proyectoId) {
    return "Gracias, $nombre, por tu donación de \$$monto al proyecto con ID $proyectoId.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $monto = htmlspecialchars($_POST['monto']);
    $proyectoId = htmlspecialchars($_POST['proyecto_id']);

    $mensaje = procesarDonacion($nombre, $monto, $proyectoId);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organización Grinpiz</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="mediascreen.css">
    <link rel="stylesheet" href="Search.css">
</head>
<header>
    <div class="logo">
        <img src="imagenes/LOGO WEB.png" class="imagen" alt="logo empresa" class="logo-img">
    </div>
    <div class="titulo1">
        <h1>Organización Grinpiz</h1>
    </div>
</header>
<main>
    <nav>
    <ul class="flex-container">
        <li class="flex-item"><a href="donar.php">Donar</a></li>
        <li class="flex-item"><a href="Registro_evento.html">Registro evento</a></li>
        <li class="flex-item"><a href="Login.html">Login</a></li>
        <li class="flex-item"><li class="flex-item"><a href="inicio.html">Inicio</a></li>
        <li class="flex-item"><a href="quienessomos.html">Quienes Somos</a></li>
        <li class="flex-item"><a href="actividades.html">Actividades</a></li>
        <li class="flex-item"><a href="eventos.html">Eventos</a></li>
        <li class="flex-item"><a href="Temasdeinteres.html">Temas de interés</a></li>
        <li class="flex-item"><a href="https://es.wikipedia.org/wiki/Cambio_clim%C3%A1tico" target="_blank">Wikipedia: Cambio Climático</a></li>
        <li class="flex-item"><a href="Registro.html">Registrate</a></li>
    </ul>
        </nav>
        <h1>Realizar una Donación</h1>
        <form action="donar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto" min="1" required>
            <br>
            <label for="proyecto_id">ID del Proyecto:</label>
            <input type="number" id="proyecto_id" name="proyecto_id" required>
            <br>
            <button type="submit">Donar</button>
        </form>
    <?php
    if (isset($mensaje)) {
        echo "<p>$mensaje</p>";
    }
    ?>
<footer>
    <p>© 2024 Organización Grinpiz. Todos los derechos reservados.</p>
</footer>
</body>
</html>
