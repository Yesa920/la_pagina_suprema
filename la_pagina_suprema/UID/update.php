<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/UID.css" media="screen" />
<script type="text/javascript" src="script.js">
</script>
<head>
<title>Proveedores Insert</title>
</head>
<body>
<h1>Para hacer un UPDATE</h1>
<form method="post" action="accionBotonIUD.php">
<label id="nombre"></label>
<input type="text" id="nombre" name="nombre" value=""/>
<br/>
<label>Selecciona el tipo de harware para implementar</label>
<br/>
<select name="tipoHardware">
<option value="ram">RAM</option>
<option value="discos">Discos</option>
<option value="cables">Cables</option>
<option value="TarjGraf">Tarjetas graficas</option>
<option value="FuenteAlimentacion">Fuente de alimentacion</option>
</select>
<br/>
<label id="precio">Introduzca el precio</label>
<br/>
<input type="text" id="precio" name="precio" value=""/>
<br/>
<input type="submit" name="accion" value="Confirmar Update"/>
</form>
<a href="insert.php">Ir al insert</a>
<a href="delete.php">Ir al delete</a>
<a href="../pagina_principal.html">Ir a la pagina principal</a>
</body>
</html>