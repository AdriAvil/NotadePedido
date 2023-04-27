<?php 
$inc = include("con_db.php");
if ($inc) {
	$consulta = "SELECT * FROM pedidos";
	$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id = $row['id'];
	    $nombre = $row['nombre'];
	    $email = $row['email'];
	    $fechareg = $row['fecha_reg'];
		$ruc = $row['ruc'];
	    $celular = $row['celular'];
	    $direccion = $row['direccion'];
	    $fecha_entrega = $row['fecha_entr'];
		$cantidad = $row['cantidad'];
	    $producto = $row['producto'];
	    $presentacion = $row['presentacion'];
	    $pago = $row['pago'];

	    ?>
        <div>
        	<h2><?php echo $nombre; ?></h2>
        	<div>
        		<p>
        			<b>ID: </b> <?php echo $id; ?><br>
        		    <b>Email: </b> <?php echo $email; ?><br>
        		    <b>Fecha: </b> <?php echo $fechareg; ?><br>
					<b>RUC: </b> <?php echo $ruc; ?><br>
        		    <b>Celular: </b> <?php echo $celular; ?><br>
        		    <b>Dirección: </b> <?php echo $direccion; ?><br>
					<b>Fecha de Entrega: </b> <?php echo $fecha_entrega; ?><br>
        		    <b>Cantidad: </b> <?php echo $cantidad; ?><br>
        		    <b>Producto: </b> <?php echo $producto; ?><br>
					<b>Presentación: </b> <?php echo $presentacion; ?><br>
        		    <b>Pago: </b> <?php echo $pago; ?><br>
        		</p>
        	</div>
        </div> 
	    <?php
	    }
	}
}
?>