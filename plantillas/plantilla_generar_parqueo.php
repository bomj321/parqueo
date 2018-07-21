  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Configuracion del Sistema<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Finalice y Genere Nuevos Parqueos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  	<!--CONSULTA SQL-->
<?php 
$sql_configuracion=("SELECT * FROM configuracion");
$resul = mysqli_query($con,$sql_configuracion);
$resultado=mysqli_fetch_array($resul);



 ?>
                  	<!--CONSULTA SQL-->

<script type="text/javascript">
  
  function gtx(d){
    return moment(d).format('LT');
            }

</script>
<!--CONTENIDO-->
<?php 
                        if($resultado==0){
    ?>         
                     <div class="col-md-12">
                        <center><h1>No existe una configuraci&oacute;n registrada</h1></center>
                    </div>
<?php 
}else{

  $sql_parqueo=("SELECT * FROM ventas");
$resul = mysqli_query($con,$sql_parqueo);
 ?>

<div class="col-md-1 col-sm-1 col-xs-1 col-md-offset-10 col-sm-offset-10 col-xs-offset-3">
	<button class="btn btn-success" data-toggle="modal" data-target="#nuevo_parqueo">NUEVO</button>
</div>
                  	<table id="example1" class="table table-bordered table-hover bulk_action dt-responsive nowrap" style="width: 100%;"> 
              
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
                  <th>Acciones</th>

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


                   <?php 
                      if ($ventas['finalizada']==0) {             //FINALIZAR    
                   ?>
                  <td >
                     <a onclick="parquear_fin(<?php echo $ventas['id_ventas'];?>); return false" type="button" class="btn btn-warning">FINALIZAR</a>

                      
                    </td>

                  <?php 
                     }else{                                     //FINALIZAR  
                   ?>
                     <td >
                      <button class="btn btn-success">FINALIZADA</button>

                      </td>

                   <?php 
                    }                                           //FINALIZAR  

                    ?>


                </tr>

               
 <?php
}
                ?>

<!------------------------MODAL------------------------------------------->

<!------------------------MODAL------------------------------------------->



                    </tbody>
                  </table>
<!--CONTENIDO-->
<?php 

}
 ?>
                </div>
              </div>       
             </div>             
            </div>
          </div>
        </div>