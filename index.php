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
	$eliminar_temp = mysqli_query($conex,"DELETE FROM `pedidos_temp`");
	$eliminar_temp = mysqli_query($conex,"DELETE FROM `clientes_pd_temp`");
	?>
		

    <form action="index2.php"class="in-flex" method="post">
		<h1>Nota de Pedido</h1>
        <img src="https://mastercleaning-ec.com/nota-pedido/img/logo-blanco-AO.svg" style="width:300px">
    	
    	
		<form class="in-flex" method="post">  
		<div class="container">
			<div class="buttons">     
				<input type="submit" class="btn btn-1" name="empezar" value="Nuevo Pedido">
			</div>
		</div>
		
    </form>
        <?php 
		include("index2.php");
		include("index3.php");
        include("pedidos.php");
		include("registrar.php");
        ?>
</body>
</html>


