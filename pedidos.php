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
	if (isset($_POST['pedidos'])) {
		$posi = trim($_POST['posi']);
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);		
		$ruc = trim($_POST['ruc']);
		$celular = trim($_POST['celular']);
		$direccion = trim($_POST['direccion']);
		$nombre_vendedor = trim($_POST['vendedor']);
		
			if (strlen($_POST['name']) >= 1 && strlen($_POST['direccion']) >= 1){

			/*  Esta condicional es para verificar si el cliente es nuevo o ya estaba registrado en la base de datos*/
				if($posi=="nuevo")
				{
				$consulta = "SELECT * FROM clientes";
				$resultado = mysqli_query($conex,$consulta);
				while ($row = $resultado->fetch_array()) {
					$numerocliente[] = $row['numero_cliente'];				
				}
				$ultimocliente = max($numerocliente);
				$ultimocliente = $ultimocliente+1;										
								
				$consulta2 = "INSERT INTO clientes(nombre,email,ruc,direccion,celular, numero_cliente) VALUES ('$name','$email','$ruc', '$direccion', '$celular','$ultimocliente')";
				$resultado2 = mysqli_query($conex,$consulta2);

				}else{
					$update="UPDATE `clientes` SET `nombre`='$name',`email`='$email',`ruc`='$ruc',`celular`='$celular',`direccion`='$direccion' WHERE `ruc`= $ruc";
					$sqlUpdate = mysqli_query($conex,$update);
				}				

				
			}else {
				?> 
				<h3 class="bad">¡Por favor complete los campos!</h3>
			   <?php
			}
		
		$ingresar_datos_cliente = mysqli_query($conex,"INSERT INTO clientes_pd_temp(nombre,email,ruc,celular,direccion) VALUES ('$name','$email','$ruc','$celular','$direccion')");
				
		


		?>   	    	
		
		<form class="in-flex" method="post">
			<div class="container">
				<div class="buttons">  
					<h1>Agregar pedido</h1>    			

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

					<input type="text" name="cantidad" placeholder="Cantidad">     	 

					<select name="presentacion">
						<option value="presentacion">Presentación</option>
						<option value="litro">Litro</option>
						<option value="galon">Galón</option>
						<option value="caneca10">Caneca 10 litros</option>
						<option value="caneca20">Caneca 20 litros</option>
						<option value="saco25kg">Saco de 25kg</option>
					</select>
					
							
					<input type="hidden" name="pass" value="new">	
					<input type="hidden" name="vendedor" value="<?php echo $nombre_vendedor; ?>">
					<input type="hidden" name="ruc" value="<?php echo $ruc?>">		
					<input type="submit" class="btn btn-1" name="register" value="Enviar pedido">
				</div>
			</div>
		</form>

	<?php			
	}
	
	
	if (isset($_POST['pedidos2'])) {
		$ruc = trim($_POST['ruc']);
		$nombre_vendedor = trim($_POST['vendedor']);
		
		?>   	    	
		
		<form class="in-flex" method="post">
			<div class="container">
				<div class="buttons">    
					<h1>Agregar pedido</h1>    	
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

					<input type="text" name="cantidad" placeholder="Cantidad">     	    

					<select name="presentacion">
						<option value="presentacion">Presentación</option>
						<option value="litro">Litro</option>
						<option value="galon">Galón</option>
						<option value="caneca10">Caneca 10 litros</option>
						<option value="caneca20">Caneca 20 litros</option>
						<option value="saco25kg">Saco de 25kg</option>
					</select>
							
					<input type="hidden" name="pass" value="old">		
					<input type="hidden" name="vendedor" value="<?php echo $nombre_vendedor; ?>">
					<input type="hidden" name="ruc" value="<?php echo $ruc?>">	
					<input type="submit" class="btn btn-1" name="register" value="Enviar pedido">
				</div>
			</div>
		</form>

	<?php			
	
	
	}
?>
</body>
</html>
            