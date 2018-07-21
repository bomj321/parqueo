             <div class="navbar nav_title" style="border: 0;">
              <a href="../paginas_principales/estado_parqueo.php" class="site_title"><i class="fa fa-car"></i> <span>EASY PARKING</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../image/avatar5.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $_SESSION['nombre'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="estado_parqueo.php"><i class="fa fa-car" aria-hidden="true"></i></i>Estado del Parqueo</a>                    
                  </li>
                   <li><a href="generar_parqueo.php"><i class="fa fa-tag" aria-hidden="true"></i>Finalizar y Generar Parqueo</a>
                    
                  </li>

                  <li><a href="generar_reportes.php"><i class="fa fa-edit"></i>Reportes</a>
                    
                  </li> 
                  <li><a href="configuracion.php"><i class="fa fa-wrench" aria-hidden="true"></i>Configuraci&oacute;n</a>
                   
                  </li>
                </ul>
              </div>              
            </div>