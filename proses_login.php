<?php
if ($_POST){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if (empty($username)) {
		echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
	} elseif (empty($password)) {
		echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
	} else {
		include "koneksi.php";
		$qry_login=myqsli_query($conn, "select from t_mahasiswa where username = '".$username."' and password = '".$password."'");
	if (mysqli_num_rows($qry_login)) {
		$dt_login=mysqli_fetch_array($qry_login);
		session_start();
		$_SESSION['id_mahasiswa']=$dt_login['id_mahasiswa'];
		$_SESSION['nama']=$dt_login['nama'];
		$_SESSION['status_login']=true;
		header("location: home.php");
	}	else {
		echo"<script>alert('Username dan Password tidak boleh kosong');location.href='login.php';</script>";
			}
		}
	}
?>