 <?php 
 session_start();

 error_reporting(0);

 $koneksi = new mysqli("localhost","root","","db_recruitment");

 if (!isset($_SESSION['admin'])) 
 {
  echo "<script>alert('You Must Login');</script>";
  echo "<script>location='loginadmin.php';</script>";
  header('location:loginadmin.php');
  exit();
}
$admin_id = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WCS - Recruitment System</title>
  <link rel="shortcut icon" href="assets/img/logo.png">
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="indexadmin.php" style="font-size: 18px">Wilmar Consultancy Services</a> 
      </div>
      <div style="color: white;
      padding: 15px 50px 5px 50px;
      float: right;
      font-size: 16px;"> <?php date_default_timezone_set("Asia/Jakarta"); echo date('d F Y H:i', time()); ?> &nbsp; <a href="?page=logout" class="btn btn-danger square-btn-adjust" name="logout">Logout</a> </div>
    </nav>   
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center">
            <br>
            <img src="foto/<?php  echo $admin_id['foto_admin'];  ?>" class="vacant-image img-responsive"/>
          </li>

          <li>
            <a  href="indexadmin.php"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>

          <li>
            <a  href="?page=applicant_data"><i class="glyphicon glyphicon-edit"></i> Applicant Data</a>
          </li>

          <li>
            <a  href="?page=applicant_test_results_data"><i class="glyphicon glyphicon-edit"></i> Applicant Test Results Data</a>
          </li>
        
          <li>
            <a  href="?page=talented_pool_data"><i class="glyphicon glyphicon-edit"></i> Talented Pool Data</a>
          </li>

          <li>
            <a  href="?page=drop_pool_data"><i class="glyphicon glyphicon-edit"></i> Drop Pool Data</a>
          </li>

          <li>
            <a  href="?page=vacant"><i class="glyphicon glyphicon-edit"></i> Vacant Data</a>
          </li>

          <li>
            <a  href="?page=detail_applicant_data"><i class="glyphicon glyphicon-th-list"></i> Detail Applicant Data</a>
          </li>

        </ul>

      </div>

    </nav>  
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">

           <?php

           $page = $_GET['page'];
           $aksi = $_GET['aksi'];
           $page1 = $_GET['assets'];

           if ($page == "applicant_data") {
             if ($aksi == "") {
               include "page/applicant_data/applicant_data.php";
             }elseif ($aksi == "tambah") {
               include "page/applicant_data/tambah.php";
             }elseif ($aksi == "ubah") {
               include "page/applicant_data/ubah.php";
             }elseif ($aksi == "hapus") {
               include "page/applicant_data/hapus.php";
             }elseif ($aksi == "detail") {
               include "page/applicant_data/detail.php";
             }

           }
           elseif ($page == "applicant_test_results_data") {
             if ($aksi == "") {
               include "page/applicant_test_results_data/applicant_test_results_data.php";
             }elseif ($aksi == "tambah") {
               include "page/applicant_test_results_data/tambah.php";
             }elseif ($aksi == "ubah") {
               include "page/applicant_test_results_data/ubah.php";
             }elseif ($aksi == "hapus") {
               include "page/applicant_test_results_data/hapus.php";
             }elseif ($aksi == "detail") {
               include "page/applicant_test_results_data/detail.php";
             }
           }
           elseif ($page == "vacant") {
             if ($aksi == "") {
               include "page/vacant/vacant.php";
             }elseif ($aksi == "hapus") {
               include "page/vacant/hapus.php";
             }elseif ($aksi == "tambah") {
               include "page/vacant/tambah.php";
             }elseif ($aksi == "ubah") {
              include "page/vacant/ubah.php";
            }
           }
           elseif ($page == "admin") {
             if ($aksi == "") {
               include "page/admin/ubah.php";
             }elseif ($aksi == "tambah") {
               include "page/admin/tambah.php";
             }
           }
           elseif ($page == "detail_applicant_data") {
             if ($aksi == "") {
               include "page/detail_applicant_data/detail_applicant_data.php";
             }           
           }
           elseif ($page == "talented_pool_data") {
             if ($aksi == "") {
               include "page/talented_pool_data/talented_pool_data.php";
             }elseif ($aksi == "detail") {
               include "page/talented_pool_data/detail.php";
             }
           }
           elseif ($page == "drop_pool_data") {
             if ($aksi == "") {
               include "page/drop_pool_data/drop_pool_data.php";
             }elseif ($aksi == "detail") {
               include "page/drop_pool_data/detail.php";
             }
           }elseif ($page == "logout") {
             if ($aksi == "") {
               include "page/logout/logout.php";
             }
           }
           else
           {
            include "dashboardadmin.php";
          }
          ?>

        </div>
      </div>
      <!-- /. ROW  -->
      <hr />

    </div> 
    <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
  $(document).ready(function () {
    $('#dataTables-example').dataTable();
  });
</script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>
</html>
