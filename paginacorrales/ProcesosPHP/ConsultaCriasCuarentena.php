<?php

	//Conexion.
	include 'Conexion.php';

	//Variables.
	$VERIFICAR = "SELECT * FROM crias LIMIT 1";
	$RESULTADO = mysqli_query($conexion, $VERIFICAR);

	//Variable para comprobar si existe registro en base de datos.
	$EXISTE = mysqli_num_rows($RESULTADO);

	//Verificacion de que haya registros en la base de datos.
	if ($EXISTE === 1)
	{
		?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<title>Clasificacion por Cuarentena</title>
			<link rel = "stylesheet" href = "../DiseñosCSS/DiseñoConsulta.css">
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
	        </header>
			</div>
			<nav class = "wrapper2">
		     <a href="../ProcesosPHP/ConsultaCriasID.php">ID</a>
		     <a href="../ProcesosPHP/ConsultaCriasNombre.php">Nombre</a>
		     <a href="../ProcesosPHP/ConsultaCriasPeso.php">Peso</a>
		     <a href="../ProcesosPHP/ConsultaCriasCosto.php">Costo</a>
		     <a href="../ProcesosPHP/ConsultaCriasFecha.php">Fecha de Ingreso</a>
		     <a href="../ProcesosPHP/ConsultaCriasCuarentena.php">En Cuarentena</a>
	        </nav>
			<br>
			<h1>Animales en Cuarentena.</h1>
			<div class="table-responsive">
				<table border = "2">
					<tr class = "Cuarentena">
						<td>ID</td>
						<td>NOMBRE</td>
						<td>DESCRIPCION</td>
						<td>PESO</td>
						<td>COSTO</td>
						<td>FECHA DE REGISTRO</td>
						<td>SE ENVIO A CUARENTENA</td>
					</tr>
						
					<?php
					
					$SQL = "select * from crias WHERE ESTADO = 1 order by ID";
					$RESULTADO = mysqli_query($conexion, $SQL);
					
					while ($columna = mysqli_fetch_array($RESULTADO)) 
					{
					?>

						<tr class = "Datos">
							<td> <?php echo $columna['ID'] ?> </td>						
							<td> <?php echo $columna['NOMBRE'] ?> </td>
							<td> <?php echo $columna['DESCRIPCION'] ?> </td>
							<td> <?php echo $columna['PESO'] ?> </td>
							<td> <?php echo $columna['COSTO'] ?> </td>
							<td> <?php echo $columna['FECHA_REGISTRO'] ?> </td>
							<td> <?php echo $columna['CUARENTENA'] ?> </td>
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
