<?php 
$inc = include("con_db.php");
if ($inc) {
		$eliminarnumerode = mysqli_query($conex,"DELETE FROM `pedidos` WHERE numero_pedido = 0");
		$eliminarvacios = mysqli_query($conex,"DELETE FROM `pedidos` WHERE total = 0");

		$consultatamanio = "SELECT * FROM `pedidos`";
		$resultadotam = mysqli_query($conex,$consultatamanio);
		$i=1;
		while($fila = $resultadotam->fetch_array()){
			$consulta = "SELECT * FROM `clientes` WHERE numero_cliente = $i";
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
				if(isset($nombre))
				{
					?>

					<div>
						<h2><?php echo $nombre; ?></h2>
						<div>
							<p>
								
								<b>Email: </b> <?php echo $email; ?><br>
								<b>RUC: </b> <?php echo $ruc; ?><br>
								<b>Celular: </b> <?php echo $celular; ?><br>
								<b>Dirección: </b> <?php echo $direccion; ?><br>

						</div>
					
					</div>

								<?php

				}
				
								

					$consulta2 = "SELECT id,fecha_reg,fecha_entr,pago,cantidad,producto,presentacion,vendedor,descuento,subtotal,iva,total,numero_pedido,fecha_pago
					FROM `pedidos` WHERE numero_pedido = $i";
					$resultado2 = mysqli_query($conex,$consulta2);	
					while ($row = $resultado2->fetch_array()){
						$id = $row['id'];
						$fechareg = $row['fecha_reg'];
						$fecha_entrega = $row['fecha_entr'];
						$cantidad = $row['cantidad'];
						$producto = $row['producto'];
						$presentacion = $row['presentacion'];
						$pago = $row['pago'];
						$numero_pedido = $row['numero_pedido'];	
						$vendedor = $row['vendedor'];
						$fecha_de_pago = $row['fecha_pago'];
						$subtotal = $row['subtotal'];
						$iva = $row['iva'];
						$total = $row['total'];						
						$total_pedido=$total_pedido+$total;
							if($numero_cliente==$numero_pedido)
							{		
						
									?>
										<div>
											<div>
											
														<b>ID: </b> <?php echo $id; ?><br>
														<b>Fecha: </b> <?php echo $fechareg; ?><br>
														<b>Fecha de Entrega: </b> <?php echo $fecha_entrega; ?><br>
														<b>Cantidad: </b> <?php echo $cantidad; ?><br>
														<b>Producto: </b> <?php echo $producto; ?><br>
														<b>Presentación: </b> <?php echo $presentacion; ?><br>
														<b>Pago: </b> <?php echo $pago; ?><br>
														<b>Fecha de Pago: </b> <?php echo $fecha_de_pago; ?><br>
														<b>Vendedor: </b> <?php echo $vendedor; ?><br>
														<b>Subtotal: </b> <?php echo "$".$subtotal; ?><br>
														<b>IVA: </b> <?php echo "$".$iva; ?><br>
														<b>Total: </b> <?php echo "$".$total; ?><br>
														
													</p>
											</div>
										</div> 
									<?php
								}
							
					}

					if($total_pedido!=0)
					{
						?>
							<div>
								<b style="font-size: 16px;">Total pedido: </b> <?php echo "$".$total_pedido; ?><br>
							</div>
						<?php
					}
					$i++;
			}

		}	
}	

?>