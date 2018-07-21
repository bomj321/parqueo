<?php
date_default_timezone_set('America/Costa_Rica');

require_once('../conexion.php');

$id_espacio=$_GET['apartar_espacio'];
$sql_espacio=("SELECT letra_espacio FROM cantidad_espacios WHERE id_espacios='$id_espacio'");
$resul_espacio = mysqli_query($con,$sql_espacio);
$espacio_consulta=mysqli_fetch_array($resul_espacio);
$letra_espacio_consulta=$espacio_consulta['letra_espacio'];

$tipo_automotor=$_GET['tipo_automotor'];
$matricula=$_GET['matricula'];
$marca=$_GET['marca'];
$fecha_inicio = date("Y-m-d H:i:s");;
$fecha_creacion = date("Y-m-d");
$finalizada = 0;

/*ACTUALIZAR ESPACIOS*/
        $sql="UPDATE cantidad_espacios SET estado_espacio='1', tipo_carro=?, hora_inicio=? WHERE id_espacios= ? ";
        $resultado=mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($resultado, "ssi", $tipo_automotor,$fecha_inicio,$id_espacio);
        mysqli_stmt_execute($resultado); 
        mysqli_stmt_close($resultado);

/*ACTUALIZAR ESPACIOS*/


/*INSERTAR PARQUEO*/

$sql_ventas="INSERT INTO ventas (matricula,espacio,tipo_auto,marca,inicio,creacion,finalizada) VALUES (?,?,?,?,?,?,?)";
$resultado_ventas=mysqli_prepare($con, $sql_ventas);
mysqli_stmt_bind_param($resultado_ventas, "sssssss",$matricula,$letra_espacio_consulta,$tipo_automotor,$marca,$fecha_inicio,$fecha_creacion,$finalizada);
mysqli_stmt_execute($resultado_ventas);
$idautogenerado = mysqli_insert_id($con);
mysqli_stmt_close($resultado_ventas);

/*INSERTAR PARQUEO*/


include('fpdf_plantilla.php');

class PDF_AutoPrint extends PDF
{
   function AutoPrint($printer='')
    {
        // Open the print dialog
        if($printer)
        {
            $printer = str_replace('\\', '\\\\', $printer);
            $script = "var pp = getPrintParams();";
            $script .= "pp.interactive = pp.constants.interactionLevel.full;";
            $script .= "pp.printerName = '$printer'";
            $script .= "print(pp);";
           
        }
        else
            $script = 'print(true);';
        $this->IncludeJS($script);
        
    }
}


/*MULTIPLES CONSULTAS*/    

            
$sql_configuracion=("SELECT * FROM configuracion");
$resul_configuracion = mysqli_query($con,$sql_configuracion);
$configuracion=mysqli_fetch_array($resul_configuracion);

$sql_ventas_consulta=("SELECT * FROM ventas WHERE id_ventas='$idautogenerado'");
$resul_ventas_consulta = mysqli_query($con,$sql_ventas_consulta);
$ventas_consulta=mysqli_fetch_array($resul_ventas_consulta);

       

/*CIERRO MULTIPLES CONSULTAS*/  


/*************************PARTE PRODUCTOS****************************************/
$pdf= new PDF_AutoPrint('P','mm',array(40,70));
$pdf->AliasNbPages();
$pdf->SetTopMargin(1);
$pdf->SetAutoPageBreak(0,1);
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);         
$pdf->Cell(20,3, $configuracion['nombre'],0,1,'C');
$pdf->SetFont('Arial','B',5); 
$pdf->Cell(20,3,'CED: '.$configuracion['cedula'],0,1,'C');
$pdf->Cell(20,3,'Telefono: '.$configuracion['telefono'],0,1,'C');
$pdf->Cell(20,3,'Email: '.$configuracion['email'],0,1,'C');
$pdf->Cell(20,3,utf8_decode('Precio por Hora: ¢'.$configuracion['valor_hora']),0,1,'C');
$pdf->Cell(20,3,utf8_decode('Dirección: '.$configuracion['direccion']),0,1,'C');
$pdf->SetY(25);


$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Número de Tiquete: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['id_ventas'],0,1,'C',1);

$pdf->SetY(29);
$pdf->SetX(1);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,3,utf8_decode('Fecha: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['creacion'],0,1,'C',1);

$pdf->SetY(33);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Tipo: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['tipo_auto'],0,1,'C',1);

$pdf->SetY(37);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Matrícula: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['matricula'],0,1,'C',1);

$pdf->SetY(41);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Marca: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['marca'],0,1,'C',1);

$pdf->SetY(45);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Inicio: '),0,0,'L');
$time = strtotime($ventas_consulta['inicio']);
$myFormatForView = date("d/m/Y g:i A", $time);
$pdf->SetTextColor(255,255,255); 
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$myFormatForView,0,1,'C',1);

$pdf->SetY(49);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Espacio: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['espacio'],0,1,'C',1);



/*************************PARTE PRODUCTOS CIERRO****************************************/
/*************************PARTE SERVICIOS****************************************/
/*$pdf->AliasNbPages();*/

/*$pdf->AutoPrint();*/
$pdf->AutoPrint();
$pdf->Output();
?>

