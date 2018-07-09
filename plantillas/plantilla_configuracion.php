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
                    <h2>Revise y Genere la Configuracion más Apropiada</h2>
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

<!--CONTENIDO-->
                  	<div class="row">
                  		<?php 
                  			if($resultado==0){
                  		 ?>
                  		<div class="col-md-9">
                  			<center><h2>No existe una confiraci&oacute;n registrada</h2></center>
                  		</div>

                  		<div class="col-md-3">
                  			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#configuracion">
  									Registrar Configuracion
							</button>
                  		</div>
					<?php 
						}else{
					 ?>

					 <?php 
					 	}
					  ?>


                  	</div>
<!--CONTENIDO-->
                </div>
              </div>       
             </div>             
            </div>
          </div>
        </div>