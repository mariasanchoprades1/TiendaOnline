<?php
	require_once 'sesiones.php';	
	comprobar_sesion();
	$_SESSION = array();
	session_destroy();
	setcookie(session_name(), 123, time() - 1000); 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Sesión cerrada</title>
	</head>
	<body>
		<p>La sesión se cerró correctamente, hasta la próxima</p>
		<a href = "login.php">Ir a la página de login</a>
	</body>
</html>