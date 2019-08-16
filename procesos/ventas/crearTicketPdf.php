<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
	include "../../librerias/fpdf/fpdf.php";
	$objv= new ventas();


	$c=new conectar();
	$conexion= $c->conexion();	
	$idventa=$_GET['idventa'];

 $sql="SELECT ve.id_venta,
		ve.fechaCompra,
		ve.id_cliente,
		art.nombre,
        art.precio,
        art.descripcion
	from ventas  as ve 
	inner join articulos as art
	on ve.id_producto=art.id_producto
	and ve.id_venta='$idventa'";

$result=mysqli_query($conexion,$sql);

	$ver=mysqli_fetch_row($result);

	$folio=$ver[0];
	$fecha=$ver[1];
	$idcliente=$ver[2];


 //Cantidad de productos
 $sql="SELECT ve.id_venta,
 ve.fechaCompra,
 ve.id_cliente,
 art.nombre,
 art.precio,
 art.descripcion
from ventas  as ve 
inner join articulos as art
on ve.id_producto=art.id_producto
and ve.id_venta='$idventa'";

$result=mysqli_query($conexion,$sql);
$total=0;
$pdf = new FPDF('P', 'mm', array(100,1000));

$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'LIBRERIA SARILO',0, 1);
$pdf->Cell(40,10,'Fecha: '.$fecha ,0, 1);
$pdf->Cell(40,10,'Folio: '.$folio,0,1);
$pdf->Cell(40,10,'Cliente: '.$objv->nombreCliente($idcliente),0,1);
$pdf->Cell(40,10,'',0,1);
$pdf->Cell(40,10,  'Producto',0,0,'L');
$pdf->Cell(40,10,  'Precio',0,1,'R');



while($mostrar=mysqli_fetch_row($result)){
    $pdf->Cell(40,10,  $mostrar[3],0,0,'L');
    $pdf->Cell(40,10,  '$'.$mostrar[4],0,1,'R');
    $total=$total + $mostrar[4];
}

    $total=$total + $mostrar[4];
    $pdf->Cell(40,10,'',0, 1);
    $pdf->Cell(40,10, 'Total:'. '$'.$total );
$pdf->Output();

?>
 