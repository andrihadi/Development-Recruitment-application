<?php
session_start();
error_reporting(0);
//skrip Koneksi
$koneksi = new mysqli("localhost","root","","db_recruitment");

if (isset($_POST['recovery'])) {
	$sql = $koneksi->query("select * from admin where email='".$_POST['email']."'");
	if (!empty($_POST['email']) && mysqli_fetch_assoc($sql)>0 && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==FALSE) {
		$_SESSION['info']=$_POST['email'];
		header("location:infoadmin.php");
	}
	if (empty($_POST['email'])) {
		$ree="What is your E-mail?";
	}elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)==TRUE) {
		$ree="Invalid email";
		
	}elseif (mysqli_fetch_assoc($sql)<1) {
		$ree="That email does not exist";
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Wilmar Consultancy Services</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- SWEETALERT-->
	<link href="assets/css/sweetalert.css" rel="stylesheet" type="text/css" >
</head>
<body>
</div>
<div class="image" style="background-image: url('assets/img/di.jpg'); width: 100%; height: 100%;">
<div class="container">
	<div class="row text-center ">
		<div class="col-md-12">
			<br /><br />

			<br />
		</div>
	</div>
	<div class="row ">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="margin-top: 70px;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img src="assets/img/login.png" class="img-responsive"/>

				</div>
				<div class="panel-body">
					<form role="form" method="post" action="forgotpasswordadmin.php">
						Your E-mail:
						<div class="form-group input-group">

							<span class="input-group-addon">@</span>
							<input type="text" class="form-control" placeholder="E-mail" name="email" id="email" />

						</div>
						*<?php echo $ree;?><br>
						<input class="btn btn-primary" type="submit" name="recovery" value="Recover" />
						<a href="loginadmin.php" class="btn btn-default" name="cancel">Cancel</a>
					</form>
				</div>

			</div>
		</div>


	</div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
<!-- SWEET ALERT -->
<script src="assets/js/sweetalert.min.js"></script>

</body>
</html>
