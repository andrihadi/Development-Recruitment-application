<?php
session_start();
//skrip Koneksi
$koneksi = new mysqli("localhost","root","","db_recruitment");
$sql = $koneksi->query("select * from admin where email='".$_SESSION['info']."'");
$data=mysqli_fetch_assoc($sql);

$u=$data['username'];
$p=$data['password'];

echo "Your information is " ."<br>" . $u. "<br>" . $p;

?>
<br>
<a href="loginadmin.php" >Login here</a>