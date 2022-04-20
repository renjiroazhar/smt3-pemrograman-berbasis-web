<?php
include "mysqli_koneksi.php";
session_start();
if (isset($_POST['submit'])) {
if (isset($_POST['username'])) {
$userid = $_POST['username'];
} else {
die ("Error. No Id Selected! ");
}
if($userid=="")
{
	header("Location:login.php?cannotLogin");
}
else
{ $query = "SELECT * from users WHERE user_id='$userid'";
	$sql = mysqli_query ($con,$query);
	if($sql) {
		$hasil = mysqli_fetch_array ($sql);
	$username = $hasil['user_id'];
	if($username==$userid){
    	$_SESSION['namauser'] = $username;
		header("Location:index.php");
	}
	else
	{
		header("Location:login.php?UserSalah");
	}
	}else{
		header("Location:login.php?CannotLogin");
	}
}
}
else
{
	header("Location:login.php");
}
?>