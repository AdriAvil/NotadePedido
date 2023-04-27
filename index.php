<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <form class="in-flex" method="post">
        <img src="https://mastercleaning-ec.com/nota-pedido/img/logoAO.png" style="width:300px">
    	<h1>Nota de Pedido</h1>
    	<input type="text" name="name" placeholder="Nombre completo">
		<input type="email" name="email" placeholder="Email">
		<input type="text" name="ruc" placeholder="RUC">
		<input type="text" name="celular" placeholder="Celular">
		<input type="text" name="direccion" placeholder="Dirección">
		<input type="text" name="fecha_entrega" placeholder="Fecha de entrega"> 
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
		
		<input type="text" name="vendedor" placeholder="Vendedor(a)"> 
		
    	<input type="submit" name="register">
    </form>
        <?php 
        include("registrar.php");
        ?>
</body>
</html>