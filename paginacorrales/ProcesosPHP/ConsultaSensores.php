<?php

	//Conexion.
	include 'Conexion.php';

	//Variables.
	$VERIFICAR = "SELECT * FROM sensores LIMIT 1";
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
			<title>Datos de los Sensores</title>
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
			<br>
			<h1>Datos de los Sensores</h1>
			<div class="table-responsive">
				<table border = "2">
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
					
					$SQL = "select * from sensores order by ID_Sensor";
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
	}
	mysqli_close($conexion);
?>
