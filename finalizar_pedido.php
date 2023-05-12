<?php
	include("con_db.php");
	
	
	if (isset($_POST['finalizar_pedido'])) {
		
		/*$eliminarnumerode = mysqli_query($conex,"DELETE FROM `pedidos` WHERE numero_pedido = 0");
		$eliminarvacios = mysqli_query($conex,"DELETE FROM `pedidos` WHERE total = 0");*/
		$fecha_entrega = trim($_POST['fecha_entrega']);
		$consulta_clientes_tem = "SELECT * FROM `clientes_pd_temp`";
		$resultado = mysqli_query($conex,$consulta_clientes_tem);			
		$row = $resultado->fetch_array();
		$nombre = $row['nombre'];
		$email = $row['email'];				
		$ruc = $row['ruc'];
		$celular = $row['celular'];
		$direccion = $row['direccion'];	
		
		$consulta = "SELECT * FROM clientes_pd";
		$resultado = mysqli_query($conex,$consulta);
		while ($row = $resultado->fetch_array()) {
			$numerocliente[] = $row['numero_cliente'];				
		}
		$ultimocliente = max($numerocliente);
		$ultimocliente = $ultimocliente+1;	

		$ingresar_datos_cliente = mysqli_query($conex,"INSERT INTO clientes_pd(nombre,email,ruc,celular,direccion,numero_cliente) VALUES ('$nombre','$email','$ruc','$celular','$direccion','$ultimocliente')");
				

		/*Desde aqui registra el pedido en la BD*/
		$fecha_de_pago = trim($_POST['fecha_pago']);
		$metodo_de_pago = trim($_POST['metodo']);
		$descuento = trim($_POST['descuento']);
		
		$consultatamanio = "SELECT * FROM `pedidos_temp`";
		$resultadotam = mysqli_query($conex,$consultatamanio);


		/*Aqui consulto el último pedido*/
		$consultaped = "SELECT * FROM pedidos";
		$resultadoped = mysqli_query($conex,$consultaped);
		while ($row = $resultadoped->fetch_array()) {
		 $numeropedidos[] = $row['numero_pedido'];				
		}
		$ultimopedidos = max($numeropedidos);
		$ultimopedidos = $ultimopedidos+1;


			while($fila = $resultadotam->fetch_array()){
				$subtotal_por_producto=0;							
				$fechareg = $fila['fecha_reg'];
				$cantidad = $fila['cantidad'];
				$producto = $fila['producto'];
				$presentacion = $fila['presentacion'];
				$numero_pedido = $fila['numero_pedido'];	
				$nombre_vendedor = $fila['vendedor'];
				$subtotal = $fila['subtotal'];
				$iva = $fila['iva'];
				$total = $fila['total'];			

				



						switch ($descuento) {
							case desc25:
								switch ($producto) {
									case Ferti_Organ:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*4.83;
												break;
											case Galon:
												$total = $cantidad*17.38;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*38.63;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*77.25;
												break;
											default:
												$total= 0;
												break;
											}
									break;
									
									case Triplex:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*8.66;
												break;
											case Galon:
												$total = $cantidad*31.50;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*73.83;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*147.66;
												break;
											default:
												$total= 0;
											}
									break;
									
									case GPlus:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*11.03;
												break;
											case Galon:
												$total = $cantidad*37.80;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*90.56;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*181.13;
												break;
											default:
												$total= 0;
											}
									break;
									
									case Nutri_Full:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*6.80;
												break;
											case Galon:
												$total = $cantidad*27.17;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*64.06;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*128.12;
												break;
											default:
												$total= 0;
											}
									break;
									
									case Full_Cacao:
										$total = $cantidad*14.00;
									break;
									
									case Complemento:
										$total = $cantidad*4.13;
									break;
									
									case Humi_PK:
										$total = $cantidad*14.96;
									break;
								
									default:
									$total= 0;
									break;
								}
							break;
					
						
					
							case desc20:
								switch ($producto) {
									case Ferti_Organ:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*5.15;
												break;
											case Galon:
												$total = $cantidad*18.54;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*41.20;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*82.40;
												break;
											default:
												$total= 0;
												break;
											}
									break;
									
									case Triplex:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*9.24;
												break;
											case Galon:
												$total = $cantidad*33.60;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*78.75;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*157.50;
												break;
											default:
												$total= 0;
											}
									break;
									
									case GPlus:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*11.76;
												break;
											case Galon:
												$total = $cantidad*40.32;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*96.60;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*193.20;
												break;
											default:
												$total= 0;
											}
									break;
									
									case Nutri_Full:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*7.25;
												break;
											case Galon:
												$total = $cantidad*28.98;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*68.33;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*136.66;
												break;
											default:
												$total= 0;
											}
									break;
									
									case Full_Cacao:
										$total = $cantidad*14.00;
									break;
									
									case Complemento:
										$total = $cantidad*4.41;
									break;
									
									case Humi_PK:
										$total = $cantidad*15.96;
									break;
								
									default:
									$total= 0;
								}
							break;
							
							case desc15:
								switch ($producto) {
									case Ferti_Organ:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*5.47;
												break;
											case Galon:
												$total = $cantidad*19.70;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*43.78;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*87.55;
												break;
											default:
												$total= 0;
											}
									break;
									
									case Triplex:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*9.82;
												break;
											case Galon:
												$total = $cantidad*35.70;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*83.67;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*167.34;
												break;
											default:
												$total= 0;
											}
									break;
									
									case GPlus:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*12.50;
												break;
											case Galon:
												$total = $cantidad*42.84;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*102.64;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*205.28;
												break;
											default:
												$total= 0;
												break;
											}
									break;
									
									case Nutri_Full:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*7.70;
												break;
											case Galon:
												$total = $cantidad*30.79;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*72.60;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*145.20;
												break;
											default:
												$total= 0;
												break;
											}
									break;
									
									case Full_Cacao:
										$total = $cantidad*14.00;
									break;
									
									case Complemento:
										$total = $cantidad*4.69;
									break;
									
									case Humi_PK:
										$total = $cantidad*16.96;
									break;
								
									default:
									$total= 0;
									break;
								}
							break;	
					
							case pvp:
								switch ($producto) {
									case Ferti_Organ:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*6.44;
												break;
											case Galon:
												$total = $cantidad*23.18;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*51.50;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*103.00;
												break;
											default:
												$total= 0;
											}
									break;
									
									case Triplex:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*11.55;
												break;
											case Galon:
												$total = $cantidad*42.00;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*98.44;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*196.88;
												break;
											default:
												$total= 0;
											}
									break;
									
									case GPlus:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*14.70;
												break;
											case Galon:
												$total = $cantidad*50.40;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*120.75;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*241.50;
												break;
											default:
												$total= 0;
											}
									break;
									
									case Nutri_Full:
										switch ($presentacion) {
											case Litro:
												$total = $cantidad*9.06;
												break;
											case Galon:
												$total = $cantidad*36.23;
												break;
											case Caneca_de_10_litros:
												$total = $cantidad*85.41;
												break;
											case Caneca_de_20_litros:
												$total = $cantidad*170.82;
												break;
											default:
												$total= 0;
											}
									break;
									
									case Full_Cacao:
										$total = $cantidad*17.50;
									break;
									
									case Complemento:
										$total = $cantidad*5.51;
									break;
									
									case Humi_PK:
										$total = $cantidad*19.95;
									break;
								
									default:
									$total= 0;
								}
							break;
					
					
					
					
							default:
									$total= 0;
							break;
						}

						$subtotal_por_producto=$total;
						$iva_por_producto=$subtotal_por_producto*0.12;
						$total_por_producto=$iva_por_producto+$subtotal_por_producto;

						  

						$consulta3 = "INSERT INTO pedidos(fecha_reg, fecha_entr, pago, cantidad, producto, presentacion, vendedor, numero_pedido,fecha_pago,descuento,subtotal,iva,total) 
             		   	VALUES ('$fechareg','$fecha_entrega','$metodo_de_pago', '$cantidad', '$producto', '$presentacion','$nombre_vendedor','$ultimopedidos','$fecha_de_pago','$descuento','$subtotal_por_producto','$iva_por_producto','$total_por_producto')"; 

       					$resultado3 = mysqli_query($conex,$consulta3);
						$total_pedido=$total+$total_pedido;

							
							
					}

					
								
		


		/*$iva = $total_pedido*0.12;
        $total_con_iva=$total_pedido+$iva;*/

		$total_formateado = number_format($total_pedido, 2, ".", ",");			
				
        


		




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
			<h1>Nota de Pedido</h1>
			<img src="https://mastercleaning-ec.com/nota-pedido/img/logo-blanco-AO.svg" style="width:300px">
				<?php		
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<p class='saludo'>Total a pagar $<span id='nombre'>$total_formateado</span>  dólares</p>";
				/*echo "<p class='saludo'>IVA 12% $<span id='nombre'>$iva</span>  dólares</p>";
				echo "<p class='saludo'>Total $<span id='nombre'>$total_con_iva</span>  dólares</p>";*/  
				?>
		
			<form class="in-flex" action="index.php"method="post">				
				<div class="container">
					<div class="buttons">	
						<input type="hidden" name="pass" value="old">			
						<input type="submit" class="btn btn-1" value="Terminar">
					</div>
			</div>
			</form>
		</body>
		</html>




		<?php
		include("index2.php");

	}
		
	
?>
