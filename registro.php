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
        <h2><a href="./index.php"><img src="./img/sublime.png" width="35" height="35" alt=""></a> <b>Regístrate</b></h2>
        <p>Únete a nosotros con una cuenta gratuita</p>
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
			<input type="text" name="direccion" id="direccion" class="form-control input-lg" placeholder="Dirección" tabindex="3" required="">
        </div>
        <div class="form-group input-group">
            <input name="telefono" class="form-control" placeholder="Número telefónico" type="text" required="">
            </div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group input-group">
						<input type="text" name="usuario" id="usuario" minlength="5" title="El usuario debe tener mínimo 5 digitos" class="form-control input-lg" placeholder="Usuario" tabindex="4" required=""> 
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group input-group">
						<input type="password" name="contrasena" id="contrasena" minlength="6" title="La Contraseña debe tener mínimo 4 digitos"class="form-control input-lg" placeholder="Contraseña" tabindex="5" required="">
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
					 Al hacer clic en <strong class="label label-primary">Registrarse</strong>, acepta los <a href="#" data-toggle="modal" data-target="#t_and_c_m">Términos y Condiciones</a> establecidos por este sitio, incluido nuestro Uso de cookies.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"><a href="./login.php" class="btn btn-success btn-block btn-lg">Iniciar sesión</a></div>
				<div class="col-xs-12 col-md-6"><input type="submit" name ="registrarse" value="Registrarse" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
			</div>
		</form>
	</div>
</article>
<!-- Términos y condiciones -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Términos y Condiciones</h4>
			</div>
			<div class="modal-body">
                <h2 style="text-align: center;"></h2><p><strong>INFORMACIÓN RELEVANTE</strong></p>
                <p>Es requisito necesario para la adquisición de los productos que se ofrecen en este sitio, que lea y acepte los siguientes Términos y Condiciones que a continuación se redactan. El uso de nuestros servicios así como la compra de nuestros productos implicará que usted ha leído y aceptado los Términos y Condiciones de Uso en el presente documento. Todas los productos que son ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una página web tercera y en tal caso estarían sujetas a sus propios Términos y Condiciones. En algunos casos, para adquirir un producto, será necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y definición de una contraseña.</p>
                <p>El usuario puede elegir y cambiar la clave para su acceso de administración de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos. http://localhost/r3diseno/ProyectoFinal/registro.php no asume la responsabilidad en caso de que entregue dicha clave a terceros.</p><p>Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, están sujetas a un proceso de confirmación y verificación, el cual podría incluir la verificación del stock y disponibilidad de producto, validación de la forma de pago, validación de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificación por medio de correo electrónico.</p>
                <p>Los precios de los productos ofrecidos en esta Tienda Online es válido solamente en las compras realizadas en este sitio web.</p><p><strong>LICENCIA</strong></p><p>Sublime Detalle&nbsp; a través de su sitio web concede una licencia para que los usuarios utilicen&nbsp; los productos que son vendidos en este sitio web de acuerdo a los Términos y Condiciones que se describen en este documento.</p><p><strong>USO NO AUTORIZADO</strong></p><p>En caso de que aplique (para venta de software, templetes, u otro producto de diseño y programación) usted no puede colocar uno de nuestros productos, modificado o sin modificar, en un CD, sitio web o ningún otro medio y ofrecerlos para la redistribución o la reventa de ningún tipo.</p>
                <p><strong>PROPIEDAD</strong></p>
                <p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad &nbsp;de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan sin ningún tipo de garantía, expresa o implícita. En ningún esta compañía será responsables de ningún daño incluyendo, pero no limitado a, daños directos, indirectos, especiales, fortuitos o consecuentes u otras pérdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.</p>
                <p><strong>POLÍTICA DE REEMBOLSO Y GARANTÍA</strong></p><p>En el caso de productos que sean&nbsp; mercancías irrevocables no-tangibles, no realizamos reembolsos después de que se envíe el producto, usted tiene la responsabilidad de entender antes de comprarlo. Le pedimos que lea cuidadosamente antes de comprarlo. Hacemos solamente excepciones con esta regla cuando la descripción no se ajusta al producto. Hay algunos productos que pudieran tener garantía y posibilidad de reembolso pero este será especificado al comprar el producto. En tales casos la garantía solo cubrirá fallas de fábrica y sólo se hará efectiva cuando el producto se haya usado correctamente. La garantía no cubre averías o daños ocasionados por uso indebido. Los términos de la garantía están asociados a fallas de fabricación y funcionamiento en condiciones normales de los productos y sólo se harán efectivos estos términos si el equipo ha sido usado correctamente. Esto incluye:</p>
                <p>– De acuerdo a las especificaciones técnicas indicadas para cada producto.<br>– En condiciones ambientales acorde con las especificaciones indicadas por el fabricante.<br>– En uso específico para la función con que fue diseñado de fábrica.<br>– En condiciones de operación eléctricas acorde con las especificaciones y tolerancias indicadas.</p><p><strong>COMPROBACIÓN ANTIFRAUDE</strong></p>
                <p>La compra del cliente puede ser aplazada para la comprobación antifraude. También puede ser suspendida por más tiempo para una investigación más rigurosa, para evitar transacciones fraudulentas.</p><p><strong>PRIVACIDAD</strong></p><p>Este <a href="" target="_blank"></a> http://localhost/r3diseno/ProyectoFinal/registro.php garantiza que la información personal que usted envía cuenta con la seguridad necesaria. Los datos ingresados por usuario o en el caso de requerir una validación de los pedidos no serán entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales.</p><p>La suscripción a boletines de correos electrónicos publicitarios es voluntaria y podría ser seleccionada al momento de crear su cuenta.</p>
                    <p>Sublime Detalle reserva los derechos de cambiar o de modificar estos términos sin previo aviso.</p><p>
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
