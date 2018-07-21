<?php

session_start();

$id=$_SESSION['id_usu'];
unset ($SESSION['id_usu']);
$nombre=$_SESSION['nombre'];
unset ($SESSION['nombre']);

 	
session_destroy();
header("Location: index.php");
 
?>
