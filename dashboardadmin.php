
<?php 
session_start();

$koneksi = new mysqli("localhost","root","","db_recruitment");

$admin_id = $_SESSION['admin'];

?>
<!DOCTYPE html>
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
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
	<div>
		<a class="navbar-brand" href="" style="color: #cccccc; font-size: 23px">Dashboard</a>
	</div>
	<div class="collapse navbar-collapse">
		<div class="nav navbar-nav navbar-right">
			<a href="?page=admin&admin_id=<?php echo $admin_id['admin_id']; ?>" style="color: #cccccc;">
				<p>
					<i class="fa fa-user" style="font-size: 18px; color: #cccccc;"></i> Hi,
					<?php  echo $admin_id['nama_lengkap'];  ?>
				</p>
			</a>
		</div>
	</div>
	<hr />
	<div class="collapse navbar-collapse">
		<div class="nav navbar-nav navbar-right">
		<a href="?page=admin&aksi=tambah" class="btn btn-default" style="margin-bottom: 8px;"><i class="fa fa-plus "></i>Add Admin</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-green set-icon">
					<i class="fa fa-bars"></i>
				</span>
				<div class="text-box" >
					<p class="main-text"><?php
						$sql = $koneksi->query("select applicant_id from candidate");
						echo mysqli_num_rows($sql). '&nbspData';
						?></p>
						<p class="text-muted">Applicant</p>

					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6">           
				<div class="panel panel-back noti-box">
					<span class="icon-box bg-color-brown set-icon">
						<i class="fa fa-check"></i>
					</span>
					<div class="text-box" >
						<p class="main-text"><?php
							$sql = $koneksi->query("select applicant_test_id from applicant_test_result");
							echo mysqli_num_rows($sql). '&nbspData';
							?></p>
							<p class="text-muted">Applicant Test Result</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6">           
					<div class="panel panel-back noti-box">
						<span class="icon-box bg-color-red set-icon">
							<i class="fa fa-user"></i>
						</span>
						<div class="text-box" >
							<p class="main-text"><?php
								$sql = $koneksi->query("SELECT applicant_test_id FROM applicant_test_result WHERE applicant_test_result.`result_hr_interview` = 'KIV' OR applicant_test_result.`shortlisted_result` = 'KIV' OR applicant_test_result.`result_interview_1` = 'KIV' OR applicant_test_result.`result_interview_2` = 'KIV'");
								echo mysqli_num_rows($sql). '&nbspData';
								?></p>
								<p class="text-muted">Talented Pool</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6">           
					<div class="panel panel-back noti-box">
						<span class="icon-box bg-color-green set-icon">
							<i class="fa fa-bars"></i>
						</span>
						<div class="text-box" >
						<p class="main-text"><?php
							$sql = $koneksi->query("select expert_name from expert");
							echo mysqli_num_rows($sql). '&nbspData';
							?></p>
						<p class="text-muted">Vacant</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6">           
					<div class="panel panel-back noti-box">
					
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6">           
					<div class="panel panel-back noti-box">
						<span class="icon-box bg-color-red set-icon">
							<i class="fa fa-user"></i>
						</span>
						<div class="text-box" >
						<p class="main-text"><?php
							$sql = $koneksi->query("SELECT candidate.`full_name`, candidate.`gender`, candidate.`telephone`, candidate.`email`,candidate.`SAP_exp`, candidate.`expert_name`,candidate.`salary` FROM applicant_test_result INNER JOIN candidate ON applicant_test_result.`applicant_id` = candidate.`applicant_id` WHERE applicant_test_result.`final_status_result` = 'NO' OR applicant_test_result.`final_status_result` = 'Drop'");
							echo mysqli_num_rows($sql). '&nbspData';
							?></p>
						<p class="text-muted">Drop Pool</p>
						</div>
					</div>
				</div>

				<div class="panel-body">
				<div class="col-md-12 col-sm-12 col-xs-12" align="center">
     			   <div class="panel panel-back noti-box">
					<center><h4><b>The Most Expertise in Popular</b></h4></center> 
    				<table border="1" class="table table-striped table-bordered table-hover" id="dataTables-example" style="width: 100%">
    				<tbody class="text-muted">
        				<?php 
        				$data = mysqli_query($koneksi,"SELECT expert_name AS 'Area of Expertise', COUNT(expert_name) as jumlah FROM candidate WHERE DATE_FORMAT(date_registration,'%Y')='2018' && '2019' && '2020' GROUP BY expert_name ORDER BY jumlah DESC, expert_name ");
        				while($d=mysqli_fetch_array($data)){
        				?>
        			<tr>     
            			<td align="center"><?php echo $d['Area of Expertise']; ?></td>            
            			<td align="center"><?php echo $d['jumlah']; ?> People</td>         
        			</tr>
        			<?php 
        			}
        			?>
    				</tbody>
    				</table>
    				</div>
    				</div>
					</div>
				


				<!-- /. ROW  -->

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