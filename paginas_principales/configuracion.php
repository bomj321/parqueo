<?php 
session_start();
include('../conexion.php');
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <link rel="stylesheet" href="../css/nprogress.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
      	<!--MODALES-->
      	<?php 
      		include('../modales/registra_configuracion.php');
      	 ?>
      	<!--MODALES-->
        <!--ASIDE-->
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="./paginas_principales/inicio.php" class="site_title"><i class="fa fa-paw"></i> <span>Sistema FACTO!</span></a>
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

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="#"><i class="fa fa-car" aria-hidden="true"></i></i>Estado del Parqueo</a>                    
                  </li>
                   <li><a><i class="fa fa-tag" aria-hidden="true"></i>Generar Parqueo<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Ver Notas</a></li>
                      <li><a href="#">Agregar Notas</a></li>
                    </ul>
                  </li>

                  <li><a href="#"><i class="fa fa-edit"></i>Reportes</a>
                    
                  </li> 
                  <li><a href="configuracion.php"><i class="fa fa-wrench" aria-hidden="true"></i>Configuraci&oacute;n</a>
                   
                  </li>
                </ul>
              </div>              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!--ASIDE-->
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../image/avatar5.png" alt=""><?php echo $_SESSION['nombre'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">                    
                     <li>
                      <a href="../cerrar.php"><i class="fa fa-sign-out pull-right"></i>Salir</a>
                    </li>    
                  </ul>
                </li>
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
       
           <?php 
            include('../plantillas/plantilla_configuracion.php');

            ?>   

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Sistemas FACTO
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/custom.js"></script>   
<script src="../js/app.js"></script>
  </body>
</html>