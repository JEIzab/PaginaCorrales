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
	<?php
     $conexion = mysqli_connect("localhost", "root", "", "corrales");

     $query = "SELECT NOMBRE FROM crias";

     $resultado = mysqli_query($conexion, $query);
    ?>

	<h1>Registro de Cuarentena</h1>
	<form action = "../ProcesosPHP/AgregarCuarentena.php" method = "POST" class = "Formulario">
		<h2>Ingrese los Datos:</h2>
		<div class = "contenedor-inputs">
		    <label>Elija el animal que va a enviar a cuarentena:</label>
			<select name="NOMBRE" required>
            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <option value="<?php echo $fila['NOMBRE']; ?>"><?php echo $fila['NOMBRE']; ?></option>
            <?php } ?>
            </select>
			<br><br>
			<label>Se envia a Cuarentena el:</label>
			<input type = "date" name = "CUARENTENA" class = "Ymd" required>
			<br><br>		
			<input type = "submit" value = "Registrar" class = "Boton_Registrar">
		</div>
	</form>
</body>
</html> 