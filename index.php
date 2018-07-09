<?php 
include('plantillas/plantilla_login.php')

 ?>


  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper" style="color:black;">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="i.login.php" method="post">
              <h1>BIENVENIDO</h1>
              <div id="error">
              	
              </div>
              <div>
                <input type="email"  name="usuario"  class="form-control" placeholder="Email">
              </div>
              <div>
                <input type="password" name="clave" class="form-control" placeholder="Clave">
              </div>
              <div>
              	<button type="submit" class="btn btn-default">Enviar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw" style="margin-right: 2px;"></i>Sistemas FACTO</h1>
                  <p>©2018 Todos los Derechos Reservados.</p>
                </div>
              </div>
            </form>
          </section>
        </div>        
      </div>
    </div>
  </body>
</html>
