<?php
require_once('../config.php');
session_start();
if(isset($_SESSION['login'])){
  header("location: ".$web_url."admin/");
  exit;
}
 // patc bug csrf
 if (!isset($_SESSION['token'])) {
  $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/login.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post">
                                    
                            
                            <div style="margin-bottom: 25px" class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input type="hidden" name="token" value="<?=$_SESSION['token'];?>">
                              <input id="login-username" type="text" class="form-control" name="username" placeholder="gmail" required autofocus>                                         
                            </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                              <input id="login-password" type="password" class="form-control" name="password" placeholder="password" required>
                            </div>
                                    

                                
                            


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <Button type="submit" id="btn-login" name="submit" class="btn btn-success">Login  </Button>
                                      

                                    </div>
                                </div>


                                   
                        </form>     
                    
        

               
               
                
         
    
    <?php
    

    if (isset($_POST['submit'])) {
      if ($_SESSION['token'] == $_POST['token']) {
        unset($_SESSION['token']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $kueri = mysqli_query($db, "SELECT * FROM login WHERE gmail_login = '$username' AND pass_login = md5('$password')");
        $ambil = mysqli_fetch_assoc($kueri);
        if (mysqli_num_rows($kueri)==1) {
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $ambil['user_login'];
            header("location: index.php");
            exit;
        }else{
          echo "<script>window.alert('user tidak ditemukan'); window.location.replace('".$web_url."admin');</script>";
          exit;
        }
      }
        

    }
    ?>
    
    <!-- Remind Passowrd -->
    
     </div>


        </div>                     
      </div>  
    </div>
    

 

    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>