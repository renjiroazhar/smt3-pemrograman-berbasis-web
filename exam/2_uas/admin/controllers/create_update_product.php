<?php 
	// Initialize the session
	session_start();
	
	// Check if the product is already logged in, if yes then redirect him to dashboard page
	session_regenerate_id();
	
	include("../config.php");

	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$category = $_POST['category'];
		$quantity = $_POST['quantity'];
		$unit = $_POST['unit'];
		$descript = $_POST['description'];
		$price = $_POST['price'];
	
		$file = $_FILES['image']['name'];
		$source = $_FILES['image']['tmp_name'];
		$targetDir = '../dist/img-upload/';
		
		move_uploaded_file($source, $targetDir.$file);

		$used_product = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM product WHERE id='$id'"));

		if($used_product) {
			$query = "UPDATE product SET `name`='$name', `category`='$category', `quantity`='$quantity', `unit`='$unit', `image`='$file', `descript`='$descript', `price`='$price' WHERE `id`='$id'";
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../product.php?status_update=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../product.php?status_update=failed');
			}
		} else {
			$query = ("INSERT INTO product (name, category, quantity, unit, image, descript, price) VALUES ('$name', '$category', '$quantity', '$unit', '$file', '$descript', '$price')");
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../product.php?status=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../product.php?status=failed');
			}
		}
		//Buat post 
	} else {
		die("Access denied");
	}
?>
