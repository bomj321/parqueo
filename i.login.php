<?php
session_start();

 		include ('conexion.php');

$correo = $_POST['usuario'];
$pass = $_POST['clave'];

if(empty($correo) || empty($pass)){
header("Location: index.php");
exit();
}
 
  $sql = "SELECT * FROM users WHERE correo='$correo' ";


  //echo $sql=("SELECT * from usuarios WHERE correo='$usuario' ");
$result = mysqli_query($con,$sql);


  //$conexion1=$mysqli->query($sql);
if (mysqli_num_rows($result) > 0) {

    while($rowi = mysqli_fetch_array($result)) {

//if($rowi['clave_usu'] == md5($pass)){
if($rowi['clave'] == $pass){
@$_SESSION['correo'] = $correo;
@$_SESSION['nombre'] = $rowi['usuario'];
@$_SESSION['id_user'] = $rowi['id_user'];
@$_SESSION['privilegios'] = $rowi['privilegios'];


 $permisos=$rowi['privilegios'];
if($permisos == 1){
echo '<script language="javascript">
 window.location.href="paginas_principales/inicio.php";</script>'; 
}
elseif(empty($permisos)){


echo '<script language="javascript">alert("EL USUARIO NO TIENE PERMISO");
 window.location.href="index.php";</script>'; 


}


} else{
echo '
<script language="javascript">

alert("CLAVE INCORRECTA VERIFIQUE QUE LOS DATOS SEAN CORRECTOS");
 window.location.href="index.php"



 </script>
 '; 

exit();

}

}

}else{
echo '<script language="javascript">


alert("EL USUARIO NO ES VALIDO VERIFIQUE QUE LOS DATOS SEAN CORRECTOS");
 window.location.href="index.php";


 </script>'; 


 exit();}



?>
