<?php
	
	include '../ProcesosPHP/Conexion.php';

	//Recibir datos.
	$NOMBRE = $_POST['NOMBRE'];
	$CUARENTENA = $_POST['CUARENTENA'];
	$VERIFICAR = "SELECT NOMBRE FROM crias where NOMBRE = '$NOMBRE' LIMIT 1";
	$RESULTADO = mysqli_query($conexion, $VERIFICAR);

	//Variable para comprobar si existe registro en base de datos.
	$EXISTE = mysqli_num_rows($RESULTADO);
	
	if ($EXISTE === 1)
	{
		$ACTUALIZAR = "UPDATE crias SET ESTADO = 1, CUARENTENA = '$CUARENTENA' WHERE NOMBRE = '$NOMBRE'";
		$RESULTADO = mysqli_query($conexion, $ACTUALIZAR);	
	}

?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Registrar Cuarentena</title>
			<link rel = "stylesheet" href = "../DiseñosCSS/DiseñoRegistrarCrias.css">
		</head>
		<body>
			<header>
				<div class="wrapper">
				  <div class="Logo">
				   <img src="../Imagenes/logo.PNG" width="160px" height="100px">	
			       </div>	
			     <br>
			      <nav>
				  <a href="../FormulariosHTML/PaginaInicio.html">Inicio</a>
				  <a href="../ProcesosPHP/RegistroCrias.php">Registrar Nuevas Crias</a>
				  <a href="../ProcesosPHP/RegistroCuarentena.php">Registrar Cuarentena</a>
				  <a href="../FormulariosHTML/Consulta.html">Clasificacion de Crias</a>
				  <a href="../ProcesosPHP/RegistroSensores.php">Registrar Datos de Sensores</a>
			      </nav>
				</div>
			</header>
			<h1>Se ha registrado la cuarentena correctamente.</h1>
			<table border = "1">
				<tr class="Descripcion">
					<td>ID</td>
					<td>NOMBRE</td>
					<td>DESCRIPCION</td>
					<td>SE ENVIO A CUARENTENA</td>
				</tr>						
					<?php
						
					$SQL = "SELECT * FROM crias where NOMBRE = '$NOMBRE'";
					$RESULTADO = mysqli_query($conexion, $SQL);
					
					while ($columna = mysqli_fetch_array($RESULTADO)) 
					{
					?>
						<tr class="Datos">
							<td> <?php echo $columna['ID'] ?> </td>						
							<td> <?php echo $columna['NOMBRE'] ?> </td>
							<td> <?php echo $columna['DESCRIPCION'] ?> </td>
							<td> <?php echo $columna['CUARENTENA'] ?> </td>
						</tr>
					<?php
					}
					?>
			</table>
		</body>
		</html>	

<?php
mysqli_close($conexion);
?>
