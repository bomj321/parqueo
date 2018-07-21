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
                  			<center><h1>No existe una configuraci&oacute;n registrada</h1></center>
                  		</div>

                  		<div class="col-md-3">
                  			<center><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#configuracion">
  									Registrar Configuraci&oacute;n 
							</button></center>
                  		</div>
					<?php 
						}else{
					 ?>

					 	<div class="col-md-9" id="borrar_configuracion">
					 		
					 	</div>
						<div class="col-md-9">
							<form class="form-horizontal">


							  <div class="form-group">
							    <label for="nombre" class="col-sm-2 control-label">Nombre del Parqueo</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="nombre" disabled value="<?php  echo $resultado['nombre'];?>">
							    </div>
							  </div>


							  <div class="form-group">
							    <label for="direccion" class="col-sm-2 control-label">Direcci&oacute;n</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="direccion" disabled value="<?php  echo $resultado['direccion'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="cedula" class="col-sm-2 control-label">C&eacute;dula</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="cedula" disabled value="<?php  echo $resultado['cedula'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="telefono" class="col-sm-2 control-label">Tel&eacute;fono</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="telefono" disabled value="<?php  echo $resultado['telefono'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="direccion" class="col-sm-2 control-label">Direcci&oacute;n</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="direccion" disabled value="<?php  echo $resultado['direccion'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="email" class="col-sm-2 control-label">Email</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="email" disabled value="<?php  echo $resultado['email'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="direccion" class="col-sm-2 control-label">Direcci&oacute;n</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="direccion" disabled value="<?php  echo $resultado['direccion'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="valor" class="col-sm-2 control-label">Valor por Hora</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="valor" disabled value="<?php  echo '¢ '.$resultado['valor_hora'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="parqueo" class="col-sm-2 control-label">Tipo de Parqueo</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="parqueo" disabled value="<?php  echo $resultado['tipo_parqueo'];?>">
							    </div>
							  </div>

							 


						</form>
						</div>

						<div class="col-md-3">
							<center><a onclick="borrar_configuracion();" type="button" class="btn btn-warning btn-lg"> Borrar Configuraci&oacute;n</a></center>

							      <div class="caption" style="margin-top: 40px;">
							        <center><h3>Cant. de Espacios</h3></center>
							        <center><h1><?php  echo $resultado['espacios'];?></h1></center>
							      </div>

							      <div class="caption" style="margin-top: 40px;">
							        <center><h3>Cant. de Columnas</h3></center>
							        <center><h1><?php  echo $resultado['cantidad_columnas'];?></h1></center>
							      </div>
						</div>

						
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