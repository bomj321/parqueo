<?php 
include('../conexion.php');

/*BORRAR CONFIGURACION*/
        mysqli_set_charset($con, "utf8");
        $sql_borrar="DELETE FROM configuracion";
        $resultado=mysqli_prepare($con, $sql_borrar);
        mysqli_stmt_execute($resultado);
        mysqli_stmt_close($resultado);
/*BORRAR CONFIGURACION*/


/*BORRAR COLUMNAS*/
        mysqli_set_charset($con, "utf8");
        $sql_borrar_columnas="DELETE FROM cantidad_columnas";
        $resultado_columnas=mysqli_prepare($con, $sql_borrar_columnas);
        mysqli_stmt_execute($resultado_columnas);
        mysqli_stmt_close($resultado_columnas);
/*BORRAR COLUMNAS*/


/*BORRAR ESPACIOS*/
        mysqli_set_charset($con, "utf8");
        $sql_borrar_espacios="DELETE FROM cantidad_espacios";
        $resultado_espacios=mysqli_prepare($con, $sql_borrar_espacios);
        mysqli_stmt_execute($resultado_espacios);
        mysqli_stmt_close($resultado_espacios);
/*BORRAR ESPACIOS*/

/*BORRAR VENTAS*/
        mysqli_set_charset($con, "utf8");
        $sql_borrar_ventas="DELETE FROM ventas";
        $resultado_ventas=mysqli_prepare($con, $sql_borrar_ventas);
        mysqli_stmt_execute($resultado_ventas);
        mysqli_stmt_close($resultado_ventas);
/*BORRAR VENTAS*/


 ?>