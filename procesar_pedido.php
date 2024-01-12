<?php
	require 'correo.php';
	require 'sesiones.php';
	require_once 'bd.php';
	comprobar_sesion();
?>	
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Pedidos</title>		
	</head>
	<body>
	<?php 

 require 'cabecera.php';          
 $resultadoPedido = insertar_pedido($_SESSION['carrito'], $_SESSION['usuario']['codRes']);
 if($resultadoPedido === FALSE){
	 echo "No se ha podido realizar el pedido<br>";          
 }else{
	 $correo = $_SESSION['usuario']['correo'];
	 $pedidoId = $resultadoPedido['pedido']; // ID del pedido
	 $totalPeso = $resultadoPedido['pesoTotal']; // Peso total del pedido

	 echo "Pedido realizado con éxito. Se enviará un correo de confirmación a: alusan7934@ieselcaminas.org ";                            
	 // Incluir el peso total en la llamada a enviar_correos
	 $conf = enviar_correos($_SESSION['carrito'], $pedidoId, $correo, $totalPeso);                            
	 if($conf !== TRUE){
		 echo "Error al enviar: $conf <br>";
	 };          
	 $_SESSION['carrito'] = [];

 }       
 ?>      
 </body>
</html>