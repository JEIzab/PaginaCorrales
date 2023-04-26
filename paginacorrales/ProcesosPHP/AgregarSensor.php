<?php
	
	include '../ProcesosPHP/Conexion.php';

	//Recibir datos.
	$NOMBRE = $_POST['NOMBRE'];
	$ID_Sensor= $_POST['ID_Sensor'];
	$FRECUENCIA_C= $_POST['FRECUENCIA_C'];
	$FRECUENCIA_R= $_POST['FRECUENCIA_R'];
	$PRESION= $_POST['PRESION'];
	$TEMPERATURA= $_POST['TEMPERATURA'];
	$FECHA_REGISTRO = $_POST['FECHA_REGISTRO'];
	$VERIFICAR = "SELECT ID FROM crias where NOMBRE = '$NOMBRE' LIMIT 1";
	$RESULTADO = mysqli_query($conexion, $VERIFICAR);

	//Variable para comprobar si existe registro en base de datos.
	$EXISTE = mysqli_num_rows($RESULTADO);
	
	if ($EXISTE === 1)
	{
		$INSERTAR = "INSERT INTO sensores (ID_Sensor, FECHA_REGISTRO, FRECUENCIA_C, PRESION, FRECUENCIA_R, TEMPERATURA, NOMBRE) VALUES ('$ID_Sensor', '$FECHA_REGISTRO', '$FRECUENCIA_C', '$PRESION', '$FRECUENCIA_R', '$TEMPERATURA','$NOMBRE')";
		$RESULTADO = mysqli_query($conexion, $INSERTAR);
	}

?>
	<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Registro Sensor</title>
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
				  <a href="../FormulariosHTML/RegistroSensores.html">Registrar Datos de Sensores</a>
				  <a href="../ProcesosPHP/ConsultaSensores.php">Consulta Datos de Sensores</a>
			      </nav>
				</div>
			</header>
			<h1>Se ha registrado los datos correctamente.</h1>
			<table border = "1">
				<tr class="Sensor">
					<td>NOMBRE</td>
					<td>ID SENSOR</td>
					<td>FRECUENCIA CARDIACA</td>
					<td>PRESION SANGUINEA</td>
					<td>FRECUENCIA RESPIRATORIA</td>
					<td>TEMPERATURA</td>
					<td>FECHA DE REGISTRO</td>
				</tr>						
					<?php
						
					$SQL = "SELECT * FROM sensores where NOMBRE = '$NOMBRE'";
					$RESULTADO = mysqli_query($conexion, $SQL);
					
					while ($columna = mysqli_fetch_array($RESULTADO)) 
					{
					?>
						<tr class="Datos">
							<td> <?php echo $columna['NOMBRE'] ?> </td>						
							<td> <?php echo $columna['ID_Sensor'] ?> </td>
							<td> <?php echo $columna['FRECUENCIA_C'] ?> </td>
							<td> <?php echo $columna['PRESION'] ?> </td>
							<td> <?php echo $columna['FRECUENCIA_R'] ?> </td>
							<td> <?php echo $columna['TEMPERATURA'] ?> </td>
							<td> <?php echo $columna['FECHA_REGISTRO'] ?> </td>
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
