<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QR Code Ticketing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changess-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/icono.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">


              <div class="info d-flex align-items-center">
              <div class="login-logo">

              <img src="img/icono-negro.png" class="img-responsive" style="padding:5px 5px 0px 5px">

              </div>
                <div class="content">
                
                  <div class="logo">
                    <h1>SISTEMA WEB DE GESTIÓN DE EVENTOS</h1>
                    <h1>RECREATIVOS MEDIANTE ENTRADAS</h1>
                  </div>
                  <h2>EN CÓDIGO QR</h2>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->  
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                <h2>Iniciar sesión</h2>
                  <form action="login.php" method="POST" class="form-validate">
                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required data-msg="Por favor ingrese su usuario" class="input-material">
                      <label for="login-username" class="label-material">Nombre Usuario</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Por favor ingrese su contraseña" class="input-material">
                      <label for="login-password" class="label-material">Contraseña</label>
                    </div><button id="login" class="btn btn-primary">Ingresar</button>
                    <br>
                    <p>Oh registrate</p>
                    <a href="register.php" class="btn btn-primary" role="button">Registrarse</a>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><!--a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <!-- JavaScript files Principales-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>