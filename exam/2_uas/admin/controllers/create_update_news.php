<?php 
	// Initialize the session
	session_start();
	
	// Check if the news is already logged in, if yes then redirect him to dashboard page
	session_regenerate_id();
	
	include("../config.php");

	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$image = $_POST['image'];
		$content = $_POST['content'];
		$source = $_POST['source'];
	
		$file = $_FILES['image']['title'];
		$source = $_FILES['image']['tmp_name'];
		$targetDir = '../dist/img-upload/';
		
		move_uploaded_file($source, $targetDir.$file);

		$used_news = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM news WHERE id='$id'"));

		if($used_news) {
			$query = "UPDATE news SET `title`='$title', `category`='$category', `image`='$file', `content`='$content', `source`='$source' WHERE `id`='$id'";
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../news.php?status_update=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../news.php?status_update=failed');
			}
		} else {
			$query = ("INSERT INTO news (title, category, image, content, source) VALUES ('$title', '$category', '$file', '$content', '$source')");
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../news.php?status=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../news.php?status=failed');
			}
		}
		//Buat post 
	} else {
		die("Access denied");
	}
?>
