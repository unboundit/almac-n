<?php
  require_once(__DIR__.'/classes/autoloader.php');
  require_once(__DIR__.'/config.php');

  if(isset($_SESSION['user'])){
    header('Location: '.'panel.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body id="login" class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username"  name="txtusuario" required="" id="txtuser"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="txtpass"  required="" id="txtpass" />
              </div>
              <div>
                <a role="button" class="btn btn-default submit_login" >Log in</button>
                <a class="reset_pass hidden" href="#">olvidaste el password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link hidden">No tienes cuenta?
                  <a href="#signup" class="to_register"> Crear una </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-code"></i></h1>
                  <p>Copyright (c) 2016 Copyright Holder All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form hidden">
          <section class="login_content">
            <form>
              <h1>Crear Cuenta</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="panel.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Ya tienes cuenta?
                  <a href="#signin" class="to_register"> Haz Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-code"></i></h1>
                  <p>Copyright (c) 2015 Copyright Holder All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
  <!-- jQuery -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/scripts.js"></script>
</html>
