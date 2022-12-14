<?php
	include_once("./include/conexion.php");
    include_once("./include/consultas.php");
	
	$resultado = mostrarClientes($link);
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

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="main.css" type="text/css">

    <!-- FontAwesone -->
    <link rel="stylesheet" href="./package/fontawesome-free-5.13.0-web/css/all.min.css">

    <!-- Boostrap -->
    <link rel="stylesheet" href="./package/bootstrap-4.5.0-dist/css/bootstrap.min.css">


    <!-- JQuery -->
    <script src="./js/jquery-3.5.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .register-container {
            margin-top: 15%;
            max-width: 100%;
		}
		
		.form-register {
            width:  580px;
            background: white;
            padding: 40px;
            margin: auto;
            box-shadow: 7px 13px 37px #F00782;
			border-radius: 20px;
        }
    </style>

    
</head>
<body>

    <div class="sidenav">
         <div class="login-main-text">
            <h2><img src="./img/sublimed.png" width="500" height="150"></h2>
         </div>
      </div>
      <div class="main">
          <!-- Formulario de Registro -->
<br>
<article class="container register-container">
	<form action="registro_crud.php?accion=INS" method="post" class = "form-register" enctype="multipart/form-data" autocomplete="off">
        <h2><a href="./index.php"><img src="./img/sublime.png" width="35" height="35" alt=""></a> <b>Reg??strate</b></h2>
        <p>??nete a nosotros con una cuenta gratuita</p>
		<hr class="colorgraph">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group input-group">
                    <input type="text" name="nombre" id="nombre" class="form-control input-lg" placeholder="Nombre" tabindex="1" required="">
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group input-group">
					<input type="text" name="apellido" id="apellido" class="form-control input-lg" placeholder="Apellido" tabindex="2" required="">
				</div>
			</div>
		</div>
		<div class="form-group input-group">
			<input type="text" name="direccion" id="direccion" class="form-control input-lg" placeholder="Direcci??n" tabindex="3" required="">
        </div>
        <div class="form-group input-group">
            <input name="telefono" class="form-control" placeholder="N??mero telef??nico" type="text" required="">
            </div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group input-group">
						<input type="text" name="usuario" id="usuario" minlength="5" title="El usuario debe tener m??nimo 5 digitos" class="form-control input-lg" placeholder="Usuario" tabindex="4" required=""> 
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group input-group">
						<input type="password" name="contrasena" id="contrasena" minlength="6" title="La Contrase??a debe tener m??nimo 4 digitos"class="form-control input-lg" placeholder="Contrase??a" tabindex="5" required="">
					</div>
				</div>
			</div>
			<?php 
                    if (isset($_SESSION['registro'])) { ?>
                        <div class="alert <?php echo $_SESSION['registro-tipo'] ?> alert-dismissible fade show" role="alert">
                        <strong>Aviso:</strong> <?php echo $_SESSION['registro']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php
                        $_SESSION['registro'] = null;
                        $_SESSION['registro-tipo'] = null;
                    }
                    ?>
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						<button type="button" class="btn" data-color="info" tabindex="7" >Acepto</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1" required="">
					</span>
				</div>
				<div class="col-xs-8 col-sm-9 col-md-9">
					 Al hacer clic en <strong class="label label-primary">Registrarse</strong>, acepta los <a href="#" data-toggle="modal" data-target="#t_and_c_m">T??rminos y Condiciones</a> establecidos por este sitio, incluido nuestro Uso de cookies.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><a href="./login.php" class="btn btn-success btn-block btn-lg">Iniciar sesi??n</a></div>
				<div class="col-xs-12 col-md-6"><input type="submit" name ="registrarse" value="Registrarse" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
		</form>
	</div>
</article>
<!-- T??rminos y condiciones -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
				<h4 class="modal-title" id="myModalLabel">T??rminos y Condiciones</h4>
			</div>
			<div class="modal-body">
                <h2 style="text-align: center;"></h2><p><strong>INFORMACI??N RELEVANTE</strong></p>
                <p>Es requisito necesario para la adquisici??n de los productos que se ofrecen en este sitio, que lea y acepte los siguientes T??rminos y Condiciones que a continuaci??n se redactan. El uso de nuestros servicios as?? como la compra de nuestros productos implicar?? que usted ha le??do y aceptado los T??rminos y Condiciones de Uso en el presente documento. Todas los productos que son ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una p??gina web tercera y en tal caso estar??an sujetas a sus propios T??rminos y Condiciones. En algunos casos, para adquirir un producto, ser?? necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y definici??n de una contrase??a.</p>
                <p>El usuario puede elegir y cambiar la clave para su acceso de administraci??n de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos. http://localhost/r3diseno/ProyectoFinal/registro.php no asume la responsabilidad en caso de que entregue dicha clave a terceros.</p><p>Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, est??n sujetas a un proceso de confirmaci??n y verificaci??n, el cual podr??a incluir la verificaci??n del stock y disponibilidad de producto, validaci??n de la forma de pago, validaci??n de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificaci??n por medio de correo electr??nico.</p>
                <p>Los precios de los productos ofrecidos en esta Tienda Online es v??lido solamente en las compras realizadas en este sitio web.</p><p><strong>LICENCIA</strong></p><p>Sublime Detalle&nbsp; a trav??s de su sitio web concede una licencia para que los usuarios utilicen&nbsp; los productos que son vendidos en este sitio web de acuerdo a los T??rminos y Condiciones que se describen en este documento.</p><p><strong>USO NO AUTORIZADO</strong></p><p>En caso de que aplique (para venta de software, templetes, u otro producto de dise??o y programaci??n) usted no puede colocar uno de nuestros productos, modificado o sin modificar, en un CD, sitio web o ning??n otro medio y ofrecerlos para la redistribuci??n o la reventa de ning??n tipo.</p>
                <p><strong>PROPIEDAD</strong></p>
                <p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad &nbsp;de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan sin ning??n tipo de garant??a, expresa o impl??cita. En ning??n esta compa????a ser?? responsables de ning??n da??o incluyendo, pero no limitado a, da??os directos, indirectos, especiales, fortuitos o consecuentes u otras p??rdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.</p>
                <p><strong>POL??TICA DE REEMBOLSO Y GARANT??A</strong></p><p>En el caso de productos que sean&nbsp; mercanc??as irrevocables no-tangibles, no realizamos reembolsos despu??s de que se env??e el producto, usted tiene la responsabilidad de entender antes de comprarlo. Le pedimos que lea cuidadosamente antes de comprarlo. Hacemos solamente excepciones con esta regla cuando la descripci??n no se ajusta al producto. Hay algunos productos que pudieran tener garant??a y posibilidad de reembolso pero este ser?? especificado al comprar el producto. En tales casos la garant??a solo cubrir?? fallas de f??brica y s??lo se har?? efectiva cuando el producto se haya usado correctamente. La garant??a no cubre aver??as o da??os ocasionados por uso indebido. Los t??rminos de la garant??a est??n asociados a fallas de fabricaci??n y funcionamiento en condiciones normales de los productos y s??lo se har??n efectivos estos t??rminos si el equipo ha sido usado correctamente. Esto incluye:</p>
                <p>??? De acuerdo a las especificaciones t??cnicas indicadas para cada producto.<br>??? En condiciones ambientales acorde con las especificaciones indicadas por el fabricante.<br>??? En uso espec??fico para la funci??n con que fue dise??ado de f??brica.<br>??? En condiciones de operaci??n el??ctricas acorde con las especificaciones y tolerancias indicadas.</p><p><strong>COMPROBACI??N ANTIFRAUDE</strong></p>
                <p>La compra del cliente puede ser aplazada para la comprobaci??n antifraude. Tambi??n puede ser suspendida por m??s tiempo para una investigaci??n m??s rigurosa, para evitar transacciones fraudulentas.</p><p><strong>PRIVACIDAD</strong></p><p>Este <a href="" target="_blank"></a> http://localhost/r3diseno/ProyectoFinal/registro.php garantiza que la informaci??n personal que usted env??a cuenta con la seguridad necesaria. Los datos ingresados por usuario o en el caso de requerir una validaci??n de los pedidos no ser??n entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales.</p><p>La suscripci??n a boletines de correos electr??nicos publicitarios es voluntaria y podr??a ser seleccionada al momento de crear su cuenta.</p>
                    <p>Sublime Detalle reserva los derechos de cambiar o de modificar estos t??rminos sin previo aviso.</p><p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Acepto</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!--LLamando archivos js -->
<script src="./package/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>



<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>

</body>
