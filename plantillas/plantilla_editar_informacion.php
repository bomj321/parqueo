  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Informaci&oacute;n Personal<!--<small>Todos los clientes</small>--></h3>
              </div>             
            </div>

            <div class="clearfix"></div>

            <div class="row"> 

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar la Informaci&oacute;n Personal</h2>
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
<?php 
include("../modales/borrar_configuracion.php");
include("../modales/editar_informacion.php");
 ?>
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
					 	
						<div class="col-md-12 col-sm-12 col-xs-12">
							<form class="form-horizontal" enctype="multipart/form-data" id="form_editar_informacion" name="form_editar_informacion" onsubmit="editar_informacion_form(); return false">


							  <div class="form-group">
							    <label for="nombre" class="col-sm-2 col-xs-12 col-md-2 control-label">Nombre del Parqueo</label>
							    <div class="col-sm-10 col-xs-12 col-md-10">
							      <input type="text" class="form-control" id="nombre" required name="nombre_edit" value="<?php  echo $resultado['nombre'];?>">
							    </div>
							  </div>							

							  <div class="form-group">
							    <label for="cedula" class="col-sm-2 col-xs-12 col-md-2 control-label">C&eacute;dula</label>
							    <div class="col-sm-10 col-xs-12 col-md-10">
							      <input type="text" class="form-control" id="cedula" required name="cedula_edit" value="<?php  echo $resultado['cedula'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="telefono" class="col-sm-2 col-xs-12 col-md-2 control-label">Tel&eacute;fono</label>
							    <div class="col-sm-10 col-xs-12 col-md-10">
							      <input type="text" class="form-control" id="telefono" required name="telefono_edit" value="<?php  echo $resultado['telefono'];?>">
							    </div>
							  </div>

							    <div class="form-group">
							    <label for="direccion" class="col-sm-2 col-xs-12 col-md-2 control-label">Direcci&oacute;n</label>
							    <div class="col-sm-10 col-xs-12 col-md-10">
							      <input type="text" class="form-control" id="direccion" required name="direccion_edit" value="<?php  echo $resultado['direccion'];?>">
							    </div>
							  </div>
							 

							  <div class="form-group">
							    <label for="email" class="col-sm-2 col-xs-12 col-md-2 control-label">Email</label>
							    <div class="col-sm-10 col-xs-12 col-md-10">
							      <input type="text" class="form-control" id="email" required name="email_edit" value="<?php  echo $resultado['email'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="valor" class="col-sm-2 col-xs-12 col-md-2 control-label">Valor por Hora</label>
							    <div class="col-sm-10 col-xs-12 col-md-10">
							      <input type="text" class="form-control" id="valor" required name="valor_edit" value="<?php  echo $resultado['valor_hora'];?>">
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="parqueo" class="col-sm-2 col-xs-12 col-md-2 control-label">Tipo de Parqueo</label>
							    <div class="form-group col-md-10 col-xs-12 col-sm-10">
		                              <select name="parqueo_edit" class="form-control"  required>
		                              <option value="<?php  echo $resultado['tipo_parqueo'];?>"><?php  echo $resultado['tipo_parqueo'];?></option>
		                              <?php 
		                              	if ($resultado['tipo_parqueo']=='Carro') {	////CONDICIONALES PARA EL SELECT
		                               ?>
											<option value="Moto">Moto</option>
								            <option value="Carro/Moto">Carro/Moto</option>
		                               <?php 
		                               	}elseif($resultado['tipo_parqueo']=='Moto'){
		                                ?>	
												<option value="Carro">Carro</option>
												<option value="Carro/Moto">Carro/Moto</option>
		                                <?php 
		                                	}elseif($resultado['tipo_parqueo']=='Carro/Moto'){
		                                 ?>          
								              <option value="Carro">Carro</option>
								              <option value="Moto">Moto</option>
								        <?php 
								        	}
								         ?>      
						              </select>
                                </div>
							  </div>

							<div class="row"><!--ROW TERCERO--> 

		                      <div class="col-md-12  col-sm-12  col-xs-12">
		                        <center>
		                            <input type="submit" name="add" class="btn btn-lg btn-primary" value="Editar Informaci&oacute;n">
		                        </center>
		                    </div>
          					 </div><!--ROW TERCERO--> 
							 


						</form>
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