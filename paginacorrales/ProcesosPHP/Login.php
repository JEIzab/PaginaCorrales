<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conexión a la base de datos
    $conn = mysqli_connect("localhost", "root", "", "corrales");

    // Validación del usuario y contraseña
    $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Usuario y contraseña son correctos
        $_SESSION['username'] = $username;
        header('Location: ProcesosPHP/RegistroCrias.html');
    } else {
        // Usuario y contraseña son incorrectos
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de Registro de Crias</title>
	<link rel = "stylesheet" href = "../DiseñosCSS/DiseñoIniciarSesion.css">
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
	<h1>Inicio de Sesion</h1>
	<form action = "../ProcesosPHP/Login.php" method = "POST" class = "Formulario">
		<h2>Ingrese su Nombre de Usuario y Password:</h2>
		<div class = "contenedor-inputs">
			<input type = "text" name = "username" placeholder = "Usuario" minlength="5"  maxlength="50"  class = "Input_50" required>
			<br><br>
			<input type = "password" name = "password" placeholder = "Contraseña" minlength="2"  maxlength="150" class = "Input_50" required>
			<br><br>		
			<input type = "submit" value = "Ingresar" class = "Boton_Ingresar">
		</div>
	</form>
</body>
</html> 
