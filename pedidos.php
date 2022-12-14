<?php
    error_reporting(0);
    include_once("./include/pcabeza.php");
    $row = consultarUsuarios($link, $idusuario);
   ?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home" style="color:#F00782"></i> Inicio</a>
                        <span>Pedidos</span>
                    </div>
                </div>
            </div>
        </div>
</div><br>
<!-- Breadcrumb End -->
<?php 
    if (isset($_SESSION['cancelarPedido'])) { ?>
        <div class="alert <?php echo $_SESSION['cancelar'] ?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['cancelarPedido']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php
        $_SESSION['cancelarPedido'] = null;
        $_SESSION['cancelar'] = null;
    }
?>

    


<div class="container">
        <div class="row">   
            <div class="col-lg-12 text-left">
                <div class="section-title">
                    <h4 id="termos">Pedidos recientes</h4>
                    <p>Puede cancelar a las 24 hrs después de haber realizado el pedido (donde no haya depositado).</p>
                    <p><b>Nota: </b>Estos pedidos son los que realizó sin haber depositado.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                <?php
                        $resultado = $link ->query("SELECT pedido.id_pedido AS num_pedido, SUM(pedido_detalle.Cantidad) AS cantidad,  SUM(pedido_detalle.Total) as total
                        FROM pedido INNER JOIN  pedido_detalle ON pedido.id_pedido = pedido_detalle.Pedido_id_pedido INNER JOIN articulo ON articulo.Id_articulo = pedido_detalle.Articulo_id_articulo
                        INNER JOIN cliente ON pedido.Cliente_id_cliente = cliente.Id_cliente
                        WHERE cliente.Id_usuario = ".$row['Id_usuario']." AND pedido.Estado_pago= 'N' AND pedido.Estado_pedido= 'A'  AND pedido.Fecha_pedido BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW() GROUP BY num_pedido
                        ") or die("ERROR");

                    ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>No. pedido</th>
                                    <th>⠀⠀⠀⠀⠀⠀⠀⠀</th>
                                    <th>Cantidad de articulos</th>
                                    <th>⠀⠀⠀⠀⠀⠀⠀⠀</th>
                                    <th>Total</th>
                                    <th>⠀⠀⠀⠀⠀⠀⠀⠀</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php  while($fila = mysqli_fetch_array($resultado)){?>
                                
                                <tr>
                                    <td class="cart__price"><?php echo $fila['num_pedido'] ?></td>
                                    <td>⠀⠀⠀⠀⠀⠀⠀⠀</td>
                                    <td class="cart__quantity">
                                        <?php echo $fila['cantidad'] ?>   
                                    </td>
                                    <td>⠀⠀⠀⠀⠀⠀⠀⠀</td>
                                    <td class="cart__total cant">$ <?php echo  number_format($fila['total'],2); ?></td>
                                    <td class="cart__close "><a class="btn" onclick="$.confirm({
                                        title: 'Sublime Detalle: Aviso de cancelación',
                                        scapeKey:true,
                                        theme: 'modern',
                                        animation: 'zoom',
                                        closeAnimation: 'scaley',
                                        type: 'red',
                                        typeAnimated: true,
                                        icon:'fa fa-trash fa-spin',
                                        content: 'Estas seguro/a de que deseas cancelar el pedido?',
                                        buttons: {
                                            confirmar: {
                                            btnClass: 'btn-green',
                                            action: function () {
                                               window.location='./venta_crud.php?b=Clr&id=<?php echo $fila['num_pedido'] ?>';
                                            }
                                        },
                                        cancelar: {
                                            btnClass: 'btn-danger',
                                            action:function () {
                                                $.alert('Accion cancelada');
                                                }
                                            }
                                            }
                                  })" href="#"><i class="icon_close"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
            
    
    <!-- Shop Cart Section End -->
<?php
    include_once("./include/ppie.php")
?>


