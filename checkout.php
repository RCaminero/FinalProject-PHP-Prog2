<?php
    // incluimos conexion
    error_reporting(0);
    include_once("./include/conexion.php");
    include_once("./include/consultas.php");
    
    
    if (isset($_SESSION['Id_usuario'])) {
        # code...
        $idusuario = $_SESSION['Id_usuario'];
        $row = consultarUsuarios($link, $idusuario);
        

    } 
    else {
        # code...
        // $_SESSION['mensajeTexto'] = "Error Acceso al Sistema no Registrado";
        // $_SESSION['mensajeTipo'] = "alert-danger";
        header("Location: login.php");
        
    }
    if (!isset($_SESSION['carrito'])) {
      header("Location: shop-cart.php");
  

    }else{
      $arregloCarrito = $_SESSION['carrito'];
    }
    
    
    
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sublime Detalle</title>
    

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    

    <!-- Boostrap -->
    <link rel="stylesheet" href="./package/bootstrap-4.5.0-dist/css/bootstrap.min.css">

    <!-- FontAwesone -->
    <link rel="stylesheet" href="./package/fontawesome-free-5.13.0-web/css/all.min.css">

    <!-- JQuery -->
    <script src="./js/jquery-3.5.1.min.js"></script>

    <!-- Datable-->
    <link rel="stylesheet" href="./package/DataTables/datatables.min.css">

    
    

   
</head>

<body>
<script src="https://www.paypal.com/sdk/js?client-id=AUD_yYzo7s4bFCz7FHwYwY55t9uRYpcuzZj-sLAfhvyMGxPI9zIN0xmlLkLkFWZzvax7i_P-awK8lv44&currency=USD"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
</script>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="./shop-cart.php"><i class="fas fa-shopping-cart"></i>
                <div class="tip">
                <?php 
                    echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                ?>
                </div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="./img/loogo.png" width="200" height="60" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <small><i class="fas fa-user " style="color:#F00782" ></i> <?php echo $row['Usuario'];?>/</small>
            <a href="./include/cerrar.php"><i class="fas fa-sign-out-alt" style="color:#F00782"></i> Cerrar sesión</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->


<!-- Header Section Begin -->
<nav class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="./index.php"><img src="./img/loogo.png" width="200" height="60" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <center>
                        <ul>
                            <!-- Menú -->
                            <li><a href="./index.php">Inicio </a></li>
                            <li><a href="./tazas.php">Catálogo</a>
                                <ul class="dropdown">
                                    <li><a href="./tazas.php">Tazas</a></li>
                                    <li><a href="./termos.php">Termos</a></li>
                                    <li><a href="./textiles.php">Textiles</a></li>
                                    <li><a href="./rompecabezas.php">Rompecabezas</a></li>
                                    <li><a href="./regalos.php">Regalos</a></li>
                                </ul>
                            </li>
                            <li><a href="./shop-cart.php">Carrito de compras</a></li>
                            <li><a href="./pedidos.php">Pedidos</a></li>
                            <li><a href="./contacto.php">Contacto</a></li>
                        </ul>
                        </center>
                    </nav>
                </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">      
                        <small><i class="fas fa-user " style="color:#F00782" ></i> <?php echo $row['Usuario'];?>/</small>
                        <a href="./include/cerrar.php"><i class="fas fa-sign-out-alt" style="color:#F00782"></i> Cerrar sesión</a>
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="./shop-cart.php"><i class="fas fa-shopping-cart"></i>
                            <div class="tip">
                            <?php 
                                echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                            ?>
                            </div>
                        </a></li>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user" style="color:blue"></i> jjjj</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="./include/cerrar.php"> <i class="fas fa-sign-out-alt" style="color:blue"></i> Salir </a>
                                    </div>
                                </li>
                            </div>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</nav>

<!-- Header Section End -->


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home" style="color:#F00782"></i> Inicio</a>
                        <a href="./shop-cart.php"> Carrito de Compras</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Breadcrumb End -->
<center>
  <div class="site-section">
      <div class="container">
        <div class="row">
          <article class="card-body mx-auto" style="max-width: 580px;">
            <div class="row mb-5">
              <div class="col-md-12"><br>
                <h2 class="h3 text-black text-center">TU ORDEN</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Producto</th>
                      <th>Precio</th>
                    </thead>
                    <tbody>
                      <?php
                        $total=0;
                        $arreglo = $_SESSION['carrito'];
                        $total=0;
                        for($i=0;$i<count($arreglo);$i++){
                          $total=$total+($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
                        
                      ?>
                      <tr>
                        <td><?php echo $arreglo[$i]['Nombre']; ?> <strong class="mx-2">x</strong> <?php echo $arreglo[$i]['Cantidad'];?></td>
                        <td class="cart__price">$ <?php echo number_format($arreglo[$i]['Precio'],2) ?> </td>
                      </tr>
                      <?php }  ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>$ <?php echo number_format($total,2) ?></strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                  <div class="form-group">
                    <button  onclick="location.href='./venta_crud.php?b=P&id=<?php echo $row[0];?>'"  class="site-btn btn-lg btn-block primary-btn">Realizar pedido</button>
                    <p>Si se desea pagar al recibir</p>
                    <div id="paypal-button-container"></div>
                    <p>Si se desea pagar ahora (cuenta de PayPal)</p><br>
                    <button  onclick="location.href='./checkout_crud.php?b=D'"  class="btn-secondary btn-lg btn-block primary-btn">Cancelar</button>
                  </div>

                </div>
              </div>
            </div>

          </article>
        </div>
        <!-- </form> -->
      </div>
    </div>
  </center>
  <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $total ?>'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            if(details.status == "COMPLETED"){
              location.href="./venta_crud.php?b=I&id=<?php echo $row[0];?>";
            }
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>                

<?php include_once("./include/ppie.php"); ?> 
              