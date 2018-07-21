<?php 
include('../conexion.php');

$nombre=$_POST['nombre_edit'];
$direccion=$_POST['direccion_edit'];
$cedula=$_POST['cedula_edit'];
$telefono=$_POST['telefono_edit'];
$email=$_POST['email_edit'];
$valor_hora=$_POST['valor_edit'];
$tipo_parqueo=$_POST['parqueo_edit'];

mysqli_set_charset($con, "utf8");
		$sql_editar="UPDATE configuracion SET nombre= ?, direccion= ?, cedula= ?, telefono= ?, email= ?, valor_hora= ?, tipo_parqueo= ?";
		$resultado_editar=mysqli_prepare($con, $sql_editar);
		mysqli_stmt_bind_param($resultado_editar, "sssssss", $nombre, $direccion, $cedula,$telefono,$email,$valor_hora,$tipo_parqueo);
		mysqli_stmt_execute($resultado_editar);       
        mysqli_stmt_close($resultado_editar);

 ?>