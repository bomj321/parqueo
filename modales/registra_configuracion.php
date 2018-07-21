<div class="modal fade" id="configuracion">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registrar una Configuraci&oacute;n</h4>
              </div>
        <div class="modal-body"> 
          <style type="text/css">
            .mensaje_alerta_configuracion{
              font-size: 2em;              
            }
          </style>
                   <div id="mensaje_configuracion"></div>        
                   <form class="form-horizontal" enctype="multipart/form-data"  METHOD="POST" onsubmit="configurar(); return false" id="configurar_data" action="">
                             <div class="form-group col-md-12 col-xs-12">
		                              <label class="control-label">Nombre del Parqueo</label>
		                                <input class="form-control" type="text" placeholder="Nombre del Parqueo" id="nombre_parqueo" required="true" name="nombre">

                             </div>

                             <div class="form-group col-md-12 col-xs-12">
		                              <label class="control-label">C&eacute;dula</label>
		                                <input class="form-control" type="text" placeholder="C&eacute;dula" id="cedula_parqueo" required="true" name="cedula">

                             </div>


                             <div class="form-group col-md-12 col-xs-12">
		                              <label class="control-label">Tel&eacute;fono</label>
		                                <input class="form-control" type="text" placeholder="Tel&eacute;fono" id="telefono_parqueo" required="true" name="telefono">

                             </div>

                              <div class="form-group col-md-12 col-xs-12">
                                  <label class="control-label">Direcci&oacute;n</label>
                                    <input class="form-control" type="text" placeholder="Direcci&oacute;n del Parqueo" id="direccion_parqueo" required="true" name="direccion">

                             </div>


                             <div class="form-group col-md-12 col-xs-12">
		                              <label class="control-label">Email</label>
		                                <input class="form-control" type="email" placeholder="Email" id="email_parqueo" required="true" name="email">

                             </div>


                             <div class="form-group col-md-12 col-xs-12">
		                              <label class="control-label">Valor Por Hora</label>
		                                <input class="form-control" type="text" placeholder="Valor por Hora" id="valor_parqueo" required="true" name="valor_hora">

                             </div>


                             <div class="form-group col-md-12 col-xs-12">
		                              <label class="control-label">Tipo de Parqueo</label>
		                              <select name="tipo_parqueo" class="form-control" required>									            
								              <option value="Carro">Carro</option>
								              <option value="Moto">Moto</option>
								              <option value="Carro/Moto">Carro/Moto</option>
						            </select>

                             </div>


                             <div class="form-group col-md-12 col-xs-12">
		                              <label class="control-label">Cantidad de Espacios</label>
		                                <input class="form-control" type="text" placeholder="Cantidad de Espacios" id="cantidadE_parqueo" required="true" name="cantidad_espacios">

                             </div>


                             <div class="form-group col-md-12 col-xs-12">
		                              <label class="control-label">Cantidad de Columnas</label>
		                                <input class="form-control" type="text" placeholder="Cantidad de Columnas" id="cantidadC_parqueo" required="true" name="cantidad_columnas">

                             </div>
							
							<div class="form-group col-md-12">
                             <button type="submit" class="btn btn-lg btn-primary">Configurar</button> 
                             </div>
                    </form>
                 </div>            
              <br>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->