<?php

	//Conexion.
	include 'Conexion.php';

	//Variables.
	$_COSTO = 0;
	$NOMBRE = $_POST['NOMBRE'];
	$DESCRIPCION = $_POST['DESCRIPCION'];
	$PESO = $_POST['PESO'];
	$COSTO = $_POST['COSTO'];
	$FECHA_REGISTRO = $_POST['FECHA_REGISTRO'];
	$PROVEEDOR = $_POST['PROVEEDOR'];
	$VERIFICAR = "SELECT ID FROM crias where NOMBRE = '$NOMBRE' LIMIT 1";
	$RESULTADO = mysqli_query($conexion, $VERIFICAR);

	//Variable para comprobar si existe registro en base de datos.
	$EXISTE = mysqli_num_rows($RESULTADO);

	//Verificacion de que los registros no se dupliquen.
	if ($EXISTE === 1)
	{
		?>
		<script>
			alert("Ese registro ya existe");
			window.location.href = "../ProcesosPHP/RegistroCrias.php";
		</script>
		<?php
	}
	else
	{
		$INSERTAR = "INSERT INTO crias (NOMBRE, DESCRIPCION, PESO, COSTO, FECHA_REGISTRO, PROVEEDOR) VALUES ( '$NOMBRE', '$DESCRIPCION', '$PESO', '$COSTO', '$FECHA_REGISTRO', '$PROVEEDOR')";
		$RESULTADO = mysqli_query($conexion, $INSERTAR);
		?>	
		<!-- Se dibuja la tabla y la cabecera de la pagina. -->
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Registrar Crias</title>
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
				  <a href="../ProcesosPHP/ConsultaSensores.php">Consulta Datos de Sensores</a>
			      </nav>
				</div>
			</header>
			<h1>Los Datos Se Han Registrado Con Exito.</h1>
			<table border = "1">
				<tr class="Descripcion">
					<td>ID</td>
					<td>NOMBRE</td>
					<td>DESCRIPCION</td>
					<td>PESO</td>
					<td>COSTO</td>
					<td>FECHA REGISTRO</td>
					<td>Proveedor</td>
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
							<td> <?php echo $columna['PESO'] ?> </td>
							<td> <?php echo $columna['COSTO'] ?> </td>
							<td> <?php echo $columna['FECHA_REGISTRO'] ?> </td>
							<td> <?php echo $columna['PROVEEDOR'] ?> </td>
						</tr>
					<?php
					}
					?>
			</table>
		</body>
		</html>	
	<?php	
	}
	mysqli_close($conexion);
?>
