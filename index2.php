<?php 
$inc = include("con_db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar pedido</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
		<?php
		if (isset($_POST['empezar'])) {
				$eliminarnumerode = mysqli_query($conex,"DELETE FROM `pedidos` WHERE numero_pedido = 0");
				$eliminarvacios = mysqli_query($conex,"DELETE FROM `pedidos` WHERE total = 0");

				$consulta = "SELECT * FROM pedidos";
				$resultado = mysqli_query($conex,$consulta);
				while ($row = $resultado->fetch_array()) {
					$numeropedido[] = $row['numero_pedido'];				
				}
				$ultimopedido = max($numeropedido);
				$ultimopedidos = $ultimopedido+1;
				$ingresar_number_pedido = mysqli_query($conex,"INSERT INTO pedidos(numero_pedido) VALUES ($ultimopedidos)");	
			
				?>
		<form class="in-flex" method="post">
			<img src="https://mastercleaning-ec.com/nota-pedido/img/logoAO.png" style="width:300px">
			<h1>Nota de Pedido</h1>
			<input type="text" name="name" placeholder="Nombre cliente">
			<input type="email" name="email" placeholder="Email">
			<input type="text" name="ruc" placeholder="RUC">
			<input type="text" name="celular" placeholder="Celular">
			<input type="text" name="direccion" placeholder="Dirección">		
			<input type="text" name="fecha_entrega" placeholder="Fecha de entrega"> 
			<input type="text" name="fecha_pago" placeholder="Fecha de pago"> 
			<input type="text" name="vendedor" placeholder="Vendedor(a)"> 	
			<input type="hidden" name="posi" value="1">	
			<input type="submit" name="pedidos" value="Agregar pedido">
			
    	</form>
			<?php
			
			
			}
		
       
		
			include("pedidos.php");
			include("registrar.php");

        ?>
</body>
</html>


