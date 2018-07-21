<?php 
session_start();
if (!isset($_SESSION['nombre'])){
echo '

<script language="javascript">
alert("LA SESIÓN NO HA SIDO INICIADA CORRECTAMENTE");
 window.location.href="../index.php";
</script>
';
} 
date_default_timezone_set('America/Caracas');
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

   <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
      	<!--MODALES-->
      	
      	<!--MODALES-->
        <!--ASIDE-->
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            

            <!-- sidebar menu -->
           	 <?php 
            include('../plantillas/plantilla_aside.php');

            ?>   

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
            include('../plantillas/plantilla_parqueo.php');

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
<!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script src="../js/app.js"></script>

  </body>
</html>