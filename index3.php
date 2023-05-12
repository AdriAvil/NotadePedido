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
		if (isset($_POST['buscar_clientes'])) {
				/*$eliminarnumerode = mysqli_query($conex,"DELETE FROM `pedidos` WHERE numero_pedido = 0");
				$eliminarvacios = mysqli_query($conex,"DELETE FROM `pedidos` WHERE total = 0");*/

					/*$consulta = "SELECT * FROM pedidos";
					$resultado = mysqli_query($conex,$consulta);
					while ($row = $resultado->fetch_array()) {
						$numeropedido[] = $row['numero_pedido'];				
					}
					$ultimopedido = max($numeropedido);
					$ultimopedidos = $ultimopedido+1;
					$ingresar_number_pedido = mysqli_query($conex,"INSERT INTO pedidos_temp(numero_pedido) VALUES ($ultimopedidos)");
				*/
					$ruc = trim($_POST['ruc']);
					$sqlBuscarCliente = mysqli_query($conex,"SELECT * FROM `clientes` WHERE ruc = $ruc");		
					
						$row = $sqlBuscarCliente->fetch_array();
						$nombre = $row['nombre'];					
						$email = $row['email'];							
						$ruc2 = $row['ruc'];					
						$celular = $row['celular'];					
						$direccion = $row['direccion'];						
						$numero_cliente = $row['numero_cliente'];
						

				if($ruc==$ruc2){

					
															
					?>
					<form class="in-flex" method="post">
						<h1>Nota de Pedido</h1>
						<img src="https://mastercleaning-ec.com/nota-pedido/img/logo-blanco-AO.svg" style="width:300px">
						

						<input type="number" name="ruc" value="<?php echo $ruc2 ?>" placeholder="<?php echo $ruc2 ?>">
						<input type="text" name="name" value="<?php echo $nombre ?>" placeholder="<?php echo $nombre ?>">
						<input type="email" name="email" value="<?php echo $email ?>" placeholder="<?php echo $email ?>">
						<input type="number" name="celular" value="<?php echo $celular ?>" placeholder="<?php echo $celular ?>">
						<input type="text" name="direccion" value="<?php echo $direccion ?>" placeholder="<?php echo $direccion ?>">		

						<?php $fecha = date("Y-m-d");?>
						<?php echo "<p class='saludo2' >Fecha de entrega<span id='nombre'></span></p>"; ?>
						
						<input type="hidden" name="ruc" value="<?php echo $ruc; ?>">
						<select name="vendedor">
							<option value="vendedor">Vendedor(a)</option>
							<option value="Anita">Anita</option>
							<option value="Oscar">Oscar</option>
							<option value="Eduardo">Eduardo</option>
						</select> 	 	
						<input type="hidden" name="posi" value="cliente">	
						<input type="submit" class="btn btn-1" name="pedidos" value="Continuar">
						
						<?php
						/*
						$ingresar_datos_cliente = mysqli_query($conex,"INSERT INTO clientes_pd(celular, direccion, email, nombre, numero_cliente, ruc) VALUES ('$celular','$direccion','$email','$nombre','$numero_cliente','$ruc')");
						
						*/?>

						<!--<input type="submit" name="pedidos" value="Continuar">-->


					</form>
					<?php

					

				}else{
					?>
					<form class="in-flex" method="post">
						<div class="container">
							<div class="buttons">  
								<h1>Nota de Pedido</h1>
								<img src="https://mastercleaning-ec.com/nota-pedido/img/logo-blanco-AO.svg" style="width:300px">
								
								<?php $ruc = trim($_POST['ruc']); ?>
								<input type="number" name="ruc" value="<?php echo $ruc ?>" placeholder="<?php echo $ruc ?>">
								<input type="text" name="name" placeholder="Nombre cliente">
								<input type="email" name="email" placeholder="Email">
								<input type="number" name="celular" placeholder="Celular">
								<input type="text" name="direccion" placeholder="Dirección">		
								<?php $fecha = date("Y-m-d");?>
								<?php echo "<p class='saludo2' >Fecha de entrega<span id='nombre'></span></p>"; ?>
								
								<input type="hidden" name="ruc" value="<?php echo $ruc; ?>">
								<select name="vendedor">
									<option value="vendedor">Vendedor(a)</option>
									<option value="Anita">Anita</option>
									<option value="Oscar">Oscar</option>
									<option value="Eduardo">Eduardo</option>
								</select> 	
								<input type="hidden" name="posi" value="nuevo">	
								<input type="submit" class="btn btn-1" name="pedidos" value="Continuar">
							</div>
						</div>
					
					</form>
			<?php

				}								
						
			}		     
		
			include("pedidos.php");
			include("registrar.php");
			include("detalle_pedido.php");
			include("finalizar_pedido.php");

        ?>
</body>
</html>


