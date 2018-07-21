<div class="modal fade" id="nuevo_parqueo">
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

          <!--CONSULTAS-->
          <?php 
           $sql_espacios=("SELECT * FROM cantidad_espacios WHERE estado_espacio='0'");
		   $resul = mysqli_query($con,$sql_espacios);

		    $sql_configuracion=("SELECT * FROM configuracion");
		    $resul_configuracion = mysqli_query($con,$sql_configuracion);
		    $configuracion=mysqli_fetch_array($resul_configuracion);
           ?>

          <!--CONSULTAS-->

                   <div id="mensaje_apartado"></div>        
                  <!--<form class="form-horizontal" enctype="multipart/form-data" onsubmit="apartar(); return false" id="apartar_parqueo" action="">-->
                  	<form class="form-horizontal"  id="apartar_parqueo" onsubmit="parquear(); return false">
                  	
                              <div class="form-group">
		                              <label class="control-label col-sm-2 col-xs-4">#Espacio</label>
		                             <div class="col-sm-10 col-sm-10 col-xs-8"> 
			                              <select name="apartar_espacio" class="form-control" required id="apartar_espacio">
			                              	<?php 
			                              		while($espacios=mysqli_fetch_array($resul)){ 
			                              	 ?>									            
									              <option value="<?php echo $espacios['id_espacios'];?>"><?php echo $espacios['letra_espacio'];?></option>

									        <?php 
									        	}
									         ?>      
									             
							            </select>
							        </div> 
                             </div>

                              <div class="form-group">
							    <label for="tipo" class="col-sm-2 col-sm-2 col-xs-4 control-label">Tipo</label>
							    <div class="col-sm-10 col-sm-10 col-xs-8">
							    	<?php 
							    	if ($configuracion['tipo_parqueo']=='Moto') {
							    	 ?>
							      <input type="text" class="form-control" id="tipo" readonly name="tipo_automotor" value="Moto">

							      <?php 
							      	}elseif($configuracion['tipo_parqueo']=='Carro'){
							       ?>
										<input type="text" class="form-control" id="tipo" readonly name="tipo_automotor" value="Carro">

							       <?php 
							       	}elseif($configuracion['tipo_parqueo']=='Carro/Moto'){
							        ?>
										<select name="tipo_automotor" class="form-control" required id="tipo">
												 <option value="Carro">Carro</option>
									              <option value="Moto">Moto</option>
							            </select>
			
							        <?php
							        }
							         ?>
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="matricula" class="col-sm-2 control-label col-xs-4">Matr&iacute;cula</label>
							    <div class="col-sm-10 col-xs-8">
							      <input type="text" class="form-control" name="matricula" id="matricula" required>
							    </div>
							  </div>

							  <div class="form-group">
							    <label for="telefono" class="col-sm-2 col-xs-4 control-label">Marca</label>
							    <div class="col-sm-10 col-xs-8">
							      <select name="marca"  class="form-control" required id="tipo_marca">
										<?php 
							    	if ($configuracion['tipo_parqueo']=='Moto') {
							    	 ?>
							    	    <option disabled>--Marcas de Motos--</option>
										<option value="Aeon">Aeon</option>
										<option value="Aprilia">Aprilia</option>
										<option value="Ariel">Ariel</option>
										<option value="Benelli">Benelli</option>
										<option value="Beta">Beta</option>
										<option value="Bimota">Bimota</option>
										<option value="BMW">BMW</option>
										<option value="Brough Superior">Brough Superior</option>
										<option value="Daelim">Daelim</option>
										<option value="Derbi">Derbi</option>
										<option value="Ducati">Ducati</option>
										<option value="EBR">EBR</option>
										<option value="Gas Gas">Gas Gas</option>
										<option value="Gilera">Gilera</option>
										<option value="Goes">Goes</option>
										<option value="Hanway">Hanway</option>
										<option value="Harley-Davidson">Harley-Davidson</option>
										<option value="Honda">Honda</option>
										<option value="Husqvarna">Husqvarna</option>
										<option value="Hyosung">Hyosung</option>
										<option value="Indian">Indian</option>
										<option value="Kawasaki">Kawasaki</option>
										<option value="Keeway">Keeway</option>
										<option value="KTM">KTM</option>
										<option value="Kymco">Kymco</option>
										<option value="Lambretta">Lambretta</option>
										<option value="LML">LML</option>
										<option value="Mash">Mash</option>
										<option value="MH">MH</option>
										<option value="Mondial">Mondial</option>
										<option value="Montesa">Montesa</option>
										<option value="Moto Guzzi">Moto Guzzi</option>
										<option value="MV Agusta">MV Agusta</option>
										<option value="Ossa">Ossa</option>
										<option value="Peugeot">Peugeot</option>
										<option value="Piaggio">Piaggio</option>
										<option value="Royal Enfield">Royal Enfield</option>
										<option value="Scomadi">Scomadi</option>
										<option value="Scrambler Ducati">Scrambler Ducati</option>
										<option value="Sherco">Sherco</option>
										<option value="Suzuki">Suzuki</option>
										<option value="SYM">SYM</option>
										<option value="Triumph">Triumph</option>
										<option value="Vectrix">Vectrix</option>
										<option value="Vespa">Vespa</option>
										<option value="Victory">Victory</option>
										<option value="Yamaha">Yamaha</option>



							    	  <?php 
							      	}elseif($configuracion['tipo_parqueo']=='Carro'){
							       ?>
							            <option disabled>--Marcas de Carros--</option>
										<option value="Alfa Romeo">Alfa Romeo</option>
										<option value="Aston Martin">Aston Martin</option>
										<option value="Audi">Audi</option>
										<option value="Autovaz">Autovaz</option>
										<option value="Bentley">Bentley</option>
										<option value="Bmw">Bmw</option>
										<option value="Cadillac">Cadillac</option>
										<option value="Caterham">Caterham</option>
										<option value="Chevrolet">Chevrolet</option>
										<option value="Chrysler">Chrysler</option>
										<option value="Citroen">Citroen</option>
										<option value="Daihatsu">Daihatsu</option>
										<option value="Dodge">Dodge</option>
										<option value="Ferrari">Ferrari</option>
										<option value="Fiat">Fiat</option>
										<option value="Ford">Ford</option>
										<option value="Honda">Honda</option>
										<option value="Hummer">Hummer</option>
										<option value="Hyundai">Hyundai</option>
										<option value="Isuzu">Isuzu</option>
										<option value="Jaguar">Jaguar</option>
										<option value="Jeep">Jeep</option>
										<option value="Kia">Kia</option>
										<option value="Lamborghini">Lamborghini</option>
										<option value="Lancia">Lancia</option>
										<option value="Land Rover">Land Rover</option>
										<option value="Lexus">Lexus</option>
										<option value="Lotus">Lotus</option>
										<option value="Maserati">Maserati</option>
										<option value="Mazda">Mazda</option>
										<option value="Mercedes Benz">Mercedes Benz</option>
										<option value="MG">MG</option>
										<option value="Mini">Mini</option>
										<option value="Mitsubishi">Mitsubishi</option>
										<option value="Morgan">Morgan</option>
										<option value="Nissan">Nissan</option>
										<option value="Opel">Opel</option>
										<option value="Peugeot">Peugeot</option>
										<option value="Porsche">Porsche</option>
										<option value="Renault">Renault</option>
										<option value="Rolls Royce">Rolls Royce</option>
										<option value="Rover">Rover</option>
										<option value="Saab">Saab</option>
										<option value="Seat">Seat</option>
										<option value="Skoda">Skoda</option>
										<option value="Smart">Smart</option>
										<option value="Ssangyong">Ssangyong</option>
										<option value="Subaru">Subaru</option>
										<option value="Suzuki">Suzuki</option>
										<option value="Tata">Tata</option>
										<option value="Toyota">Toyota</option>
										<option value="Volkswagen">Volkswagen</option>
										<option value="Volvo">Volvo</option>



							       <?php 
							       	}elseif($configuracion['tipo_parqueo']=='Carro/Moto'){
							        ?>
							            <option disabled>--Marcas de Carros--</option>
										<option value="Alfa Romeo">Alfa Romeo</option>
										<option value="Aston Martin">Aston Martin</option>
										<option value="Audi">Audi</option>
										<option value="Autovaz">Autovaz</option>
										<option value="Bentley">Bentley</option>
										<option value="Bmw">Bmw</option>
										<option value="Cadillac">Cadillac</option>
										<option value="Caterham">Caterham</option>
										<option value="Chevrolet">Chevrolet</option>
										<option value="Chrysler">Chrysler</option>
										<option value="Citroen">Citroen</option>
										<option value="Daihatsu">Daihatsu</option>
										<option value="Dodge">Dodge</option>
										<option value="Ferrari">Ferrari</option>
										<option value="Fiat">Fiat</option>
										<option value="Ford">Ford</option>
										<option value="Honda">Honda</option>
										<option value="Hummer">Hummer</option>
										<option value="Hyundai">Hyundai</option>
										<option value="Isuzu">Isuzu</option>
										<option value="Jaguar">Jaguar</option>
										<option value="Jeep">Jeep</option>
										<option value="Kia">Kia</option>
										<option value="Lamborghini">Lamborghini</option>
										<option value="Lancia">Lancia</option>
										<option value="Land Rover">Land Rover</option>
										<option value="Lexus">Lexus</option>
										<option value="Lotus">Lotus</option>
										<option value="Maserati">Maserati</option>
										<option value="Mazda">Mazda</option>
										<option value="Mercedes Benz">Mercedes Benz</option>
										<option value="MG">MG</option>
										<option value="Mini">Mini</option>
										<option value="Mitsubishi">Mitsubishi</option>
										<option value="Morgan">Morgan</option>
										<option value="Nissan">Nissan</option>
										<option value="Opel">Opel</option>
										<option value="Peugeot">Peugeot</option>
										<option value="Porsche">Porsche</option>
										<option value="Renault">Renault</option>
										<option value="Rolls Royce">Rolls Royce</option>
										<option value="Rover">Rover</option>
										<option value="Saab">Saab</option>
										<option value="Seat">Seat</option>
										<option value="Skoda">Skoda</option>
										<option value="Smart">Smart</option>
										<option value="Ssangyong">Ssangyong</option>
										<option value="Subaru">Subaru</option>
										<option value="Suzuki">Suzuki</option>
										<option value="Tata">Tata</option>
										<option value="Toyota">Toyota</option>
										<option value="Volkswagen">Volkswagen</option>
										<option value="Volvo">Volvo</option>
										<option disabled>--Marcas de Motos--</option>
										<option value="Aeon">Aeon</option>
										<option value="Aprilia">Aprilia</option>
										<option value="Ariel">Ariel</option>
										<option value="Benelli">Benelli</option>
										<option value="Beta">Beta</option>
										<option value="Bimota">Bimota</option>
										<option value="BMW">BMW</option>
										<option value="Brough Superior">Brough Superior</option>
										<option value="Daelim">Daelim</option>
										<option value="Derbi">Derbi</option>
										<option value="Ducati">Ducati</option>
										<option value="EBR">EBR</option>
										<option value="Gas Gas">Gas Gas</option>
										<option value="Gilera">Gilera</option>
										<option value="Goes">Goes</option>
										<option value="Hanway">Hanway</option>
										<option value="Harley-Davidson">Harley-Davidson</option>
										<option value="Honda">Honda</option>
										<option value="Husqvarna">Husqvarna</option>
										<option value="Hyosung">Hyosung</option>
										<option value="Indian">Indian</option>
										<option value="Kawasaki">Kawasaki</option>
										<option value="Keeway">Keeway</option>
										<option value="KTM">KTM</option>
										<option value="Kymco">Kymco</option>
										<option value="Lambretta">Lambretta</option>
										<option value="LML">LML</option>
										<option value="Mash">Mash</option>
										<option value="MH">MH</option>
										<option value="Mondial">Mondial</option>
										<option value="Montesa">Montesa</option>
										<option value="Moto Guzzi">Moto Guzzi</option>
										<option value="MV Agusta">MV Agusta</option>
										<option value="Ossa">Ossa</option>
										<option value="Peugeot">Peugeot</option>
										<option value="Piaggio">Piaggio</option>
										<option value="Royal Enfield">Royal Enfield</option>
										<option value="Scomadi">Scomadi</option>
										<option value="Scrambler Ducati">Scrambler Ducati</option>
										<option value="Sherco">Sherco</option>
										<option value="Suzuki">Suzuki</option>
										<option value="SYM">SYM</option>
										<option value="Triumph">Triumph</option>
										<option value="Vectrix">Vectrix</option>
										<option value="Vespa">Vespa</option>
										<option value="Victory">Victory</option>
										<option value="Yamaha">Yamaha</option>


							         <?php
							        }
							         ?>

										
									</select>
							    </div>
							  </div>
							
							<div class="form-group col-md-12">
                             <button type="submit" class="btn btn-lg btn-primary">Apartar</button> 
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