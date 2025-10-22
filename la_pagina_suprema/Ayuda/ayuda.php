<html>

<head></head>

<body>
<?php
$usuario1 = array(
	'Nombre' =>$_REQUEST['nombre'],
	'Cuenta' =>$_REQUEST['cuenta'],
	'Comentario' => $_REQUEST['comentario']
);
echo "Esta queja";
echo "<br/>";
foreach($usuario1 as $clave=>$valor){
	echo $clave. " tiene el valor " .$valor;
	echo "</br>";
}
echo "Queja enviada";
?>
</body>
</html>