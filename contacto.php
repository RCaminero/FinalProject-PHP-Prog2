<?php
    include_once("./include/pcabeza.php");
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home" style="color:#F00782"></i> Inicio</a>
                    <span>Contacto</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__content">
                    <div class="contact__address">
                        <h5>Información de contacto</h5>
                        <ul>
                            <li>
                                <h6><i class="fa fa-map-marker" style="color:#F00782"></i> Dirección</h6>
                                <p>Camagüey, Las Maras C/P #95</p>
                            </li>
                            <li>
                                <h6><i class="fa fa-phone" style="color:#F00782"></i> Teléfono</h6>
                                <p><span>+1 (829) 355-0257</span>
                            </li>
                            <li>
                                <h6><i class="fa fa-headphones" style="color:#F00782"></i> Correo</h6>
                                <p>shg.diaz@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <div class="contact__form">
                        <h5>Ingrese aquí un comentario</h5>
                        <form action="./venta_crud.php?b=C&id=<?php echo $row[0];?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                <textarea placeholder="Comentario" name="comentario" required=""></textarea>
                            <button type="submit" name="enviar" class="site-btn">Enviar comentario</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__map">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.2013903653174!2d-70.50548458509643!3d19.230052886999683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDEzJzQ4LjIiTiA3MMKwMzAnMTEuOSJX!5e0!3m2!1ses!2sdo!4v1605975012064!5m2!1ses!2sdo" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                    </iframe>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->


<?php
    include_once("./include/ppie.php");
?>