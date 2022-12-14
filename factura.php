<?php
/// Powered by Evilnapsis go to http://evilnapsis.com
include "./fpdf/fpdf.php";
require './include/conexion.php';
$query = "SELECT
CONCAT_WS(' ', cliente.Nombre, cliente.Apellido) AS nombre_cliente,
MAX(pedido.id_pedido) AS num_factura,
cliente.Direccion AS direccion,
cliente.Telefono AS cel,
usuario.Usuario,
articulo.Id_articulo AS num_articulo,
articulo.Nombre AS articulo,
pedido.Fecha_pedido AS fecha,
pedido.Fecha_entrega AS fecha_entrega,
pedido_detalle.Cantidad AS cantidad,
pedido_detalle.Precio AS precio,
pedido_detalle.Total AS total
FROM
pedido_detalle 
    INNER JOIN
pedido ON pedido_detalle.Pedido_id_pedido = pedido.id_pedido
    INNER JOIN
cliente  ON pedido.Cliente_id_cliente = cliente.Id_cliente
INNER JOIN
usuario on cliente.Id_usuario=usuario.Id_usuario
    INNER JOIN
articulo ON pedido_detalle.Articulo_id_articulo = articulo.Id_articulo
GROUP BY cliente.Nombre,articulo.Nombre
ORDER BY pedido.id_pedido DESC
LIMIT 1
";
    $resultado = $link->query($query);
    

$pdf = new FPDF($orientation = 'P', $unit = 'mm');
class PDFDiseno extends FPDF{

    function Footer()
    {
        // definimos posicion
        $this->SetY(-15);
        // definir tipo de letra
        $this->SetFont('Arial', 'I', 8);
        // Definir texto de pie de pagina
        $this->Cell(0, 10, 'Pag '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
}
$pdf = new PDFDiseno();
$pdf ->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);


// Agregamos los datos de la empresa
$pdf->Image('./img/logo.jpg', 12, 5, 60);
$pdf->SetFont('Arial', '', 10);
$pdf->setY(10);
$pdf->setX(150);
$pdf->Cell(5, $textypos, "Camaguey, Las Maras C/p #95");
$pdf->setY(15);
$pdf->setX(150);
$pdf->Cell(5, $textypos, "829/355/0257");
$pdf->setY(20);
$pdf->setX(150);
$pdf->Cell(5, $textypos, "shg.diaz@gmail.com");
$pdf->Line(28, 25, 210 - 20, 25);
$pdf->Ln(50);
// Agregamos los datos del cliente  
while($row = $resultado->fetch_assoc()){



    $pdf->Ln(50);
    $pdf->setY(35);
    $pdf->setX(10);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(5, $textypos,utf8_decode($row['nombre_cliente']));
    $pdf->SetFont('Arial', '', 10);
    $pdf->setY(40);
    $pdf->setX(10);
    $pdf->Cell(5, $textypos,$row['direccion'] );
    $pdf->setY(45);
    $pdf->setX(10);
    $pdf->Cell(5, $textypos,$row['cel']);
    $pdf->setY(50);
    $pdf->setX(10);
$pdf->Cell(5, $textypos, $row['Usuario']);


    // Agregamos los datos de la factura
    $pdf->Ln(50);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->setY(35);
    $pdf->setX(150);
    $pdf->Cell(5, $textypos, "FACTURA No. ".'000'.$row['num_factura']);
    $pdf->SetFont('Arial', '', 10);
    $pdf->setY(40);
    $pdf->setX(150);
    $pdf->Cell(5, $textypos, "Fecha:");
    $pdf->Cell(27, 5,$row['fecha'], 0, 1, 'R');
    $pdf->setY(45);
    $pdf->setX(150);
    $pdf->Cell(5, $textypos, "Vencimiento:".' '.$row['fecha_entrega']);
    $pdf->setY(50);
    $pdf->setX(150);
    $pdf->Cell(5, $textypos, "");
    $pdf->setY(55);
    $pdf->setX(150);
    $pdf->Cell(5, $textypos, "");

    /// Apartir de aqui empezamos con la tabla de productos
    $pdf->setY(60);
    $pdf->setX(135);
    $pdf->Ln();
    /////////////////////////////

    //// Array de Cabecera
    $pdf->SetFillColor(253, 194, 225);
    $pdf->SetFont('Arial', 'B', 12);
    $header = array("Cod.", "Descripcion", "Cantidad", "Precio", "Total");

    //// Lista de Productos
    $pdf->SetFont('Arial', '', 10);
    $products = array(
        array($row['num_articulo'], utf8_decode($row['articulo']),$row['cantidad'], $row['precio'], 0),
    );
}
// Column widths
$w = array(20, 95, 20, 25, 25);
// Header
$pdf->SetFont('Arial', 'B', 10);
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
$pdf->SetFont('Arial', '', 10);
$pdf->Ln();
// Data
$total = 0;
foreach ($products as $row) {
    $pdf->Cell($w[0], 6, $row[0], 1);
    $pdf->Cell($w[1], 6, $row[1], 1);
    $pdf->Cell($w[2], 6, number_format($row[2]), '1', 0, 'R');
    $pdf->Cell($w[3], 6, "$ " . number_format($row[3], 2, ".", ","), '1', 0, 'R');
    $pdf->Cell($w[4], 6, "$ " . number_format($row[3] * $row[2], 2, ".", ","), '1', 0, 'R');

    $pdf->Ln();
    $total += $row[3] * $row[2];
}
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 60 + (count($products) * 10);

$pdf->setY($yposdinamic);
$pdf->setX(235);
$pdf->Ln();
/////////////////////////////
$header = array("", "");
$pdf->SetFillColor(253, 194, 225);
$data2 = array(
    array("Subtotal", $total, 1),
    array("Descuento", 0),
    array("Impuesto", 0),
    array("Total", $total),
);
// Column widths
$w2 = array(40, 40);
// Header
$pdf->Ln();
// Data
foreach ($data2 as $row) {
    $pdf->setX(115);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell($w2[0], 6, $row[0], 1);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell($w2[1], 6, "$ " . number_format($row[1], 2, ".", ","), '1', 0, 'R', 1);

    $pdf->Ln();
}
//////////////Footer///////////////

$yposdinamic += (count($data2) * 10);
$pdf->SetFont('Arial', 'B', 10);

$pdf->setY($yposdinamic + 10);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "TERMINOS Y CONDICIONES");
$pdf->SetFont('Arial', '', 10);

$pdf->setY($yposdinamic + 20);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "Esta factura devengara 5% de recargo mensual despues de la fecha de vencimiento");
$pdf->setY($yposdinamic + 15);
$pdf->Cell(5, $textypos, "No aceptamos devoluciones");

$pdf->setY($yposdinamic + 50);
$pdf->setX(10);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, $textypos, "Genesis Diaz", 'B');
$pdf->setY($yposdinamic + 55);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, $textypos, "Propietaria");



$pdf->output();
