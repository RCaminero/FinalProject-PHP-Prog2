<?php
include_once("./include/pcabeza_admin2.php");
$resultado = pedidosMes($link);
while ($row = mysqli_fetch_array($resultado)) {
    $data1 =  $row['Cantidad_pedidos'];
    $data2 =  $row['Ventas'];
    $data3 =  $row['clientes'];
    $data4 =  $row['Nombre'];
    break;
}
$hoy = date("F");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Sublime Detalle</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card text-center">
                        <div class="card bg-primary text-white mb-4 ">
                            <div class="card-body-center"><i class="fas fa-gifts"></i></div>
                            <div class="card-body">
                                <h4><?php echo 'Pedidos de' . ' ' . $hoy ?></h4>
                            </div>
                            <div class="card-body-center">
                                <h3><?php echo $data1 ?></h3>
                            </div>
                            <div class="card-footer ">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card text-center">
                        <div class="card bg-warning text-white mb-4 ">
                            <div class="card-body-center"><i class="fas fa-shopping-basket"></i></div>
                            <div class="card-body">
                                <h4><?php echo 'Total de ventas de' . ' ' . $hoy ?></h4>
                            </div>
                            <div class="card-body-center">
                                <h3><?php echo $data2 ?></h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card text-center">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body-center"><i class="fas fa-users"></i></div>
                            <div class="card-body">
                                <h4><?php echo 'Clientes registrados en' . ' ' . $hoy ?></h4>
                            </div>
                            <div class="card-body-center">
                                <h3><?php echo $data3 ?></h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card text-center">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body-center"><i class="fas fa-gift"></i></div>
                            <div class="card-body">
                                <h4><?php echo 'Articulo más pedido en' . ' ' . $hoy ?></h4>
                            </div>
                            <div class="card-body-center">
                                <h4><?php echo $data4 ?></h4>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
<br>
<br>
<br>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Productos en Stock</div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>

                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Pedidos Por Mes</div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
            
    </main>

    <?php
    include_once("./include/ppie_admin2.php");
    ?>