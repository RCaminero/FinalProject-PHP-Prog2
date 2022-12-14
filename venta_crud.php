<?php
    include_once("./include/conexion.php");
    if(isset($_SESSION['carrito'])){
        $arreglo=$_SESSION['carrito'];
    }
    
   
    


    if (isset($_GET['b'])) {
        $opcion = $_GET['b'];
    }else {
        echo "ERROR EN ACCION";

    }


    switch ($opcion) {
        // Para insertar
        case 'I':
            $id=$_GET['id'];
            $id_cliente="SELECT cliente.Id_cliente FROM cliente INNER JOIN usuario ON cliente.Id_usuario = usuario.Id_Usuario
            WHERE cliente.Id_usuario ='$id'";
            $resultadoID = mysqli_query($link, $id_cliente);
            if (mysqli_num_rows($resultadoID) == 1) {
                $rowID = mysqli_fetch_array($resultadoID);
            }
            $link -> query("INSERT INTO pedido (Cliente_id_cliente, Empleado_id_empleado, Estado_pago, Metodo_pago) VALUES($rowID[0], 1, 'P', 'PayPal');")or die("ERROR");
            $id_pedidoC = $link ->insert_id;
            $consulta="INSERT INTO pedido_detalle (Pedido_id_pedido, Articulo_id_articulo, Frase, Color_articulo, Color_letras, Imagen_referencia, Envoltura, Precio, Cantidad, Total) VALUES(?,?,?,?,?,?,?,?,?,?)";
            $sentencia = $link->prepare($consulta);
            $sentencia->bind_param("iisssssiii",$id_pedido, $id_articulo, $frase, $color_art, $color_letra, $imagen_ref, $envoltura, $precio, $cantidad, $total);
            foreach($arreglo as $key => $value){
                $id_pedido = $id_pedidoC;
                $id_articulo = $value['Id'];
                $frase = $value['Frase'];
                $color_art = $value['Color_articulo'];
                $color_letra = $value['Color_letra'];
                $imagen_ref = $value['Imagen_ref'];
                $envoltura = $value['Envoltura'];
                $precio = $value['Precio'];
                $cantidad = $value['Cantidad'];
                $total = $value['Precio']*$value['Cantidad'];
                /* Ejecutar la sentencia */
                $sentencia->execute();
            }
            for ($i = 0; $i < count($arreglo); $i++) {
                //
                $re = $link -> query("SELECT Stock FROM articulo WHERE Id_articulo = " . $arreglo[$i]['Id'] . " AND Stock >= " . $arreglo[$i]['Cantidad']) or die("ERROR");
                 // actualizo la db con los datos nuevos!
                    while ($f = mysqli_fetch_array($re)) {
                        $x = $f['Stock'] - $arreglo[$i]['Cantidad'];
                        //Actualizo el registro stock de la BD
                        $link -> query("UPDATE articulo SET Stock=" . $x . " WHERE Id_articulo=" . $arreglo[$i]['Id']) or die("ERROR");
                    
                }
                
            }
            unset($_SESSION['carrito']);
            header("Location: ./thankyou.php");
        break;

            
        case 'C':
            if(isset($_POST['enviar'])) {
                $id=$_GET['id'];
                $comentario = ucfirst($_POST['comentario']);
                

                $query = "
                INSERT INTO `comentario`
                (`id_usuario`, 
                `mensaje`) 
                VALUES (
                '$id',
                '$comentario')
                ";
                $resultado = mysqli_query($link, $query);
                header("Location: ./contacto.php");
                
            }
        break;

            case 'Cant':

                for ($i = 0; $i < count($arreglo); $i++) {
                    //Consulto la cantidad en stcck dependiendo del Id que baya el ciclo For
                    $re = $link -> query("SELECT Stock FROM articulo WHERE Id_articulo = " . $arreglo[$i]['Id'] . " AND Stock >= " . $arreglo[$i]['Cantidad']) or die("ERROR");
                    if (mysqli_num_rows($re) === 0) {
                        header("Location: ./shop-cart.php");
                        $_SESSION['Stock'] = "Cantidad no disponible de alguno de los artículos.";
                        $_SESSION['StockT'] = "alert-warning";
                        header("Location: ./shop-cart.php");
                    }else{
                        header("Location: ./checkout.php");
                    }

                
                }
            break;
                case 'P':
                    $id=$_GET['id'];
                    $id_cliente="SELECT cliente.Id_cliente FROM cliente INNER JOIN usuario ON cliente.Id_usuario = usuario.Id_Usuario
                    WHERE cliente.Id_usuario ='$id'";
                    $resultadoID = mysqli_query($link, $id_cliente);
                    if (mysqli_num_rows($resultadoID) == 1) {
                        $rowID = mysqli_fetch_array($resultadoID);
                    }
                    $link -> query("INSERT INTO pedido (Cliente_id_cliente, Empleado_id_empleado, Estado_pago, Metodo_pago) VALUES($rowID[0], 1, 'N', 'Contraentrega');")or die("ERROR");
                    $id_pedidoC = $link ->insert_id;
                    $consulta="INSERT INTO pedido_detalle (Pedido_id_pedido, Articulo_id_articulo, Frase, Color_articulo, Color_letras, Imagen_referencia, Envoltura, Precio, Cantidad, Total) VALUES(?,?,?,?,?,?,?,?,?,?)";
                    $sentencia = $link->prepare($consulta);
                    $sentencia->bind_param("iisssssiii",$id_pedido, $id_articulo, $frase, $color_art, $color_letra, $imagen_ref, $envoltura, $precio, $cantidad, $total);
                    foreach($arreglo as $key => $value){
                        $id_pedido = $id_pedidoC;
                        $id_articulo = $value['Id'];
                        $frase = $value['Frase'];
                        $color_art = $value['Color_articulo'];
                        $color_letra = $value['Color_letra'];
                        $imagen_ref = $value['Imagen_ref'];
                        $envoltura = $value['Envoltura'];
                        $precio = $value['Precio'];
                        $cantidad = $value['Cantidad'];
                        $total = $value['Precio']*$value['Cantidad'];
                        /* Ejecutar la sentencia */
                        $sentencia->execute();
                    }
                    for ($i = 0; $i < count($arreglo); $i++) {
                        //
                        $re = $link -> query("SELECT Stock FROM articulo WHERE Id_articulo = " . $arreglo[$i]['Id'] . " AND Stock >= " . $arreglo[$i]['Cantidad']) or die("ERROR");
                         // actualizo la db con los datos nuevos!
                            while ($f = mysqli_fetch_array($re)) {
                                $x = $f['Stock'] - $arreglo[$i]['Cantidad'];
                                //Actualizo el registro stock de la BD
                                $link -> query("UPDATE articulo SET Stock=" . $x . " WHERE Id_articulo=" . $arreglo[$i]['Id']) or die("ERROR");
                            
                        }
                        
                    }
                    unset($_SESSION['carrito']);
                    header("Location: ./thankyou.php");
                break;

                case 'Clr':
                    $id = $_GET['id'];
                    $query = "UPDATE `pedido` SET             
                     `Estado_pedido`='I'
                    WHERE `id_pedido` = '$id'"; 
                    $resultado = mysqli_query($link, $query);
                    $resultado = mysqli_query($link, $query);
                    if (!$resultado) {
                        // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
                        $_SESSION['cancelarPedido'] = "Error cancelando pedido";
                        $_SESSION['cancelar'] = "alert-danger";
        
                        header("Location: ./pedidos.php");
                    } else{
                        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
                        $_SESSION['cancelarPedido'] = "Pedido cancelado con éxito.";
                        $_SESSION['cancelar'] = "alert-success";
                        
                        header("Location: ./pedidos.php");
                    }
                    break;

                        
                        
                break;
                    
            

                       
           
            
    }
    


          // case 'DLT':
            //     header("Location: ./shop-cart.php");
    //             $id = $_GET['id'];
                       
    //             $query = "UPDATE `categoria_articulo` SET             
    //             `Estado_categoria_articulo`='I'
    //             WHERE `Id_categoria_articulo` = '$id'"; 
    
    //             $resultado = mysqli_query($link, $query);
    
    //             if (!$resultado) {
    //                 // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
    //                 $_SESSION['mensajeTexto'] = "Error Anulando en la Base de Datos";
    //                 $_SESSION['mensajeTipo'] = "alert-danger";
    
    //                 header("Location: ./cat_articulo_mant.php");
    //             } else{
    //                 // echo("Alerta 0001: Registro Insertado en la Base de Datos");
    //                 $_SESSION['mensajeTexto'] = "Registro Anulado en la Base de Datos";
    //                 $_SESSION['mensajeTipo'] = "alert-success";
                    
    //                 header("Location: ./cat_articulo_mant.php");
    
    //             }
    //             break;
    //         // Para actualizar
    //         case 'UDT':
    //             $id = $_POST['id'];
    //             $nombre = $_POST['nombre'];
    //             $descripcion = $_POST['descripcion'];
    //             $estado = $_POST['estado'];
    
    //             $query = "UPDATE `categoria_articulo` SET 
    //             `Nombre`='$nombre',
    //             `Descripcion` = '$descripcion',
    //             `Estado_categoria_articulo`='$estado'
    //             WHERE `Id_categoria_articulo` = '$id'";        
    
    //             $resultado = mysqli_query($link, $query);
    
    //             if (!$resultado) {
    //                 // echo("Error 0001: Error Insertando Usuario en la Base de Datos");
    //                 $_SESSION['mensajeTexto'] = "Error Actualizando en la Base de Datos";
    //                 $_SESSION['mensajeTipo'] = "alert-danger";
    
    //                 header("Location: ./cat_articulo_mant.php");
    //             } else{
    //                 // echo("Alerta 0001: Registro Insertado en la Base de Datos");
    //                 $_SESSION['mensajeTexto'] = "Registro Actualizado en la Base de Datos";
    //                 $_SESSION['mensajeTipo'] = "alert-success";
                    
    //                 header("Location: ./cat_articulo_mant.php");
    
    //             }
    //         break;
    
    //         default:
    //             # Este punto falto en la clase
    //             $_SESSION['mensaje_texto'] = "Error Identificando el Proceso - $opcion";
    //             $_SESSION['mensaje_tipo'] = "alert-danger";
    
    //             header("Location: ./cat_articulo_mant.php");
    //             break;
        
    
    ?>
    