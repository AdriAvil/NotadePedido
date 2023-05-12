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

if (isset($_POST['register'])) {   
        ?>           
        <h1>Nota de Pedido</h1>
        <img src="https://mastercleaning-ec.com/nota-pedido/img/logo-blanco-AO.svg" style="width:300px">
    	
		<?php
		$cantidad = trim($_POST['cantidad']);
		$producto2 = trim($_POST['producto']);
        $presentacion2 = trim($_POST['presentacion']);        
        $descuento2 = trim($_POST['descuento']);
        $ruc = trim($_POST['ruc']);

        $consultaped = "SELECT * FROM pedidos";
                $resultadoped = mysqli_query($conex,$consultaped);
                    while ($row = $resultadoped->fetch_array()) {
                        $numeropedidos[] = $row['numero_pedido'];				
                    }
                $ultimopedidos = max($numeropedidos);         

        $fechareg = date("d/m/y");
                        
        $nombre_vendedor = trim($_POST['vendedor']);
		$fecha_de_entrega = trim($_POST['fecha_entrega']);    
                
    
        if (strlen($_POST['cantidad']) >= 1 && strlen($_POST['producto']) >= 1 ) {	   
        		
                switch ($producto2) {
                case triplex:
                    $producto2 = "Triplex";
                    break;
                case gplus:
                    $producto2 = "GPlus";
                    break;
                    case ferti:
                    $producto2 = "Ferti_Organ";
                    break;
                    case fullcacao:
                    $producto2 = "Full_Cacao";
                    break;
                    case nutri:
                    $producto2 = "Nutri_Full";
                    break;
                    case complemento:
                    $producto2 = "Complemento";
                    break;
                    case humi:
                    $producto2 = "Humi_PK";
                    break;
                default:
                    $producto2 = $producto2;
                    break;
                }
                
                switch ($presentacion2) {
                case litro:
                    $presentacion2 ="Litro";
                    break;
                case galon:
                         $presentacion2 ="Galon";
                    break;
                    case caneca10:
                        $presentacion2 ="Caneca_de_10_litros";
                    break;
                    case caneca20:
                        $presentacion2 ="Caneca_de_20_litros";
                    break;
                    case saco25kg:
                        $presentacion2 ="Saco_de_25kg";
                        break;
                default:
                    $presentacion2 = $presentacion2;
                    break;
                }
                
                
                switch ($descuento2) {
                case desc25:
                    $descuento2 = "25";
                    break;
                case desc20:
                    $descuento2 = "20";
                    break;
                case desc15:
                    $descuento2 = "15";
                    break;
                case pvp:
                    $descuento2 = "PVP";
                    break;
                default:
                    $descuento2 = $descuento2;
                    break;
                }



                    


                $consulta3 = "INSERT INTO pedidos_temp(fecha_reg, fecha_entr, cantidad, producto, presentacion, vendedor) 
                VALUES ('$fechareg','$fecha_de_entrega', '$cantidad', '$producto2', '$presentacion2','$nombre_vendedor')"; 

                $resultado3 = mysqli_query($conex,$consulta3);
                
                if ($resultado3) {
                    ?> 
                    <h3 class="ok">¡Pedido registrado correctamente!</h3>
                <?php
                } else {
                    $sqlresultado = mysqli_query($conex,"SELECT * FROM clientes");
                    while ($row = $sqlresultado->fetch_array()) {
                        $numerocliente_reg[] = $row['numero_cliente'];				
                    }
                    $ultimocliente_reg = max($numerocliente_reg);
                    $eliminarclientes = mysqli_query($conex,"DELETE FROM `clientes` WHERE numero_cliente = $ultimocliente_reg");
                    $eliminarnumerode = mysqli_query($conex,"DELETE FROM `pedidos` WHERE numero_pedido = 0");
				    $eliminarvacios = mysqli_query($conex,"DELETE FROM `pedidos` WHERE total = 0");
                    ?>                     
                    <h3 class="bad">¡No se ha registrado su pedido!</h3>

                <?php
                    }        
        

    }   else {
    	    	?> 
    	    	<h3 class="bad">¡Por favor complete los campos!</h3>
               <?php
            }
            ?> 
            <form class="in-flex" method="post">  
                <div class="container">
			       <div class="buttons">  
                        <input type="hidden" name="ruc" value="<?php echo $ruc; ?>">    
                        <input type="hidden" name="posi" value="0">  
                        <input type="hidden" name="vendedor" value="<?php echo $nombre_vendedor; ?>">
                        <input type="hidden" name="fecha_entrega" value="<?php echo $fecha_de_entrega; ?>">
                        <input type="submit" class="btn btn-1" name="pedidos2" value="Agregar más productos">                         
                        <input type="submit" class="btn btn-1" name="finalizar" value="Finalizar pedido">
                    </div>
		        </div>
            </form>
        <?php
        
        include("detalle_pedido.php");
        
        
 }
 ?>
</body>
</html>
            

  

