<?php
require 'modelo_grafico.php';
$mg=new Modelo_grafico();
$consulta=$mg->GraficaBar();
echo json_encode($consulta);