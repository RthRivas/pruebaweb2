<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Ventas.php";
	include "../../librerias/fpdf/fpdf.php";
	$objv= new ventas();


	$c=new conectar();
	$conexion= $c->conexion();	
	//$idventa=$_GET['idventa'];
    $fechainicio = $_GET['fechainicio'];
    $fechafinal = $_GET['fechafinal'];

 $sql="SELECT ve.id_venta,
		ve.fechaCompra,
		ve.id_cliente,
		art.nombre,
        art.precio,
        art.descripcion,
        ve.cantidad

	from ventas  as ve 
	inner join articulos as art
	on ve.id_producto=art.id_producto where fechaCompra between '$fechainicio' and '$fechafinal' ";



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
 art.descripcion,
 ve.cantidad
from ventas  as ve 
inner join articulos as art
on ve.id_producto=art.id_producto";

$result=mysqli_query($conexion,$sql);
$total=0;
$pdf = new FPDF('P', 'mm', array(150,100));
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../img/logo-libro.png',10,8,23);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(50,10,'Libreria SARILO',0,1,'C');
    $this->Cell(70);
    $this->Cell(50,10,'Direccion: Calle Las Flores y Avenida Las Magnolias ',0,1,'C');
    $this->Cell(70);
    $this->Cell(50,10,' Colonia Escolan. San Miguel.',0,1,'C');
    // Salto de línea
    $this->Cell(50,10,'Reporte de ventas',0,1,'C');
    $this->Ln(10);
   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    
  
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Libreria SARILO',0,0,'C');

}

}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->Cell(40,10,'Fecha: '.$fecha ,0, 1);
//$pdf->Cell(40,10,'Factura N: '.$folio,0,1);
//$pdf->Cell(40,10,'Cliente: '.$objv->nombreCliente($idcliente),0,1);
//$pdf->Cell(40,10,'',0,1);

$pdf->Cell(40,10,  'Producto',0,0,'L');
$pdf->Cell(20);
$pdf->Cell(40,10,  'Cantidad',0,0,'L');
$pdf->Cell(-5);
$pdf->Cell(40,10,  'Precio',0,0,'R');
$pdf->Cell(9);
$pdf->Cell(40,10,  'Fecha   ',0,1,'R');

while($mostrar=mysqli_fetch_row($result)){
    $pdf->Cell(40,10,  $mostrar[3],0,0,'L');
    $pdf->Cell(30);
    $pdf->Cell(40,10,  $mostrar[6],0,0,'L');
    $pdf->Cell(-20);
    $pdf->Cell(40,10,  '$'.$mostrar[4],0,0,'R');
    $pdf->Cell(10);
    $pdf->Cell(40,10, $mostrar[1],0,1,'R');
    $total=$total + $mostrar[4];
}

    $total=$total + $mostrar[4];
    $pdf->cell(40,10, '', 0,1);
    $pdf->Cell(40,10, 'Total: ' );
    $pdf->Cell(75);
    $pdf->Cell(40,10, '$'.$total );
    $pdf->Cell(40,10,'',0,1);
$pdf->Output();

?>
 
