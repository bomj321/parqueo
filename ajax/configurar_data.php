<?php 
include('../conexion.php');

$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$cedula=$_POST['cedula'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$valor_hora=$_POST['valor_hora'];
$tipo_parqueo=$_POST['tipo_parqueo'];
$cantidad_espacios=$_POST['cantidad_espacios'];
$cantidad_columnas=$_POST['cantidad_columnas'];

/*Cantidad Columnas*/
for ($i=65;$i<=(65+$cantidad_columnas)-1;$i++) {
	$letra=chr($i);

	    mysqli_set_charset($con, "utf8");
        $sql_columnas="INSERT INTO cantidad_columnas (cantidad_columnas) VALUES (?)";
        $resultado=mysqli_prepare($con, $sql_columnas);
        mysqli_stmt_bind_param($resultado, "s", $letra);
        mysqli_stmt_execute($resultado);
        mysqli_stmt_close($resultado);
}
/*Cantidad Columnas*/



/*Configuracion*/
        mysqli_set_charset($con, "utf8");
        $sql_configuracion="INSERT INTO configuracion (nombre,direccion,cedula,telefono,email,valor_hora,tipo_parqueo,espacios,cantidad_columnas) VALUES (?,?,?,?,?,?,?,?,?)";
        $resultado_configuracion=mysqli_prepare($con, $sql_configuracion);
        mysqli_stmt_bind_param($resultado_configuracion, "sssssssss", $nombre,$direccion,$cedula,$telefono,$email,$valor_hora,$tipo_parqueo,$cantidad_espacios,$cantidad_columnas);
        mysqli_stmt_execute($resultado_configuracion);
        mysqli_stmt_close($resultado_configuracion);
/*Configuracion*/



/*Cantidad Espacios*/
$letra_contador=65;
$numero=1;
for ($i=1;$i<=$cantidad_espacios;$i++) {

$letra_espacio=chr($letra_contador).$numero;
$estado_espacio=0;

	    mysqli_set_charset($con, "utf8");
        $sql_espacios="INSERT INTO cantidad_espacios (estado_espacio,letra_espacio) VALUES (?,?)";
        $resultado_espacios=mysqli_prepare($con, $sql_espacios);
        mysqli_stmt_bind_param($resultado_espacios, "ss", $estado_espacio,$letra_espacio);
        mysqli_stmt_execute($resultado_espacios);
        mysqli_stmt_close($resultado_espacios);

if ($cantidad_columnas==($letra_contador-64)) {
	$letra_contador=65;

}else{
	$letra_contador++;

}

$resto= $i%$cantidad_columnas;
if ($resto !=0) {
	$numero=$numero;
	

}else{
	$numero++;

}


}

/*Cantidad Espacios*/

 ?>