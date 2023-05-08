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
		

    <form action="index2.php"class="in-flex" method="post">
        <img src="https://mastercleaning-ec.com/nota-pedido/img/logoAO.png" style="width:300px">
    	<h1>Nota de Pedido</h1>
    	
		<form class="in-flex" method="post">       
		<input type="submit" name="empezar" value="Registrar nuevo pedido">
		
    </form>
        <?php 
		include("index2.php");
        include("pedidos.php");
		include("registrar.php");
        ?>
</body>
</html>


