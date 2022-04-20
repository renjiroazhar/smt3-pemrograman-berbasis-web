<?php 
	// Initialize the session
	session_start();
	
	// Check if the user is already logged in, if yes then redirect him to dashboard page
	session_regenerate_id();
	
	include("../config.php");

	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$used_user = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM user WHERE id='$id'"));

		if($used_user) {
			$query = "UPDATE user SET `username`='$username', `email`='$email', `password`='$password' WHERE `id`='$id'";
			$post = mysqli_query($connection, $query);

			if($post) {
				if(!isset($_SESSION['admin'])) { /* If there is no valid session */
					header('Location: ../../login.php?status_update=success');
				} else {
					//Jika berhasil maka alihkan ke halaman index.php dengan status=success
					header('Location: ../user.php?status_update=success');
				}
			} else {
				if(!isset($_SESSION['admin'])) { /* If there is no valid session */
					header('Location: ../../login.php?status_update=failed');
				} else {
					//Jika gagal alihkan ke halaman index.php dengan status=failed
					header('Location: ../user.php?status_update=failed');
				}
			}
		} else {
			$query = ("INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')");
			$post = mysqli_query($connection, $query);

			if($post) {
				if(!isset($_SESSION['admin'])) { /* If there is no valid session */
					header('Location: ../../login.php?status=success');
				} else {
					//Jika berhasil maka alihkan ke halaman index.php dengan status=success
					header('Location: ../user.php?status=success');
				}
			} else {
				if(!isset($_SESSION['admin'])) { /* If there is no valid session */
					header('Location: ../../login.php?status=faied');
				} else {
					//Jika gagal alihkan ke halaman index.php dengan status=failed
					header('Location: ../user.php?status=failed');
				}		
			}
		}
		//Buat post 
	} else {
		die("Access denied");
	}
?>
