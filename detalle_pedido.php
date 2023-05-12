<?php
	include("con_db.php");
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
	if (isset($_POST['finalizar'])) {		
		/*$eliminarnumerode = mysqli_query($conex,"DELETE FROM `pedidos` WHERE numero_pedido = 0");
		$eliminarvacios = mysqli_query($conex,"DELETE FROM `pedidos` WHERE total = 0");*/
		?>
		<h1>Nota de Pedido</h1>
		<img src="https://mastercleaning-ec.com/nota-pedido/img/logo-blanco-AO.svg" style="width:300px">
    	
		<?php

		$consultatamanio = "SELECT * FROM `pedidos_temp`";
		$resultadotam = mysqli_query($conex,$consultatamanio);
		$ruc = trim($_POST['ruc']);
		
		
		$consulta = "SELECT * FROM `clientes_pd_temp` WHERE ruc = $ruc";
		$resultado = mysqli_query($conex,$consulta);	
		if (isset($resultado)) {
			$row = $resultado->fetch_array();
			$nombre = $row['nombre'];
			$email = $row['email'];				
			$ruc = $row['ruc'];
			$celular = $row['celular'];
			$direccion = $row['direccion'];	
			$numero_cliente = $row['numero_cliente'];
			$total_pedido=0;
				
			?>

				<div>
					<h2><?php echo ""; ?></h2>
					<div>
						<p>
						<b style="color:white;">Cliente:</b> <span style="color:white;"><?php echo $nombre; ?></span><br>							
						<b style="color:white;">Email:</b> <span style="color:white;"><?php echo $email; ?></span><br>
						<b style="color:white;">RUC:</b> <span style="color:white;"><?php echo $ruc; ?></span><br>
						<b style="color:white;">Celular:</b> <span style="color:white;"><?php echo $celular; ?></span><br>
						<b style="color:white;">Dirección:</b> <span style="color:white;"><?php echo $direccion; ?></span><br>


					</div>
					
				</div>

			<?php
				
											
			$consulta2 = "SELECT * FROM `pedidos_temp`";
			$resultado2 = mysqli_query($conex,$consulta2);	
			$row = $resultado2->fetch_array();
			$fechareg = $row['fecha_reg'];
			$numero_pedido = $row['numero_pedido'];	
			$vendedor = $row['vendedor'];
					?>
						<div>
									<div>
								
									
									<b style="color:white;">Fecha registro:</b> <span style="color:white;"><?php echo $fechareg; ?></span><br>
									<b style="color:white;">Vendedor:</b> <span style="color:white;"><?php echo $vendedor; ?></span><br>
													
												
										</p>
									</div>
						</div> 
					<?php
			$consulta2 = "SELECT * FROM `pedidos_temp`";
			$resultado2 = mysqli_query($conex,$consulta2);
			while ($row = $resultado2->fetch_array()){
						
				$cantidad = $row['cantidad'];
				$producto = $row['producto'];
				$presentacion = $row['presentacion'];	
												
					?>						
									
							<div>
								<div>
								<b style="color:white;">Producto:</b> <span style="color:white;"><?php echo $producto; ?></span><br>
								<b style="color:white;">Cantidad:</b> <span style="color:white;"><?php echo $cantidad; ?></span><br>
								<b style="color:white;">Presentación:</b> <span style="color:white;"><?php echo $presentacion; ?></span><br>																				
										
										</p>
								</div>
							</div> 
					<?php
							
							
			}

			
			

		}	

					?>
					<form class="in-flex" method="post">
					<div class="container">
						<div class="buttons">  

						<select name="descuento">
							<option value="descuento">Descuento</option>
							<option value="desc25">Descuento 25%</option>
							<option value="desc20">Descuento 20%</option>
							<option value="desc15">Descuento 15%</option>
							<option value="pvp">PVP</option>
						</select>	

						<select name="pago">
							<option value="metodo">Método de pago</option>
							<option value="Efectivo">Efectivo</option>
							<option value="Cheque">Cheque</option>
							<option value="Transferencia">Transferencia</option>
							<option value="Electronico">Dinero electronico</option>
						</select>					

						<?php $fecha = date("Y-m-d");?>
						<?php echo "<p class='saludo2' >Fecha de entrega<span id='nombre'></span></p>"; ?>
						<input type="date" class='saludo3' name="fecha_entrega" min="<?php echo $fecha?>" placeholder="Fecha de entrega">
						<?php echo "<p class='saludo2' >Fecha de pago<span id='nombre'></span></p>"; ?>
						<input type="date" class='saludo3' name="fecha_pago" min="<?php echo $fecha ?>" placeholder="Fecha de pago">					
						<input type="submit" class="btn btn-1" name="finalizar_pedido" value="Finalizar pedido">
						
						</div>
					</div>
					</form>

		


		<?php
		

	}
		
	
?>
</body>
</html>
            