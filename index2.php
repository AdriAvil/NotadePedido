<?php 
$inc = include("con_db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar pedido</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
		<?php
		if (isset($_POST['empezar'])) {
				/*$eliminarnumerode = mysqli_query($conex,"DELETE FROM `pedidos` WHERE numero_pedido = 0");
				$eliminarvacios = mysqli_query($conex,"DELETE FROM `pedidos` WHERE total = 0");

				$consulta = "SELECT * FROM pedidos";
				$resultado = mysqli_query($conex,$consulta);
				while ($row = $resultado->fetch_array()) {
					$numeropedido[] = $row['numero_pedido'];				
				}
				$ultimopedido = max($numeropedido);
				$ultimopedidos = $ultimopedido+1;
				$ingresar_number_pedido = mysqli_query($conex,"INSERT INTO pedidos(numero_pedido) VALUES ($ultimopedidos)");*/	
			
				?>
		<form class="in-flex" action="index3.php" method="post">
			<div class="container">
				<div class="buttons">  
					<img src="https://mastercleaning-ec.com/nota-pedido/img/logo-blanco-AO.svg" style="width:300px">
					<h1>Nota de Pedido</h1>
					<input type="text" name="ruc" placeholder="RUC">
					<input type="submit" class="btn btn-1" name="buscar_clientes" value="Buscar">
				</div>
			</div>
    	</form>
			<?php
			
			
			}       
		
			include("pedidos.php");
			include("registrar.php");

        ?>
</body>
</html>


