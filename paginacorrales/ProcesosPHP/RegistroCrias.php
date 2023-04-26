<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de Registro de Crias</title>
	<link rel = "stylesheet" href = "../DiseñosCSS/DiseñoRegistrarCrias.css">
</head>
<body>
	<?php
	// Verificar si el usuario ha iniciado sesión
	session_start();
	if (!isset($_SESSION['username'])) {
		// Si no ha iniciado sesión, redirija al usuario al formulario de inicio de sesión
		header('Location: Login.php');
		exit;
	}
	?>
	

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
	<h1>Registro de nueva Cria</h1>
	<form action = "../ProcesosPHP/RegistroCrias2.php" method = "POST" class = "Formulario">
		<h2>Ingrese los Datos a Registrar:</h2>
		<div class = "contenedor-inputs">
		    <label>Proveedor:</label>
			<input type = "text" name = "PROVEEDOR" placeholder = "Proveedor" minlength="1"  maxlength="50"  class = "Input_50" required>
			<br><br>
			<input type = "text" name = "NOMBRE" placeholder = "Nombre" minlength="1"  maxlength="50"  class = "Input_50" required>
			<br><br>
			<input type = "text" name = "DESCRIPCION" placeholder = "Descripción" minlength="2"  maxlength="150" class = "Input_50" required>
			<br><br>
			<input type="number" name="PESO" placeholder="Peso"  min="1" max="10000"  step = "1" class="Input_50" required pattern="[0-9]+">
			<br><br>	
			<input type = "number" id= "COSTO" name="COSTO" placeholder = "Costo" min="1" max="10000" class = "Input_100" required pattern="[0-9]+">
			<br><br>	
			<label>Fecha de Registro:</label>
			<input type = "date" name = "FECHA_REGISTRO" class = "Ymd" required>
			<br><br>		
			<input type = "submit" value = "Registrar" class = "Boton_Registrar">
		</div>
	</form>
</body>
</html> 