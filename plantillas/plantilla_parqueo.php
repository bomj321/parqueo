 <?php 
date_default_timezone_set('America/Costa_Rica');

  ?> 
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reportes<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Verifique Estado del Parqueo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
  <!--CONSULTAS SQL PARA ESTA PAGINA-->
<?php 
$sql_configuracion=("SELECT * FROM configuracion");
$resul = mysqli_query($con,$sql_configuracion);
$resultado=mysqli_fetch_array($resul);


$sql_th= ("SELECT * FROM cantidad_columnas");
$resul_th = mysqli_query($con,$sql_th);
$total_th = mysqli_num_rows($resul_th);

$sql_espacios= ("SELECT * FROM cantidad_espacios");
$resul_espacios = mysqli_query($con,$sql_espacios);

$sql_espacios_libres= ("SELECT * FROM cantidad_espacios WHERE estado_espacio='0'");
$resul_espacios_libres = mysqli_query($con,$sql_espacios_libres);
$total_espacios_libres = mysqli_num_rows($resul_espacios_libres);


$sql_espacios_ocupados= ("SELECT * FROM cantidad_espacios WHERE estado_espacio='1'");
$resul_espacios_ocupados = mysqli_query($con,$sql_espacios_ocupados);
$total_espacios_ocupados = mysqli_num_rows($resul_espacios_ocupados);

$sql_espacios_carro= ("SELECT * FROM cantidad_espacios WHERE tipo_carro='Carro'");
$resul_espacios_carro = mysqli_query($con,$sql_espacios_carro);
$total_carros = mysqli_num_rows($resul_espacios_carro);

$sql_espacios_moto= ("SELECT * FROM cantidad_espacios WHERE tipo_carro='Moto'");
$resul_espacios_moto = mysqli_query($con,$sql_espacios_moto);
$total_motos = mysqli_num_rows($resul_espacios_moto);

$hoy= date("Y-m-d");

$sql_hoy= ("SELECT SUM(total) AS value_total FROM ventas WHERE creacion='$hoy'");
$resul_hoy = mysqli_query($con,$sql_hoy);
$row_costo = mysqli_fetch_assoc($resul_hoy);
 ?>
                    <!--CONSULTAS SQL PARA ESTA PAGINA-->                    
						<!--CONTENIDO-->
   <?php 
                        if($resultado==0){
    ?>         
                     <div class="col-md-12">
                        <center><h1>No existe una configuraci&oacute;n registrada</h1></center>
                    </div>
<?php 
}else{
 ?>
  <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span style="font-size: 15px;" class="count_top"><i class="fa fa-thumbs-up" aria-hidden="true" style="margin-right: 2px; font-size: "></i>Espacios Libres</span>
              <div class="count"><?php echo $total_espacios_libres; ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span style="font-size: 15px;" class="count_top"><i class="fa fa-thumbs-down" aria-hidden="true" style="margin-right: 2px;"></i>Espacios Ocupados</span>
              <div class="count"><?php echo $total_espacios_ocupados; ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span style="font-size: 15px;" class="count_top"><i class="fa fa-car" aria-hidden="true" style="margin-right: 2px;"></i>Carros</span>
              <div class="count"><?php echo $total_carros; ?></div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
              <span style="font-size: 15px;" class="count_top"><i class="fa fa-motorcycle" aria-hidden="true" style="margin-right: 2px;"></i>Motos</span>
              <div class="count"><?php echo $total_motos; ?></div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 tile_stats_count">
              <span style="font-size: 15px;" class="count_top"><i class="fa fa-money" aria-hidden="true" style="margin-right: 2px;"></i>Total Hoy</span>
              <?php 
                if ($row_costo['value_total']==0) {  
               ?>
              <div class="count"><?php echo '0¢' ?></div>

               <?php 
                }else{
               ?>
                  <div class="count"><?php echo '¢ '.$row_costo['value_total']; ?></div>
                <?php 
              }
               ?>
            </div>
           </div>
          <!-- /top tiles -->
            <!--CONTENIDO CIERRO-->

            <table class="table table-bordered table-hover bulk_action dt-responsive nowrap">
                  <thead>
                <tr>
                    <?php
        while($datos_th=mysqli_fetch_array($resul_th)){ 
                
        ?>
                  <th style="text-align: center; color: black;"><?php echo 'Fila '.$datos_th['cantidad_columnas']; ?></th>
                  
            <?php 
              }
             ?>
                </tr>
                </thead>

                <tbody>
                  <tr>
                  <?
                  $contador = 1;
                  while($registro_espacios=mysqli_fetch_array($resul_espacios)){
                      $id_espacio = $registro_espacios["id_espacios"];

                    /*TIEMPO PARQUEADO*/
                      if (!empty($registro_espacios["hora_inicio"])) {
                       $horas_actuales = time()/3600 ;                                                           

                       $hora_inicio = $registro_espacios['hora_inicio'];
                       /*DESMEMBRAR FECHA*/
                       $time_año = strtotime($registro_espacios['hora_inicio']);
                           $myFormat_año = date("Y", $time_año);

                           $time_mes = strtotime($registro_espacios['hora_inicio']);
                           $myFormat_mes = date("m", $time_mes);

                           $time_dia = strtotime($registro_espacios['hora_inicio']);
                           $myFormat_dia = date("d", $time_dia);

                           $time_hora = strtotime($registro_espacios['hora_inicio']);
                           $myFormat_hora = date("H", $time_hora);

                           $time_minuto = strtotime($registro_espacios['hora_inicio']);
                           $myFormat_minuto = date("i", $time_minuto);

                           $time_segundo = strtotime($registro_espacios['hora_inicio']);
                           $myFormat_segundo = date("s", $time_segundo);

                          $marca_de_tiempo= mktime($myFormat_hora, $myFormat_minuto, $myFormat_segundo, $myFormat_mes, $myFormat_dia, $myFormat_año)/3600;

                          /*DESMEMBRAR FECHA*/
                          /*DIFERENCIA DE LAS HORAS*/
                          $tiempo_transcurrido= round($horas_actuales-$marca_de_tiempo,2);
                          /*DIFERENCIA DE LAS HORAS*/

                      }
                    /*TIEMPO PARQUEADO*/
                   if ($contador > $total_th) {
                    echo "</tr><tr>";
                    $contador = 1;
                   }
                  ?>

                  <?php
                  if ($registro_espacios["estado_espacio"]==1) { //IF PARA COLOCAR EL BACKGROUND
                     # code...
                   
                   ?>
                  <td title="<?php echo $tiempo_transcurrido.' horas'; ?>" style="color: black; text-align: center; background-color: #D9534F;"> <?php echo $registro_espacios["letra_espacio"]; ?> </td>
                  <?php 
                    }else{  //IF PARA COLOCAR EL BACKGROUND
                   ?>

                    <td  style="background-color: #9DE1FE; color: black; text-align: center;"> <?php echo $registro_espacios["letra_espacio"]; ?> </td>
                    <?php 

                      } //IF PARA COLOCAR EL BACKGROUND
                     ?>

                  <?
                   $contador++;
                  }
                  ?>
              </tr>
                </tbody>
            </table>




<?php 

}
 ?>
<div class="row">
  <div class="col-md-12 col-xs-12 col-sm-12">
    <button class="btn btn-danger btn-sm pull-right">OCUPADO</button>
    <button style="background-color:#9DE1FE; color: black" class="btn btn-sm pull-right">DISPONIBLE</button>
  </div>

</div>
 
                </div>
              </div>       
             </div>             
            </div>
          </div>
        </div>
