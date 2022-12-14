<?php
    error_reporting(0);
    include_once("./include/pcabeza.php");
    $imagen_ref='';
    if(isset($_FILES['imagen'])){
        $file = $_FILES['imagen'];
        $nombre = $file['name'];
        $tipo = $file['type'];
        $ruta_temporal = $file['tmp_name'];
        $size = $file['size'];
        $dimensiones = getimagesize($ruta_temporal);
        $width = $dimensiones[0];
        $height = $dimensiones[1];
        $carpeta = "img/imagenes_clientes/";
        if ($size > 3*1024*1024) {
            $_SESSION['Imagen'] = "El tamaño máximo debe ser de 3MB.";
            $_SESSION['ImagenT'] = "alert-danger";

            header("Location: ./formulario.php");

        }else{
            $src = $carpeta.$nombre;
            move_uploaded_file($ruta_temporal,$src);
            $imagen_ref="img/imagenes_clientes/".$nombre;
            
        }
    }else{
        $imagen_ref= NULL;
    }
    if(isset($_SESSION['carrito'])){
        // si existe buscamos si ya estaba agregado
        if(isset($_GET['id'])){
            $arreglo = $_SESSION['carrito'];
            $encontro=false;
            $numero=0;
            for($i=0;$i<count($arreglo);$i++){
                if($arreglo[$i]['Id']== $_GET['id']){
                    $encontro=true;
                    $numero=$i; 
                }
            }
            if ($encontro==true){
                $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad'];
                $_SESSION['carrito']=$arreglo;
                header("Location: ./shop-cart.php");
            }else{
                //no estaba el registro
                $nombre="";
                $precio="";
                $imagen="";
                $res = $link ->query("SELECT * FROM articulo WHERE Id_articulo=".$_GET['id']) or die("ERROR");
                $fila = mysqli_fetch_row($res);
                $nombre=$fila[3];
                $precio=$fila[5];
                $imagen=$fila[11];
                if(!isset($_POST['envoltura'])){
                    $arreglonew = array(
                        'Id'=> $_GET['id'],
                        'Nombre'=> $nombre,
                        'Precio'=> $precio,
                        'Imagen'=> $imagen,
                        'Cantidad' => 1,
                        'Color_letra'=> $_POST['color_letra'],
                        'Color_articulo'=> $_POST['color'],
                        'Imagen_ref'=>"$imagen_ref",
                        'Frase'=> $_POST['frase'],
                        'Envoltura'=> 'No'

                    );

                }else{
                    $arreglonew = array(
                        'Id'=> $_GET['id'],
                        'Nombre'=> $nombre,
                        'Precio'=> $precio,
                        'Imagen'=> $imagen,
                        'Cantidad' => 1,
                        'Color_letra'=> $_POST['color_letra'],
                        'Color_articulo'=> $_POST['color'],
                        'Imagen_ref'=> "$imagen_ref",
                        'Frase'=> $_POST['frase'],
                        'Envoltura'=> $_POST['envoltura']

                    );
                }
                array_push($arreglo, $arreglonew);
                $_SESSION['carrito'] = $arreglo;
                header("Location: ./shop-cart.php");
            }
        }
    }else{
        //creamos la variable de sesión
        if(isset($_GET['id'])){
            $nombre="";
            $precio="";
            $imagen="";
            $res = $link ->query("SELECT * FROM articulo WHERE Id_articulo=".$_GET['id']) or die("ERROR");
            $fila = mysqli_fetch_row($res);
            $nombre=$fila[3];
            $precio=$fila[5];
            $imagen=$fila[11];
            if(!isset($_POST['envoltura'])){
                $arreglo[] = array(
                    'Id'=> $_GET['id'],
                    'Nombre'=> $nombre,
                    'Precio'=> $precio,
                    'Imagen'=> $imagen,
                    'Cantidad' => 1,
                    'Color_letra'=> $_POST['color_letra'],
                    'Color_articulo'=> $_POST['color'],
                    'Imagen_ref'=> "$imagen_ref",
                    'Frase'=> $_POST['frase'],
                    'Envoltura'=> 'No'
                );
            }else{
                $arreglo[] = array(
                        'Id'=> $_GET['id'],
                        'Nombre'=> $nombre,
                        'Precio'=> $precio,
                        'Imagen'=> $imagen,
                        'Cantidad' => 1,
                        'Color_letra'=> $_POST['color_letra'],
                        'Color_articulo'=> $_POST['color'],
                        'Imagen_ref'=> "$imagen_ref",
                        'Frase'=> $_POST['frase'],
                        'Envoltura'=> $_POST['envoltura']

            );
            }
            $_SESSION['carrito']=$arreglo;
            header("Location: ./shop-cart.php");
            
        }


    }

?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home" style="color:#F00782"></i> Inicio</a>
                        <span>Carrito de compras</span>
                    </div>
                </div>
            </div>
        </div>
</div><br>
<!-- Breadcrumb End -->
<?php 
    if (isset($_SESSION['Stock'])) { ?>
        <div class="alert <?php echo $_SESSION['StockT'] ?> alert-dismissible fade show" role="alert">
        <img src="./img/warning.png" alt="" width="30" height="30"> <?php echo $_SESSION['Stock']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php
        $_SESSION['Stock'] = null;
        $_SESSION['StockT'] = null;
    }
?>
<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
        <div class="container">
            <div class="row">
            <?php if(!empty($_SESSION['carrito'])){?>
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                if (isset($_SESSION['carrito'])) {
                                    $arregloCarrito = $_SESSION['carrito'];
                                    $total=0;
                                    for($i=0;$i<count($arregloCarrito);$i++){

                                      
                            ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img  src="<?php echo $arregloCarrito[$i]['Imagen']; ?>" style="max-width:30%;width:17%;height:12%;" alt="producto">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $arregloCarrito[$i]['Nombre']; ?></h6>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ <?php echo $arregloCarrito[$i]['Precio']; ?></td>
                                    <td class="cart__quantity">
                                        <div class="input-group mb-3" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus btnIncrementar" type="button">&minus;</button>
                                            </div>
                                            <input type="text" class="form-control text-center txtCantidad"  placeholder="" 
                                            data-precio="<?php echo $arregloCarrito[$i]['Precio']; ?>"
                                            data-id="<?php echo $arregloCarrito[$i]['Id']; ?>"
                                            value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus btnIncrementar" type="button">&plus;</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__total cant<?php echo $arregloCarrito[$i]['Id'];?>">$ <?php echo $arregloCarrito[$i]['Precio']* $arregloCarrito[$i]['Cantidad']; ?></td>
                                    <td class="cart__close "><a href="" class="btn btnEliminar" data-id="<?php echo $arregloCarrito[$i]['Id'];?>"><span class="icon_close"></span></a></td>
                                </tr>
                                <?php $total=$total+($arregloCarrito[$i]['Precio']*$arregloCarrito[$i]['Cantidad']);?>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                 <?php }else{ ?>
                    <p>⠀⠀⠀⠀⠀⠀⠀⠀⠀ ⠀⠀⠀⠀⠀⠀⠀⠀⠀ ⠀⠀⠀⠀⠀⠀⠀⠀⠀ ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀Su carrito de compras está vacío.</p>
                <?php }?>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="./tazas.php">Continuar comprando </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="./shop-cart.php"><span class="icon_loading"></span> Actualizar compra</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>TOTALES</h6>
                        <ul>
                            <li>Subtotal <span>$ <?php echo number_format($total,2)?></span></li>
                            <li>Total <span>$ <?php echo number_format($total,2)?></span></li>
                        </ul>
                <?php if(isset($_SESSION['carrito'])) {?> 
                    <button  onclick="location.href='./venta_crud.php?b=Cant'"  class="primary-btn btn-block">Checkout</button>
                <?php }else{ ?>
                    <button id="checkout"  class="primary-btn btn-block">Checkout</button>
                <?php } ?> 
                </div>
            </div>
        </div>
    </section>
    <script src="./js/mio.js"></script>
    <!-- Shop Cart Section End -->
<script>
    $(document).ready(function(){
        $(".btnEliminar").click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var boton = $(this);

            $.ajax({
                method: 'POST',
                url: './include/eliminarCarrito.php',
                data:{
                    id:id
                }
            }).done(function(respuesta){
                boton.parent('td').parent('tr').remove();

            });
        });
        $(".txtCantidad").keyup(function(){
            var cantidad = $(this).val();
            var precio =  $(this).data('precio');
            var id =  $(this).data('id');
            incrementar(cantidad, precio, id);

        });
        $(".btnIncrementar").click(function(){
            var precio = $(this).parent('div').parent('div').find('input').data('precio');
            var id = $(this).parent('div').parent('div').find('input').data('id');
            var cantidad = $(this).parent('div').parent('div').find('input').val();
            incrementar(cantidad, precio, id);
        });
        function incrementar(cantidad, precio, id){
            var mult = parseFloat(cantidad) * parseFloat(precio);
            $(".cant"+id).text("$"+mult);
            $.ajax({
                method: 'POST',
                url: './include/actualizar.php',
                data:{
                    id:id,
                    cantidad:cantidad
                }
            }).done(function(respuesta){
                
            });

        }
    });
    $('#checkout').click(function(){
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Su carrito de compras está vacío.',
        })

    });


</script>
<?php
    include_once("./include/ppie.php")
?>


