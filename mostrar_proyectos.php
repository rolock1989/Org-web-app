<?php
include 'conexion.php';  // Archivo que contiene la conexión a la base de datos

$sql = "SELECT P.nombre, COUNT(D.id_donacion) AS total_donaciones, SUM(D.monto) AS monto_total
        FROM DONACION D
        JOIN PROYECTO P ON D.id_proyecto = P.id_proyecto
        GROUP BY P.nombre
        HAVING total_donaciones > 2";

$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyectos con Más de Dos Donaciones</title>
</head>
<body>
    <h1>Proyectos con Más de Dos Donaciones</h1>
    <table border="1">
        <tr>
            <th>Nombre del Proyecto</th>
            <th>Total de Donaciones</th>
            <th>Monto Total Recaudado</th>
        </tr>
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                <td><?php echo htmlspecialchars($row['total_donaciones']); ?></td>
                <td><?php echo htmlspecialchars($row['monto_total']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

