<?php
if(isset($_SESSION['login_user'] )){
header("location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Login Sirkulasi perpustakaan</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" method="post">
		        <h2 class="form-login-heading"><p class="centered"><a><img src="assets/img/logowahasa.png" class="img-thumbnail" width="60"></a></p>SIRKULASI PERPUSTAKAAN SMK WACHID HASYIM SURABAYA</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Username" id="username" name="username" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                <br>
                <center><p>Pastikan username dan password sudah terdaftar agar dapat mengakses Sistem Informasi Sirkulasi Perpustakaan SMK Wachid Hasyim Surabaya</p></center>
                <br>
                <div class="bg-danger"><center><?php include('login.php'); ?></center></div>
                <hr>
		            <button class="btn btn-success btn-block" id="submit" name="submit" type="submit" value="Login"><i class="fa fa-lock"></i> MASUK</button>
		        </div>
		      </form>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/back.jpg", {speed: 500});
    </script>
  </body>
</html>
