<html>

<head></head>

<body>
<?php
function hacerInsert(){
	$conexion = mysqli_connect("localhost", "root", "", "pccomponentes") or die("Problemas con la conexión");
			mysqli_query($conexion, "insert into componenetes(nombre,tipo_hardware,antiguo,precio,comentario) values
			('$_REQUEST[nombre]','$_REQUEST[tipoHardware]','$_REQUEST[masCincoAgnos]',
			'$_REQUEST[precio]','$_REQUEST[comentario]')") or die("Problemas en el select" . mysqli_error($conexion));
			mysqli_close($conexion);
			echo "El componente fue dado de alta.";
}
function hacerUpdate(){
}
function hacerDelete(){
}
function guardarArchivo(){
	$ar = fopen("crear_archivo/DatosDelComponente.txt", "a") or
	die("Problemas en la creacion");
	fputs($ar, "El nombre del producto: ".$_REQUEST['nombre']);
	fputs($ar, "\n");
	fputs($ar, "El tipo del hardware: ".$_REQUEST['tipoHardware']);
	fputs($ar, "\n");
	fputs($ar, "¿El producto es antuguo? ".$_REQUEST['masCincoAgnos']);
	fputs($ar, "\n");
	fputs($ar, "El precio del producto: ".$_REQUEST['precio']);
	fputs($ar, "\n");
	fputs($ar, "El comentario del producto: ".$_REQUEST['comentario']);
	fputs($ar, "\n");
	fputs($ar, "------------------------------------------------
	--------");
	fputs($ar, "\n");
	fclose($ar);
	echo "Los datos se cargaron correctamente.";
}
function abrirArchivo(){	
	$ar = fopen("crear_archivo/DatosDelComponente.txt", "r") or
	die("No se pudo abrir el archivo");
	while (!feof($ar)) {
		$linea = fgets($ar);
		$lineasalto = nl2br($linea);
		echo $lineasalto;
	}
	fclose($ar);
}
 if (isset($_REQUEST["accion"])) {
        if ($_REQUEST["accion"] === "Confirmar Insert") {
           hacerInsert();
        } 
		else if ($_REQUEST["accion"] === "Confirmar Update") {
            hacerUpdate();
        }
		else if ($_REQUEST["accion"] === "Confirmar Delete") {
            hacerDelete();
        }
    }
if (isset($_REQUEST["accionFichero"])) {
        if ($_REQUEST["accionFichero"] === "Confirmar Guardar") {
           guardarArchivo();
        } 
		else if ($_REQUEST["accionFichero"] === "Confirmar Abrir") {
           abrirArchivo();
		}
}

?>
</body>

</html>
