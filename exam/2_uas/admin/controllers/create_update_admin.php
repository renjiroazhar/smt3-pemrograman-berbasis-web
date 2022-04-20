<?php 
	include("../config.php");

	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$used_admin = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM admin WHERE id='$id'"));

		if($used_admin) {
			$query = "UPDATE admin SET `username`='$username', `password`='$password' WHERE `id`='$id'";
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../admin.php?status_update=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../admin.php?status_update=failed');
			}
		} else {
			$query = ("INSERT INTO admin (username, password) VALUES ('$username', '$password')");
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../admin.php?status=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../admin.php?status=failed');
			}		
		}
		//Buat post 
	} else {
		die("Access denied");
	}
?>
