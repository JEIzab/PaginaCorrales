<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de Registro de datos de los sensores.</title>
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
	<?php
     $conexion = mysqli_connect("localhost", "root", "", "corrales");

     $query = "SELECT NOMBRE FROM crias";

     $resultado = mysqli_query($conexion, $query);
    ?>

	<h1>Registro de Datos de los Sensores</h1>
	<form action = "../ProcesosPHP/AgregarSensor.php" method = "POST" class = "Formulario">
		<h2>Ingrese los Datos:</h2>
		<div class = "contenedor-inputs">
		    <label>Elija el animal al que va agregar los datos:</label>
			<select name="NOMBRE" required>
            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <option value="<?php echo $fila['NOMBRE']; ?>"><?php echo $fila['NOMBRE']; ?></option>
            <?php } ?>
            </select>
			<br><br>
			<input type = "number" name = "ID_Sensor" placeholder = "ID del Sensor" min="1" max="10000"  class = "Input_50" required pattern="[0-9]+">
			<br><br>
			<input type = "number" name = "FRECUENCIA_C" placeholder = "Frecuencia Cardiaca" min="1" max="10000"  class = "Input_50" required>
			<br><br>
			<input type = "number" name = "PRESION" placeholder = "Presión Sanguinea" min="1" max="10000" class = "Input_50" required>
			<br><br>
			<input type="number" name="FRECUENCIA_R" placeholder="Frecuencia Respiratoria"  min="1" max="10000"  step = "1" class="Input_50" required pattern="[0-9]+">
			<br><br>	
			<input type="number" name="TEMPERATURA" placeholder="Temperatura"  min="1" max="10000"  step = "1" class="Input_50" required pattern="[0-9]+">
			<br><br>		
			<label>Fecha de Registro:</label>
			<input type = "date" name = "FECHA_REGISTRO" class = "Ymd" required>
			<br><br>		
			<input type = "submit" value = "Registrar" class = "Boton_Registrar">
		</div>
	</form>
</body>
</html> 