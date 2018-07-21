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
                    <h2>Genere Reportes</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<?php 
$sql_configuracion=("SELECT * FROM configuracion");
$resul = mysqli_query($con,$sql_configuracion);
$resultado=mysqli_fetch_array($resul);
 ?>   
<?php         
 if($resultado==0){
    ?>         
                     <div class="col-md-12">
                        <center><h1>No existe una configuraci&oacute;n registrada</h1></center>
                    </div>
<?php 
}else{

  /*CONSULTAS SQL PARA ESTA PAGINA*/
/*CORROBORAR QUE EXISTE CONFIGURACION*/

/*CORROBORAR QUE EXISTE CONFIGURACION*/


/*DIA ACTUAL*/
$hoy= date("Y-m-d");
$sql_hoy= ("SELECT SUM(total) AS value_total FROM ventas WHERE creacion='$hoy'");
$resul_hoy = mysqli_query($con,$sql_hoy);
$row_costo = mysqli_fetch_assoc($resul_hoy);
/*DIA ACTUAL*/

/*SEMANA ACTUAL*/
$semanaactual = date("W")-1;
$sql_semana_actual= ("SELECT SUM(total) AS value_total_semana FROM ventas WHERE WEEK(creacion)='$semanaactual'");
$resul_semana_actual = mysqli_query($con,$sql_semana_actual);
$row_costo_semana = mysqli_fetch_assoc($resul_semana_actual);

/*SEMANA ACTUAL*/


/*MES ACTUAL*/
$mesactual = date("m");
$sql_mes_actual= ("SELECT SUM(total) AS value_total_mes FROM ventas WHERE MONTH(creacion)='$mesactual'");
$resul_mes_actual = mysqli_query($con,$sql_mes_actual);
$row_costo_mes = mysqli_fetch_assoc($resul_mes_actual);

/*MES ACTUAL*/


/*AÑO ACTUAL*/
$añoactual = date("Y");
$sql_año_actual= ("SELECT SUM(total) AS value_total_año FROM ventas WHERE YEAR(creacion)='$añoactual'");
$resul_año_actual = mysqli_query($con,$sql_año_actual);
$row_costo_año = mysqli_fetch_assoc($resul_año_actual);

/*AÑO ACTUAL*/

$sql_parqueo=("SELECT * FROM ventas WHERE finalizada='1'");
$resul = mysqli_query($con,$sql_parqueo);
 ?>
<!--CONSULTAS SQL PARA ESTA PAGINA-->                    

  <!-- top tiles -->
          <div class="row tile_count">

            <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money" aria-hidden="true" style="margin-right: 2px;"></i>Ganancias de Hoy</span>
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


            <div class="col-md-3 col-sm-6  col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money" aria-hidden="true" style="margin-right: 2px;"></i>Ganancias de la Semana</span>
				<?php 
                if ($row_costo_semana['value_total_semana']==0) {  
               ?>
              <div class="count"><?php echo '0¢' ?></div>

               <?php 
                }else{
               ?>
                  <div class="count"><?php echo '¢ '.$row_costo_semana['value_total_semana']; ?></div>
                <?php 
              }
               ?>
            </div>


            <div class="col-md-3 col-sm-6  col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money" aria-hidden="true" style="margin-right: 2px;"></i>Ganancias del Mes</span>
              <?php 
                if ($row_costo_mes['value_total_mes']==0) {  
               ?>
              <div class="count"><?php echo '0¢' ?></div>

               <?php 
                }else{
               ?>
                  <div class="count"><?php echo '¢ '.$row_costo_mes['value_total_mes']; ?></div>
                <?php 
              }
               ?>
            </div>


            <div class="col-md-3 col-sm-6  col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money" aria-hidden="true" style="margin-right: 2px;"></i>Ganacias del Año</span>
              <?php 
                if ($row_costo_año['value_total_año']==0) {  
               ?>
              <div class="count"><?php echo '0¢' ?></div>

               <?php 
                }else{
               ?>
                  <div class="count"><?php echo '¢ '.$row_costo_año['value_total_año']; ?></div>
                <?php 
              }
               ?>
            </div>
            
           </div>
          <!-- /top tiles -->
       <!--CONTENIDO-->
       <div class="col-md-1 col-sm-1 col-xs-1 col-md-offset-10 col-sm-offset-10 col-xs-offset-3">
       		<a href="../reporte_ventas/rpt.php" type="button" target="_blank" class="btn btn-success">IMPRIMIR</a>
		</div>
   
          <table id="example_reporte1" class="table table-bordered table-hover bulk_action dt-responsive nowrap" style="width: 100%;"> 
              
                <thead>
                <tr>
                  <th>#Ticket</th>
                  <th>#Matr&iacute;cula</th>
                  <th>Espacio</th>
                  <th>Tipo</th>
                  <th>Marca</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>Total</th>

                </tr>
                </thead>
                <tbody>
                  <?php
        while($ventas=mysqli_fetch_array($resul)){ 


                $time = strtotime($ventas['inicio']);
                $myFormatForView = date("d/m/Y g:i A", $time); 

                $time_fin = strtotime($ventas['fin']);
                $myFormatForView_fin = date("d/m/Y g:i A", $time_fin);
        ?>
                <tr>
                  <td ><?php  echo  $ventas['id_ventas'];?></td>
                  <td ><?php  echo  $ventas['matricula'];?></td>
                  <td ><?php  echo  $ventas['espacio'];?></td>
                  <td ><?php  echo  $ventas['tipo_auto'];?></td>
                  <td ><?php  echo  $ventas['marca'];?></td>
                  <td > <?php  echo  $myFormatForView;?></td>
                  <?php 
                      if (!empty($ventas['fin'])) {             //SI LA HORA VIENE VACIA    
                   ?>
                  <td ><?php  echo  $myFormatForView_fin;?></td>

                  <?php 
                     }else{                                     //SI LA HORA VIENE VACIA  
                   ?>
                     <td ><?php  echo  $ventas['fin'];?></td>
                   <?php 
                    }                                           //SI LA HORA VIENE VACIA  

                    ?>


                     <?php 
                      if (!empty($ventas['total'])) {             //TOTAL    
                   ?>
                  <td ><?php  echo  '¢ '.$ventas['total'];?></td>

                  <?php 
                     }else{                                     //TOTAL  
                   ?>
                     <td ><?php  echo  $ventas['total'];?></td>
                   <?php 
                    }                                           //TOTAL  

                    ?>
                </tr>

               
 <?php
}
                ?>

<!------------------------MODAL------------------------------------------->

<!------------------------MODAL------------------------------------------->



                    </tbody>
                  </table>
            <!--CONTENIDO CIERRO-->
<?php 
}
 ?>
           

 
                </div>
              </div>       
             </div>             
            </div>
          </div>
        </div>
