<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos - PCComponentes</title>
    <link rel="stylesheet" href="css/cliente.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <div>
                <h1 class="title">PCComponentes</h1>
                <p class="subtitle">Catálogo de productos</p>
            </div>
        </header>

        <div class="card">
            <?php
            // Conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "pccomponentes");
            if ($conexion->connect_error) {
                die("<p class='badge danger'>Error de conexión: " . $conexion->connect_error . "</p>");
            }

            // Consulta de todos los productos
            $sql = "SELECT codigo_producto, nombre, tipo_hardware, Antiguo, Precio, Comentario FROM componenetes";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                echo "<h2>Lista de productos</h2>";
                echo "<table class='table'>";
                echo "<thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Tipo de hardware</th>
                            <th>Antiguo</th>
                            <th>Precio (€)</th>
                            <th>Comentario</th>
                        </tr>
                      </thead>";
                echo "<tbody>";

                // Recorrer los resultados con un vector asociativo
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila['codigo_producto']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['tipo_hardware']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['Antiguo']) . "</td>";
                    echo "<td><span class='badge'>" . htmlspecialchars($fila['Precio']) . " €</span></td>";
                    echo "<td>" . htmlspecialchars($fila['Comentario']) . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p class='footer-note'>No hay productos registrados.</p>";
            }

            $conexion->close();
            ?>
        </div>

        <footer class="footer-note">
            &copy; <?php echo date("Y"); ?> PCComponentes — Todos los derechos reservados.
        </footer>
    </div>
</body>
</html>