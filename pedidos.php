<?php
	include("con_db.php");
	
	

	if (isset($_POST['pedidos'])) {
		$posi = trim($_POST['posi']);
		if($posi!=0){
			if (strlen($_POST['name']) >= 1 && strlen($_POST['direccion']) >= 1){
				$consulta = "SELECT * FROM clientes";
				$resultado = mysqli_query($conex,$consulta);
				while ($row = $resultado->fetch_array()) {
					$numerocliente[] = $row['numero_cliente'];				
				}
				$ultimocliente = max($numerocliente);
				$ultimocliente = $ultimocliente+1;	
	
				$name = trim($_POST['name']);
				$email = trim($_POST['email']);		
				$ruc = trim($_POST['ruc']);
				$celular = trim($_POST['celular']);
				$direccion = trim($_POST['direccion']);
				$consulta2 = "INSERT INTO clientes(nombre,email,ruc,direccion,celular, numero_cliente) VALUES ('$name','$email','$ruc', '$direccion', '$celular','$ultimocliente')";
				$resultado2 = mysqli_query($conex,$consulta2);
				
				$fechaentrega = trim($_POST['fecha_entrega']);            
				$vendedor = trim($_POST['vendedor']);  
				$Ingresarvendedor = "INSERT INTO pedidos(fecha_entr,vendedor) VALUES ('$fechaentrega','$vendedor')";
				$Ingresarvendedor = mysqli_query($conex,$Ingresarvendedor);
			}else {
				?> 
				<h3 class="bad">¡Por favor complete los campos!</h3>
			   <?php
			}
		}
		


		?>   	    	
		
		<form class="in-flex" method="post">
    	<h1>Agregar pedido</h1>    			
		<input type="text" name="cantidad" placeholder="Cantidad">     	    	
		<select name="presentacion">
			<option value="presentacion">Presentación</option>
			<option value="litro">Litro</option>
			<option value="galon">Galón</option>
			<option value="caneca10">Caneca 10 litros</option>
			<option value="caneca20">Caneca 20 litros</option>
		</select>
		<select name="producto">
			<option value="producto">Producto</option>
			<option value="triplex">Triplex</option>
			<option value="gplus">GPlus</option>
			<option value="ferti">Ferti Organ</option>
			<option value="fullcacao">FullCacao</option>
			<option value="nutri">NutriFull</option>
			<option value="humi">HumiPK</option>
			<option value="complemento">Complemento</option>
		</select>
		<select name="pago">
			<option value="metodo">Método de pago</option>
			<option value="Efectivo">Efectivo</option>
			<option value="Cheque">Cheque</option>
			<option value="Electronico">Dinero electronico</option>
			<option value="Credito">Tarjeta de crédito</option>
		</select>
		<select name="descuento">
			<option value="descuento">Descuento</option>
			<option value="desc25">Descuento 25%</option>
			<option value="desc20">Descuento 20%</option>
			<option value="desc15">Descuento 15%</option>
			<option value="pvp">PVP</option>
		</select>			
		<input type="hidden" name="pass" value="new">		
    	<input type="submit" name="register" value="Enviar pedido">
	</form>

	<?php			
	}
	
	
	if (isset($_POST['pedidos2'])) {
		$posi = trim($_POST['posi']);
		if($posi!=0){
			if (strlen($_POST['name']) >= 1 && strlen($_POST['direccion']) >= 1){
				$consulta = "SELECT * FROM clientes";
				$resultado = mysqli_query($conex,$consulta);
				while ($row = $resultado->fetch_array()) {
					$numerocliente[] = $row['numero_cliente'];				
				}
				$ultimocliente = max($numerocliente);
				$ultimocliente = $ultimocliente+1;	
	
				$name = trim($_POST['name']);
				$email = trim($_POST['email']);		
				$ruc = trim($_POST['ruc']);
				$celular = trim($_POST['celular']);
				$direccion = trim($_POST['direccion']);
				$consulta2 = "INSERT INTO clientes(nombre,email,ruc,direccion,celular, numero_cliente) VALUES ('$name','$email','$ruc', '$direccion', '$celular','$ultimocliente')";
				$resultado2 = mysqli_query($conex,$consulta2);
				
				$fechaentrega = trim($_POST['fecha_entrega']);            
				$vendedor = trim($_POST['vendedor']);  
				$Ingresarvendedor = "INSERT INTO pedidos(fecha_entr,vendedor) VALUES ('$fechaentrega','$vendedor')";
				$Ingresarvendedor = mysqli_query($conex,$Ingresarvendedor);
			}else {
				?> 
				<h3 class="bad">¡Por favor complete los campos!</h3>
			   <?php
			}
		}
		


		?>   	    	
		
		<form class="in-flex" method="post">
    	<h1>Agregar pedido</h1>    			
		<input type="text" name="cantidad" placeholder="Cantidad">     	    	
		<select name="presentacion">
			<option value="presentacion">Presentación</option>
			<option value="litro">Litro</option>
			<option value="galon">Galón</option>
			<option value="caneca10">Caneca 10 litros</option>
			<option value="caneca20">Caneca 20 litros</option>
		</select>
		<select name="producto">
			<option value="producto">Producto</option>
			<option value="triplex">Triplex</option>
			<option value="gplus">GPlus</option>
			<option value="ferti">Ferti Organ</option>
			<option value="fullcacao">FullCacao</option>
			<option value="nutri">NutriFull</option>
			<option value="humi">HumiPK</option>
			<option value="complemento">Complemento</option>
		</select>
		<select name="pago">
			<option value="metodo">Método de pago</option>
			<option value="Efectivo">Efectivo</option>
			<option value="Cheque">Cheque</option>
			<option value="Electronico">Dinero electronico</option>
			<option value="Credito">Tarjeta de crédito</option>
		</select>
		<select name="descuento">
			<option value="descuento">Descuento</option>
			<option value="desc25">Descuento 25%</option>
			<option value="desc20">Descuento 20%</option>
			<option value="desc15">Descuento 15%</option>
			<option value="pvp">PVP</option>
		</select>			
		<input type="hidden" name="pass" value="old">		
    	<input type="submit" name="register" value="Enviar pedido">
	</form>

	<?php			
	}
?>
