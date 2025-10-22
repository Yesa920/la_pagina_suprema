<html>

<head></head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['nombre'];
    $clave = $_POST['contrasegna'];

    // Validar campos vacíos
    if (empty($usuario) && empty($clave)) { //en vez isset empty
        echo "<script>alert('No se ha puesto usuario ni contraseña'); window.location.href = 'confirmar_usuario_formulario.php';</script>";
        exit();
    } elseif (empty($usuario)) {
        echo "<script>alert('No se ha puesto usuario'); window.location.href = 'confirmar_usuario_formulario.php';</script>";
        exit();
    } elseif (empty($clave)) {
        echo "<script>alert('No se ha puesto contraseña'); window.location.href = 'confirmar_usuario_formulario.php';</script>";
        exit();
    }

    // Conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "pccomponentes")
        or die("Problemas con la conexión");

    $sqlMain = "SELECT COUNT(*) AS total FROM iniciar_sesion WHERE usuario='$usuario' AND contrasegna='$clave'";//las variable en comillas
    $sqlNombre = "SELECT COUNT(*) AS nombreExiste FROM iniciar_sesion WHERE usuario='$usuario'";

    $resultado = $conexion->query($sqlMain);
    $resultadoNombre = $conexion->query($sqlNombre);

    $fila = $resultado->fetch_assoc();//es un método de MySQLi que sirve para obtener una fila de resultados de una consulta en forma de array asociativo.
    $filaNombre = $resultadoNombre->fetch_assoc();

    if ($fila['total'] == 1) {
		header("Location: ../insert.php"); // Redirigimos al contenido protegido
    } elseif ($filaNombre['nombreExiste'] == 1) {
        echo "<script>alert('El nombre es correcto, pero la contraseña es incorrecta'); window.location.href = 'confirmar_usuario_formulario.php';</script>";
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos'); window.location.href = 'confirmar_usuario_formulario.php';</script>";
    }

    mysqli_close($conexion);
}
?>
</body>

</html>