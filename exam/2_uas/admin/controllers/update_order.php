<?php 
	// Initialize the session
	session_start();
	
	// Check if the orders is already logged in, if yes then redirect him to dashboard page
	session_regenerate_id();
	
	include("../config.php");

	$id = $_GET['id'];

	if($id != null) {
		$st = $_GET['st'];

		$used_order = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM orders WHERE id='$id'"));

		if($used_order && $st == 2) {
			$query = "UPDATE orders SET `status`='$st' WHERE `id`='$id'";
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../order.php?status_update=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../order.php?status_update=failed');
			}
		} elseif ($used_order && $st == 3) {
			$query = "UPDATE orders SET `status`='$st' WHERE `id`='$id'";
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../order.php?status_update=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../order.php?status_update=failed');
			}
		}
		//Buat post 
	} else {
		die("Access denied");
	}
?>
