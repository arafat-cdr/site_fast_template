<?php

   is_login();

   if( isset($_POST['btn']) ){

      $email = validate($_POST['email']);
      $password = md5($_POST['password']);


      $res = get_by_limit_one( 'users', "email='$email' AND password='$password'" );
      if( $res ){
         set_auth($res);
      }


   }




?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin Login</title>

      <?php include_once( __DIR__.'/../includes/load_css.php' ); ?>

   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="card card-outline card-primary">
            <div class="card-header text-center">
               <a href="<?php echo route('home'); ?>" class="h1"><b>Admin</b> Universepg</a>
            </div>
            <div class="card-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form action="" method="post">
                  <div class="input-group mb-3">
                     <input type="email" name="email" class="form-control" placeholder="Email">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fa fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" name="password" class="form-control" placeholder="Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fa fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-8">
                        <div class="icheck-primary">
                           <input type="checkbox" id="remember">
                           <label for="remember">
                           Remember Me
                           </label>
                        </div>
                     </div>
                     <div class="col-4">
                        <button type="submit" name="btn" class="btn btn-primary btn-block">Sign In</button>
                     </div>
                  </div>
               </form>
               <!-- <div class="social-auth-links text-center mt-2 mb-3" style="display: non;">
                  <a href="#" class="btn btn-block btn-primary">
                  <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                  </a>
                  <a href="#" class="btn btn-block btn-danger">
                  <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                  </a>
               </div> -->
               <!-- <p class="mb-1">
                  <a href="forgot-password.html">I forgot my password</a>
               </p>
               <p class="mb-0">
                  <a href="register.html" class="text-center">Register a new membership</a>
               </p> -->
            </div>
         </div>
      </div>

      <?php include_once( __DIR__.'/../includes/load_js.php' ); ?>

   </body>
</html>