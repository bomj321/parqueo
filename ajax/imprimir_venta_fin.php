<?php
date_default_timezone_set('America/Costa_Rica');

require_once('../conexion.php');

$id_ventas=$_GET['id_ventas'];
$fecha_fin = date("Y-m-d H:i:s");
$finalizada=1;




/*ACTUALIZAR VENTAS 1 HORA FIN*/
        $sql_ventas_hora="UPDATE ventas SET fin=? WHERE id_ventas='$id_ventas'";
        $resultado_ventas_hora=mysqli_prepare($con, $sql_ventas_hora);
        mysqli_stmt_bind_param($resultado_ventas_hora, "s", $fecha_fin);
        mysqli_stmt_execute($resultado_ventas_hora); 
        mysqli_stmt_close($resultado_ventas_hora);

/*ACTUALIZAR VENTAS 1 HORA FIN*/







/*SELECT VENTAS*/
$sql_parqueo=("SELECT SUM(TIME_TO_SEC(inicio)) AS segundos_inicio, SUM(TIME_TO_SEC(fin)) AS segundos_fin  FROM ventas WHERE id_ventas='$id_ventas'");
$resul = mysqli_query($con,$sql_parqueo);
$ventas=mysqli_fetch_array($resul);

$ventas_hora_inicio= $ventas['segundos_inicio'];
$ventas_hora_fin= $ventas['segundos_fin'];

/*SELECT VENTAS*/

/*DIFERENCIA DE TIEMPO EN HORA*/
$calcular_tiempo=$ventas_hora_fin- $ventas_hora_inicio;
$calcular_tiempo_hora= $calcular_tiempo/3600;
/*DIFERENCIA DE TIEMPO EN HORA*/



/*REDONDEDO EN 0.5 HACIA ARRIBA*/
$redondear= ceil($calcular_tiempo_hora/0.5)*0.5;
/*REDONDEDO EN 0.5 HACIA ARRIBA*/



/*SELECT TOTAL HORA*/
$sql_total=("SELECT * FROM configuracion");
$resul_total = mysqli_query($con,$sql_total);
$total=mysqli_fetch_array($resul_total);
$total_hora= $total['valor_hora'];
/*SELECT TOTAL HORA*/




/*MULTIPLICAR TIEMPO POR EL VALOR*/
$total_parqueo= abs($redondear*$total_hora);

/*MULTIPLICAR TIEMPO POR EL VALOR*/



/*ACTUALIZAR VENTAS TOTAL*/
        $sql_ventas_total="UPDATE ventas SET total=?, finalizada=? WHERE id_ventas='$id_ventas'";
        $resultado_ventas_hora_total=mysqli_prepare($con, $sql_ventas_total);
        mysqli_stmt_bind_param($resultado_ventas_hora_total, "si", $total_parqueo,$finalizada);
        mysqli_stmt_execute($resultado_ventas_hora_total); 
        mysqli_stmt_close($resultado_ventas_hora_total);

/*ACTUALIZAR VENTAS TOTAL*/






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

$sql_ventas_consulta=("SELECT * FROM ventas WHERE id_ventas='$id_ventas'");
$resul_ventas_consulta = mysqli_query($con,$sql_ventas_consulta);
$ventas_consulta=mysqli_fetch_array($resul_ventas_consulta);
$nombre_espacio=$ventas_consulta['espacio'];
/*ACTUALIZAR ESPACIO*/
$estado_espacio_fin=0;
$tipo_carro_fin=" ";
$hora_inicio=" ";

$sql_espacio_actualizar="UPDATE cantidad_espacios SET estado_espacio=?, tipo_carro=?, hora_inicio=? WHERE letra_espacio='$nombre_espacio'";
$resultado_espacio_actualizar=mysqli_prepare($con, $sql_espacio_actualizar);
mysqli_stmt_bind_param($resultado_espacio_actualizar, "iss", $estado_espacio_fin,$tipo_carro_fin,$hora_inicio);
mysqli_stmt_execute($resultado_espacio_actualizar); 
mysqli_stmt_close($resultado_espacio_actualizar);

/*ACTUALIZAR ESPACIO*/

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

/*$pdf->SetX(1);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,3,utf8_decode('Fecha: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['creacion'],0,1,'C',1);*/

$pdf->SetY(29);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Tipo: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['tipo_auto'],0,1,'C',1);


$pdf->SetY(33);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Matrícula: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['matricula'],0,1,'C',1);

$pdf->SetY(37);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Marca: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['marca'],0,1,'C',1);

$pdf->SetY(41);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Inicio: '),0,0,'L');
$time = strtotime($ventas_consulta['inicio']);
$myFormatForView = date("g:i A", $time);
$pdf->SetTextColor(255,255,255); 
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$myFormatForView,0,1,'C',1);

$pdf->SetY(45);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Final: '),0,0,'L');
$time = strtotime($ventas_consulta['fin']);
$myFormatForView_fin = date("d/m/Y g:i A", $time);
$pdf->SetTextColor(255,255,255); 
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$myFormatForView_fin,0,1,'C',1);

$pdf->SetY(49);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Espacio: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,$ventas_consulta['espacio'],0,1,'C',1);

$pdf->SetY(53);
$pdf->SetTextColor(0,0,0);
$pdf->SetX(1);
$pdf->Cell(20,3,utf8_decode('Total a Pagar: '),0,0,'L');
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(66,134,244);
$pdf->Cell(18,3,utf8_decode('¢').$total_parqueo,0,1,'C',1);



/*************************PARTE PRODUCTOS CIERRO****************************************/
/*************************PARTE SERVICIOS****************************************/
/*$pdf->AliasNbPages();*/

/*$pdf->AutoPrint();*/
$pdf->AutoPrint();
$pdf->Output();

echo '
setTimeout(function () {
            window.location.href = "../paginas_principales/estado_parqueo.php";
          }, 8000);



';

 ?>

