<?php
include_once("./include/pcabeza_admin2.php");
$resultado = mostrarClientee($link);
?>


<!--Ejemplo tabla con DataTables-->
<div id="layoutSidenav_content">
    <main><br>
        <header>
            <img style="float: left; margin: 0px 0px 45px 45px;" src="./img/syblime.png" align="center" width="70" height="70">
            <h1 class="text-center text-black">Reporte General de Clientes</h1>
            <i>
                <h4 class="text-center text-black">Sublime Detalle</h4>
            </i>
        </header>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($resultado)) { ?>
                                <tr>
                                    <td> <?php echo $row['Nombre'] . ' ' . $row['Apellido'] ?> </td>
                                    <td> <?php echo $row['Usuario'] ?> </td>
                                    <td> <?php echo $row['Telefono'] ?> </td>
                                    <td> <?php echo $row['Direccion'] ?> </td>
                                    <td> <?php if ($row['Estado_cliente'] == 'A') {
                                                echo 'Activo';
                                            } else {
                                                echo 'Inactivo';
                                            } ?> </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <!-- jQuery, Popper.js, Bootstrap JS -->
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script src="popper/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- datatables JS -->
        <script type="text/javascript" src="datatables/datatables.min.js"></script>

        <!-- para usar botones en datatables JS -->
        <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
        <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
        <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


        <!-- código JS propìo-->
        <script type="text/javascript" src="main.js"></script>
        <script src="js/scripts.js"></script>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                </div>
            </div>
        </footer>





        </body>

        </html>