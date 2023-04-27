<?php 

include("con_db.php");

    
if (isset($_POST['register'])) {
    
    if (strlen($_POST['name']) >= 1 && strlen($_POST['ruc']) >= 1) {
	    $name = trim($_POST['name']);
	    $email = trim($_POST['email']);
	    $fechareg = date("d/m/y");
		$ruc = trim($_POST['ruc']);
		$celular = trim($_POST['celular']);
		$direccion = trim($_POST['direccion']);
		$fechaentrega = trim($_POST['fecha_entrega']);
		$cantidad = trim($_POST['cantidad']);
		$producto2 = trim($_POST['producto']);
		switch ($producto2) {
          case triplex:
            $producto2 = "Triplex";
            break;
          case gplus:
            $producto2 = "GPlus";
            break;
            case ferti:
            $producto2 = "Ferti Organ";
            break;
            case fullcacao:
            $producto2 = "Full Cacao";
            break;
            case nutri:
            $producto2 = "Nutri Full";
            break;
            case complemento:
            $producto2 = "Complemento";
            break;
            case humi:
            $producto2 = "Humi PK";
            break;
          default:
            $producto2 = $producto2;
            break;
        }
		$presentacion2 = trim($_POST['presentacion']);
		switch ($presentacion2) {
          case litro:
            $presentacion2 ="Litro";
            break;
          case galon:
            $presentacion2 ="Galón";
            break;
            case caneca10:
            $presentacion2 ="Caneca de 10 litros";
            break;
            case caneca20:
            $presentacion2 ="Caneca de 20 litros";
            break;
          default:
            $presentacion2 = $presentacion2;
            break;
        }
		$pago = trim($_POST['pago']);
        $descuento2 = trim($_POST['descuento']);
        switch ($descuento2) {
          case desc25:
            $descuento2 = "25%";
            break;
          case desc20:
            $descuento2 = "20%";
            break;
          case desc15:
            $descuento2 = "15%";
            break;
          case pvp:
            $descuento2 = "PVP";
            break;
          default:
            $descuento2 = $descuento2;
            break;
        }
        $producto = trim($_POST['producto']);
		$presentacion = trim($_POST['presentacion']);
        $descuento = trim($_POST['descuento']);
        $vendedor = trim($_POST['vendedor']);
        
        
        
        
        
    
        switch ($descuento) {
            case desc25:
                switch ($producto) {
                    case ferti:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*4.83;
                                break;
                            case galon:
                                $total = $cantidad*17.38;
                                break;
                            case caneca10:
                                $total = $cantidad*38.63;
                                break;
                            case caneca20:
                                $total = $cantidad*77.25;
                                break;
                            default:
                                $total= 0;
                                break;
                            }
                    break;
                    
                    case triplex:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*8.66;
                                break;
                            case galon:
                                $total = $cantidad*31.50;
                                break;
                            case caneca10:
                                $total = $cantidad*73.83;
                                break;
                            case caneca20:
                                $total = $cantidad*147.66;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case gplus:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*11.03;
                                break;
                            case galon:
                                $total = $cantidad*37.80;
                                break;
                            case caneca10:
                                $total = $cantidad*90.56;
                                break;
                            case caneca20:
                                $total = $cantidad*181.13;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case nutri:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*6.80;
                                break;
                            case galon:
                                $total = $cantidad*27.17;
                                break;
                            case caneca10:
                                $total = $cantidad*64.06;
                                break;
                            case caneca20:
                                $total = $cantidad*128.12;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case fullcacao:
                        $total = $cantidad*14.00;
                    break;
                    
                    case complemento:
                        $total = $cantidad*4.13;
                    break;
                    
                    case humi:
                        $total = $cantidad*14.96;
                    break;
                
                    default:
                    $total= 0;
                    break;
                }
            break;
    
    
    
    
    
    
    
    
            case desc20:
                switch ($producto) {
                    case ferti:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*5.15;
                                break;
                            case galon:
                                $total = $cantidad*18.54;
                                break;
                            case caneca10:
                                $total = $cantidad*41.20;
                                break;
                            case caneca20:
                                $total = $cantidad*82.40;
                                break;
                            default:
                                $total= 0;
                                break;
                            }
                    break;
                    
                    case triplex:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*9.24;
                                break;
                            case galon:
                                $total = $cantidad*33.60;
                                break;
                            case caneca10:
                                $total = $cantidad*78.75;
                                break;
                            case caneca20:
                                $total = $cantidad*157.50;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case gplus:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*11.76;
                                break;
                            case galon:
                                $total = $cantidad*40.32;
                                break;
                            case caneca10:
                                $total = $cantidad*96.60;
                                break;
                            case caneca20:
                                $total = $cantidad*193.20;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case nutri:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*7.25;
                                break;
                            case galon:
                                $total = $cantidad*28.98;
                                break;
                            case caneca10:
                                $total = $cantidad*68.33;
                                break;
                            case caneca20:
                                $total = $cantidad*136.66;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case fullcacao:
                        $total = $cantidad*14.00;
                    break;
                    
                    case complemento:
                        $total = $cantidad*4.41;
                    break;
                    
                    case humi:
                        $total = $cantidad*15.96;
                    break;
                
                    default:
                    $total= 0;
                }
            break;
            
            case desc15:
                switch ($producto) {
                    case ferti:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*5.47;
                                break;
                            case galon:
                                $total = $cantidad*19.70;
                                break;
                            case caneca10:
                                $total = $cantidad*43.78;
                                break;
                            case caneca20:
                                $total = $cantidad*87.55;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case triplex:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*9.82;
                                break;
                            case galon:
                                $total = $cantidad*35.70;
                                break;
                            case caneca10:
                                $total = $cantidad*83.67;
                                break;
                            case caneca20:
                                $total = $cantidad*167.34;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case gplus:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*12.50;
                                break;
                            case galon:
                                $total = $cantidad*42.84;
                                break;
                            case caneca10:
                                $total = $cantidad*102.64;
                                break;
                            case caneca20:
                                $total = $cantidad*205.28;
                                break;
                            default:
                                $total= 0;
                                break;
                            }
                    break;
                    
                    case nutri:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*7.70;
                                break;
                            case galon:
                                $total = $cantidad*30.79;
                                break;
                            case caneca10:
                                $total = $cantidad*72.60;
                                break;
                            case caneca20:
                                $total = $cantidad*145.20;
                                break;
                            default:
                                $total= 0;
                                break;
                            }
                    break;
                    
                    case fullcacao:
                        $total = $cantidad*14.00;
                    break;
                    
                    case complemento:
                        $total = $cantidad*4.69;
                    break;
                    
                    case humi:
                        $total = $cantidad*16.96;
                    break;
                
                    default:
                    $total= 0;
                    break;
                }
            break;
    
    
    
    
    
            case pvp:
                switch ($producto) {
                    case ferti:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*6.44;
                                break;
                            case galon:
                                $total = $cantidad*23.18;
                                break;
                            case caneca10:
                                $total = $cantidad*51.50;
                                break;
                            case caneca20:
                                $total = $cantidad*103.00;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case triplex:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*11.55;
                                break;
                            case galon:
                                $total = $cantidad*42.00;
                                break;
                            case caneca10:
                                $total = $cantidad*98.44;
                                break;
                            case caneca20:
                                $total = $cantidad*196.88;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case gplus:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*14.70;
                                break;
                            case galon:
                                $total = $cantidad*50.40;
                                break;
                            case caneca10:
                                $total = $cantidad*120.75;
                                break;
                            case caneca20:
                                $total = $cantidad*241.50;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case nutri:
                        switch ($presentacion) {
                            case litro:
                                $total = $cantidad*9.06;
                                break;
                            case galon:
                                $total = $cantidad*36.23;
                                break;
                            case caneca10:
                                $total = $cantidad*85.41;
                                break;
                            case caneca20:
                                $total = $cantidad*170.82;
                                break;
                            default:
                                $total= 0;
                            }
                    break;
                    
                    case fullcacao:
                        $total = $cantidad*17.50;
                    break;
                    
                    case complemento:
                        $total = $cantidad*5.51;
                    break;
                    
                    case humi:
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
        $iva = $total*0.12;
        $totalconiva=$total+$iva;
    	
    	
        echo "<p class='saludo'>SubTotal $<span id='nombre'>$total</span>  dólares</p>";
        echo "<p class='saludo'>IVA 12% $<span id='nombre'>$iva</span>  dólares</p>";
        echo "<p class='saludo'>Total $<span id='nombre'>$totalconiva</span>  dólares</p>";
        
        
        
        
	    $consulta = "INSERT INTO pedidos(nombre,email,fecha_reg,ruc,direccion,celular,fecha_entr,pago,cantidad,producto,presentacion,vendedor,descuento,subtotal, iva, total) 
		VALUES ('$name','$email','$fechareg','$ruc', '$direccion', '$celular', '$fechaentrega','$pago', '$cantidad', '$producto2', '$presentacion2', '$vendedor', '$descuento2', $total, $iva, $totalconiva)";
	    $resultado = mysqli_query($conex,$consulta);
		
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Pedido registrado correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡No se ha registrado su pedido!</h3>
           <?php
	           }
    }   else {
    	    	?> 
    	    	<h3 class="bad">¡Por favor complete los campos!</h3>
               <?php
            }
    
		
}

?>
